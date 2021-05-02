<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Builder</title>
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


        /* LDB styles */
        .main-sidebar {
            overflow-y: auto;
        }
        #sidebar-left {
            padding: 15px;
            min-width: 560px;
            color: #C2C7D0;
            left: -560px;
            right: auto;
            direction: ltr;
        }
        #sidebar-left .preview-element{
            user-select: none;
        }
        #sidebar-left .preview-element:hover{
            border: 2px solid grey;
            border-radius: 5px;
            cursor: pointer;
        }
        #sidebar-right {
            padding: 15px;
            min-width: 560px;
            right: -560px;
            color: #C2C7D0;
            direction: ltr;
        }
        #sidebar-right span.select2 {
            width: 100% !important;
        }
        #sidebar-right div.toggle {
            width: 100% !important;
        }
        #sidebar-right .btn-group {
            display: inline-block;
        }
        #sidebar-right .btn-group .btn {
            border-radius: 3rem !important;
            display: inline-block !important;
        }
        #sidebar-right .btn-group .btn i {
            line-height: unset !important;
        }
        #sidebar-right .toggle-handle {
            background-color: #bec0cb;
        }
        .select2-selection {
            text-align: left;
        }
        .sidebar-divider {
            background-color: #bec0cb;
            height: 1px;
            margin: 10px 0;
        }
        .content-wrapper {
            margin-right: 0;
            margin-left: 0;
        }
        #div_output {
            min-height: 800px;
            border: 4px solid #d8dbde;
            padding: 40px;
            background-color: #f4f6f9;
        }
        #div_output .invis {
            padding: 0px !important;
            border: 4px dashed #f4f6f9;
            color: #f4f6f9 ;
        }
        #div_output .invis:hover {
            border-color: #d7dadd ;
            color: darkgray ;
        }
        #div_output .invis h6 {
            margin: 0;
        }
        #div_output .btn-add-element {
            cursor: pointer;
            user-select: none;
        }
        #div_output .btn-add-element:hover {
            border-color: grey;
        }
        #div_output .element-unselected {
            border: 4px dashed #d7dadd;
            color: darkgray;
            padding: 50px;
        }
        #div_output .element-selected {
            border-color: #007bff !important;
        }
        #div_output .empty-row {
            border: 3px solid #d7dadd;
            padding: 50px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        #div_output .empty-row .empty-col {
            border: 4px dashed #d7dadd;
            padding: 50px;
        }
        #div_output .element-is-editable:hover {
            outline: 5px dashed orange;
        }
        #div_output .element-editing {
            outline: 5px solid orange !important;
        }
        #div_output .element-editing-dashed {
            outline: 5px dashed #ffa50061 !important;
        }
    </style>
    {!! $custom_css ?? '' !!}
</head>
<body class="hold-transition sidebar-mini">



<div class="wrapper">
    <!-- Sidebar Right -->
    <aside id="sidebar-right" class="main-sidebar sidebar-dark-primary elevation-4">
        <h5 class="text-center">Toolbar</h5>
        <div class="sidebar-divider"></div>
        <div id="edit_toolbar" class="btn-toolbar mb-5" role="toolbar">
            <div class="btn-group mr-4" role="group">
                <button type="button" class="btn btn-primary toolbar-moveup" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Move Up"><i class="fas fa-arrow-alt-up"></i></button>
                <button type="button" class="btn btn-primary toolbar-movedown" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Move Down"><i class="fas fa-arrow-alt-down"></i></button>
            </div>
            <div class="btn-group mr-4" role="group">
                <button type="button" class="btn btn-primary toolbar-duplicate" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Duplicate"><i class="far fa-clone"></i></button>
                <button type="button" class="btn btn-primary toolbar-cut" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Cut (future...)"><i class="far fa-cut"></i></button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-danger toolbar-delete" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Delete"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>

        <form id="form_properties" action=""></form>
    </aside>

    <!-- Sidebar Left -->
    <aside id="sidebar-left" class="main-sidebar sidebar-dark-primary elevation-4">
        <h6 class="text-center">Select Something</h6>
        <div class="sidebar-divider"></div>
    </aside>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12" id="page">
                        <section class="row">
                            <div class="col-12 text-left ltr" id="div_output"></div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
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
    function init_all_ckeditor_elements () {
        $.each($('.ck-edit'), function( index, value ) {
            CKEDITOR.replace(this.id);
        });
    }
    init_all_ckeditor_elements();
