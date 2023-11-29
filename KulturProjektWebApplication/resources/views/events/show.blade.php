@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Show oldalam</h1>
            <div class="card text-center p-4">
                <div class="text-cemter">
                    <img class="card-img-top event-img" src="{{ asset('storage/event_thumbnails/' . $esemeny->thumbnail) }}"
                        alt="Title">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $esemeny->name }}</h4>
                    <p class="card-text">{{ $esemeny->shortDescription }}</p>
                    <hr>
                    <p class="card-text">{{ $esemeny->longDescription }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-3">
                @foreach($esemeny->reviews as $item)
                {{-- Review --}}
                <div class="row g-0 px-4 py-2">
                    <div class="col-md-2 text-center d-flex align-items-center justify-content-center ">
                            <img src="{{asset('storage/event_thumbnails/TN_placeholder.png')}}" class="img-fluid rounded-start event-card-img" alt="Card title" >
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{$item->user->name}}</h5>
                            {{-- Rating stars --}}
                            @for ($i = 0; $i < $item->rating; $i++)
                                <span><i class="fa-solid fa-star"></i></span>
                            @endfor
                            <span> - {{$item->rating}} / 5</span>
                            {{-- End rating stars --}}
                            <p class="card-text">{{$item->review}}</p>
                                <hr>
                            <p class="card-text fst-italic"><small class="text-muted">{{$item->updated_at}}</small></p>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Review end --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
