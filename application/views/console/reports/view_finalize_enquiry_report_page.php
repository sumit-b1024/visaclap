<table class="table table-bordered text-nowrap border-bottom" id="finalize_enquiry_report_pool">
  <thead>
     <tr>
        <th width="wd-15p border-bottom-0" style="width:10%">
           <label class="custom-control custom-checkbox-md">
            <input type="checkbox" class="custom-control-input" id="pool_finalize_th" name="example-checkbox1" value="option1" >
            <span class="custom-control-label"></span>
         </label>
      </th>
      <th class="wd-15p border-bottom-0" style="width:45%">Name</th>
      
      <th class="wd-15p border-bottom-0" style="width:10%">Mobile No</th>
      
      <th width="wd-15p border-bottom-0" style="width:10%"> Created </th> 
      <th class="wd-15p border-bottom-0" style="width:15%">Follow Up Date</th>
      <!-- <th class="wd-15p border-bottom-0" >Passport No</th>
      <th class="wd-15p border-bottom-0" >Valid From</th>
      <th class="wd-15p border-bottom-0" >Valid To</th> -->
      
      <!-- <th class="wd-15p border-bottom-0" >Pool Status</th> -->
      <th class="wd-15p border-bottom-0" style="width:10%">Action</th>
   </tr>
</thead>
<tbody>
   <?php
   $index = 1;
   if(!empty($fetch_enquiry_array)){
      foreach ($fetch_enquiry_array as $template)
      { //echo '<pre>'; print_r($template);
         ?>
         <tr>
            <td>
             <label class="custom-control custom-checkbox-md">
                <input type="checkbox" class="custom-control-input pool_finalize_td" name="process_check_box_td" id="pool_finalize_td" value="<?= $template->id; ?>" >
                <span class="custom-control-label"></span>
             </label>
          </td>
          <td>
         <div class="cell_content"><p>
          <?php
          $date = date('Y-m-d',strtotime($view->created_at));
          $startTimeStamp = strtotime($date);

          echo $template->name. '<span class="d-inine orange-text"> ('.$numberDays = $timeDiff/86400 . '  Days)</span>';
          if($this->session->userdata('user_role') == User_role::FRANCHISE && $template->staff_name != ""){
            echo '<span class="d-inine orange-text">('.$template->staff_name.')</span>';
         }
      ?>
   </p><p class="fonts11">
      <?php
                if(isset($template->enquiry_type_name) && $template->enquiry_type_name != ""){
         echo '('.$template->enquiry_type_name.")"; 
       }
       
              if($template->intersted_country != ""){
       $country = explode(",",$template->intersted_country);
       $allcountryname = array();
        for($i=0;$i<count($country);$i++){ //echo $country[$i]; exit;
           $from = $this->setting_model->get_api_country_by_id($country[$i]);
           $allcountryname[] = $from->countrydata[0]->name;
         } 
         echo ' ('.implode(",", $allcountryname).')';
       
      }
       if($template->visa_id != ""){
             $visaid = explode(",",$template->visa_id);
             $allvisaname = array();
              for($j=0;$j<count($visaid);$j++){ 
                   $visaidval = $this->setting_model->get_api_visaname_by_id($visaid[$j]);
                  $allvisaname[] =  $visaidval->visaname->name;
               } 
              echo ' ('.implode("<br/>", $allvisaname).')';
            }
            if($template->visa_id != ""){ 
         
       $visafee = $this->setting_model->get_api_servicecharge($template->visa_id,$template->intersted_country);  
       $service = explode("-",$visafee->visaservice->service_charge);
       $service = $service[0];
        }else{
         $service= "";
        }
                ?>
               </p>
               <div class="type-actions">
      <!-- <button type="button" class="btn btn-default btn-sm change_pool_status" pool_record_id="<?= $template->id; ?>"  value="2" style="margin-top: -4px;height: 24px;background-color: white !important;width: 90px;color: black;border-color: white;margin-left: -23px;"><b><u>Drop Pool</u></b></button> -->
     
      <?php if($template->enquiry_type_id == "32"){ ?>
               <button type="button" class="new_change_process_pool_status" data-service="<?= $service; ?>"   pool_record_id="<?= $template->id; ?>"  value="1" >Process Pool</button>
            <?php } else { ?>
               <button type="button" class="change_process_pool_status"   pool_record_id="<?= $template->id; ?>"  value="1" >Process Pool</button>
            <?php } ?>
      </div>
     </div>
   </td>
   <td><?= $template->mobile_no; ?></td>
   
  <td><?= date('d-M-Y',strtotime($template->created_at)); ?></td>
   <td><?= date('d-M-Y',strtotime($template->follow_up_date)); ?></td>
   <!-- <td><?= isset($template->passport_no) && $template->passport_no != "" ? $template->passport_no :"-"; ?></td>
   <td><?= !is_null($template->p_valid_from) ? date('d-M-Y',strtotime($template->p_valid_from)) : "-"; ?></td>
   <td><?= !is_null($template->p_valid_to) ? date('d-M-Y',strtotime($template->p_valid_to)) : "-"; ?></td> -->
  
   <td><div class="tbl-action-wrap">
     <button type="button" class="single-action whatsapp open_whatsup_modal" value="<?= $template->id ?>"><img src="<?php echo base_url('assets/img/whatsapp.svg');  ?>" > </button> 
     <button type="button" class="single-action view mr-2" title="View" id="view_pool_des" value="<?= $template->id ?>">
        <img src="<?php echo base_url('assets/img/eye.svg');  ?>" >
     </button>
     <?php if($this->session->userdata('user_role') == User_role::FRANCHISE || $this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){  if($template->passing == "yes" &&  $template->mobile_no != "") { ?>
                  <a class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$template->mobile_no ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </a>
               <?php } if($template->emailpassing == "yes" &&  $template->email != ""){ ?>   
                   <a class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$template->email; ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </a>
            <?php } }  ?>
            <?php if($template->dtotal > 0){ ?>
            <button class="btn btn-success btn-sm get_enquirey_document" href="javascript:void(0)" value="<?= $template->id ?>" data-toggle="tooltip" data-placement="top" title="View Document"><i class="fa fa-file"></i></button>
         <?php } ?>
         </div>
  </td>
</tr>
<?php } } ?>
</tbody>
</table>

 <!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="visa_template_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="send_email_template_form">
            <div class="modal-header">
               <h6 class="modal-title"><b>Send Email</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body visa_data_number">
              
            
         </div>

         <div class="modal-footer">
           <div class="spinner-border text-primary email_spinner" style="display:none" role="status">
             <span class="sr-only">Loading...</span>
          </div>
          
          <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
       </div>
    </form>
 </div>
