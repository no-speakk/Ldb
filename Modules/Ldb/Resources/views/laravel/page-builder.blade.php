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
                            html += `<div class="col-4 preview-element" data-preview-element-type="${element}">
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
                        let title_icon = props.title_icon || "fa fa-info";
                        let title_color = props.title_color || "primary"; // danger, warning
                        let border_color = props.border_color || "callout-info";  // danger, warning
                        let text = props.text || "این یک متن است که توسط ckeditor ایجاد شده است";
                        let css_class = props.css_class || "";
                        let dir = props.dir || "rtl";
                        // const builder_options = {
                        //     title_text : "Title",
                        //     title_icon : "fa fa-warning",
                        //     title_color : "danger",
                        //     border_color : "callout-danger",
                        //     text : "this is an text from ekeditor",
                        //     css_class : "",
                        //     dir : "ltr",
                        // };

                        let html;
                        if (is_child) {
                            html = `<div id="callout-example" class="callout element-is-editable ${border_color} ${css_class}" data-element-type="callout" data-border-color="${border_color}" data-css-class="${css_class}">
                                        <h5 class="text-${title_color}"><i class="icon ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right"}" data-icon="${title_icon}"></i> <span>${title_text}</span></h5>
                                        <div>${text}</div>
                                    </div>`
                        } else {
                            html = `<section class="row">
                                        <div class="col-12 ${dir === "ltr" ? "text-left" : "text-right"}" dir="${dir}">
                                            <div id="callout-example" class="callout element-is-editable ${border_color} ${css_class}" data-element-type="callout" data-border-color="${border_color}" data-css-class="${css_class}">
                                                <h5 class="text-${title_color}"><i class="icon ml-2 ${title_icon} ${dir === "ltr" ? "pull-left" : "pull-right"}" data-icon="${title_icon}"></i> <span>${title_text}</span></h5>
                                                <div>${text}</div>
                                            </div>
                                        </div>
                                    </section>`
                        }
                        return html;
                    },
                    row : (props = {}) => {
                        // let css_class = props.css_class || "";
                        // let dir = props.dir || "rtl";

                        return `<section class="row empty-row" data-preview-element-type="empty-row">
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
                let right_sidebar = $("#sidebar-right");
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
                    open_leftSidebar();
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
                        close_bothSidebars();
                        $(this).removeClass("element-selected text-primary");
                        left_sidebar.html($('<h6 class="text-center">Select Something</h6><div class="sidebar-divider"></div>'));
                        selected_element = undefined;
                    }, "#sidebar-right, .element-is-editable, #sidebar-left, .btn-add-element, span.select2-selection__choice__remove");
                }
                emptyRow_unselect_listener();

                // create element from left-sidebar
                left_sidebar.on("click", ".preview-element" , function (e){
                    // $(this) = leftSidebar ,,, selectedRow = dropArea selected element
                    let parentRow = selected_element.parent();
                    if (parentRow.hasClass("empty-row")) {
                        let col_width = 'col-' + (12 / parentRow.children().length);
                        let newElement_mockup = LDB_BUILDER[$(this).data('preview-element-type')]({text : "this is created from child"});
                        let removedParent_from_newElement = newElement_mockup
                            .replace('<section class="row">', '')
                            .replace('</section>', '')
                            .replace('col-12', col_width);
                        selected_element.replaceWith(removedParent_from_newElement);
                        // remove attr and style from parentRow after all cols filled
                        if (parentRow.children('.btn-add-element').length === 0) {
                            parentRow.removeClass("empty-row");
                            parentRow.removeAttr("data-preview-element-type");
                        }
                    } else {
                        parentRow.before(LDB_BUILDER[$(this).data('preview-element-type')]());
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
                    right_sidebar.children(".properties-area").html("");
                    open_rightSidebar();
                    // vaghti az ye selected, ye selectede dige ro click mikonim, ghablia bayad styleshon bere
                    $(".btn-add-element").removeClass("element-selected text-primary");
                    $(".element-is-editable").removeClass("element-editing");
                    $(this).addClass("element-editing");

                    let elementType = $(this).data('element-type');
                    let elementData = {};
                    switch (elementType) {
                        case 'callout':
                            elementData = {
                                id : {type: "id", value: $(this).attr("id")},
                                direction : {type: "direction", value: $(this).parent().attr("dir")},
                                css_class : {type: "elementCustomCss", value: $(this).data("css-class").split(/\s+/)},
                                contentText : {type: "textarea", value: $(this).children("div").html()},
                                borderColor : {type: "calloutBorderColor", value: $(this).data("border-color")},
                                titleColor : {type: "textColor", value: $(this).children("h5").attr("class")},
                                titleIcon : {type: "faIcon", value: $(this).children("h5").children("i").data("icon")},
                                titleText : {type: "text", value: $(this).children("h5").children("span").html()},
                            }
                            break;
                    }

                    // append properties to right-sidebar
                    for (let key in elementData) {
                        let type = elementData[key].type;
                        let props = elementData[key].value;
                        right_sidebar.children(".properties-area").append(MAKE_PROPERTIES[type](props));
                    }

                    $('.bootstrap-toggle').bootstrapToggle();
                    init_all_select2_elements();
                    init_all_ckeditor_elements();
                    selected_element = $(this);
                });

                // unselect editable element
                function editableElement_unselect_listener (){
                    $('.element-is-editable').outsideClick(function(event){
                        close_bothSidebars();
                        $(this).removeClass("element-editing");
                        // left_sidebar.html($('<h6 class="text-center">Select Something</h6><div class="sidebar-divider"></div>'));
                        selected_element = undefined;
                    }, "#sidebar-right, .element-is-editable, #sidebar-left, .btn-add-element, span.select2-selection__choice__remove");
                }
                editableElement_unselect_listener();
                //---------------------------------------------------
                //---------------------------------------------------

                function init_all_select2_elements () {
                    $(".select2-taggable").select2({
                        tags: true,
                        tokenSeparators: [',', ' ']
                    });
                    $(".select2-single").select2();
                }
                init_all_select2_elements();


                function open_rightSidebar() {
                    right_sidebar.css("right", "0");
                    left_sidebar.css("left", "-560px");
                    $("div.content-wrapper").css("margin-left", "0").css("margin-right", "560px");
                }
                function open_leftSidebar() {
                    right_sidebar.css("right", "-560px");
                    $("div.content-wrapper").css("margin-right", "0").css("margin-left", "560px");
                    left_sidebar.css("left", "0");
                }
                function close_bothSidebars(){
                    left_sidebar.css("left", "-560px");
                    right_sidebar.css("right", "-560px");
                    $("div.content-wrapper").css("margin-right", "0").css("margin-left", "0");
                }

                function uniqueId() {
                    return Math.round(new Date().getTime() + (Math.random() * 100));
                }


                MAKE_PROPERTIES = {
                    id : (value = undefined) => {
                        let id = (value === undefined) ? {} : {value : value};

                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Id : ")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<input>")
                                                .addClass("form-control")
                                                .attr({type : "text"})
                                                .attr(id)
                                        )
                                );
                        return element;
                    },
                    direction : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Direction : ")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<input>")
                                                .addClass("form-control bootstrap-toggle")
                                                .attr({
                                                    type : "checkbox",
                                                    "data-toggle" : "toggle",
                                                    checked : true,
                                                    "data-on" : "RTL",
                                                    "data-off" : "LTR",
                                                    "data-onstyle" : "success",
                                                    "data-offstyle" : "danger",
                                                })
                                        )
                                );
                        return element;
                    },
                    elementCustomCss : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Css Class : ")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<select></select>")
                                                .addClass("select2-taggable")
                                                .attr({
                                                    multiple : "multiple",
                                                })
                                                .append(
                                                    $('<option selected="selected">class1</option>')
                                                )
                                                .append(
                                                    $('<option>class2</option>')
                                                )
                                                .append(
                                                    $('<option selected="selected">class3</option>')
                                                )
                                        )
                                );
                        return element;
                    },
                    textarea : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Content Text : ")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<textarea></textarea>")
                                                .addClass("ck-edit")
                                                .attr({
                                                    id : uniqueId(),
                                                    rows : "10",
                                                    cols : "80",
                                                })
                                                .html("This is my textarea to be replaced with CKEditor 4.")
                                        )
                                );
                        return element;
                    },
                    calloutBorderColor : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Border Color : ")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<select></select>")
                                                .addClass("select2-single")
                                                .append(
                                                    $('<option value="one">First</option>')
                                                )
                                                .append(
                                                    $('<option value="two">Second</option>')
                                                )
                                                .append(
                                                    $('<option value="three">Third</option>')
                                                )
                                        )
                                );
                        return element;
                    },
                    textColor : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Text Color : ")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<select></select>")
                                                .addClass("select2-single")
                                                .append(
                                                    $('<option value="one">First</option>')
                                                )
                                                .append(
                                                    $('<option value="two">Second</option>')
                                                )
                                                .append(
                                                    $('<option value="three">Third</option>')
                                                )
                                        )
                                );
                        return element;
                    },
                    faIcon : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Title Icon :")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<input>")
                                                .addClass("form-control")
                                                .attr({type : "text", placeholder: "Example : fa-info"})
                                        )
                                );
                        return element;
                    },
                    text : (value = undefined) => {
                        let element =
                            $("<div></div>").addClass("row mt-3")
                                .append(
                                    $("<div></div>").addClass("col-3 mt-2 text-left")
                                        .append(
                                            $("<h6></h6>").html("Title Text :")
                                        )
                                )
                                .append(
                                    $("<div></div>").addClass("col-9")
                                        .append(
                                            $("<input>")
                                                .addClass("form-control")
                                                .attr({type : "text"})
                                        )
                                );
                        return element;
                    },
                }

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
