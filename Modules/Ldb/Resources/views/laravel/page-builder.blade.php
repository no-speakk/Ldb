@component('admin.master')
    @slot('title') Page Builder @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot
    @slot('custom_css')
        <style>
            #sticky-sidebar {
                left: -275px;
                width: 280px;
                transition: all 0.2s ease;
            }
        </style>
    @endslot

    {{-- form builder sidebar --}}
    <section class="row">
        <div class="p-3 bg-dark position-fixed text-left" id="sticky-sidebar">
            <section class="row">
                <div class="col-6">
                    <div class="row text-center">
                        <div class="col-12">
                            <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h6>Card</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row text-center">
                        <div class="col-12">
                            <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h6>Card</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row text-center">
                        <div class="col-12">
                            <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h6>Card</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row text-center">
                        <div class="col-12">
                            <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h6>Card</h6>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- ino badan ke form builder ro tabdil kardam be sidebar-left(ye page khali mese elementor) mishe hamon #page --}}
        <div class="col-9 text-left border border-primary" style="min-height: 600px" id="page-temp">

        </div>
    </section>

    @slot('custom_js')
        <script>
            $(document).ready(function () {

                $('#sticky-sidebar').on({
                    mouseenter: function () {
                        $(this).attr("style","left:0; transition : 'opacity 1s ease-in-out';");
                    },
                    mouseleave: function () {
                        $(this).attr("style","left:-275;");
                    }
                });

            });
        </script>
    @endslot
@endcomponent
