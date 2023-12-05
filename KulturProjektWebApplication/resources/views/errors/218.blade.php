@extends('layouts.app')

@section('content')

        <h1 class="text-white text-end">Oh no 218 error! Anyway this is fine!</h1>
        <!-- Background video -->
        <video id="background-video" playsinline autoplay poster="#" onended="onEnded()">
            <source id="source" src="{{ asset('storage/videos/thisisfine.mp4') }}" type="video/webm">
            Your browser does not support the video tag.
        </video>
@endsection


<script type='text/javascript'>
    function onEnded() {
       alert("HULU");
       
    }
</script>