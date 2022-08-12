@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row">
        @foreach ($boards as $item)
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    {{-- @foreach (items as $item)
                        
                    @endforeach --}}
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                    <p class="card-text">{{ $item['desc'] }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