</script>
<!-- ldb -->
<script src="/plugins/ldb/visual-html-editor.js?random=@php echo filemtime(public_path('/plugins/ldb/visual-html-editor.js')); @endphp"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/admin.js') }}"></script>





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
                let el_id = props.el_id || "";
                let el_title = props.el_title || "عنوان";
                let el_titleIcon = props.el_titleIcon || "fa fa-info";
                let el_titleColor = props.el_titleColor || "text-primary"; // danger, warning
                let el_borderColor = props.el_borderColor || "callout-info";  // danger, warning
                let el_content = props.el_content || "این یک متن است که توسط ckeditor ایجاد شده است";
                let el_css = props.el_css ? props.el_css.join(' ') : '';

                let col_dir = (props.col_dir === "on") ? "ltr" : "rtl";
                let col_css = props.col_css ? props.col_css.join(' ') : 'col-12';

                let row_css = props.row_css ? props.row_css.join(' ') : '';

                let html;
                html = `<section class="row ${row_css}">
                                    <div class="${col_css} ${col_dir === "ltr" ? "text-left" : "text-right"}" dir="${col_dir}">
                                        <div id="${el_id}" class="callout element-is-editable ${el_borderColor} ${el_css}" data-element-type="callout" data-border-color="${el_borderColor}" ">
                                            <h5 class="${el_titleColor}"><i class="icon ml-2 ${el_titleIcon} ${col_dir === "ltr" ? "pull-left" : "pull-right"}" data-icon="${el_titleIcon}"></i> <span>${el_title}</span></h5>
                                            <div>${el_content}</div>
                                        </div>
                                    </div>
                                </section>`

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
        let div_output = $("#div_output");
        let left_sidebar = $("#sidebar-left");
        let right_sidebar = $("#sidebar-right");
        let selected_element;

        // vaghti hichi to safhe nabud, btn-add-element generate kon
        div_output.html(LDB_BUILDER.show_btn_addElement());

        // select Add Element +
        $(div_output).on("click", ".btn-add-element" , function (e){
            open_leftSidebar();
            // vaghti az ye selected, ye selectede dige ro click mikonim, ghablia bayad styleshon bere
            $(".btn-add-element").removeClass("element-selected text-primary");
            $(".element-editing").removeClass("element-editing");
            $(".element-editing-dashed").removeClass("element-editing-dashed");
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
            let parentRow = selected_element.parent();
            if (parentRow.hasClass("empty-row")) {
                let col_width = 'col-' + (12 / parentRow.children().length);
                let newElement_mockup = LDB_BUILDER[$(this).data('preview-element-type')]();
                let removedParent_from_newElement = newElement_mockup
                    .replace('<section class="row ">', '')
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
            // remove selection
            $('body').click();
        });


        // select editable element
        $(div_output).on("click", ".element-is-editable" , function (e){
            selected_element = $(this);
            right_sidebar.children("form").html("");
            open_rightSidebar();
            $(".btn-add-element").removeClass("element-selected text-primary");
            $(".element-editing").removeClass("element-editing");
            $(".element-editing-dashed").removeClass("element-editing-dashed");
            selected_element.addClass("element-editing");
            selected_element.parent().addClass("element-editing-dashed");
            selected_element.parent().parent().addClass("element-editing-dashed");

            // append properties based on (element-type)
            right_sidebar.children("form").append(MAKE_PROPERTIES[selected_element.data('element-type')]());
            // append updateBtn
            right_sidebar.children("form").append($('<div class="row mt-5"><div class="col-12"><button class="form-control btn btn-success" type="submit">Update</button></div></div>'));
            // reinit listeners
            $('.bootstrap-toggle').bootstrapToggle();
            init_all_select2_elements();
            init_all_ckeditor_elements();
        });

        // unselect editable element
        function editableElement_unselect_listener (){
            $('.element-is-editable').outsideClick(function(event){
                close_bothSidebars();
                $(".element-editing").removeClass("element-editing");
                $(".element-editing-dashed").removeClass("element-editing-dashed");
                $("#form_properties").html();
                selected_element = undefined;
            }, "#sidebar-right, .element-is-editable, #sidebar-left, .btn-add-element, span.select2-selection__choice__remove");
        }
        editableElement_unselect_listener();

        // init_all_select2_elements
        function init_all_select2_elements () {
            $(".select2-multiple").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            $(".select2-single").select2();
        }
        init_all_select2_elements();

        // sidebars open/close
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

        // MAKE_PROPERTIES
        MAKE_PROPERTIES = {
            callout : () => {
                let el_id = selected_element.attr("id") || "";
                let el_title = selected_element.children("h5").children("span").html() || "";
                let el_titleIcon = selected_element.children("h5").children("i").data("icon") || "";
                let el_titleColor = '';
                ['text-primary', 'text-danger', 'text-warning'].forEach(function(css_class) {
                    let el_selected = (css_class === selected_element.children("h5").attr("class")) ? 'selected="selected"' : '';
                    el_titleColor += `<option ${el_selected}>${css_class}</option>`;
                });
                let el_css = "";
                selected_element.prop('className').split(' ')
                    .filter( (i) => { return (i !== 'callout' && i !== 'element-is-editable' && i !== 'element-editing'  && i !== 'callout-info' && i !== 'callout-danger' && i !== 'callout-warning') } )
                    .forEach(function(css_class) {
                        el_css += `<option selected="selected">${css_class}</option>`;
                    });
                let el_content = selected_element.children("div").html() || "";
                let el_borderColor = '';
                ['callout-info', 'callout-danger', 'callout-warning'].forEach(function(css_class) {
                    let selected = (css_class === selected_element.data("border-color")) ? 'selected="selected"' : '';
                    el_borderColor += `<option ${selected}>${css_class}</option>`;
                });
                let col_dir = (selected_element.parent().attr("dir") === "ltr") ? "checked" : "";
                let col_css = "";
                selected_element.parent().prop('className').split(' ')
                    .filter( (i) => { return (i !== 'text-left' && i !== 'text-right' && i !== 'element-editing-dashed') } )
                    .forEach(function(css_class) {
                        col_css += `<option selected="selected">${css_class}</option>`;
                    });
                let row_css = "";
                selected_element.parent().parent().prop('className').split(' ')
                    .filter( (i) => { return (i !== 'row' && i !== 'element-editing-dashed') } )
                    .forEach(function(css_class) {
                        row_css += `<option selected="selected">${css_class}</option>`;
                    });

                let properties_html =
                    `<h5 class="text-center">Element properties</h5><div class="sidebar-divider"></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Id:</h6></div><div class="col-9"><input class="form-control" name="el_id" type="text" value="${el_id}" autocomplete="off"></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Title:</h6></div><div class="col-9"><input name="el_title" class="form-control" type="text" value="${el_title}"></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Title Icon:</h6></div><div class="col-9"><input name="el_titleIcon" class="form-control" type="text" placeholder="Example : fa-info" value="${el_titleIcon}"></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Title Color:</h6></div><div class="col-9"><select name="el_titleColor" class="select2-single">${el_titleColor}</select></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Css Class:</h6></div><div class="col-9"><select class="select2-multiple el_css" multiple="multiple">${el_css}</select></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Content:</h6></div><div class="col-9"><textarea name="el_content" class="ck-edit" id="${uniqueId()}" rows="10" cols="80" dir="rtl">${el_content}</textarea></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Border Color:</h6></div><div class="col-9"><select name="el_borderColor" class="select2-single">${el_borderColor}</select></div></div>
                            <h5 class="text-center mt-5">Column properties</h5><div class="sidebar-divider"></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Dir:</h6></div><div class="col-9"><input name="col_dir" class="form-control bootstrap-toggle" type="checkbox" data-toggle="toggle" ${col_dir} data-on="LTR" data-off="RTL" data-onstyle="success" data-offstyle="light"></div></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Css Class:</h6></div><div class="col-9"><select class="select2-multiple col_css" multiple="multiple">${col_css}</select></div></div>
                            <h5 class="text-center mt-5">Row properties</h5><div class="sidebar-divider"></div>
                            <div class="row mt-3"><div class="col-3 mt-2 text-left"><h6>Css Class:</h6></div><div class="col-9"><select class="select2-multiple row_css" multiple="multiple">${row_css}</select></div></div>
                        `;

                return properties_html;
            },
        };

        // Update Properties
        right_sidebar.on('submit','#form_properties',function(e){
            e.preventDefault();
            let formData = $('#form_properties').serializeArray();
            let propertiesData = {};
            for (let i=0; i < formData.length; i++){
                propertiesData[formData[i].name] = formData[i].value;
            }
            propertiesData.el_css = $("#form_properties .el_css").select2("val");
            propertiesData.col_css = $("#form_properties .col_css").select2("val");
            propertiesData.row_css = $("#form_properties .row_css").select2("val");

            selected_element.parent().parent().replaceWith( LDB_BUILDER.callout(propertiesData) );
            editableElement_unselect_listener();
            $('body').click();
        });

        // Toolbar - delete
        right_sidebar.on('click','.toolbar-delete',function(e){
            selected_element.parent().parent().prev().remove(); // remove btn_addElement
            selected_element.parent().parent().remove(); // remove element
            $('body').click();
        });
        // Toolbar - moveup
        right_sidebar.on('click','.toolbar-moveup',function(e){
            let addBtnBalayeElement = selected_element.parent().parent().prev();
            let elementRow = selected_element.parent().parent();

            let isFirstElement = addBtnBalayeElement.prev().length;

            if (isFirstElement === 0) {
                return false;
            }
            $(addBtnBalayeElement).insertBefore(addBtnBalayeElement.prev().prev());
            $(elementRow).insertBefore(elementRow.prev().prev());
        });
        // Toolbar - movedown
        right_sidebar.on('click','.toolbar-movedown',function(e){
            let addBtnBalayeElement = selected_element.parent().parent().prev();
            let elementRow = selected_element.parent().parent();

            let isLastElement = elementRow.next("div.row").children(".btn-add-element").length;

            if (isLastElement === 0) {
                return false;
            }
            $(addBtnBalayeElement).insertAfter(addBtnBalayeElement.next().next().next());
            $(elementRow).insertAfter(elementRow.next().next().next());
        });
        // Toolbar - duplicate
        right_sidebar.on('click','.toolbar-duplicate',function(e){
            let addBtnBalayeElement = selected_element.parent().parent().prev();
            let elementRow = selected_element.parent().parent();
            let newAddBtnBalayeElement = addBtnBalayeElement.clone();
            let newElementRow = elementRow.clone();

            $(newAddBtnBalayeElement).insertAfter(elementRow);
            $(newElementRow).insertAfter(elementRow.next());

            selected_element.click();
        });

        let myCar = new VisualHtmlEditor("arggg1", "arggg2");
        // console.log( myCar.method1() );

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
</body>
</html>
