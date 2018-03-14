@extends('layouts.error', ['title' => '404 Not Found'])
@section('content')
    <div class="title">404 Not Found.</div>
    <p>Go to <a href="{{ url('/') }}">homepage</a></p>
@stop