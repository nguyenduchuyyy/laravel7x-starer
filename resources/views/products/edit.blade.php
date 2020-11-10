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
   
    {{Form::model($product, array('route' => array('products.update', [$product->id])))}}
        @method('PUT')    
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
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
            <textarea class="form-control" rows="4" cols="50" name="description" >{{$product->description}}</textarea>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection