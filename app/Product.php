<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','brand','category_id','image','price']; // Define fields from create_products_table.php migration 

    public function category()
    {
        return $this->belongsTo(Category::class); // Bind Relationship of this Product Class to Category Class Model
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

}
