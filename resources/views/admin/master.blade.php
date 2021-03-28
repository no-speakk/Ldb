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
    <!-- prism -->
    <link rel="stylesheet" href="/plugins/prism/prism.css">
    <!-- jquery UI -->
    <link rel="stylesheet" href="/plugins/jQueryUI/jquery-ui.min.css">
    <!-- lightgallery -->
    <link rel="stylesheet" href="/plugins/lightgallery/lightgallery.min.css">
    <!-- Bootstrap Toggle -->
    <link rel="stylesheet" href="/plugins/bootstrap-toggle/bootstrap4-toggle.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        #page .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: white !important;
        }
        #page .card-light:not(.card-outline) .card-header {
            background-color: #f3f5f7;
        }
        .callout.callout-info {
            border-right-color: #007bff;
            border-left-color: #007bff;
        }
        .callout.callout-danger {
            border-right-color: #bd2130;
            border-left-color: #bd2130;
        }
        .callout {
            border-right: 5px solid #eee;
            box-shadow: 0 1px 19px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
        }
        pre {
            direction: ltr !important;
        }
        .token.space:before {
            content: '';
        }
        .token.lf:before {
            content: '';
        }
        .my-keyword {
            font-family: source-code-pro,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;
            font-weight: 500;
            line-height: 1.9;
            background: #fbfbfd;
            box-shadow: 0 1px 1px rgb(0 0 0 / 8%);
            color: #ca473f;
            -webkit-user-select: auto;
            -moz-user-select: auto;
            -ms-user-select: auto;
            user-select: auto;
            display: inline-flex;
            padding: 0 .125rem;
            max-width: 100%;
            overflow-x: auto;
            font-size: .8rem;
            direction: ltr;
        }
        .lg-outer.lg-thumb-open .lg-thumb-outer {
            direction: ltr;
        }
        .lg-outer .lg-thumb-item.active {
            border-width: thick;
        }
    </style>
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
                <div class="row">
                    <div class="col-sm-12" id="page">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    @include('admin.master-includes.footer')

</div>

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="/plugins/jQueryUI/jquery-ui.js"></script>
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
<!-- Prism -->
<script src="/plugins/prism/prism.js"></script>
<!-- Bootstrap Toggle -->
<script src="/plugins/bootstrap-toggle/bootstrap4-toggle.min.js"></script>
<!-- lightgallery -->
<script src="/plugins/lightgallery/lightgallery.min.js"></script>
<script src="/plugins/lightgallery/lg-thumbnail.min.js"></script>
<script src="/plugins/lightgallery/lg-autoplay.min.js"></script>
<script src="/plugins/lightgallery/lg-fullscreen.min.js"></script>
<script src="/plugins/lightgallery/lg-rotate.min.js"></script>
<script src="/plugins/lightgallery/lg-share.min.js"></script>
<script src="/plugins/lightgallery/lg-video.min.js"></script>
<script src="/plugins/lightgallery/lg-zoom.min.js"></script>
<script>
    lightGallery(document.getElementById('lightgallery'), {
        selector: 'a'
    });
</script>
<!-- ckeditor -->
<script src="/plugins/ckeditor4/ckeditor.js"></script>
<script>
    $.each($('.ck-edit'), function( index, value ) {
        CKEDITOR.replace(this.id);
    });
</script>
<!-- AdminLTE App -->
<script src="{{ asset('js/admin.js') }}"></script>
{!! $custom_js ?? '' !!}
</body>
</html>
