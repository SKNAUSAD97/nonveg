<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;
    protected $table= "products";
    protected $guarded;

    public function getproducts(){
        return DB::table('products')->join('categories', 'categories.id', 'products.category_id')->join('subcategories', 'subcategories.id', 'products.subcategory_id')->select('products.*', 'categories.category_name','subcategories.subcategory_name')->get();

    }
}
