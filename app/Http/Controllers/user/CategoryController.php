<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Categories()
    {
        $category = Category::get();
        return view('user-view.categories', compact('category'));
    }
}
