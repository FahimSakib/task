@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Create A new Card</h3>
    </div>
    <form method="POST" action="{{ route('card.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Enter name">
            @error('name')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" placeholder="Enter description">
            @error('description')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <input type="hidden" name="key" value="{{ Session::get('trello')['key'] }}">
        <input type="hidden" name="token" value="{{ Session::get('trello')['token'] }}">
        <input type="hidden" name="idList" value="{{ $id }}">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
