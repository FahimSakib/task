@extends('layouts.app')

@section('content')
<div class="container">
  <div>
    <h3>Board List View (Board Name: {{ $board['name'] }})</h3>
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
    </div>
</div>
@endsection
