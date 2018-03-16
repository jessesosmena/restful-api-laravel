<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name']; // Define field from create_categories_table.php migration 


    public function products()
    {
        // return $this->hasMany('App\Product');
        return $this->hasMany(Product::class); // Define or Bind Relationship of this Category Class to Product Class Model
    }
}
