<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sortby','id');
        $sortDir = $request->input('sortdir','desc');
        
        $products = Product::orderBy($sortBy,$sortDir)->paginate(5);
        return view('products.index',[
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:12',
            'price' => 'required',
            'description' => 'required',
        ]);
        Product::create($validatedData);
 
        return redirect(route('products.index'));
    }
}
