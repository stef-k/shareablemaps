@extends('layouts.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-3">
        <div class="col-12 text-center">
            <h1 class="h1">Editing {{ $map->name }}</h1>
        </div>
        <div class="col-12 pl-lg-5 pr-lg-5">
            <button type="button" class="btn btn-primary" id="saveMap" title="Save map">Save Map</button>
            <button type="button" class="btn btn-danger float-right deleteMap" data-mapid="{{ $map->id }}" data-mapname="{{ $map->name }}" title="Delete map">Delete
                Map</button>
        </div>
    </div>

    <form class="editMapForm">

        <div class="form-row">

            <!-- left col -->
            <div class="col-lg-6 col-sm-12">

                <div class="row">
                    <div class="form-group col-lg-1">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" class="form-control form-control-lg" readonly value="{{ $map->id }}">
                    </div>

                    <div class="form-group col-lg-8">
                        <label for="mapName">Map Name</label>
                        <input type="text" id="mapName" name="name" class="form-control form-control-lg" value="{{ $map->name }}">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="suggestedDays">Suggested Days</label>
                        <input type="number" id="suggestedDays" name="suggestedDays" min=".5" step=".5" class="form-control form-control-lg"
                            value="{{ $map->suggested_days }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="mapUrl">Google Map URL</label>
                        <input type="text" id="mapUrl" name="url" class="form-control form-control-lg" value="{{ $map->url }}">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="createdAt">Created At</label>
                        <input type="text" id="createdAt" class="form-control form-control-lg" readonly
                            value="{{ $map->created_at }}">
                    </div>

                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="updatedAt">Updated At</label>
                        <input type="text" id="updatedAt" class="form-control form-control-lg" readonly
                            value="{{ $map->updated_at }}">
                    </div>

                </div>

                <div class="row tagsRow">
                    <div class="col-sm-12">
                        <h2 class="h3">Tags</h2>
                    </div>

                    @foreach ($map->tags as $tag)
                    <div class="col-lg-3 col-sm-12 tagCol">
                        <input type="text" class="form-control form-control-lg tag-autocomplete"
                            value="{{ $tag->name }}" autocomplete="off" name="tags[]">
                        <button type="button" class="btn btn-danger btn-sm m-2 deleteTag"
                            title="Delete this tag from the current map" data-tagid="{{ $tag->id }}" data-tagname="{{ $tag->name }}">Delete
                            tag</button>
                    </div>
                    @endforeach

                    <div class="col-sm-12 mt-1">
                        <button type="button" class="btn btn-success btn-sm m-2 addTagField" title="Add a new tag">Add
                            tag</button>
                    </div>
                </div>

            </div>

            <!-- right col -->
            <div class="col-lg-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <input type="hidden" value="{{ $map->details }}" id="editorContent">
                        <div id="editor"></div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <iframe src="{{ $map->url  }}" class="maptile"></iframe>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
@endsection
