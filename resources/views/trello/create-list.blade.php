@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Create A new list</h3>
    </div>
    <form method="POST" action="{{ route('list.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Enter name">
            @error('name')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <input type="hidden" name="key" value="{{ Session::get('trello')['key'] }}">
        <input type="hidden" name="token" value="{{ Session::get('trello')['token'] }}">
        <input type="hidden" name="idBoard" value="{{ $id }}">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
