<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">
   <div class="card-body">
    <form class="pool_page_report">
     <h4>Select Filter</h4>
     <div class="row">

      <div class="col-sm-3 col-md-3  mb-2">
       <div class="form-group input-inside input-inside">
        <label class="form-label">Select Franchise</label>
        <select class="franchise_id    select2-show-search form-select" name="franchise_id">
         <option value="">Select Franchise</option>
         <?php foreach ($get_all_franchise as $key => $value) { ?>
          <option value="<?= $value->user_id ?>"><?= $value->first_name.' '.$value->last_name; ?></option>
         <?php    } ?>
        </select>
       </div>
      </div>

      <div class="col-sm-3 col-md-3">
       <div class="form-group input-inside1">
        <label class="form-label">Select Status</label>
        <select class="s_status form-select" name="s_status">
         <option value="">Select Status</option>
         <?php foreach ($all_pool_type as $key => $value) { ?>
          <option value="<?= $key ?>" ><?= $value ?></option>
         <?php  } ?>
        </select>
       </div>
      </div>

      <div class="col-sm-3 col-md-3 input-inside">
       <label class="form-label">From date</label>
       <div class="wd-200 mg-b-30">
        <div class="input-group">
         <div class="input-group-text">
          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
         </div><input class="form-control passport_date" id="start_date" name="start_date" placeholder="MM/DD/YYYY" type="text" readonly>
        </div>
       </div>
      </div>
      <div class="col-sm-3 col-md-3 input-inside">
       <label class="form-label">To date</label>
       <div class="wd-200 mg-b-30">
        <div class="input-group">
         <div class="input-group-text">
          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
         </div><input class="form-control passport_date" id="end_date" name="end_date" placeholder="MM/DD/YYYY" type="text" readonly>
        </div>
       </div>
      </div>

      <div class="col-sm-3 col-md-3 form-btns mt-2">
       <button type="submit" class="box-btn fill_primary sub_btn" style="">Submit</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
       </button>
       <button type="button" class="box-btn fil_gray reset_btn">Reset</button>
      </div>
     </div>
    </form>
   </div>
  </div>
<br/>
  <div class="row row-sm">
   <div class="col-lg-12">
    <div class="card">
     <div class="card-body">
      <div class="table-responsive" id="view_admin_pool_data">

      </div>
     </div>
    </div>

    <!-- Model For Show Follow Up -->
    <div class="modal fade bd-example-modal-lg" id="pool_view_model">
     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
       <form class="send_email_template_form">
        <div class="modal-header">
         <h6 class="modal-title"><b>View All Pool</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body view_all_pool">

        </div>
        <div class="modal-footer">
         <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
       </form>
      </div>
     </div>
    </div>
    <!-- modal end -->
   </div>
  </div>

  <script>
   function get_all_pool_data(){

    $('.spiner_btn').removeAttr('style');
    $('.sub_btn').attr('style','display:none');

    var franchise_id = $('.franchise_id').val();
    var s_status = $('.s_status').val();
    var end_date = $('#end_date').val();
    var start_date = $('#start_date').val();
    $.ajax({
     url : base_url+"pool_master/get_all_pool_status_data",
     type : "POST",
     data : {franchise_id,s_status,end_date,start_date},
     success : function(data){
      $('.spiner_btn').attr('style','display:none');
      $('.sub_btn').removeAttr('style','display:none');
      $('#view_admin_pool_data').html("");
      $('#view_admin_pool_data').html(data);
      $('#responsive-datatable').DataTable();
     }
    });
   }

   $(document).ready(function() {
    get_all_pool_data();

    $('.passport_date').datepicker({
     //showOtherMonths: true,
     selectOtherMonths: true,
    });
    $(document).on('submit', '.pool_page_report',function(e){
     e.preventDefault();
     get_all_pool_data();
    });

    $(document).on('click', '#view_pool_des',function(e){
     var record_id = $(this).val();
     $.ajax({
      url : base_url+"pool_master/get_all_pool_description",
      type : "POST",
      data : {record_id},
      success : function(data){
       $('.view_all_pool').html("");
       $('#pool_view_model').modal('show');
       $('.view_all_pool').html(data);
       $('#responsive_pool').DataTable();
      }
     });
    });

    $(document).on('click', '.reset_btn',function(e){
     $('.pool_page_report')[0].reset();
     $('.franchise_id').val(null).trigger("change");
     $('.s_status').val(null).trigger("change");

     get_all_pool_data();

    });

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
        url: base_url + 'pool_master/delete_pool_data',
        data:{'table' : table, 'row' : row, 'id' : id},
        dataType : 'json',
        success: function(result) {
         if(result.status == 'success'){
          Swal.fire("Deleted!", result.message, "success").then(function(){
           location.reload();
          });
         }else{
          Swal.fire('Warning!', result.message, 'warning')

         }
        }
       });
      }

     });

    });

   });
  </script>