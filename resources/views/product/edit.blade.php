@extends('layouts.main')

@section('title')
Editing of the product
@endsection

@section('content')
<form class='form-control' action="{{ route('product.update', $product->id) }}" method='post'>
    @csrf
    @method('PATCH')
    @can('view', auth()->user())
    <div class='mb-3'>
        <input type='text' name='article' value='{{ $product->ARTICLE }}' class='form-control w-25' placeholder='Enter the articel'>
        @error('article')
        <p class='text-danger'>{{ $message }}</p>
        @enderror
    </div>
    @endcan
    <div class='mb-3'>
        <input type='text' name='name' value='{{ $product->NAME }}' class='form-control w-25' placeholder='Enter the title'>
        @error('name')
        <p class='text-danger'>{{ $message }}</p>
        @enderror
    </div>
    <select class='form-control mb-3 w-25' name='status'>
        <option {{ $product->STATUS === '' ? 'selected' : '' }} value=''>Without a status</option>
        <option {{ $product->STATUS === 'available' ? 'selected' : '' }} value='available'>Available</option>
        <option {{ $product->STATUS === 'unavailable' ? 'selected' : '' }} value='unavailable'>unavailable</option>
    </select>
    <div class='mb-3'>
        <input type='text' name='DATA[Country]' value='{{ $productData->Country }}' id='Country' class='form-control w-25' placeholder='Enter the country'>
    </div>
    <div class='mb-3'>
        <input type='number' name='DATA[Weight]' value='{{ $productData->Weight }}' id='Weight' class='form-control w-25' placeholder='Enter the weight'>
    </div>
    <div class='mb-3'>
        <input type='number' name='DATA[Price]' value='{{ $productData->Price }}' id='Price' class='form-control w-25' placeholder='Enter the price'>
    </div>
    <button type='submit' class='btn btn-primary'>Update</button>
    </div>
</form>
<div class='mt-3'><a href="{{ route('product.index') }}">Back</a></div>
@endsection