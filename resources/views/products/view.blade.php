@extends('layout.main')
@section('main-section')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card w-50 h-100">
        <img class="card-img-top h-50" src="{{ url('products/' . $product->image) }}" alt="" >
        <div class="card-body">
            <h4 class="card-title text-primary text-uppercase">{{$product->name}}</h4>
            <p class="card-text">{{$product->description}}</p>
        </div>
        </div>
    </div>
</div>
@endsection