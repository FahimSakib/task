@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('trello.get') }}">
        @csrf
        <div class="form-group">
            <label for="key">API Key</label>
            <input type="text" class="form-control @error('key') is-invalid @enderror" id="key" name="key"
                placeholder="Enter api key">
            @error('key')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="token">Token</label>
            <input type="text" class="form-control @error('token') is-invalid @enderror" id="token" name="token"
                placeholder="Enter token">
            @error('token')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
