@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-primary" href="{{ route('task.one') }}" role="button">Task 01</a>
<a class="btn btn-primary" href="{{ route('trello.auth') }}" role="button">Task 02</a>
</div>
@endsection