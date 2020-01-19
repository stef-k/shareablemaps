@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="h1 text-center">All Tags</h1>
        </div>

        <div class="col">
            @foreach ($tags as $tag)
            <button type="button" class="btn btn-primary my-1 editTag" data-tagid="{{ $tag->id }}"
                data-tagname="{{ $tag->name }}" title="click to edit">{{ $tag->name }}</button>
            @endforeach
        </div>
    </div>

</div>
@endsection
