@extends('layouts.app')

@section('content')
<h1>EDIT PRODUCT</h1>
@if ($errors->all())
<div class="alert alert-danger">
    @foreach ($errors->all() as $message)
    <p class="text-danger">{{$message}}</p>
    @endforeach
</div>
@endif

{{Form::model($product, array('route' => array('products.update', [$product->id]), 'files' => true))}}
@method('PUT')
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{$product->name}}">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="number" class="form-control" name="price" value="{{$product->price}}">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" rows="4" cols="50" name="description">{{$product->description}}</textarea>
</div>
<div class="form-group">
    @if ($product->logo_url)
    <img id="output" src="{{ asset('upload/' . $product->logo_url) }}" width="200" height="200" >
    @endif
    <input id="logo_url" name="logo_url" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection