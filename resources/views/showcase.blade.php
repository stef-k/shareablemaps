@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h1 class="h1 mt-5 text-center">Shareable Maps Showcase</h1>
    <p class="text-center">In Shareable Maps, you can access points of interest which are specified with a variaty of icons and colors
    having different meanings<br>Each of the suggested places has at least one photo and small tips & details such as working hours, admission prices, etc.</p>

    <div class="row">
        <div class="col-lg-6 col-sm-12"><img class="img-fluid" src="img/legend/showcase1.jpg"
                alt="showcase of shareable maps map"></div>
        <div class="col-lg-6 col-sm-12"><img class="img-fluid" src="img/legend/showcase2.jpg"
                alt="showcase of shareable maps with photo"></div>
    </div>
    @endsection
