@extends('layouts.app')
<script src="./path/to/dropzone.js"></script>
@section('content')
<h1>ADD PRODUCT</h1>
@if ($errors->all())
<div class="alert alert-danger">
    @foreach ($errors->all() as $message)
    <p class="text-danger">{{$message}}</p>
    @endforeach
</div>
@endif
<form action="{{route('products.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input type="number" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea class="form-control" rows="4" cols="50" name="description"></textarea>
    </div>
    <div class="row">
        <input name="photo" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0]);
        $('#output').removeAttr('hidden');">
    </div>
    <div class="row pb-5">
        <img id="output" src="" width="200" height="200" hidden="true">
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<script>
    function checkOnchangeImg() {
        document.getElementById('output').src = window.URL.createObjectURL(this.files[0]);
        $('#output').removeAttr('hidden');
    }
</script>
@endsection