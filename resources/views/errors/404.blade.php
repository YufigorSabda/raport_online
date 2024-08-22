<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome5/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome5/css/all.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo/fav.png') }}">
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">
    <style>
        .swal2-container {
            z-index: 9999 !important;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown">
        <img src="{{ asset('logo/logo-login.png') }}" alt="logo" class="logo" width="100px;">
        <h1 class="medium">404</h1>
        <h3 class="font-bold">Page Not Found.</h3>
        <div class="error-desc text-center">
            <a href="{{ route('dashboard') }}" class="btn btn-dark">Back to Dashboard</a>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ambiance.js') }}"></script>
    <script src="{{ asset('menuactive.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
