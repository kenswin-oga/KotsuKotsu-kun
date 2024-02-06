<?php

namespace App\Http\Controllers;

class RecipeListController extends Controller
{
    public function index($id)
    {
        $recipeDataArray[] = session()->get("recipeCategory");
        // dd($recipeDataArray);
        $recipeList = $recipeDataArray[0][$id];
        // dd($recipeList, $recipeDataArray);
        return view('recipe_list', compact('recipeList'));
    }
}
