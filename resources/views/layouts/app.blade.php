<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WorthRand-CRM</title>

        {{-- <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"> --}}
        <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/font-awesome-4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/font-css/worthrand-css.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/searchable-dropdown/content/styles.css">

        <script src="{{ URL::to('/') }}/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
        <script src="{{ URL::to('/') }}/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="{{ URL::to('/') }}/searchable-dropdown/dist/jquery.autocomplete.js"></script>
        @include('layouts.header')
    </head>

    <body id="app-layout">

        @yield('content')
    </body>
</html>
