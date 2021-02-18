<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/plugins/ionicons/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {!! $custom_css ?? '' !!}
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <!-- Navbar -->
    @include('admin.master-includes.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.master-includes.sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $title ?? 'پنل مدیریت' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            {{ $breadcrumb }}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </section>
        <!-- /.content -->
    </div>

    @include('admin.master-includes.footer')

    {{-- tanzimat rang bandi ghaleb --}}
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="/plugins/momentjs/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- Select2 -->
<script src="/plugins/select2/select2.full.min.js"></script>
<!-- Jquery Mask Plugin -->
<script src="/plugins/jquery-mask/jquery.mask.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/admin.js') }}"></script>
{!! $custom_js ?? '' !!}
</body>
</html>
