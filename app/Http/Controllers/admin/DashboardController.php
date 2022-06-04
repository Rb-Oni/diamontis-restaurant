<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest('id')->first();

        $categories = Category::latest('id')->first();

        return view('admin.dashboard', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
