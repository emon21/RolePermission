<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        # Validation
        $request->validate([
            'name' => 'required|min:3|string|unique:products,name',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric',
            'description' => 'required|min:3|string',
        ]);


        $product->name = Str::slug($request->name);
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        // $product->image = $request->image;
        // $product->status = $request->status;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        #validation
        $request->validate([
            'name' => $request->name == $product->name ? 'required|min:3|string' : 'required|min:3|string|unique:products,name',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric',
            'description' => 'required|min:3|string',
        ]);

        $product->name = Str::slug($request->name);
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        # Selective Delete All Products
        // $ids = $request->ids;
        // if ($ids) {
        //     Product::whereIn('id', $ids)->delete();
        // } else {
        //     $product->delete();
        // }
        $product->delete();


        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
