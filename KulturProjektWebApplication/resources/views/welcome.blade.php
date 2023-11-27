@extends('layouts.app')

@section('content')

    <!-- Background video -->
    <video id="background-video" playsinline autoplay muted poster="#">
        <source src="{{ asset('storage/videos/theatre_chairs.mp4') }}" type="video/webm">
        Your browser does not support the video tag.
    </video>


@endsection
