@extends('layouts.app')

@section('content')
<div class="container">
  <div>
    <a href="{{ route('create.card') }}" class="btn btn-primary">Create card</a>
  </div>
    <div class="row mt-3">
        @foreach ($boards as $item)
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                    <p class="card-text">{{ $item['desc'] }}</p>
                    <form action="{{ route('card.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="key" value="{{ Session::get('trello')['key'] }}">
                        <input type="hidden" name="token" value="{{ Session::get('trello')['token'] }}">
                        <input type="hidden" name="id" value="{{ $item['id']  }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
