@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-primary" href="{{ route('task.one.save') }}" role="button">Generate Report</a>
<a class="btn btn-primary" href="{{ route('task.one.report') }}" role="button">View Report</a>
</div>
@endsection