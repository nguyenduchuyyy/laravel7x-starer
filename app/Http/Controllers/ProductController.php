<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function store(ProductCreateRequest $request)
    {
        try {
            Product::create($request->all());
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect(route('products.index'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',[
            'product' => $product
        ]);
    }

    public function update($id, ProductCreateRequest $request)
    {
        $product = Product::find($id);

        try {
            $product->update($request->all());
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('products.index'));
    }

    public function delete($id)
    {   
        $product = Product::find($id);
        if(!empty($product)){
            $product->delete();
        }
        return redirect(route('products.index'));
    }
}
