@component('admin.master-pagebuilder')
    @slot('title') Page Builder @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot

    @slot('custom_css')
        <style>
            #dropArea {
                min-height: 800px;
                border: 4px solid #d8dbde;
                padding: 40px;
                background-color: #f4f6f9;
            }
            #dropArea .invis {
                padding: 0px !important;
                border: 4px dashed #f4f6f9;
                color: #f4f6f9 ;
            }
            #dropArea .invis:hover {
                border-color: #d7dadd ;
                color: darkgray ;
            }
            #dropArea .invis h6 {
                margin: 0;
            }
            #dropArea .btn-add-element {
                cursor: pointer;
                user-select: none;
            }
            #dropArea .btn-add-element:hover {
                border-color: grey;
            }
            #dropArea .element-unselected {
                border: 4px dashed #d7dadd;
                color: darkgray;
                padding: 50px;
            }
            #dropArea .element-selected {
                border-color: #007bff !important;
            }
            #dropArea .empty-row {
                border: 3px solid #d7dadd;
                padding: 50px;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            #dropArea .empty-row .empty-col {
                border: 4px dashed #d7dadd;
                padding: 50px;
            }
            #dropArea .element-is-editable:hover {
                outline: 5px dashed orange;
            }
            #dropArea .element-editing {
                outline: 5px solid orange !important;
            }
        </style>
    @endslot

    <section class="row">
        <div class="col-12 text-left ltr" id="dropArea"></div>
    </section>

    @slot('custom_js')
        <script>
            $(function(){
                LDB_BUILDER = {
                    show_btn_addElement : (props = {}) => {
                        let is_invis = props.invis || false;

                        if (is_invis) {
                            return `<div class="row mt-2 mb-2">
                                    <div class="col-12 invis btn-add-element text-center"><h6>Add Element +</h6></div>
                                </div>`;
                        }

                        return `<div class="row">
                                    <div class="col-12 btn-add-element text-center element-unselected mt-4"><h5>Add Element +</h5></div>
                                </div>`;
                    },
                    show_leftSidebar_elements : (elements = []) => {
                        let asset_path = @json(asset('img/ldb/laragon2.png'));
                        let html = `<h6 class="text-center">Add New Element</h6><div class="sidebar-divider"></div><div class="row">`;
                        elements.forEach(function(element) {
                            html += `<div class="col-6 preview-element" data-ldb-preview-element="${element}">
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
                            html = `<div class="callout callout-${border_color} element-is-editable">
                                        <h5 class="text-${title_color}"><i class="icon fa ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right" }"></i> ${title_text}</h5>${text}
                                    </div>`
                        } else {
                            html = `<section class="row">
                                        <div class="col-12 ${dir === "ltr" ? "text-left" : "text-right"} ${css_class}" dir="${dir}">
                                            <div class="callout callout-${border_color} element-is-editable">
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

                        return `<section class="row empty-row" data-ldb-preview-element="empty-row">
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
                let left_sidebar = $("#sidebar-left");
                let selected_element;

                // vaghti hichi to safhe nabud, btn-add-element generate kon
                if (dropArea.children().length <= 1) {
                    dropArea.html(LDB_BUILDER.show_btn_addElement());
                }

                //---------------------------------------------------
                //                 Add Element +
                //---------------------------------------------------
                // select Add Element +
                $(dropArea).on("click", ".btn-add-element" , function (e){
                    // vaghti az ye selected, ye selectede dige ro click mikonim, ghablia bayad styleshon bere
                    $(".btn-add-element").removeClass("element-selected text-primary");
                    $(".element-is-editable").removeClass("element-editing");
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
                        left_sidebar.html($('<h6 class="text-center">Select Something</h6><div class="sidebar-divider"></div>'));
                        selected_element = undefined;
                    }, "#sidebar-left, .btn-add-element");
                }
                emptyRow_unselect_listener();

                // create element from left-sidebar
                left_sidebar.on("click", ".preview-element" , function (e){
                    // $(this) = leftSidebar ,,, selectedRow = dropArea selected element
                    let parentRow = selected_element.parent();
                    if (parentRow.hasClass("empty-row")) {
                        let col_width = 'col-' + (12 / parentRow.children().length);
                        let newElement_mockup = LDB_BUILDER[$(this).data('ldb-preview-element')]({text : "this is created from child"});
                        let removedParent_from_newElement = newElement_mockup
                            .replace('<section class="row">', '')
                            .replace('</section>', '')
                            .replace('col-12', col_width);
                        selected_element.replaceWith(removedParent_from_newElement);
                        // remove attr and style from parentRow after all cols filled
                        if (parentRow.children('.btn-add-element').length === 0) {
                            parentRow.removeClass("empty-row");
                            parentRow.removeAttr("data-ldb-preview-element");
                        }
                    } else {
                        parentRow.before(LDB_BUILDER[$(this).data('ldb-preview-element')]());
                        parentRow.prev().before(LDB_BUILDER.show_btn_addElement({invis : true}));
                    }
                    // attach fucking listener to new elements
                    emptyRow_unselect_listener();
                    editableElement_unselect_listener();
                    // select new element
                    selected_element = parentRow.prev();
                    // click on new element
                    $('body').click();
                    $("#dropArea").on('hover', '#dropArea > div.row.mt-2.mb-2 > div', function() {
                        console.log('kose nanat');
                        $(this).css("background-color",e.type === "mouseenter"?"red":"transparent")
                    });
                });
                //---------------------------------------------------
                //---------------------------------------------------


                //---------------------------------------------------
                //                 Edit Element
                //---------------------------------------------------
                // select editable element
                $(dropArea).on("click", ".element-is-editable" , function (e){
                    // vaghti az ye selected, ye selectede dige ro click mikonim, ghablia bayad styleshon bere
                    $(".btn-add-element").removeClass("element-selected text-primary");
                    $(".element-is-editable").removeClass("element-editing");
                    $(this).addClass("element-editing");
                    // ye class edit mode bayad ezf konam

                    // if ($(this).parent().hasClass("empty-row")) {
                    //     left_sidebar.html(LDB_BUILDER.show_leftSidebar_elements(['callout']));
                    // } else {
                    //     left_sidebar.html(LDB_BUILDER.show_leftSidebar_elements(['row', 'callout']));
                    // }
                    selected_element = $(this);
                });

                // unselect editable element
                function editableElement_unselect_listener (){
                    $('.element-is-editable').outsideClick(function(event){
                        $(this).removeClass("element-editing");
                        // left_sidebar.html($('<h6 class="text-center">Select Something</h6><div class="sidebar-divider"></div>'));
                        selected_element = undefined;
                    }, "#sidebar-right, .element-is-editable, #sidebar-left, .btn-add-element");
                }
                editableElement_unselect_listener();
                //---------------------------------------------------
                //---------------------------------------------------
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
