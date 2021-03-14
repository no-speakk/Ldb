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
                border: 4px solid #d8dbde;
                padding: 45px;
            }
            .border-blue {
                border-color: #029ef3 !important;
                border-style: dashed !important;
            }
            .temp-col-dashed {
                border: 3px solid #d5d8db;
                padding: 45px;
                min-height: 200px;
                border-radius: 5px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        </style>
    @endslot

    {{-- form builder sidebar --}}
    <section class="row">
        <div class="p-3 bg-dark position-fixed text-left" id="sticky-sidebar">
            <section class="row">
                {{-- Builder Callout --}}
                <div class="col-6 ldb-draggable" id="draggable1" data-ldb-builder-element="callout">
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

                {{-- Builder Section --}}
                <div class="col-6 ldb-draggable" id="draggable2" data-ldb-builder-element="section">
                    <div class="row text-center">
                        <div class="col-12">
                            <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h6>Section</h6>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- ino badan ke form builder ro tabdil kardam be sidebar-left(ye page khali mese elementor) mishe hamon #page --}}
        <div class="col-9 text-left ltr" style="min-height: 600px" id="page-temp">

        </div>
    </section>

    @slot('custom_js')
        {{-- sticky sidebar hide/show functionallity --}}
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

        {{-- Drag Drop Functionallity --}}
        <script>
            $(function(){
                // Drag
                $(".ldb-draggable").draggable({
                    cursor: "move",
                    cursorAt: { top: 56, left: 56 },
                    opacity: 0.7,
                    helper: "clone",
                    revert: "invalid",
                });

                // Drop
                function makeDrop(target) {
                    target.droppable({
                        greedy: true,
                        classes: {
                            "ui-droppable-hover": "border-blue",  // vaghti ba drag omadim ruye drop-zone
                        },
                        drop: function(event, ui) {
                            // har elementi drag konam dynamic methodesh ro seda mizanam
                            const builder_method = ui.draggable.data('ldb-builder-element');
                            $(this).append(LDB_BUILDER[builder_method]());
                            makeDrop($(".temp-col-dashed"));
                        },
                    });
                }
                makeDrop($("#page-temp"));
            });
        </script>


        {{-- Builder Functionallity --}}
        <script>
            $(function(){
                LDB_BUILDER = {
                    callout : (props = {}) => {
                        let is_child = props.is_child || false;
                        let title_text = props.title_text || "عنوان";
                        let title_icon = props.title_icon || "fa-info";
                        let title_color = props.title_color || "primary"; // danger, warning
                        let border_color = props.border_color || "info";  // danger, warning
                        let text = props.text || "این یک متن است که توسط ckeditor ایجاد شده است";
                        let css_class = props.css_class || "";
                        let dir = props.dir || "rtl";
                        // const builder_options = {
                        //     title_text : "Title",
                        //     title_icon : "fa-warning",
                        //     title_color : "danger",
                        //     border_color : "danger",
                        //     text : "this is an text from ekeditor",
                        //     css_class : "",
                        //     dir : "ltr",
                        // };

                        let html;
                        if (is_child) {
                            html = `<div class="callout callout-${border_color}">
                                        <h5 class="text-${title_color}"><i class="icon fa ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right" }"></i> ${title_text}</h5>${text}
                                    </div>`
                        } else {
                            html = `<section class="row">
                                        <div class="col-12 ${dir === "ltr" ? "text-left" : "text-right" } ${css_class}" dir="${dir}">
                                            <div class="callout callout-${border_color}">
                                                <h5 class="text-${title_color}"><i class="icon fa ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right" }"></i> ${title_text}</h5>${text}
                                            </div>
                                        </div>
                                    </section>`
                        }
                        return html;
                    },
                    section : (props = {}) => {
                        let css_class = props.css_class || "";
                        let dir = props.dir || "rtl";

                        return `<section class="row">
                                    <div class="col-12 temp-col-dashed ${dir === "ltr" ? "text-left" : "text-right" } ${css_class}" dir="${dir}"></div>
                                </section>`;
                    },
                }
            });
        </script>
    @endslot
@endcomponent
