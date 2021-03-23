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
                color: #C2C7D0!important;
            }
            #sticky-left-sidebar .sidebar-divider {
                background-color: #4f5962;
            }
            #sticky-left-sidebar .builder-element{
                user-select: none;
            }
            #sticky-left-sidebar .builder-element:hover{
                border: 2px solid grey;
                border-radius: 5px;
                cursor: pointer;
            }
            #dropArea {
                border: 4px solid #d8dbde;
                padding: 40px;
            }
            #dropArea .btn-add-element {
                color: darkgray;
                cursor: pointer;
                user-select: none;
            }
            #dropArea .btn-add-element:hover {
                border-color: grey;
            }
            #dropArea .element-unselected {
                border: 4px dashed #d7dadd;
                padding: 50px;
            }
            #dropArea .element-selected {
                border-color: #007bff !important;
            }
            #dropArea .empty-row {
                border: 3px solid #d7dadd;
                padding: 50px;
                margin-top: 40px;
                margin-bottom: 40px;
            }
            #dropArea .empty-row .empty-col {
                border: 4px dashed #d7dadd;
                padding: 50px;
            }
        </style>
    @endslot

    <section class="row">
        <div class="p-3 bg-dark position-fixed text-left" id="sticky-left-sidebar" dir="ltr">
            <section class="row">
                <h6 class="m-auto">Some Icon</h6>
            </section>
        </div>

        <div class="col-9 text-left ltr" style="min-height: 600px" id="dropArea"></div>
    </section>

    @slot('custom_js')
        <script>
            $(function(){
                LDB_BUILDER = {
                    show_btn_addElement : () => {
                        return `<div class="row">
                                    <div class="col-12 btn-add-element text-center element-unselected"><h5>Add Element +</h5></div>
                                </div>`;
                    },
                    show_leftSidebar_elements : (elements = []) => {
                        let asset_path = @json(asset('img/ldb/laragon2.png'));
                        let html = `<h6 class="text-center">Add New Element</h6><hr class="sidebar-divider"><div class="row">`;
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
                                        <div class="col-12 ${dir === "ltr" ? "text-left" : "text-right"} ${css_class}" dir="${dir}">
                                            <div class="callout callout-${border_color}">
                                                <h5 class="text-${title_color}"><i class="icon fa ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right"}"></i> ${title_text}</h5>${text}
                                            </div>
                                        </div>
                                    </section>`
                        }
                        return html;
                    },
                    row : (props = {}) => {
                        // let css_class = props.css_class || "";
                        // let dir = props.dir || "rtl";

                        return `<section class="row empty-row" data-ldb-builder-element="empty-row">
                                    <div class="col-6 btn-add-element text-center element-unselected"><h5>Add Element +</h5></div>
                                    <div class="col-6 btn-add-element text-center element-unselected"><h5>Add Element +</h5></div>
                                </section>`;
                    },
                }
            });
        </script>

        <script>
            $(function (){
                let dropArea = $("#dropArea");
                let left_sidebar = $("#sticky-left-sidebar");
                let selected_element;

                // vaghti hichi to safhe nabud, btn-add-element generate kon
                if (dropArea.children().length <= 1) {
                    dropArea.html(LDB_BUILDER.show_btn_addElement());
                }

                // select Add Element +
                $(dropArea).on("click", ".btn-add-element" , function (e){
                    // vaghti az ye selected, ye selectede dige ro click mikonim, ghablia bayad styleshon bere
                    $(".btn-add-element").removeClass("element-selected text-primary");
                    $(this).addClass("element-selected text-primary");

                    if ($(this).parent().hasClass("empty-row")) {
                        left_sidebar.html(LDB_BUILDER.show_leftSidebar_elements(['callout']));
                    } else {
                        left_sidebar.html(LDB_BUILDER.show_leftSidebar_elements(['row', 'callout']));
                    }
                    selected_element = $(this);
                });

                // unselect Add Element +
                function emptyRow_unselect_listener (){
                    $('.btn-add-element').outsideClick(function(event){
                        //code that fires when user clicks outside the element
                        //event = the click event
                        //$(this) = the '.target-element' that is firing this function
                        $(this).removeClass("element-selected text-primary");
                        left_sidebar.html($('<h6 class="text-center">Some Icon</h6>'));
                        selected_element = undefined;
                    }, "#sticky-left-sidebar, .btn-add-element");
                }
                emptyRow_unselect_listener();

                // create Add Element +
                left_sidebar.on("click", ".builder-element" , function (e){
                    // $(this) = leftSidebar ,,, selectedRow = dropArea selected element
                    let parentRow = selected_element.parent();
                    if (parentRow.hasClass("empty-row")) {
                        let col_width = 'col-' + (12 / parentRow.children().length);
                        let newElement_mockup = LDB_BUILDER[$(this).data('ldb-builder-element')]();
                        let removedParent_from_newElement = newElement_mockup
                            .replace('<section class="row">', '')
                            .replace('</section>', '')
                            .replace('col-12', col_width);
                        selected_element.replaceWith(removedParent_from_newElement);
                        // remove attr and style from parentRow after all cols filled
                        if (parentRow.children('.btn-add-element').length === 0) {
                            parentRow.removeClass("empty-row");
                            parentRow.removeAttr("data-ldb-builder-element");
                        }
                    } else {
                        parentRow.before(LDB_BUILDER[$(this).data('ldb-builder-element')]());
                    }
                    // attach fucking listener to new elements
                    emptyRow_unselect_listener();
                    // select new element
                    selected_element = parentRow.prev();
                    // click on new element
                    $('body').click();
                });
            });
        </script>


        {{-- unselect plugin --}}
        <script>
            (function($) {

                //when the user hits the escape key, it will trigger all outsideClick functions
                $(document).on("keyup", function (e) {
                    if (e.which === 27) $('body').click(); //escape key
                });

                //The actual plugin
                $.fn.outsideClick = function(callback, exclusions) {
                    let subject = this;

                    //test if exclusions have been set
                    let hasExclusions = typeof exclusions !== 'undefined';

                    //switches click event with touch event if on a touch device
                    let ClickOrTouchEvent = "ontouchend" in document ? "touchend" : "click";

                    $('body').on(ClickOrTouchEvent, function(event) {
                        //click target does not contain subject as a parent
                        let clickedOutside = !$(event.target).closest(subject).length;

                        //click target was on one of the excluded elements
                        let clickedExclusion = $(event.target).closest(exclusions).length;

                        let testSuccessful;

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
