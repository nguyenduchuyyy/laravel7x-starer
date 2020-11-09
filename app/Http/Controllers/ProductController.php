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
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);
 
        return redirect(route('products.index'));
    }
}
