@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Lists of a Board (Board Name: {{ $board['name'] }})</h3>
        </div>
        <div class="col-md-2">
            <a href="{{ route('create.list',$board['id']) }}" class="btn btn-success">Create New list</a>
        </div>
    </div>
    <div class="row mt-3">
        @foreach ($lists as $item)
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                    <a href="{{ route('view.card',$item['id']) }}" class="btn btn-primary mb-3">View Cards</a>
                </div>
            </div>
        </div>
        @endforeach
        @php
        @endphp
    </div>
</div>
@endsection
