<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::leftJoin('categories', 'products.category', '=', 'categories.id')
            ->select('products.*', 'categories.category as category_name')
            ->paginate(5);
        return view("pages.products", compact("products"));
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required|numeric'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->save();
        return redirect('products')->with('status', 'Product Form Data Has Been inserted');
    }

    function show($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category);

        $product_data = [
            "category" => $category,
            "product" => $product
        ];
        return view("pages/product_detail", compact("product_data"));
    }

    function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products')->with('status', 'Product Has Been deleted');
    }

    function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $data = [
            "product_data" => $product,
            "categories" => $categories
        ];
        return view("pages.edit", compact("data"));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required|numeric'
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->save();
        return redirect('products')->with('status', 'Product Form Data Has Been Updated');
    }
}

