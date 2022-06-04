<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        $starters = $products->filter(function ($item) {
            return $item->category->name == 'Entrée';
        });

        $dishes = $products->filter(function ($item) {
            return $item->category->name == 'Plat';
        });

        $desserts = $products->filter(function ($item) {
            return $item->category->name == 'Déssert';
        });

        $drinks = $products->filter(function ($item) {
            return $item->category->name == 'Boisson';
        });

        return view('welcome', [
            'starters' => $starters,
            'dishes' => $dishes,
            'desserts' => $desserts,
            'drinks' => $drinks,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}
