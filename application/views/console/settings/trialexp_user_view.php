<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">  
   

   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0" style='width: 15%;'>Name</th>
        <th class="wd-15p border-bottom-0" style='width: 20%;'>Firm Name</th>
        <th class="wd-15p border-bottom-0" style='width: 15%;'>Mobile</th>
        <th class="wd-20p border-bottom-0" style='width: 15%;'>Email</th>
        <th class="wd-10p border-bottom-0" style='width: 10%;'>Created On</th>
        <!-- <th class="wd-25p border-bottom-0" style='width: 10%;'>Action</th> -->
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
          <td><?= date('d M Y H:i', $list->created_on); ?></td>
          <!-- <td>
           <button id="ia-<?= $list->user_id; ?>" data-id="<?= $list->user_id; ?>" class="btn btn-icon btn-primary btn-sm mr-2 update_user_exp_date" title="Date Extende" data-status="<?php echo $list->user_status ?>">
            <i class="fa fa-calendar"></i>
           </button>
          </td> -->
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
 <!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="add_extend_date_modal">
 <div class="modal-dialog " role="document">
  <div class="modal-content modal-content-demo">
   <form class="update_extend_date_form">
    <div class="modal-header">
        <h6 class="modal-title"><b>Date Extende</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="modal-body">
        <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label">Extende Date<span class="text-red">*</span></label>
                 
          <div class="form-group">
             
             <input type="text" class="form-control day_extend" id="day_extend" name="day_extend" placeholder="Enter Day">
             <span class="extende_date_error_msg text-small" style="color:red;"></span>
       
     </div>
              </div>
 </div>

 <div class="modal-footer">
    <button type="submit" class="box-btn fill_primary" >Submit</button>
    <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
 <script>
     $(document).on('click','.update_user_exp_date',function(e){
    e.preventDefault();
    $('#add_extend_date_modal').modal('toggle');
});
  $(document).ready(function() {
    if ($(".extende_date").length > 0) {
   $('.extende_date').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}
   $('.select2').select2();
   
   /* Interview form submit */
$(document).on('submit','.update_extend_date_form',function(e){     
   e.preventDefault();
   var extende_date = $('.day_extend').val();
   
   if(extende_date == ""){
      $('.extende_date_error_msg').text('Please Enter Day');
      return false;
   }else{
      $('.extende_date_error_msg').text('');
   }
   
  
   $.ajax({
      url : base_url + 'franchise/enquiry/add_interview_date',
      type : "POST",
      data : $(this).serializeArray(),
      dataType: 'json',
      success : function(data){
         if(data.status == 'success'){
            $(".interview_form")[0].reset();
            $('#add_interview').modal('toggle');
            get_all_today_follow_up_data();
            get_all_yesterday_follow_up_data();
            get_all_missed_follow_up_data();
            //location.reload();
            window.location = continue_to;
            /*Swal.fire("Success!", data.message, "success").then(function(){
               // location.reload();
            });*/
         }else if(data.status == "date_error"){
          $('.enquiry_date_error_msg').text(data.message);
       }else{
         Swal.fire("Warning!", data.message, "warning");
      }
   }
});
});
   

  });
 </script>

