@extends('layouts.app')

@section('content')
    <!-- Background video -->
    <video id="background-video" playsinline autoplay muted poster="#">
        <source src="{{ asset('storage/videos/theatre_chairs.mp4') }}" type="video/webm">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <div class="row">
            @foreach (\App\Models\Event::all() as $item)
                <div class="col-4">
                    <div class="card bg-dark text-white m-3 p-3">
                        <div class="row">
                            <div class="col-4">
                                <img class="card-img-top event-card-img"
                                    src="{{ asset('storage/event_thumbnails/' . $item->thumbnail) }}" alt="Title">
                            </div>
                            <div class="col-8">
                                <h4 class="card-title">{{ $item->name }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-truncate">{{ $item->shortDescription }}</p>
                        </div>
                        <div class="text-end">
                            <form action="{{ route('events.show', $item) }}" method="GET">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
