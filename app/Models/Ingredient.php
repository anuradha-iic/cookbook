<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

	protected $table = 'ingredients';

	/**
     * @var array
     */
    protected $fillable = ['recipe_id', 'name'];

    public $timestamps = true;

    /**
	 * Get the recipe that owns the ingredient.
	 */
    public function recipe()
    {
    	return $this->belongsTo('App\Recipe');
    }
}
