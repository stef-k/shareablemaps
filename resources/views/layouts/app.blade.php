<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/png" href="/icon-256.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Shareable Maps') }}</title>

        <script>
            window.shareablemaps = window.shareablemaps || {};
            window.shareablemaps.APP_URL = '{{ env('APP_URL ') }}'
        </script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Social Sharing -->
        <meta property="og:site_name"               content="Shareable Maps" />
        <meta property="og:type"                    content="article" />
        <meta property="og:title"                   content="Shareable Travel Maps" />
        <meta property="og:description"             content="Free shareable travel travel maps that load on your Google Maps application." />
        {{-- <meta property="og:image"                   content="https://shareablemaps.com/icon-1024.jpg" /> --}}

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:title" content="Shareable Travel Maps"/>
        <meta name="twitter:description" content="Free shareable travel travel maps that load on your Google Maps application."/>
        <meta name="twitter:image" content="https://shareablemaps.com/icon-1024.jpg"/>

<script> (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
    (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-158599443-1', {
    'cookieDomain': 'none'
}, 't0');
ga('set', 'anonymizeIp', true);
ga('send', 'pageview'); </script>

    </head>

    <body>
        @include('layouts.nav')
        @include('flash::message')

        <div id="app" class="app">

            <main class="py-4">
                @yield('content')
            </main>

        </div>
<div id="toTopBtn" title="scroll to top"><i class="fa fa-chevron-circle-up" aria-hidden="true" ></i></div>
        @include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap-autocomplete.min.js') }}" ></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="{{ mix('/js/app.js') }}"></script>

    </body>

</html>
