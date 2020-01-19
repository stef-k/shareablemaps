@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1 class="h1">List of all Maps</h1>
        </div>

        <div class="col-12 mb-2">
            <a class="btn btn-primary" href={{ route('newmap') }}>New Map</a>
            <a class="btn btn-primary ml-4" href={{ route('tags') }}>Tags</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col text-center">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered table-sm ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Map Name</th>
                            <th scope="col">Map URL</th>
                            <th scope="col">Suggested Days</th>
                            <th scope="col">View/Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maps as $map)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $map->name }}</td>
                            <td>{{ $map->url }}</td>
                            <td>{{ $map->suggested_days }}</td>
                            <td><a href="{{ route('showmap', [ 'id' => $map->id]) }}" class="btn btn-sm btn-primary" title="Open this map to view or edit">View/Edit</a></td>
                            <td><button type="button" data-mapid="{{ $map->id }}" data-mapname="{{ $map->name }}" class="btn btn-sm btn-danger deleteMap" title="Delete this map">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
