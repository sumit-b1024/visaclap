jQuery(document).ready(function() {

	// select 2
    $('.ctm_select2').select2({
        allowClear: true
    });

    // datatable
    var table = $('.ctm-datatable');
    table.DataTable({
        responsive: true,
        // Pagination settings
        dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
        buttons: [
            'print',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
        ],
        columnDefs: [ ],
    });


    
    
});