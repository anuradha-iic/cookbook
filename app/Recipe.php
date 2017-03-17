<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

	protected $table = 'recipes';

	/**
     * @var array
     */
    protected $fillable = ['dish_id', 'recipe_name', 'recipe_type'];

    public $timestamps = true;

	/**
	 * Get the ingredients for the recipe.
	 */
    public function ingredients()
    {
    	return $this->hasMany('App\Ingredient');
    }

    /**
	 * Get the cookingdish that owns the recipe.
	 */
    public function cookingdish()
    {
    	return $this->belongsTo('App\CookingDish');
    }
}
