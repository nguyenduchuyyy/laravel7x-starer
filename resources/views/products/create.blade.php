@extends('layouts.app')

@section('content')
    <h1>ADD PRODUCT</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" rows="4" cols="50" name="description" required></textarea>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection