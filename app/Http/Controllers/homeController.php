<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class homeController extends Controller
{
    public function home(){
        $categories = Category::orderBy('id', 'DESC')->limit(5)->get();
        return view('front/pages/home', compact('categories'));
    }

    public function products(){
        return view('front/pages/products');
    }
}
