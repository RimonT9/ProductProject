@extends('layouts.main')

@section('title')
Product
@endsection

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">ARTICLE</th>
      <th scope="col">NAME</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $product->ARTICLE }}</td>
      <td>{{ $product->NAME }}</td>
      <td><a href="{{ route('product.show', $product->id) }}">details</a></td>
      <td><a href="{{ route('product.edit', $product->id) }}">Edit</a></td>
      <td>
        <form action="{{ route('product.delete', $product->id) }}" method='post'>
          @csrf
          @method('DELETE')
          <button>
            <i class='btn btn text-danger'>Delete</i>
          </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{ route('product.create') }}">Add the product</a>
@endsection