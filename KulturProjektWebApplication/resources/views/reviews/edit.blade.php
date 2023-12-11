@extends('layouts.app')

@section('content')

<div class="row mt-4">
    <div class="col-12">
        <div class="card p-4">
            <div class="card-body">
                <h4 class="card-title">Review:</h4>

                @include('includes.formResponse')

                <form action="{{ route('reviews.store') }}" method="POST">
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
                        <input id="editor" type="hidden" name="review" value="{{$review->review}}">
                        <trix-editor input="editor" class="trix-content"></trix-editor>
                    </div>
                    <div class="mt-2 text-center">
                        <input type="hidden" name="event_id" value="{{ $review->id }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection