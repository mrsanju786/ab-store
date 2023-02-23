<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category($id)
    {
        $category = Category::where('id', base64_decode($id))->get();
        return view('user-view.category', compact('category'));
    }
}
