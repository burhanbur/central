<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Central </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon.png') }}"/>
    <link href="{{ asset('assets/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!-- <link href="{{ asset('assets/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css"> -->
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        .center {
            text-align: center;
        }

        .logo-app {
            width: 100%; 
            height: auto;
        }

        #footer {
          position: fixed;
          padding: 0;
          margin: 0;
          bottom: 0;
          right: 0;
          left: 0;
          z-index: 1030;
          width: 100%;
          height: 3.0rem;
          background: #fff;
        }
    </style>

    @yield('css')
</head>