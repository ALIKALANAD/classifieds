<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    {{--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}

    <link rel="stylesheet" href="{{ asset('assets/css/traydes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.fontAwesome.css') }}">
    <style>
        body {
            font-family: 'Raleway';
        }
    </style>
    @yield('styles')
</head>
<body>

    @include('layouts.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>

    {{--@include('layouts.partials.categories')--}}

    @yield('content')

    <script src="{{ asset('assets/js/traydes.js') }}"></script>
    <script src="{{ asset('assets/js/classifieds.js') }}"></script>
    @yield('scripts')
</body>
</html>