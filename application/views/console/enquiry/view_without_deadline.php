<div class="table-responsive">

   <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                 <thead>
                    <tr>
                        <th width="wd-15p border-bottom-0" style="width:20%"> Name </th>
                        <th width="wd-15p border-bottom-0" style="width:10%"> Mobile </th>
                        <!-- <th width="wd-15p border-bottom-0" style="width:10%"> Enquiry Type </th> -->
                        <th width="wd-15p border-bottom-0" style="width:10%"> Follow Up Date </th>
                        <th width="wd-15p border-bottom-0" style="width:10%"> Action</th>
                    </tr>
                 </thead>
                <tbody>
           <?php
           $index = 1;
           foreach($_view as $view){ ?>
              <tr>
               
               <td><div class="cell_content"><p>

         <?php
        $date = date('Y-m-d',strtotime($view->created_at));
        $startTimeStamp = strtotime($date);

        $endTimeStamp = strtotime(date('Y-m-d'));
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        if($view->company != ""){
          ?><img src="<?php echo base_url('assets/img/bo.svg');  ?>" ><?php echo '<b>&nbsp;&nbsp;</b>'; ?><?php 
        }
        echo $view->name;
        
      ?>&nbsp;(<?= isset($view->expriry_type_name) && $view->expriry_type_name != "" ? $view->expriry_type_name :"-"; ?>)&nbsp;<?php
      if(isset($view->enquiry_type_name) && $view->enquiry_type_name != ""){
         echo '('.$view->enquiry_type_name.")"; 
      }   
      
      if($view->intersted_country != ""){
       $country = explode(",",$view->intersted_country);
       $allcountryname = array();
        for($i=0;$i<count($country);$i++){ //echo $country[$i]; exit;
           $from = $this->setting_model->get_api_country_by_id($country[$i]);
           $allcountryname[] = $from->countrydata[0]->name;
         } 
         echo ' ('.implode(",", $allcountryname).')';
       
      }
       if($view->visa_id != ""){
       $visaid = explode(",",$view->visa_id);
       $allvisaname = array();
        for($j=0;$j<count($visaid);$j++){ 
             $visaidval = $this->setting_model->get_api_visaname_by_id($visaid[$j]);
            $allvisaname[] =  $visaidval->visaname->name;
         } 
        echo ' ('.implode(",", $allvisaname).')';

      }
   ?>
    <?php  

     if($view->visa_id != ""){ 
      //$visafee = $this->setting_model->get_api_servicecharge($view->visaserviceid);  
$visafee = $this->setting_model->get_api_servicecharge($view->visa_id,$view->intersted_country);  
      $service = explode("-",$visafee->visaservice->service_charge);
      $service = $service[0];
     }else{
      $service= "";
     }
     
   ?>
   </p>

            </td>
               <td><?= $view->mobile_no ?></td>
              
               <!--  <td><?= isset($view->expriry_type_name) && $view->expriry_type_name != "" ? $view->expriry_type_name :"-"; ?></td> -->
               <td><?= $view->follow_up_date != "0000-00-00" ? date('d-M-Y',strtotime($view->follow_up_date)) : ""; ?></td>
               <td><div class="tbl-action-wrap"> <a class="box-btn bg-transparent add_interview_click" data-bs-target="#add_interview" data-bs-toggle="modal" href="javascript:void(0)" value="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="Add Follow Up">
<img src="<?php echo base_url('assets/img/add.svg');  ?>" >
Add deadline</a></div></td>
       </tr>

    <?php  } ?>
 </tbody>
            </table>
</div>


<!-- Model For Show Interview -->
<div class="modal fade" id="add_interview">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="interview_form">
           <input type="hidden" name="record_id" id="record_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Set Interview Date</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

           <div class="modal-body">
              <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label"><b>Biometric Date</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control bio_matric_date" name="bio_matric_date" placeholder="MM/DD/YYYY" type="text">
                    </div>
                    <span class="bio_matric_date_error_msg text-red"></span>
                 </div>
              </div>
              <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label"><b>Interview Date</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control interview_date" name="interview_date" placeholder="MM/DD/YYYY" type="text">
                    </div>
                    <span class="interview_date_error_msg text-red"></span>
                 </div>
              </div>
              <div class="col-sm-12 col-md-12 input-inside">
                 <label class="form-label"><b>Description</b><span class="text-red">*</span></label>
                    <textarea class="form-control deadline_desc" name="deadline_desc" id="deadline_desc" placeholder="Description" ></textarea>
                    <span class="deadline_desc_error_msg text-red"></span>
              </div>
          </div>

          <div class="modal-footer">
           <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
           </button>

           <button class="box-btn fill_primary upload_file">Submit</button>
           <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
      if ($(".bio_matric_date").length > 0) {
   $('.bio_matric_date').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}
if ($(".interview_date").length > 0) {
   $('.interview_date').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}

      });
   $(document).on('click','.add_interview_click',function(){
   $(".interview_form")[0].reset();
   var record_id = $(this).attr('value');
   if ($(".bio_matric_date").length > 0) {
   $('.bio_matric_date').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}
if ($(".interview_date").length > 0) {
   $('.interview_date').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}
   $('form.interview_form #record_id').val(record_id);
});



/* Interview form submit */
$(document).on('submit','.interview_form',function(e){     
   e.preventDefault();
   var bio_matric_date = $('.bio_matric_date').val();
   var interview_date = $('.interview_date').val();
   var deadline_desc = $('textarea#deadline_desc').val();
   if(bio_matric_date == ""){
      $('.bio_matric_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.bio_matric_date_error_msg').text('');
   }
   if(interview_date == ""){
      $('.interview_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.interview_date_error_msg').text('');
   }
   if(deadline_desc == ""){
      $('.deadline_desc_error_msg').text('Please Enter Description');
      return false;
   }else{
      $('.deadline_desc_error_msg').text('');
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
            
            location.reload();
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
</script>