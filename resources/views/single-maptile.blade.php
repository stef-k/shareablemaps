@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-10">
            <h1 class="h1 text-center">You are viewing <span class="text-info">{{ $map->name }}</span> travel map </h1>
            <h2 class="h4 text-center">travel maps provided for free by Shareable Maps</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ $map->name }}
                    <button type="button" class="btn btn-link float-right text-white btn-sm"
                        title="Click to learn about the map symbols" data-toggle="modal" data-target="#mapLegend">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>  Map Legend </button>
                </div>
                <iframe src="{{ $map->url  }}" class="maptile"></iframe>
                <div class="card-body normal-text">
                    Tags:
                    @foreach ($map->tags as $tag)
                    <a href="#" title="Filter maps by this tag"> <span
                            class="badge badge-info">{{ $tag->name }}</span></a>
                    @endforeach
                    <br>
                    <span>Suggested Days: <strong>{{ $map->suggested_days }}</strong></span>
                    <br>
                    <span class="text-muted h6">Updated at: {{ $map->updated_at }}</span>
                    <hr>
                    <p class="card-text">{!! $map->details !!}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="#" class="card-link" title="Share this map on social media" data-toggle="modal"
                        data-target="#{{ $map->name }}{{ $map->id }}">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                        Share</a>
                    <a href="{{ str_replace('embed', 'viewer', $map->url) }}" class="card-link float-right"
                        title="Open the map in a new tab - full page" target="_blank"><span class="text-info">
                            <i class="fa fa-window-maximize" aria-hidden="true"></i>
                            Open Full Screen</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade socialShareModal" tabindex="-1" role="dialog" aria-labelledby="socialShareModal"
    aria-hidden="true" id="{{ $map->name }}{{ $map->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share <span class="text-info">{{ $map->name }}</span> travel map in social media
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fshareablemaps.com/maps/{{ $map->id }}"
                    title="Share on Facebook" target="_blank" class="x2 text-muted">
                    <i class="fa fa-facebook" aria-hidden="true"> <span class="x1quarter">Share on Facebook</span></i>
                </a>
                <br>
                <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fshareablemaps.com/maps/{{ $map->id }}&text={{ $map->name }} travel map by Shareable Maps
      " title="Share on Twitter" target="_blank" class="x2 text-muted">
                    <i class="fa fa-twitter" aria-hidden="true"> <span class="x1quarter">Share on Twitter</span></i>
                </a>
                <br>
                <a href="https://www.reddit.com/submit?url=https%3A%2F%2Fshareablemaps.com/maps/{{ $map->id }}&title={{ $map->name }} travel map by Shareable Maps"
                    title="Share on Reddit" target="_blank" class="x2 text-muted">
                    <i class="fa fa-reddit" aria-hidden="true"> <span class="x1quarter">Share on Reddit</span></i>
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
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
                <p>Bellow you can find the most used icons and their meanings.
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
