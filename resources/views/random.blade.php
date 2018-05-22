@extends('layouts.master')

@section('content')

@if( ! empty($randomUser))
    <div id="randomName">{{$randomUser}}</div>
@endif

@if($startVisible)
    <a href='/random/start'>Start</a>
@endif

@if($nextVisible>0)
    <a href='/random/next'>Next idiot</a>
@elseif($nextVisible==-1)
    <a href='/random/start'>Reset</a>
@endif



@include ('footer')
@endsection
