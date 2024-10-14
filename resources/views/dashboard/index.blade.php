@extends('dashboard.layouts.main')

@section('content')
    <h1 class="mt-2">Welcome {{ Auth::user()->name}}</h1>
@endsection
