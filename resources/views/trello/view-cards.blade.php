@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (isset($lists['name']))
        <div class="col-md-10">
            <h3>List of cards (List Name: {{ $lists['name'] }} & Board Name: {{ $board['name'] }})</h3>
        </div>
        @endif
        <div class="col-md-2">
            <a href="{{ route('create.card',$id) }}" class="btn btn-success">Create New Card</a>
        </div>
    </div>
    <div class="row mt-3">
        @forelse ($list as $item)
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                    <p class="card-text">{{ $item['desc'] ? $item['desc'] : 'No Description' }}</p>
                </div>
            </div>
        </div>
        @empty
        <h4>No Cards found</h4>
        @endforelse
    </div>
</div>
@endsection
