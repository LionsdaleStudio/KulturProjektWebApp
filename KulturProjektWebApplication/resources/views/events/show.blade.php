@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-white">Show oldalam</h1>

        <div class="card">
            <img class="card-img-top event-img" src="{{asset('storage/event_thumbnails/'.$esemeny->thumbnail)}}" alt="Title">
            <div class="card-body">
                <h4 class="card-title">{{$esemeny->name}}</h4>
                <p class="card-text">{{$esemeny->shortDescription}}</p>
            </div>
        </div>
    </div>
</div>
@endsection