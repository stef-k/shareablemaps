@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="h1 text-center" id="top">Help</h1>

            <h3 class="h3 mt-5">Help Contents</h3>

            <ul>
                <li>
                    <a href="#howToSaveAMap">How to save a map</a>
                </li>
                <li>
                    <a href="#mapLegendColorsAndIcons">Map Legend - Colors and Icon Meanings</a>
                </li>
                <li>
                    <a href="#howToAccessASavedMapPC">How to access a saved map in Google maps using your PC</a>
                </li>
                <li>
                    <a href="#howToAccessASavedMapSmartphone">How to access a saved map in Google maps using your smartphone</a>
                </li>
            </ul>
        </div>
    </div>

    <hr>

    <div class="row" id="howToSaveAMap">
        <div class="col">
            <h3 class="h4">How to save this map in your Google Maps</h3>
            <img src="/img/legend/save-map.jpg" alt="save map image">
        </div>
    </div>

    <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i> Back to top</a>
    <hr>

    <div class="row mt-1" id="mapLegendColorsAndIcons">
        <div class="col">
            <h3 class="h4">Map Legend - Colors and Icon Meanings</h3>
            <p>Bellow you can find the most used icons and their meanings.
                    Shareable Maps uses more icons but these are the most commonly used.</p>
            <img src="/img/legend/day-photo.png" alt="day photo icon"> Photo opportunity during day
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/day-night-photo.png" alt="day and night photo icon"> Photo opportunity during day and night
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/night-photo.png" alt="night photo icon"> Photo opportunity during night
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/stay.png" alt="stay icon"> Places to stay (hotels, houses, etc)
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/food.png" alt="food icon"> Eating places (food markets, restaurants, etc)
        </div>
    </div>

    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/drink.png" alt="drink icon"> Drinking places (clubs, bars, cafes etc)
        </div>
    </div>

    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/museum.png" alt="museum icon"> Meuseums - Cultural places
        </div>
    </div>

    <div class="row mt-1">
        <div class="col">
            <img src="/img/legend/place-of-interest.png" alt="place of interest icon"> Interesting places to check
        </div>
    </div>

    <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i> Back to top</a>
    <hr>

    <div class="row" id="howToAccessASavedMapPC">
        <div class="col-lg-8 col-sm-12">
            <h3 class="h4">How to access a saved map in Google maps using your PC</h3>
            <p>1. You should have saved a map as shown in <a href="#howToSaveAMap">How to save a map</a> </p>
            <p>2. At <a href="https://maps.google.com" target="_blank">Google Maps&trade;</a> page click on the menu icon</p>
            <img src="/img/legend/1-maps-menu-cursor.jpg" alt="google maps menu icon" class="img-fluid">
            <p class="mt-4">3. On the menu click at <span class="text-info">Your places</span> option</p>
            <img src="/img/legend/2-your-places.jpg" alt="google maps your places entry" class="img-fluid">
            <p class="mt-4">4. On the <span class="text-info">Your places</span> menu, click the <span class="text-info">MAPS</span> option</p>
            <img src="/img/legend/3-your-places-maps.jpg" alt="google maps your places maps menu entry entry" class="img-fluid">
            <p class="mt-4">5. Click on the saved map to open...</p>
        </div>
    </div>

    <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i> Back to top</a>
    <hr>

    <div class="row" id="howToAccessASavedMapSmartphone">
        <div class="col-lg-8 col-sm-12">
            <h3 class="h4">How to access a saved map in Google maps using your smartphone</h3>
            <p>1. You should have saved a map as shown in <a href="#howToSaveAMap">How to save a map</a> </p>
            <p>2. Open the Google Maps&trade; application on your smartphone</p>
            <p>3. Click on the <span class="text-info">Saved</span> button</p>
            <img src="/img/legend/1-click-saved-btn.jpg" alt="google maps mobile saved menu icon" class="img-fluid">
            <p>4. Click on the <span class="text-info">Maps</span> button</p>
            <img src="/img/legend/2-click-maps-tab.jpg" alt="google maps mobile saved maps menu icon" class="img-fluid">
            <p>4. Click on the map you wish to open...</p>
        </div>
    </div>

    <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i> Back to top</a>

</div>
@endsection
