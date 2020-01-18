@extends('layouts.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-3">
        <div class="col-12 text-center">
            <h1 class="h1">New Map</h1>
        </div>
        <div class="col-12 pl-lg-5 pr-lg-5">
            <button type="button" class="btn btn-primary" id="saveNewMap" title="Save map">Save Map</button>
            <a class="btn btn-secondary ml-5" href={{ route('mapslist') }}>Maps List</a>
        </div>
    </div>

    <form class="editMapForm">

        <div class="form-row">

            <!-- left col -->
            <div class="col-lg-6 col-sm-12">

                <div class="row">

                    <div class="form-group col-lg-8">
                        <label for="mapName">Map Name</label>
                        <input type="text" id="mapName" name="name" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="suggestedDays">Suggested Days</label>
                        <input type="number" id="suggestedDays" name="suggestedDays" min=".5" step=".5"
                            class="form-control form-control-lg">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="mapUrl">Google Map URL</label>
                        <input type="text" id="mapUrl" name="url" class="form-control form-control-lg">
                    </div>
                </div>

                <div class="row tagsRow">
                    <div class="col-sm-12">
                        <h2 class="h3">Tags</h2>
                    </div>

                    <div class="col-lg-3 col-sm-12 tagCol"></div>

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
                        <input type="hidden" value="" id="editorContent">
                        <div id="editor"></div>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
@endsection
