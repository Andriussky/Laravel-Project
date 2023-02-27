<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->with(['category', 'status'])->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {    // Įkeliame failą į 'public_html/img/products' aplanką
            $image = $request->file('image');
            $clientOriginalName = $image->getClientOriginalName();
            $image->move(public_path('img/products'), $clientOriginalName);
            $product->image = '/img/products/' . $clientOriginalName;
            $product->save();
        }

        return redirect()->route('products.show', $product);
    }

    public
    function show(Product $product)
    {
        return view('products.show', ['product' => $product]);

    }

    public
    function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public
    function update(ProductRequest $request, Product $product)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {    // Įkeliame failą į 'public_html/img/products' aplanką
            $image = $request->file('image');
            $clientOriginalName = $image->getClientOriginalName();
            $image->move(public_path('img/products'), $clientOriginalName);
            $product->image = '/img/products/' . $clientOriginalName;
            $product->save();
        }
        return redirect()->route('products.show', $product);
    }

    public
    function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
