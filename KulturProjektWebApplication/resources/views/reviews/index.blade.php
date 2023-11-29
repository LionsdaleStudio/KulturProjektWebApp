@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Review</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr class="">
                            <td scope="row">{{$review->event->name}}</td>
                            <td>{{$review->review}}</td>
                            <td>{{$review->rating}}</td>
                            <td><button type="submit"></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection