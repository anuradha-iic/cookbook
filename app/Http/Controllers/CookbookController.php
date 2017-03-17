<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\CookingDish;

class CookbookController extends Controller
{

    /**
     * Save the dish into the db
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDish(Request $request)
    {
		$dish = new CookingDish();

        // Get the fillable attributes
		$dishAttributes = $dish->getFillable();

		foreach ($dishAttributes as $key) {
            $dish->$key = $request->get("$key");
        }

		$dish->save();

		return response()
            ->json(['message' => $dish->id]);
    }

    /**
     * Save Recipe along with ingredients
     *
     * @param Request $request
     * @param $cookingDishId
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveRecipe(Request $request, $cookingDishId)
    {
        // Get Cooking dish object
        $cookingDish = CookingDish::find($cookingDishId);

        $params = [
            'dish_id'     => $cookingDishId,
            'recipe_name' => $request->recipe_name,
            'recipe_type' => $request->recipe_type,
        ];

        // Save recipes which owns for a cookingDishId
        $cookingDish->recipes()->save($params);

        // Get the recipe id
        $recipe = $cookingDish->recipes()->get();
        $recipeId = $recipe->id;

        // Save multiple ingredients for a recipe
        $ingredients = [
            'name' => $request->name,
        ];
        Recipe::find($recipeId)->ingredients()->save($ingredients);

        return response()
            ->json(['message' => 'Recipe is saved successfully']);
    }
}