</div>
</div>
<!-- Model For Show enquiry document-->
<div class="modal fade bd-example-modal-lg" id="view_enquiry_document_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="">
            <input type="hidden" name="record_id" id="record_id">
            <div class="modal-header">
               <h6 class="modal-title"><b>View All Document</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body enquiry_document_body">
            </div>

            <div class="modal-footer">
               <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>

 <div class="card">


   <!-- Model For Show Follow Up -->
   <div class="modal fade bd-example-modal-lg" id="view_application_preview">
      <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content modal-content-demo">
            <form class="">
               <input type="hidden" name="record_id" id="record_id">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Application Visa</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>
               
               <div class="modal-body application_preview_div">
               </div>

               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">

$(document).on('click', '.get_visa_data', function () {
  var number  =  $(this).attr('value');
  $.ajax({
    type: 'POST',
    url: base_url + 'franchise/enquiry/view_all_visa_report',
    data:{'number' : number},
    success: function(result) {
      $('.visa_data_number').html("");
         // $('.follow_up_body').html("data");
         $('.visa_data_number').html(result);
         $('.visa_data_tbl').DataTable();
         $('#visa_template_model').modal('show');

         // $('#responsive-datatable').DataTable();
      }
   });

});


$(document).on('click', '.get_enquirey_document', function () {
  var id  =  $(this).attr('value');
  $.ajax({
    type: 'POST',
    url: base_url + 'franchise/enquiry/view_all_enquiry_document',
    data:{'id' : id},
    success: function(result) {
      $('.enquiry_document_body').html("");
         $('.enquiry_document_body').html(result);
         $('.enquiry_document_tbl').DataTable();
         $('#view_enquiry_document_model').modal('show');
      // $('#responsive-datatable').DataTable();
      }
   });

});


