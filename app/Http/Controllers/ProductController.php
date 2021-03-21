<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sortby', 'id');
        $sortDir = $request->input('sortdir', 'desc');

        $products = Product::orderBy($sortBy, $sortDir)->paginate(5);
        return view('lte.home.home', [
            'products' => $products
        ]);
    }
    public function add()
    {
        return view('lte.home.add');
    }
    public function index1(Request $request)
    {
        $sortBy = $request->input('sortby', 'id');
        $sortDir = $request->input('sortdir', 'desc');

        $products = Product::orderBy($sortBy, $sortDir)->paginate(5);
        return view('products.index', [
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
            if ($request->hasFile('logo_url')) {
                $imageName = time() . '.' . $request->logo_url->getClientOriginalExtension();
                $request->logo_url->move(public_path('upload'), $imageName);
                $urlll = $request->logo_url->getClientOriginalName();
            } else {
                dd('Dont have file');
            }
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->logo_url = $urlll;
            $product->description = $request->description;
            $product->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect(route('products.index'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(ProductCreateRequest $request, $id)
    {
        $product = Product::find($id);

        try {
            // $product->update($request->all());
            if ($request->hasFile('logo_url')) {
                $imageName = time() . '.' . $request->logo_url->getClientOriginalExtension();
                $request->logo_url->move(public_path('upload'), $imageName);
                $urlll = $request->logo_url->getClientOriginalName();
            } else {
                dd('Dont have file');
            }
            // $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->logo_url = $urlll;
            $product->description = $request->description;
            $product->save();
            // $attr = [
            //     "name" => $request['voucher_code'],
            //     "price" => $request['discount_type'],
            //     "logo_url" => $request['discount_value'],
            //     'description' => $request['minimum_payment']
            // ];
        
            // $product->fill($attr);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!empty($product)) {
            $product->delete();
        }
        return redirect(route('product'));
    }

    public function select_one($id)
    {
        $results = DB::select('select * from products where id = :id', ['id' => $id]);
        dd($results);
    }
}
