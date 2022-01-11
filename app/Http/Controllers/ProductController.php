<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\newsletter;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return view('layouts/products', compact('products'));
    }

    public function addEmail(Request $request){
        newsletter::create([
            'name' => $request->email
        ]);
        session()->flash('success', 'Email is Added Successfully !');

        return redirect()->route('products.list');
    }
}
