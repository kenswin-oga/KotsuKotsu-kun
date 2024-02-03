<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 楽天レシピAPIのエンドポイントとAPIキーを設定
        $endpoint = 'https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?applicationId=1026978052253353826&categoryId=10';
        $apiKey = '1026978052253353826';

        // HTTPクライアントを使用してAPIにリクエストを送信
        $response = Http::get($endpoint, [
            'format' => 'json',
            'applicationId' => $apiKey,
            'categoryId' => 10,
            // 他に必要なパラメータがあれば追加
        ]);
        // dd($response);

        // レスポンスから必要なデータを取得
        // レスポンスから必要なデータを取得
        $recipeData = $response->json();
        // dd($recipeData);

        // 例として、最初のレシピのタイトルとURLを表示する
        if (isset($recipeData['result'][0])) {
            $firstRecipe = $recipeData['result'][0];
            $recipeTitle = $firstRecipe['recipeTitle'];
            $recipeUrl = $firstRecipe['recipeUrl'];
        
            // echo "レシピタイトル: $recipeTitle\n";
            // echo "レシピURL: $recipeUrl\n";
        
            // 以下、ビューにデータを渡すなどの処理を続ける
        } else {
            echo "レシピデータが見つかりませんでした。\n";
        }


        // ビューにデータを渡す（例: 'home'ビューに$recipeDataを渡す）
        return view('home', ['recipeData' => $recipeData]);
    }
}
