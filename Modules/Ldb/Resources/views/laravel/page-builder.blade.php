@component('admin.master')
    @slot('title') Page Builder @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot
    @slot('custom_css')
        <style>
            #sticky-left-sidebar {
                /*left: -275px;*/
                left: 0;
                width: 280px;
                min-height: 400px;
                transition: all 0.2s ease;
                z-index: 10;
            }
            #page-temp {
                border: 4px solid #d8dbde;
                padding: 40px;
            }
            .builder-add-element {
                color: darkgray;
                cursor: pointer;
                user-select: none;
            }
            .builder-add-element:hover {
                border-color: grey;
            }
            .builder-element-unselected {
                border: 4px dashed #d7dadd;
                padding: 50px;
            }
            .builder-element-selected {
                border-color: #007bff !important;
            }
            .builder-element:hover{
                border: 2px solid grey;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    @endslot

    <section class="row">
        {{-- sticky-left-sidebar --}}
        <div class="p-3 bg-dark position-fixed text-left" id="sticky-left-sidebar" dir="ltr">
            <section class="row">
                <h6 class="m-auto">Some Icon</h6>
            </section>
        </div>

        {{-- page-temp --}}
        <div class="col-9 text-left ltr" style="min-height: 600px" id="page-temp"></div>
    </section>

    @slot('custom_js')
        {{-- Builder Functionallity --}}
        <script>
            $(function(){
                LDB_BUILDER = {
                    include_add_element_block : () => {
                        return `<div class="row">
                                    <div class="col-12 builder-add-element text-center builder-element-unselected">
                                        <h5>Add Element +</h5>
                                    </div>
                                </div>`;
                    },
                    show_elements : (elements = []) => {
                        let asset_path = @json(asset('img/ldb/laragon2.png'));
                        let html = `<h6 class="text-center">Add New Element</h6><hr class="bg-gray"><div class="row">`;
                        elements.forEach(function(element) {
                            html += `<div class="col-6 builder-element" data-ldb-builder-element="${element}">
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <img class="mt-2 mb-2 img-thumbnail" style="width: 120px;height: 120px;" src="${asset_path}" alt="">
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <h6>${element}</h6>
                                            </div>
                                        </div>
                                    </div>`;
                        });
                        html += `</div>`;
                        return html;
                    },
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
                    row : (props = {}) => {
                        let css_class = props.css_class || "";
                        let dir = props.dir || "rtl";

                        return `<section class="row">
                                    <div class="col-12 temp-col-dashed ${dir === "ltr" ? "text-left" : "text-right" } ${css_class}" dir="${dir}"></div>
                                </section>`;
                    },
                }
            });
        </script>


        {{-- page-temp functionallity --}}
        <script>
            $(function (){
                let page_temp = $("#page-temp");
                let left_sidebar = $("#sticky-left-sidebar");
                let selected_element;

                // on page load => include add_element_+ to page-temp
                if (page_temp.children().length <= 1) {
                    page_temp.html(LDB_BUILDER.include_add_element_block());
                }

                // select [.builder-add-element]
                $(page_temp).on("click", ".builder-add-element" , function (e){
                    $(this).addClass("builder-element-selected text-primary");
                    left_sidebar.html(LDB_BUILDER.show_elements(['row', 'callout']));
                    selected_element = $(this);
                });

                // unselect [.builder-add-element]
                $('.builder-add-element').outsideClick(function(event){
                    //code that fires when user clicks outside the element
                    //event = the click event
                    //$(this) = the '.target-element' that is firing this function
                    $(this).removeClass("builder-element-selected text-primary");
                    left_sidebar.html($('<h6 class="text-center">Some Icon</h6>'));
                    selected_element = null;
                })
            }, '.exclude-something');
        </script>


        {{-- unselect plugin --}}
        <script>
            (function($) {

                //when the user hits the escape key, it will trigger all outsideClick functions
                $(document).on("keyup", function (e) {
                    if (e.which == 27) $('body').click(); //escape key
                });

                //The actual plugin
                $.fn.outsideClick = function(callback, exclusions) {
                    var subject = this;

                    //test if exclusions have been set
                    var hasExclusions = typeof exclusions !== 'undefined';

                    //switches click event with touch event if on a touch device
                    var ClickOrTouchEvent = "ontouchend" in document ? "touchend" : "click";

                    $('body').on(ClickOrTouchEvent, function(event) {
                        //click target does not contain subject as a parent
                        var clickedOutside = !$(event.target).closest(subject).length;

                        //click target was on one of the excluded elements
                        var clickedExclusion = $(event.target).closest(exclusions).length;

                        var testSuccessful;

                        if (hasExclusions) {
                            testSuccessful = clickedOutside && !clickedExclusion;
                        } else {
                            testSuccessful = clickedOutside;
                        }

                        if(testSuccessful) {
                            callback.call(subject, event);
                        }
                    });

                    return this;
                };

            }(jQuery));
        </script>
    @endslot
@endcomponent
