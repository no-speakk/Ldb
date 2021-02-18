@component('admin.master')
    @slot('title') پروژه جدید @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot
    @slot('custom_css')
        <style>
            #card_wrapper .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
                color: white !important;
            }
            #card_wrapper .card-light:not(.card-outline) .card-header {
                background-color: #f3f5f7;
            }

        </style>
    @endslot

    <div class="row" id="card_wrapper">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header"  data-widget="collapse" style="cursor: pointer">
                    <h3 class="card-title text-center">Download Laravel</h3>
                    <div class="card-tools" style="right: 5px !important;">
                        <button type="button" class="btn btn-tool">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-light">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">دانلود از طریق Laragon</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">دانلود از طریق Composer</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab_1">
                                   asd
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    qwewqewq
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="card-footer">--}}
{{--                    footer--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    @slot('custom_js')
        <script>
            $(document).ready(function () {
                //
            });
        </script>
    @endslot
@endcomponent
