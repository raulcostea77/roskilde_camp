@extends('layouts.master')

@section('content')


<div class="container">
  <div class="row">
<div id="random_content" class="col align-self-center align-middle">

    @if( ! empty($randomUser))
        <div id="randomName">{{$randomUser}}</div>
    @endif

    @if($startVisible)
        <a href='/random/start' class="btn btn-success">Start</a>
    @endif

    @if($nextVisible>0)
        <a href='/random/next' class="btn btn-primary">Next idiot</a>
    @elseif($nextVisible==-1)
        <a href='/random/start'>Reset</a>
    @endif

</div>
</div>
</div>

@include ('footer')
@endsection
