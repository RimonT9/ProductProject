@extends('layouts.main')

@section('title')
Adding of the product
@endsection

@section('content')
<form class='form-control' action="{{ route('product.store') }}" method='post'>
    @csrf
    <div class='mb-3'>
        <input type='text' value="{{ old('article') }}" name='article' class='form-control w-25' placeholder='Enter the articel'>
        @error('article')
        <p class='text-danger'>{{ $message }}</p>
        @enderror
    </div>
    <div class='mb-3'>
        <input type='text' value="{{ old('name') }}" name='name' class='form-control w-25' placeholder='Enter the title'>
        @error('name')
        <p class='text-danger'>{{ $message }}</p>
        @enderror
    </div>
    <select class='form-control mb-3 w-25' name='status'>
        <option {{ old('status') == '' ? 'selected' : '' }} value=''>Without a status</option>
        <option {{ old('status') == 'available' ? 'selected' : '' }} value='available'>Available</option>
        <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value='unavailable'>unavailable</option>
    </select>
    <div class='mb-3'>
        <input type='text' value="{{ old('DATA.Country') }}" name='DATA[Country]' id='Country' class='form-control w-25' placeholder='Enter the country'>
    </div>
    <div class='mb-3'>
        <input type='number' value="{{ old('DATA.Weight') }}" name='DATA[Weight]' id='Weight' class='form-control w-25' placeholder='Enter the weight'>
    </div>
    <div class='mb-3'>
        <input type='number' value="{{ old('DATA.Price') }}" name='DATA[Price]' id='Price' class='form-control w-25' placeholder='Enter the price'>
    </div>
    <button type='submit' class='btn btn-primary'>Add</button>
    </div>
</form>
<div class='mt-3'><a href="{{ route('product.index') }}">Back</a></div>
@endsection