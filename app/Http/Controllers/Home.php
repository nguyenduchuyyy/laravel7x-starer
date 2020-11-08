<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
    	//insert data
    	$product = new Product();
    	$product->id = '33';

    	$product->save();

    	echo "HOME";
    	$data = [
    		'id' => '011',
    		'name' => 'hyt'
    ];
    	return view('home.index',$data);
    }
}
