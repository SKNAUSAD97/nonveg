<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;
    protected $table= "categories";
    protected $guarded;

    public function getCategories(){
        return DB::table('categories')->get();
    }
}
