@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Show Deleted oldalam</h1>

            @if (Session::has('message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Holy guacamole!</strong> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table
                    class="table table-striped
                table-hover	
                table-borderless
                table-secondary
                align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Event name</th>
                            <th class="w-50">Short description</th>
                            <th>Start date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($esemenyek as $item)
                            <tr class="table-secondary">
                                <td scope="row">{{ $item->name }}</td>
                                <td class="text-break">{{ $item->shortDescription }}</td>
                                <td>{{ $item->start }}</td>
                                <td>
                                    <div class="row w-40">
                                        @if($item->trashed() == false)
                                        <div class="col">
                                            <form action="{{ route('events.show', $item) }}" method="GET">
                                                <button type="submit" class="btn btn-primary">Show</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('events.edit', $item) }}" method="GET">
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('events.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="col text-center">
                                            <form action="{{ route('events.restore', $item) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-info">Restore Event</button>
                                            </form>
                                        </div>   
                                        @endif                                    
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
