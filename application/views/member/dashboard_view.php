<div class="row row-sm">
    <div class="col-lg-12">

        <div class="card">
         <div class="card-body">
            <form class="pool_page_report">
               <h5>Select Filter</h5>
               <div class="row">
                  <div class="col-sm-3 col-md-3">
                     <div class="form-group">
                        <label class="form-label">Select Account Status</label>
                        <select class="form-control account_status_id select2-show-search form-select select2-hidden-accessible" name="account_status_id" tabindex="-1" aria-hidden="true" data-placeholder="Select Account Status">
                            <option value=""></option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3">
                 <div class="form-group">
                    <label class="form-label">Select Customer Category</label>
                    <select class="form-control select2 customer_category select2-show-search form-select select2-hidden-accessible" name="customer_category" data-placeholder="Select Category" required>
                        <option value=""></option>
                        <?php foreach ($category_list as $key => $value) { ?>
                            <option value="<?php echo $value->meta_id ?>"><?php echo ucfirst($value->name); ?></option>
                        <?php  } ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-3 col-md-3" style="margin-top: 35px !important;">
             <button type="button" class="btn btn-success sub_filter_btn">Submit</button>
             <button class="btn btn-primary spiner_btn" type="button" disabled="" style="display:none">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>
            <button type="button" class="btn btn-primary reset_btn">Reset</button>
        </div>
    </div>
</form>
</div>
</div>
<div class="card">  
    <div class="card-header">
        <div class="row">
            <div class="col-9">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <div class="col-3">
                       <!--  <a href="<?= CL_SETTINGS . '/add-user'; ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>
                            Add User
                        </a>
                        <a class="btn btn-danger btn-sm pull-right" data-bs-target="#modaldemo1" data-bs-toggle="modal" href="javascript:void(0)">
                            <i class="fa fa-upload"></i> Bulk Upload
                        </a> -->
                    </div>                    
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive" id="dis_tbl_data">

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function get_all_records(){
        var account_status_id = $('.account_status_id').val();
        var customer_category = $('.customer_category').val();

        $.ajax({
            type: 'POST',
            url: base_url + 'manager/dashboard/get_user_filtered_data',
            data:{account_status_id,customer_category},
            success: function(result) {
                $('#dis_tbl_data').html("");
                $('#dis_tbl_data').html(result);
                $('#user_tbl').DataTable();
            }        
        });
    }
    $(document).ready(function() {
        get_all_records();

        $(document).on('click','.sub_filter_btn',function(e){
            e.preventDefault();
            get_all_records();

        });
        $(document).on('click','.reset_btn',function(e){
            $('.account_status_id').val(null).trigger("change");
            $('.customer_category').val(null).trigger("change");
            get_all_records();
        });


        $(document).on('click', '.update_user_status', function (e) {
            e.preventDefault();

            var table   =     $(this).data('table');
            var row     =     $(this).data('row');
            var id      =     $(this).data('id');
            var status  =     $(this).attr('data-status');

            if(status == "1"){
                var status_msg ="Deactive";
            }else{
                var status_msg = "Active";
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to "+ status_msg + "  user",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!'
            }).then(function (result) {

                if (result.value)
                {
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'manager/dashboard/update_user_status',
                        data:{'table' : table, 'row' : row, 'id' : id,'status':status},
                        success: function(result) {
                            data = $.parseJSON(result);
                            if(data.status == 'success')
                                Swal.fire('Updated!', data.message ,'success')
                            $('#ia-'+id).attr('data-status', data.is_active);
                            $('#status_'+id).html((data.is_active == "2") ? "Deactive" : "Active");
                        }
                    });
                }

            });

        });



    });
</script>