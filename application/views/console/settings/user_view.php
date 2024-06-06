<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">  
   <div class="card-header">
    <div class="row">
     <div class="col-12">
      <a href="<?= CL_SETTINGS . '/add-user'; ?>" class="box-btn fill_primary pull-right ms-2"><i class="fa fa-plus"></i>
       Add User
      </a>
      <a class="box-btn bg-transparent pull-right " data-bs-target="#modaldemo1" data-bs-toggle="modal" href="javascript:void(0)">
       <i class="fa fa-upload"></i> Bulk Upload
      </a>
     </div>                    
    </div>
   </div>
   <!-- BASIC MODAL -->
   <div class="modal fade" id="modaldemo1">
    <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
      <form class="upload_user_file_form">
       <div class="modal-header">
        <h6 class="modal-title">Bulk User Upload</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
       </div>
       <div class="modal-body">
        <a href="<?= base_url(); ?>/assets/sample_excel/sample.xlsx" class="btn btn-primary btn-sm modal-header" download><span class="fa fa-download">&nbsp;&nbsp;Click Here To Download Sample File</span></a>
        <hr>
        <label class="form-label">Upload File<span class="text-red">*</span></label>
        <input type="file" name="file" id="file" class="form-control file" required accept=".xls, .xlsx, .csv">
        <span class="file_error" style="color:red;"></span>
        <label class="form-label">Select Category <span class="text-red">*</span></label>
        <select class="form-control form-control select2 form-select  customer_category" name="customer_category" data-placeholder="Choose Category" required>
         <option value=""></option>
         <?php foreach ($category_list as $key => $value) { ?>
          <option value="<?php echo $value->meta_id ?>"><?php echo ucfirst($value->name); ?></option>
         <?php  } ?>
        </select>
       </div>

       <div class="modal-footer">
        <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
         <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
         Loading...

        </button>
        <button class="btn btn-primary upload_file">Submit</button>
        <button type="button" class="box-btn fil_gray" data-bs-dismiss="modal">Close</button>
       </div>
      </form>
     </div>
    </div>
   </div>

   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0" style='width: 15%;'>Username</th>
        <th class="wd-15p border-bottom-0" style='width: 20%;'>Firm Name</th>
        <th class="wd-15p border-bottom-0" style='width: 15%;'>Mobile</th>
        <th class="wd-20p border-bottom-0" style='width: 15%;'>Email</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Role</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Status</th>
        <th class="wd-10p border-bottom-0" style='width: 10%;'>Created On</th>
        <th class="wd-25p border-bottom-0" style='width: 10%;'>Action</th>
       </tr> 
      </thead>
      <tbody>
       <?php
       foreach ( $_list as $list )
       {
        ?>
        <tr id="r-<?= $list->user_id; ?>">
         <td>
          <?php 
          if($list->role == User_role::FRANCHISE_STAFF){  
           $get_franchise_name =  $this->setting_model->get_franchise_name_by_franch_staff($list->created_by);
           // print_r($get_franchise_name);
           echo toPropercase($list->first_name .' '. $list->last_name).' <b>('.$get_franchise_name->first_name.''.$get_franchise_name->last_name.')</b>'; 

           }else{ 
           echo toPropercase($list->first_name .' '. $list->last_name);
          } ?>
          </td>
          <td><?= $list->firm_name; ?></td>
          <td><?= $list->mobile; ?></td>
          <td><?= $list->email; ?></td>
          <td><?= User_role::getValue($list->role); ?></td>
          <td id="status_<?= $list->user_id ?>">
           <?php if($list->user_status == "2"){
            echo "Deactive";   
           }else if($list->user_status == "1")   {
            echo "Active";
           }else{
            echo "Inactive";
           }
          ?></td>

          <td><?= date('d M Y H:i', $list->created_on); ?></td>
          <td>
           <a href="<?= ROOT_URL . 'settings/edit-user/' . $list->user_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
            <i class="fa fa-pencil"></i>
           </a>

           <?php if($list->role != User_role::FRANCHISE_STAFF && $list->role != User_role::FRANCHISE){ ?>

            <a href="javascript:;" data-id="<?= $list->user_id; ?>" data-table="<?= TBL_USERS; ?>" data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
             <i class="fa fa-trash"></i>
            </a>
           <?php } ?>

           <button id="ia-<?= $list->user_id; ?>" data-id="<?= $list->user_id; ?>" data-row="meta_id" data-table="<?= TBL_USERS; ?>" class="btn btn-icon btn-primary btn-sm mr-2 update_user_status" title="Status" data-status="<?php echo $list->user_status ?>">
            <i class="fa fa-refresh"></i>
           </button>
          </td>
         </tr>
         <?php
        }
        ?>
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>
 <script>
  $(document).ready(function() {
   $('.select2').select2();
   $('#responsive-datatable').on('click', '.delete_btn', function () {
    var table   =     $(this).data('table');
    var row     =     $(this).data('row');
    var id      =     $(this).data('id');
    Swal.fire({
     title: 'Are you sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
     if (result.value)
     {
      $.ajax({
       type: 'POST',
       url: base_url + 'common/delete/',
       data:{'table' : table, 'row' : row, 'id' : id},
       success: function(result) {
        if(result == 'success')
         Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')

        $('#r-'+id).addClass('d-none');
       }
      });
     }

    });

   });

   $('#responsive-datatable').on('click', '.update_user_status', function (e) {
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
       url: base_url + 'settings/update-user-status/',
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
   $(document).on('submit', '.upload_user_file_form', function (e) {
    e.preventDefault();
            // file validation 
            var fileInput =
            document.getElementById('file');
            var filePath = fileInput.value;
            // Allowing file type
            var allowedExtensions =
            /(\.xls|\.xlsx|\.csv)$/i;

            if (!allowedExtensions.exec(filePath)) {
             $('.file_error').text('Invalid file type,please upload only .xls, .xlsx, .csv format file.');
             fileInput.value = '';
             return false;
            }else{
             $('.file_error').text('');
            }
            $.ajax({
             url: base_url + 'settings/upload_user_data_script/',
             method:"POST",
             data:new FormData(this),
             contentType:false,
             cache:false,
             processData:false,
             beforeSend: function( jqXHR ) {
              $('.loader_btn').removeAttr('style');
              $('.upload_file').attr('style','display:none');
             },
             success:function(data) {
              result = $.parseJSON(data);
              $('.loader_btn').attr('style','display:none');
              $('.upload_file').removeAttr('style');
              if(result.status == "success"){
               Swal.fire("Success!", "User Imported Successfully.", "success").then(function(){
                location.reload();
               });
               $('#modaldemo1').modal('toggle');
               var $el = $('#file');
               $el.wrap('<form>').closest(
                'form').get(0).reset();
               $el.unwrap();
              }else{
               Swal.fire('Warning!', result.message, 'warning');
              }
             }
            });

           });

  });
 </script>

