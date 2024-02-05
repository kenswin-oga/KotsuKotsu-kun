<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Sleep;

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
        $recipeDataArray = [];

        // レシピデータを3つ取得
        for ($i = 0; $i < 3; $i++) {
            $recipeDataArray[] = $this->getRandomRecipeData();
            Sleep::sleep(1);
        }
        // dd($recipeDataArray);

        return view('home', ['recipeDataArray' => $recipeDataArray]);
    }
    private function getRandomRecipeData()
    {
        $todayMenuList[] = [30, 31, 32, 33, 14, 15, 16];
        // ランダムに数字を選択
        $randomNumber = $todayMenuList[array_rand($todayMenuList)];

        // categoriesテーブルからランダムなレコードを取得
        $category = Category::where('category1', $randomNumber)->inRandomOrder()->first();

        // 取得したレコードのcategoryIdカラムの値を取得
        if ($category) {
            $categoryId = $category->categoryId;
        }

        // 楽天レシピAPIのエンドポイントとAPIキーを設定
        $recipeEndpoint = 'https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?applicationId=1026978052253353826&categoryId=10';
        $apiKey = '1026978052253353826';

        // HTTPクライアントを使用してAPIにリクエストを送信
        $response = Http::get($recipeEndpoint, [
            'format' => 'json',
            'applicationId' => $apiKey,
            'categoryId' => $categoryId,
        ]);

        // レスポンスから必要なデータを取得
        return $response->json();
    }
}
