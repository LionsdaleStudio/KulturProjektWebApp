@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Index oldalam</h1>
            <div class="table-responsive">
                <table
                    class="table table-striped
                table-hover	
                table-borderless
                table-secondary
                align-middle">
                    <thead class="table-light">
                        <caption>Table Name</caption>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Column 3</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($esemenyek as $item)
                            <tr class="table-secondary">
                                <td scope="row">{{$item->name}}</td>
                                <td>{{$item->shortDescription}}</td>
                                <td>{{$item->start}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
