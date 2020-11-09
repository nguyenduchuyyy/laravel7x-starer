@extends('layouts.app')

@section('content')

<h2>Products</h2>

<table class="table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </thead>

    <tbody>
        <?php if(!empty($products)): ?>
            <?php foreach ($products as $product): ?>
            <tr>
            
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