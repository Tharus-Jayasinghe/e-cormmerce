@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a Shopping List</h1>

    <form method="POST" action="{{ route('shopping.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="products">Products</label>
            <select name="products[]" class="form-control" multiple required>
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create List</button>
    </form>
</div>
@endsection
