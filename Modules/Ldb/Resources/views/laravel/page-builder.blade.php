@component('admin.master')
    @slot('title') Page Builder @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot
    @slot('custom_css')
        <style>
            #sticky-sidebar {
                /*left: -275px;*/
                left: 0;
                width: 280px;
                transition: all 0.2s ease;
                z-index: 10;
            }
            #page-temp {
                border: 4px dashed #d8dbde;
            }
            .border-blue {
                border-color: #029ef3 !important;
            }
        </style>
    @endslot

    {{-- form builder sidebar --}}
    <section class="row">
        <div class="p-3 bg-dark position-fixed text-left" id="sticky-sidebar">
            <section class="row">
                <div class="col-6" id="draggable1">
                    <div class="row text-center">
                        <div class="col-12">
                            <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h6>Callout</h6>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- ino badan ke form builder ro tabdil kardam be sidebar-left(ye page khali mese elementor) mishe hamon #page --}}
        <div class="col-9 text-left ltr p-2" style="min-height: 600px" id="page-temp">

        </div>
    </section>

    @slot('custom_js')
        {{--<script>
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
        </script>--}}
        <script>
            $(function(){

                LDB_BUILDER = {
                    callout : (props = {}) => {
                        let title_text = props.title_text || "عنوان";
                        let title_icon = props.title_icon || "fa-info";
                        let title_color = props.title_color || "primary"; // danger, warning
                        let border_color = props.border_color || "info";  // danger, warning
                        let text = props.text || "این یک متن است که توسط ckeditor ایجاد شده است";
                        let css_class = props.css_class || "";
                        let dir = props.dir || "rtl";


                       return `<section class="row">
                                <div class="col-12 ${dir === "ltr" ? "text-left" : "text-right" } ${css_class}" dir="${dir}">
                                    <div class="callout callout-${border_color}">
                                        <h5 class="text-${title_color}"><i class="icon fa ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right" }"></i> ${title_text}</h5>${text}
                                    </div>
                                </div>
                            </section>`;
                    }
                }

            });
        </script>




        <script>
            $(function(){
                $("#draggable1").draggable({
                    cursor: "move",
                    cursorAt: { top: 56, left: 56 },
                    opacity: 0.7,
                    helper: "clone",
                    revert: "invalid",
                });

                $("#page-temp").droppable({
                    accept: "#draggable1",
                    classes: {
                        // "ui-droppable-active": "ui-state-active", // vaghti shoro be drag kardan kardim
                        "ui-droppable-hover": "border-blue",  // vaghti ba drag omadim ruye drop-zone
                    },
                    drop: function( event, ui ) {
                        const builder_options = {
                          title_text : "Title",
                          title_icon : "fa-warning",
                          title_color : "danger",
                          border_color : "danger",
                          text : "this is an text from ekeditor",
                          css_class : "",
                          dir : "ltr",
                        };
                        $(this)
                            .append(LDB_BUILDER.callout());
                    }
                });
            });
        </script>
    @endslot
@endcomponent
