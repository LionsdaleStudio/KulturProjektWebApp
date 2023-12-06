@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Show oldalam</h1>
            <div class="card text-center p-4">
                <div class="text-center">
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
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="card-title">Review:</h4>
                    
                    @include('includes.formResponse')

                    <form action="{{route('reviews.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div>
                            <span><i id="1" class="fa-regular fa-star rating-star" onmouseover="StarMouseHover(1)"
                                    onmouseout="StarMouseLeave(1)" onmousedown="StarMouseClick(1)"></i></span>
                            <span><i id="2" class="fa-regular fa-star rating-star" onmouseover="StarMouseHover(2)"
                                    onmouseout="StarMouseLeave(2)" onmousedown="StarMouseClick(2)"></i></span>
                            <span><i id="3" class="fa-regular fa-star rating-star" onmouseover="StarMouseHover(3)"
                                    onmouseout="StarMouseLeave(3)" onmousedown="StarMouseClick(3)"></i></span>
                            <span><i id="4" class="fa-regular fa-star rating-star" onmouseover="StarMouseHover(4)"
                                    onmouseout="StarMouseLeave(4)" onmousedown="StarMouseClick(4)"></i></span>
                            <span><i id="5" class="fa-regular fa-star rating-star" onmouseover="StarMouseHover(5)"
                                    onmouseout="StarMouseLeave(5)" onmousedown="StarMouseClick(5)"></i></span>
                            <input type="hidden" name="rating" id="rating" value="0">
                        </div>
                        <div>
                            <input id="editor" type="hidden" name="review">
                            <trix-editor input="editor"></trix-editor>
                        </div>
                        <div class="mt-2 text-center">
                            <input type="hidden" name="event_id" value="{{$esemeny->id}}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-3">
                @foreach ($esemeny->reviews->sortByDesc('id') as $item)
                    {{-- Review --}}
                    <div class="row g-0 px-4 py-2">
                        <div class="col-md-2 text-center d-flex align-items-center justify-content-center ">
                            <img src="{{ asset('storage/event_thumbnails/TN_placeholder.png') }}"
                                class="img-fluid rounded-start event-card-img" alt="Card title">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->user->name }}</h5>
                                {{-- Rating stars --}}
                                @for ($i = 0; $i < $item->rating; $i++)
                                    <span><i class="fa-solid fa-star"></i></span>
                                @endfor
                                <span> - {{ $item->rating }} / 5</span>
                                {{-- End rating stars --}}
                                <p class="card-text">{{ $item->review }}</p>
                                <hr>
                                <p class="card-text fst-italic"><small class="text-muted">{{ $item->updated_at }}</small>
                                </p>
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

<script>
    function StarMouseHover(id) {
        const stars = document.getElementsByClassName('rating-star');
        for (let i = 0; i < id; i++) {
            stars[i].classList.remove('fa-regular');
            stars[i].classList.add('fa-solid');
        }
    }

    function StarMouseLeave() {
        const stars = document.getElementsByClassName('rating-star');
        for (let i = 0; i < stars.length; i++) {
            if (!stars[i].classList.contains('star-clicked')) {
                stars[i].classList.remove('fa-solid');
                stars[i].classList.add('fa-regular');
            }
        }
    }

    function StarMouseClick(id) {
        const stars = document.getElementsByClassName('rating-star');
        for (let i = 0; i < stars.length; i++) {
            if (i < id) {
                stars[i].classList.remove('fa-regular');
                stars[i].classList.add('fa-solid');
                stars[i].classList.add('star-clicked');
            } else {
                stars[i].classList.remove('fa-solid');
                stars[i].classList.add('fa-regular');
                stars[i].classList.remove('star-clicked');
            }
        }
        console.log(id);
        document.getElementById("rating").value = id;
    }
</script>
