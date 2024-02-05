@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="card-title">Review:</h4>

                    @include('includes.formResponse')

                    <form action="{{ route('reviews.update', $review) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div>
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $review->rating)
                                    <span><i id="{{ $i + 1 }}" class="fa-solid fa-star rating-star"
                                            onmouseover="StarMouseHover({{ $i + 1 }})"
                                            onmouseout="StarMouseLeave({{ $i + 1 }})"
                                            onmousedown="StarMouseClick({{ $i + 1 }})"></i></span>
                                @else
                                    <span><i id="{{ $i + 1 }}" class="fa-regular fa-star rating-star"
                                            onmouseover="StarMouseHover({{ $i + 1 }})"
                                            onmouseout="StarMouseLeave({{ $i + 1 }})"
                                            onmousedown="StarMouseClick({{ $i + 1 }})"></i></span>
                                @endif
                            @endfor
                            <input type="hidden" name="rating" id="rating" value="{{ $review->rating }}">
                        </div>
                        <div>
                            <input id="editor" type="hidden" name="review" value="{{ $review->review }}">
                            <trix-editor input="editor" class="trix-content"></trix-editor>
                        </div>
                        <div class="mt-2 text-center">
                            <input type="hidden" name="event_id" value="{{ $review->event_id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{asset('js/reviewScripts.js')}}"></script>