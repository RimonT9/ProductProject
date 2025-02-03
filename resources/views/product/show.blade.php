@extends('layouts.main')

@section('title')
Product data
@endsection

@section('content')
<div class='row'>
    <div class='col-md-4'>
        <div class='card'>
            <img src='https://placehold.co/300x200' class='card-img-top' alt='Product show'>
            <div class='card-body'>
                <h2>{{ $product->NAME }}</h2>
                <h5>Status: {{ $product->STATUS }}</h5>
                <h5>Country: {{ $productData->Country }}</h5>
                <h5>Weight: {{ $productData->Weight }}</h5>
                <h5>Price: {{ $productData->Price }}</h5>
                <h5>Delivery Date: {{ $product->updated_at }}</h5>
                <div class='mt-3'><a href="{{ route('product.index') }}">Back</a></div>
            </div>
        </div>
    </div>
</div>
@endsection