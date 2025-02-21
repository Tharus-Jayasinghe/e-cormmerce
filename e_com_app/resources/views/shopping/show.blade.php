@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $shoppingList->title }}</h1>
    <p>{{ $shoppingList->description }}</p>

    <h3>Products</h3>
    <ul>
        @foreach ($shoppingList->products as $product)
        <li>{{ $product }}</li>
        @endforeach
    </ul>
</div>
@endsection
