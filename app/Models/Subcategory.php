<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Subcategory extends Model
{
    use HasFactory;
    protected $table= "subcategories";
    protected $guarded;

    public function getsubCategories(){
        return DB::table('subcategories')->join('categories', 'categories.id', 'subcategories.category_id')->select('subcategories.*', 'categories.category_name')->get();
    }
}
