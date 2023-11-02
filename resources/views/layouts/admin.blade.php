<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
    <style>
        #myTable_wrapper:first-child{
            padding: 1rem !important;
        }
        #user-section{
            border-left: 2px solid #8833ff;
            border-right: 2px solid #8833ff;
            border-bottom-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 5px 4px 9px #8833ff;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @include('layouts.include.header')
        @include('layouts.include.sidebar')
        <main>
            @yield('content')
        </main>
        @include('layouts.include.footer')
    </div>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/highcharts.js') }}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/exporting.js') }}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/variable-pie.js') }}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/export-data.js') }}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/accessibility.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ asset('assets/js/app.js') }}"></script>
@section('js')

@show
<script>
    let toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 6000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>
@if(Session::has('success'))
    <script>
        toastMixin.fire({
            animation: true,
            title: '{{ Session::get("success") }}'
        });
    </script>
@elseif (Session::has('error'))
    <script>
        toastMixin.fire({
            animation: true,
            title: '{{ Session::get("error") }}',
            icon: 'error'
        });
    </script>
@endif
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    const deleteButton = document.getElementById("deleteAlert");
    if(deleteButton){

        deleteButton.addEventListener("click", function(event) {
            if (!deleteConfirmation()) {
                event.preventDefault();
            }
        });
        function deleteConfirmation() {
            let result =  confirm("Are you sure you want to delete this item?");
            return result;
        }
    }
</script>
</body>
</html>
