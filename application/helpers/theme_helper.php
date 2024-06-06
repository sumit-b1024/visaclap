<?php
function box_heading($title) {
    return '<div class="box-header with-border">
            <h3 class="box-title">' . $title . '</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>';
}
function box_inner_heading($title) {
    return '<div class="box-header with-border mb10">
                <h3 class="box-title">' . $title . '</h3>
                <div class="clearfix"></div>
            </div>';
}

function add_edit_form_part(){
    return '<div class="disply_none" id="add_edit_form">
                <div id="display_update_form">
                    
                </div>
            </div>';
}


?>