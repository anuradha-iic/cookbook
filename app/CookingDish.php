<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookingDish extends Model
{
    
    /**
     * @var string
     */
    protected $table = 'cooking_dishes';

    /**
     * @var array
     */
    protected $fillable = ['name', 'prepared_by', 'status'];

    public $timestamps = true;

    /**
	 * Get the recipes for the cookingdish.
	 */
    public function recipes()
    {
    	return $this->hasMany('App\Recipe');
    }

}
