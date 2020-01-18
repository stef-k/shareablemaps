@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col text-center">
            <h1 class="display-4">Welcome to Shareable Maps</h1>
            <h2>Your source for mobile - interactive and <strong>FREE</strong> travel maps</h2>

            <p>Why buy a PDF or a printed travel guide when you can have an interactive map loaded in your smartphone
                easily?
                <br>
                No third party applications required, the maps load on your Google Maps&trade; application.
            </p>
            <p><strong><a href="{{route('showcase')}}">Check here for details</a></strong></p>
        </div>
    </div>
</div>

<div class="container">
    <form>
        <div class="form-row align-items-center">
            <label for="searchMaps" class="col-2 col-form-label "><strong class="x1quarter"> Search Maps:</strong></label>
            <div class="col-8">
                <input type="text" autocomplete="off" class="form-control form-control-lg" id="searchMaps" type="text"
                    placeholder="Type a Continent, a Country name, a City or a Place">
                <small id="searchMaps" class="text-muted">Filter the maps using Continents, Country names, Cities or
                    Places</small><br>
                    <small class="text-muted">You can also filter maps by clicking on the <span class="badge badge-info">tags</span> of each map bellow
                    <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                    </small>
            </div>

            <div class="col-2">
                <button type="button" class="btn btn-primary form-control-lg clearFilter">Clear Filter</button>
            </div>
        </div>
    </form>

    {{-- <button type="button" class="btn btn-link m-0 p-0" title="Click to learn about the map symbols" data-toggle="modal"
        data-target="#mapLegend">Map legend</button> --}}

    <div class="row justify-content-center" id="maptiles">
        {{-- @foreach ($maps as $map)
            @include('components.maptile', [ 'map' => $map])
        @endforeach --}}
    </div>
</div>

<div class="modal fade" id="mapLegend" tabindex="-1" role="dialog" aria-labelledby="mapLegend" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Map Legend Help</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body x1">
                <p class="">Bellow you can find the most used icons and their meanings.
                    Shareable Maps uses more icons but these are the most commonly used.</p>

                <div class="row">
                    <div class="col">
                        <img src="/img/legend/save-map.jpg"> <strong>How to save this map in your Google Maps</strong>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/day-photo.png"> Photo opportunity during day
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/day-night-photo.png"> Photo opportunity during day and night
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/night-photo.png"> Photo opportunity during night
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/stay.png"> Places to stay (hotels, houses, etc)
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/food.png"> Eating places (food markets, restaurants, etc)
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/drink.png"> Drinking places (clubs, bars, cafes etc)
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/museum.png"> Meuseums - Cultural places
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col">
                        <img src="/img/legend/place-of-interest.png"> Interesting places to check
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="x1 mr-auto">
                    For more details, check the <a href="{{ route('help') }}" target="_blank">help page</a>
                </span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
