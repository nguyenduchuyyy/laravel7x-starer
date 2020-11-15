@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user())
                       <h1> Welcome {{Auth::user()->name}} </h1>
                       <!-- <a href="{{route('products.index')}}" >Manage Products</a> -->
                        <div class="navbar" style="font-size: 22px;">
                            <a class="active" href="{{route('products.index')}}">Manage Products</a>
                            <a href="#">Manage Contact</a>
                            <a href="#">Manage user</a>
                        </div>
                    @endif
        </div>
    </div>
</div>
@endsection