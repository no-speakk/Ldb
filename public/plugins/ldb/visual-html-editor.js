class VisualHtmlEditor {
    constructor(leftSidebar, rightSidebar, div_output) {
        this.leftSidebar     = leftSidebar;
        this.rightSidebar    = rightSidebar;
        this.div_output      = div_output;
        this.selectedElement = undefined;
    }

    method1() {
        div_output.html(LDB_BUILDER.show_btn_addElement());
        return 'method1 called';
    }
}
