@extends('layouts.app')

@section('content')


<div class="col-md-12 my-3 ">
    <div class="row">
        <div class="col-md-6">
            <h2>Products</h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{route('products.create')}}"> Add </a>
        </div>
    </div>
    
</div>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </thead>

    <tbody>
        <?php if(!empty($products)): ?>
            <?php foreach ($products as $product): ?>
            <tr>
                <th>{{$product->id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->description}}</th>
                <th>{{$product->price}}</th>
                <!-- <th>{{$product->created_at}}</th>    -->
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<div class="mt-3">
    {{ $products->links() }}
</div>

@endsection