@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Create oldalam</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="card-title text-center">Add new event</h4>
                    <p class="card-text text-danger">Inputs marked with * must be filled.</p>

                    @if (Session::has('message'))
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Holy guacamole!</strong> {{ Session::get('message') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Holy guacamole!</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{old('name')}}">
                                    @error('name')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="start" class="form-label">Event Start</label>
                                    <input type="datetime-local" name="start" id="start" class="form-control @if($errors->has('start')) is-invalid @endif" value="{{old('start')}}">
                                    @error('start')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="shortDescription" class="form-label">Short Description</label>
                                    <input type="text" name="shortDescription" id="shortDescription"
                                        class="form-control @if($errors->has('shortDescription')) is-invalid @endif" value="{{old('shortDescription')}}">
                                    @error('shortDescription')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="longDescription" class="form-label">Long Description</label>
                                    <input type="text" name="longDescription" id="longDescription" class="form-control @if($errors->has('longDescription')) is-invalid @endif" value="{{old('longDescription')}}">
                                    @error('longDescription')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="thumbnail" class="form-label">Event Image</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control @if($errors->has('thumbnail')) is-invalid @endif">
                                    @error('thumbnail')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-danger w-75">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
