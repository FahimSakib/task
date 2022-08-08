@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-primary" href="{{ route('task.one.save') }}" role="button">Save data from API</a>
<a class="btn btn-primary" href="{{ route('task.one.report') }}" role="button">View Report</a>
</div>
@endsection