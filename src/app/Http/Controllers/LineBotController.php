<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use LINE\Clients\MessagingApi\Configuration;
use LINE\Clients\MessagingApi\Api\MessagingApiApi;
use LINE\Clients\MessagingApi\Model\BroadcastRequest;
use LINE\Clients\MessagingApi\Model\ImageMessage;
use LINE\Clients\MessagingApi\Model\TextMessage;
use LINE\Clients\MessagingApi\Model\ReplyMessageRequest;
use LINE\Clients\MessagingApi\ApiException;
use LINE\Webhook\Model\MessageEvent;
use LINE\Webhook\Model\TextMessageContent;
use LINE\Parser\EventRequestParser;
use Illuminate\Support\Facades\Log;

class LineBotController extends Controller
{
    public function reply(Request $request)
    {
        // チャネルシークレットとチャネルアクセストークンを読み込む
        $channelSecret = config('services.line.secret');
        $channelToken = config('services.line.token');

        // Webhookイベントを取得する
        $httpRequestBody = $request->getContent();

        // 署名を検証する（Messaging APIから送られたものであるかチェック）
        $hash = hash_hmac('sha256', $httpRequestBody, $channelSecret, true);
        $signature = base64_encode($hash);
        if ($signature !== $request->header('X-Line-Signature')) return;

        // LINEBOTクライアントを作成
        $client = new Client();
        $config = new Configuration();
        $config->setAccessToken($channelToken);

        // LINE Messaging APIを作成
        $messagingApi = new MessagingApiApi(
            client: $client,
            config: $config,
        );

        try {
            // イベントリクエストをパース
            $parsedEvents = EventRequestParser::parseEventRequest($httpRequestBody, $channelSecret, $signature);

            // イベントは配列（必ずしも１つとは限らない）で来るのでforeachで回す
            foreach ($parsedEvents->getEvents() as $event) {

                // メッセージイベント以外は無視
                if (!($event instanceof MessageEvent)) continue;

                // メッセージを取得
                $eventMessage = $event->getMessage();

                // テキストメッセージ以外は無視
                if (!($eventMessage instanceof TextMessageContent)) continue;

                // テキストメッセージを取得
                $eventMessageText = $eventMessage->getText();

                // 応答メッセージを作成
                $message = new TextMessage([
                    'type' => 'text',
                    'text' => $eventMessageText,
                ]);

                // 応答リクエストを作成
                $request = new ReplyMessageRequest([
                    'replyToken' => $event->getReplyToken(),
                    'messages' => [$message], // 配列である必要があります
                ]);

                // 応答リクエストを送信する
                $response = $messagingApi->replyMessageWithHttpInfo($request);

                // レスポンスをチェックする（エラーの場合の処理）
                $responseBody = $response[0];
                $responseStatusCode = $response[1];
                if ($responseStatusCode != 200) {
                    throw new \Exception($responseBody);
                }
            }

            return;

        } catch (ApiException $e) {
            // エラー内容をログに出力
            Log::error($e->getCode() . ':' . $e->getResponseBody());
        }
    }

    public function sendBroadcastMessage()
    {
        // チャネルアクセストークンを読み込む
        $channelToken = config('services.line.token');

        // LINEBOTクライアントを作成
        $client = new Client();
        $config = new Configuration();
        $config->setAccessToken($channelToken);

        // LINE Messaging APIを作成
        $messagingApi = new MessagingApiApi(
            client: $client,
            config: $config,
        );

        try {
            // タイトルと概要
            $titleAndDescription = "🍳本日のおすすめレシピ！\n\n【みかんの焼きドーナツ】\nキャラメリゼしたみかんを、焼きドーナツに。生地にもみかん果汁を使いました。ふんわり焼き上げたドーナツにみかんとカラメルの風味が良く合います。おすすめです♪";
            $url = "https://recipe.rakuten.co.jp/recipe/1620025205/";
            $imageUrl = "https://recipe.r10s.jp/recipe-space/d/strg/ctrl/3/bdd8e1a0976c49da67e58f1dd1189bca3231387f.24.2.3.2.jpg";

            // タイトルと概要を同じメッセージとして送信
            $titleAndDescriptionMessage = new TextMessage([
                'type' => 'text',
                'text' => $titleAndDescription,
            ]);
            $messagingApi->broadcastWithHttpInfo(new BroadcastRequest([
                'messages' => [$titleAndDescriptionMessage],
            ]));

            // 画像を送信
            $imageMessage = new ImageMessage([
                'type' => 'image',
                'originalContentUrl' => $imageUrl,
                'previewImageUrl' => $imageUrl, // プレビュー用の画像URL
            ]);
            $messagingApi->broadcastWithHttpInfo(new BroadcastRequest([
                'messages' => [$imageMessage],
            ]));

            // URLを別のメッセージとして送信
            $urlMessage = new TextMessage([
                'type' => 'text',
                'text' => $url,
            ]);
            $messagingApi->broadcastWithHttpInfo(new BroadcastRequest([
                'messages' => [$urlMessage],
            ]));

            return 'メッセージをブロードキャストとして送信しました';

        } catch (ApiException $e) {
            // エラー内容をログに出力
            Log::error($e->getCode() . ':' . $e->getResponseBody());
            return 'メッセージのブロードキャスト送信に失敗しました';
        }
    }
}