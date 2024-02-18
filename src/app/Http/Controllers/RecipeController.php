<?php

namespace App\Http\Controllers;

class RecipeController extends Controller
{
    public function index($id)
    {
        $recipeDataArray[] = session()->get("recipeCategory");
        // dd($recipeDataArray);
        $recipeList = $recipeDataArray[0][$id];
        // dd($recipeList, $recipeDataArray);
        return view('recipe', compact('recipeList'));
    }
}
