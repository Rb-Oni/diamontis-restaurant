<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query();
        if (request('search')) {
            $products->where('name', 'Like', '%' . request('search') . '%');
        }

        return view('admin.products.index', [
            'products' => $products->with([
                'category',
            ])->orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('admin.products.index')->with('message', 'Produit créé avec succès');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('admin.products.edit', $product)->with('message', 'Produit modifié avec succès');
    }

    public function archive()
    {
        $products = Product::onlyTrashed()
            ->orderBy('id', 'DESC')->get();

        return view('admin.products.archive', compact('products'));
    }

    public function destroy(Product $product)
    {
        if ($product->trashed()) {
            $product->forceDelete();

            return redirect()->route('admin.products.archive')->with('message', 'Produit supprimé définitivement avec succès');
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Produit supprimé avec succès');
    }

    public function restore(Product $product)
    {
        $product->restore();

        return redirect()->route('admin.products.index')->with('message', 'Produit restauré avec succès');
    }
}
