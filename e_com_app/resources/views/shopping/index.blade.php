@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Community Shopping Lists</h1>

    @foreach ($shoppingLists as $list)
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $list->title }}</h3>
            <p class="card-text">{{ $list->description }}</p>
            <a href="{{ route('shopping.show', $list->id) }}" class="btn btn-primary">View List</a>
        </div>
        <div class="card-footer text-muted">
            Created by {{ $list->user->name }} on {{ $list->created_at->format('M d, Y') }}
        </div>
    </div>
    @endforeach
</div>
@endsection