$(document).on('click','.view_application',function(){
            var group_id = $(this).data('id');
            $.ajax({
             type: 'POST',
             url: base_url + 'franchise/request/fetch_visaapplication_data_groupby',
             data:{'group_id' : group_id},

             success : function(data){
               $('.application_preview_div').html("");
               $('.application_preview_div').html(data);
               $('#view_application_preview').modal('toggle');
            }
         });
         });

  $(document).on('click', '.new_change_process_pool_status', function () {
   
   $('.pool_description').val('');

   var cpermission = '<?php echo $company_permission->company_permission ?>';

   var btn_val = $(this).val();
   var pool_record_id = $(this).attr('pool_record_id');
   var service = $(this).attr('data-service');
   if(service != ""){
      service = service;
   }else{
      service = "";
   }
   $('#btn_val').attr('value', btn_val);
   $('#pool_record_id').attr('value', record_id);
   var userwallet = $("#userwallet").val();

if(cpermission == 1){

   Swal.fire({
          title: 'Do you want to process this application or process by company?',
          showDenyButton: true,
          showCancelButton: true,
          denyButtonColor: '#3085d6',
          confirmButtonText: 'I will Process',
          denyButtonText: `Backend will process`,
        }).then((result) => {
         
          if (result.isConfirmed) {
            var pool_status = 1;
             $.ajax({
              url : base_url + 'franchise/enquiry/add_pool_staus_description',
              type : "POST",
              data : {btn_val,pool_record_id,pool_status},
              dataType: 'json',
              success : function(data){
                 if(data.status == 'success'){
                   window.location = continue_to;
                }else{
                   Swal.fire("Warning!", data.message, "warning");
                }
             }
          });

          } else if (result.isDenied) {
           
            if(parseInt(userwallet) >= parseInt(service)){ 
               var pool_status = 1;
                   $.ajax({
                    url : base_url + 'franchise/enquiry/service_charge_pull_status',
                    type : "POST",
                    data : {btn_val,pool_record_id,pool_status,service},
                    dataType: 'json',
                    success : function(data){
                       if(data.status == 'success'){
                         window.location = continue_to;
                      }else{
                         Swal.fire("Warning!", data.message, "warning");
                      }
                   }
                }); 
            }else{
                 e.preventDefault();
                Swal.fire('error!', "Please Check Your Balance", 'error');   
            }
          }
        })
  }else{
   Swal.fire({
          title: 'Do you want to process this application or process by company?',
          showDenyButton: false,
          showCancelButton: true,
          denyButtonColor: '#3085d6',
          confirmButtonText: 'I will Process',
          denyButtonText: `Backend will process`,
        }).then((result) => {
         
          if (result.isConfirmed) {
            var pool_status = 1;
             $.ajax({
              url : base_url + 'franchise/enquiry/add_pool_staus_description',
              type : "POST",
              data : {btn_val,pool_record_id,pool_status},
              dataType: 'json',
              success : function(data){
                 if(data.status == 'success'){
                   window.location = continue_to;
                }else{
                   Swal.fire("Warning!", data.message, "warning");
                }
             }
          });

          }
        })

  }
   
   var pool_status = 1;
   
});

   $(document).on('click', '.change_process_pool_status', function () { 
     var continue_to = base_url + 'franchise/enquiry/finalize_pool_data';
   $('.pool_description').val('');
   //$('#pool_status_modal').modal('hide');
   var btn_val = $(this).val();
   var pool_record_id = $(this).attr('pool_record_id');
   //alert($(this).val());
   $('#btn_val').attr('value', btn_val);
   $('#pool_record_id').attr('value', pool_record_id);
  
   //$('#pool_review_form').submit();
   //formdata = $('#pool_review_form').
   
   var pool_status = 1;
    $.ajax({
     url : base_url + 'franchise/enquiry/add_pool_staus_description',
     type : "POST",
     data : {btn_val,pool_record_id,pool_status},
     dataType: 'json',
     success : function(data){
        if(data.status == 'success'){
 
          window.location = continue_to;
      
       }else{
          Swal.fire("Warning!", data.message, "warning");
       }
    }
 });
});
</script>