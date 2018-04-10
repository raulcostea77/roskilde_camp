@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="map"></div>
        @if($role == 'pimp')
            <form action="{{route("save-camp-location")}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="camp_latitude" id="campLat">
                <input type="hidden" name="camp_longitude" id="campLong">
                <button type="submit" class="button">Save camp location</button>
            </form>
        @endif
    </div>
</div>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <create-group :initial-users="{{ $users }}"></create-group>
            </div>
            <div class="col-sm-6">
                <groups :initial-groups="{{ $groups }}" :user="{{ $user }}"></groups>
            </div>
        </div>
    </div>
</div>
@include ('footer')
@endsection
