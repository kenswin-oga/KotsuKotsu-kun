<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
// use App\Models\Category;

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
        // $categoryendpoint = 'https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?applicationId=1026978052253353826';
        $recipeendpoint = 'https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?applicationId=1026978052253353826&categoryId=10';
        $apiKey = '1026978052253353826';
        $categoryId = $this->getRandomCategoryId();

        // HTTPクライアントを使用してAPIにリクエストを送信
        $response = Http::get($recipeendpoint, [
            'format' => 'json',
            'applicationId' => $apiKey,
            'categoryId' => $categoryId,
            // 他に必要なパラメータがあれば追加
        ]);
        // $response2 = Http::get($categoryendpoint, [
        //     'format' => 'json',
        //     'applicationId' => $apiKey,
        // ]);
        // // dd($response2);

        // // レスポンスから必要なデータを取得
        // $categoryData = $response2->json();
        // $parentDict[] = [];
        // foreach ($categoryData['result']['large'] as $category) {
        //     Category::create([
        //         'category1' => $category['categoryId'],
        //         'category2' => '',
        //         'category3' => '',
        //         'categoryId' => $category['categoryId'],
        //         'categoryName' => $category['categoryName'],
        //     ]);
        // }
        // // まずはmediumカテゴリ
        // foreach ($categoryData['result']['medium'] as $category) {
        //     Category::create([
        //         'category1' => $category['parentCategoryId'],
        //         'category2' => $category['categoryId'],
        //         'category3' => '',
        //         'categoryId' => $category['parentCategoryId'] . "-" . $category['categoryId'],
        //         'categoryName' => $category['categoryName'],
        //     ]);
        //     // parent_dictに親子関係を保存
        //     $parentDict[$category['categoryId']] = $category['parentCategoryId'];
        // }

        // // 次にsmallカテゴリ
        // foreach ($categoryData['result']['small'] as $category) {
        //     Category::create([
        //         'category1' => $parentDict[$category['parentCategoryId']],
        //         'category2' => $category['parentCategoryId'],
        //         'category3' => $category['categoryId'],
        //         'categoryId' => $parentDict[$category['parentCategoryId']] . "-" . $category['parentCategoryId'] . "-" . $category['categoryId'],
        //         'categoryName' => $category['categoryName'],
        //     ]);
        // }



        // dd($recipeData);
        // dd($categoryData);
        $recipeData = $response->json();

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
    private function getRandomCategoryId()
    {
        // ランダムに数字を選択
        $randomNumber = rand(588, 2161);

        // categoriesテーブルから選択した数字をidとするレコードを抽出
        $category = DB::table('categories')->where('id', $randomNumber)->first();

        // 抽出したレコードのcategoryIdカラムの値を取得
        $categoryId = $category->categoryId;

        return $categoryId;
    }
}
