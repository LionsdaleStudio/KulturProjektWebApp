@extends('layouts.app')

@section('content')

        <h1 class="text-white text-end">Oh no you have found the 404th Teapot!!</h1>
        <h2 class="text-white text-end"> Enjoy the music! </h2>
        <!-- Background video -->
        <video id="background-video" playsinline autoplay poster="#">
            <source src="{{ asset('storage/videos/404_short.mp4') }}" type="video/webm">
            Your browser does not support the video tag.
        </video>
@endsection


