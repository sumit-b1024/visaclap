<style>
   .cmn-blk {
    background-color: white;
}
</style>
<?php 

if($this->session->userdata('user_role') == User_role::FRANCHISE){
$walletuser =  $this->session->userdata('user_id');
}else if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
$walletuser =  $this->session->userdata('franchise_id');
}

$wallet =  $this->setting_model->get_wallet($walletuser);

 ?>
<input type="hidden" name="userwallet" id="userwallet" value="<?= ($wallet->balance) ?$wallet->balance :0; ?>">
 <h6 class="primary-title1 mb-0" style="    color: #575757;">Select Filter </h6><br>
          <form class="cmn-blk mb-4 enquiry_page_report">
            <div class="row" style="">
              <div class="col-sm-3 col-md-2 input-inside mb-1">
                <label for="" class="d-block">Follow Up Date</label>
                <div class="wd-200 mg-b-30">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                        </div><input class="form-control passport_date" id="follow_up_date" name="follow_up_date" placeholder="MM/DD/YYYY" type="text" readonly="readonly">
                    </div>
                </div>
              </div>

              <div class="col-sm-3 col-md-3 input-inside mb-1">
                <label for="" class="d-block">Interested Country</label>
               <select name="i_country[]"  id="i_country" data-placeholder="Intersted Country" class="i_country form-select">
                </select>
              </div>
              <div class="col-sm-3 col-md-3 input-inside mb-1">
                <label for="" class="d-block">Visa Type</label>
                <select class="city  visatype form-select select2"  id="visatype"  name="visatype[]" data-placeholder="Select Visa">
                    </select>
              </div>
              <div class="col-sm-2 col-md-2 input-inside">
                <label for="" class="d-block">Enquiry From</label>
                <div class="wd-200 mg-b-30">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                    </div><input class="form-control passport_date" id="enquiry_from" name="enquiry_from" placeholder="MM/DD/YYYY" type="text" readonly>
                </div>
            </div>
              </div>
              <div class="col-sm-2 col-md-2 input-inside">
                <label for="" class="d-block">Enquiry To</label>
                <div class="wd-200 mg-b-30">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                        </div><input class="form-control passport_date" id="enquiry_to" name="enquiry_to" placeholder="MM/DD/YYYY" type="text" readonly>
                    </div>
                </div>
              </div>
              <div class="col-sm-2 col-md-3 input-inside1">
                <label for="">Enquiry Type</label>
                <select class="enquiry_type select2-show-search form-select" name="enquiry_type">
                                 <option value="">Select Enquiry Type</option>
                                 <?php foreach ($get_enquiry_type as $key => $value) { ?>
                                    <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
                                <?php } ?>
                            </select>
              </div>
              <div class="col-sm-3 col-md-3 input-inside1">
                <label for="">Select Description</label>
                <select class="s_description form-select" name="s_description">
                        <option value="">Select Description</option>
                        <?php
                              foreach ($get_descriptions_of_admin as $key => $value) { ?>
                            <option value="<?php echo $value->meta_id ?>" <?= isset($enquiry) && $enquiry->s_description == $value->meta_id ? "selected" : set_value('s_description'); ?>><?php echo $value->name; ?></option>
                        <?php   } ?>
                </select>
              </div>
              <?php  if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
              <div class="col-sm-3 col-md-2 input-inside1">
                     <div class="form-group">
                        <label class="form-label ">Staff</label>
                        <select class="enquiry_staff_id select2-show-search form-select"  name="enquiry_staff_id" value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Staff">
                           <option value="">Select Staff</option>
                           <?php 
                           foreach ($get_all_staff_data as $key => $value) { ?>
                              <option value="<?= $value->user_id ?>" <?= isset($enquiry) && $enquiry->enquiry_staff_id == $value->user_id ? "selected" : ""; ?>><?= $value->first_name ?></option>
                           <?php    } ?>
                        </select>
                     </div>
                  </div>
               <?php } ?>
              <div class="col-sm-4 col-md-4 form-btns">
                
                <button class="box-btn fil_gray cancel-btn reset_btn" style="margin-top: 26px;">Reset</button>
                <button class="btn btn-primary spiner_btn loader_btn" type="button" disabled style="display:none">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
           </button>
                <button type="submit" class="box-btn fill_primary sub_btn" style="margin-top: 26px;">Submit</button>
              </div>
            </div>

          </form>
          <div style="float:left; width: 44%;" class="hr1"><hr/></div>
          <div style="float:right; width: 43%;" class="hr2"><hr/></div>&nbsp; Or Search With <br><br>
          <form class="cmn-blk mb-4 detail_search">
            <div class="rpt-filter-wrap">
              <div class="input-inside">
                <label for="" class="d-block">Name</label>
                <input class="form-control name" id="name" name="uname" placeholder="Name" type="text">
              </div>
              <div class="input-inside">
                <label for="" class="d-block">Email</label>
                <input class="form-control email" id="email" name="email" placeholder="Email" type="text">
              </div>
              <div class="input-inside">
                <label for="" class="d-block">Number</label>
                <input class="form-control number" id="number" name="number" placeholder="Number" type="text">
              </div>
              <div class="form-btns">
                <button type="button" class="box-btn fil_gray cancel-btn reset_btn_detail" style="">Reset</button>
                    <button class="btn btn-primary spiner_btn_detail"  type="button" disabled style="display: none;margin-top: 34px;">
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          Loading...
                      </button>
                  <button type="submit" class="box-btn fill_primary sub_btn_detail" style="">Submit</button>  
              </div>
            </div>
          </form>
          <hr>


  <div class="table_wrapper">
        <div class="table-responsive" id="view_enquiry_tbl">

        </div>
    
</div>


<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="add_batch_modal">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
   <form class="create_batch_form">
    <div class="modal-header">
        <h6 class="modal-title"><b>Create Batch</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="modal-body">
        <div class="col-sm-12 col-md-12 input-inside">
          <div class="form-group">
             <label class="form-label"><b>Batch Name</b><span class="text-red">*</span></label>
             <input type="text" class="form-control batch_name" id="batch_name" name="batch_name" placeholder="Enter Batch Name">
             <span class="check_box_empty_error text-small" style="color:red;"></span>
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

<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="email_template_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="send_email_template_form">
            <div class="modal-header">
               <h6 class="modal-title"><b>Send Email</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body follow_up_body">
              <div class="form-group input-inside ">
               <label class="form-label"><b>Select Template </b><span class="text-red">*</span></label>
               <select class="form-control email_template_id select2-show-search form-select mb-1" id="email_template_id" data-placeholder="Select Template" required>
                  <option value="">Select Template</option>
                  <?php foreach ($get_email_template_data as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->name ?></option>
                  <?php } ?>
               </select>
                <label class="form-label"><b> Itinerary </b><span class="text-red">*</span></label>
               <select class="form-control email_itinerary_name select2-show-search form-select" id="email_itinerary_name" style="width:100%;">
                  <option value="">Select Itinerary</option>
                  <?php foreach ($get_all_itenerary_names as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->i_name ?></option>
                  <?php } ?>
               </select>
               <span class="check_box_empty_error" style="color:red;"></span>
            </div>
            
         </div>

         <div class="modal-footer">
           <div class="spinner-border text-primary email_spinner" style="display:none" role="status">
             <span class="sr-only">Loading...</span>
          </div>
          <button type="submit" class="box-btn fill_primary email_send_btn">Submit</button>
          <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
       </div>
    </form>
 </div>
</div>
</div>
<!-- modal end -->

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

 <!-- modal start -->
 <div class="modal fade" id="pool_status_modal">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="pool_review_form" id="pool_review_form">

           <div class="modal-header">
              <h6 class="modal-title"><b>Pool Form</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

           <div class="modal-body">
            <input type="hidden" name="btn_val" id="btn_val">
            <input type="hidden" name="pool_record_id" id="pool_record_id">

            <div class="col-sm-12 col-md-12 pool_status_drop mb-1 ">
             <div class="form-group input-inside">
               <label class="form-label "><b>Pool Status</b></label>
               <select class="pool_status select2 form-select" name="pool_status" required>
                <option value="">Select Pool Status</option>
             </select>
          </div>
       </div>

       <div class="col-sm-12 col-md-12">
          <div class="form-group input-inside">
             <label class="form-label"><b>Description</b></label>
             <textarea class="form-control pool_description" name="pool_description"></textarea>
          </div>
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


<!-- Model For Show follow up -->
<div class="modal fade" id="add_followup">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="followup_form">
           <input type="hidden" name="record_id" id="record_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Set Follow up Date</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

           <div class="modal-body">
              <div class="col-sm-12 col-md-12 input-inside">
                 <label class="form-label"><b>Follow up</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control followup" name="followup" placeholder="MM/DD/YYYY" type="text">
                    </div>
                    <span class="followup_date_error_msg text-red"></span>
                 </div>
              </div>
          </div>

          <div class="modal-footer">
           <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
           </button>

           <button class="btn btn-primary upload_file">Submit</button>
           <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>


<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="whatsup_template_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="send_whatsup_template_form">
            <div class="modal-header">
               <h6 class="modal-title"><b>Whatsup Template</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <input type="hidden" class="w_template_user_id" id="w_template_user_id">
            <div class="modal-body input-inside">
               <label class="form-label"><b>Select Whatsup Template </b><span class="text-red">*</span></label>
               <select class="form-control w_template_id select2-show-search form-select" id="w_template_id" required style="width:100% !important;">
                  <option value="">Select Template</option>
                  <?php foreach ($get_whatsup_template_data as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->name ?></option>
                  <?php } ?>
               </select>
               <!-- <label class="form-label"><b> Itinerary </b><span class="text-red">*</span></label>
               <select class="form-control email_itinerary_name select2-show-search" id="email_itinerary_name" style="width:100%;">
                  <option value="">Select Itinerary</option>
                  <?php foreach ($get_all_itenerary_names as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->i_name ?></option>
                  <?php } ?>
               </select> -->
            </div>

            <div class="modal-footer">
             <div class="spinner-border text-primary whatsup_spinner" style="display:none" role="status">
              <span class="sr-only">Loading...</span>
           </div>
           <button type="submit" class="btn btn-primary whatsup_send_btn">Submit</button>
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

<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="view_follow_up_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="">
            <input type="hidden" name="record_id" id="record_id">
            <div class="modal-header">
               <h6 class="modal-title"><b>View All Follow  Up</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body follow_up_body">
            </div>

            <div class="modal-footer">
               <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>

</div>
</div>


<script
src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/> -->


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js" ></script> -->


<script type="text/javascript">
function get_all_country(){
    $.ajax({
       //url : api_url+"api/visacountry",
       url: base_url + 'franchise/request/getvisacountry',
       type:"GET",
       dataType:"json",
        mode: 'cors',
       success:function(data){
        
        if(data.code != 500){
            $('#i_country').append('<option value="">Select</option>');
          $.each(data.message, function (key, val) {
             $("#i_country").append('<option value="'+val.id+'">'+val.name+'</option>');
         });
           $('.enquiry_page_report .i_country ').select2({
                 dropdownParent: $('.enquiry_page_report'),
                 width: "100%"
              });
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}

$(document).on('click','.open_whatsup_modal',function(){
     var record_id = $(this).val();
     $('.w_template_user_id').attr('value',record_id);
     $('#whatsup_template_model').modal('show');
     $('.select2-show-search').select2({
        dropdownParent: $('#whatsup_template_model'),
        width: "100%"
     });

  });
$(document).on('click','.send_mail',function(){
     var record_id = $(this).val();
     $('#email_template_model').modal('show');
     $('#email_template_model .select2-show-search').select2({
        dropdownParent: $('#email_template_model'),
        width: "100%"
     });

  });


$(document).on('click','.add_interview_click',function(){
   $(".interview_form")[0].reset();
   var record_id = $(this).attr('value');
   $('form.interview_form #record_id').val(record_id);
});

$(document).on('click','.add_followup_click',function(){
   $(".followup_form")[0].reset();
   var record_id = $(this).attr('value');
   $('form.followup_form #record_id').val(record_id);
});


$(document).on('submit','.send_whatsup_template_form',function(e){
  e.preventDefault();
  var w_template_user_id = $('.w_template_user_id').val();
  var w_template_id = $('#w_template_id').val();
  $.ajax({
     url : base_url + 'franchise/enquiry/send_whats_up_description',
     type : "POST",
     data : {w_template_user_id,w_template_id},
     dataType: 'json',
     success : function(data){
        window.open( "https://wa.me/"+data.mobile_no+"/?text=" + data.content, '_blank'); 
     }
  });
});

$(document).on('click', '.get_follow_up', function () {
  var id  =  $(this).attr('value');
  $.ajax({
    type: 'POST',
    url: base_url + 'franchise/enquiry/view_all_followup_enquiry',
    data:{'id' : id},
    success: function(result) {
      $('.follow_up_body').html("");
         $('.follow_up_body').html(result);
         $('.today_follw_up_tbl').DataTable();
         $('#view_follow_up_model').modal('show');
      // $('#responsive-datatable').DataTable();
      }
   });

});

$(document).on('click', '.change_pool_status', function () {
   $('.pool_description').val('');
   $('#pool_status_modal').modal('show');
   var btn_val = $(this).val();
   var record_id = $(this).attr('pool_record_id');
   //alert($(this).val());
   $('#btn_val').attr('value', btn_val);
   $('#pool_record_id').attr('value', record_id);
   // console.log(btn_val);
   $.ajax({
      url : base_url + 'franchise/enquiry/get_pool_status_change',
      type : "POST",
      data : {btn_val},
      dataType :'json',
      success : function(result){
         
         $('.pool_status').empty();
     $('.pool_status').append('<option value="">Select Pool Status</option>');

     $.each(result,function(index,data){
      $('.pool_status').append('<option value="'+data['id']+'">'+data['pool_status_info']+'</option>');
    });
      }

   });

});


/* Follow form submit */
$(document).on('submit','.followup_form',function(e){     
   e.preventDefault();
   var foll_matric_date = $('.followup').val();
   if(foll_matric_date == ""){
      $('.followup_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.followup_date_error_msg').text('');
   }
   
   $.ajax({
      url : base_url + 'franchise/enquiry/add_followup_date',
      type : "POST",
      data : $(this).serializeArray(),
      dataType: 'json',
      success : function(data){
         if(data.status == 'success'){
            $(".followup_form")[0].reset();
            $('#add_followup').modal('toggle');
            //get_all_today_follow_up_data();
           // get_all_yesterday_follow_up_data();
            //get_all_missed_follow_up_data();
            location.reload();
            /*Swal.fire("Success!", data.message, "success").then(function(){
               // location.reload();
            });*/
         }else if(data.status == "date_error"){
          $('.followup_date_error_msg').text(data.message);
       }else{
         Swal.fire("Warning!", data.message, "warning");
      }
   }
});
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
            get_all_today_follow_up_data();
            get_all_yesterday_follow_up_data();
            get_all_missed_follow_up_data();
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

    var status = "";

  $("#number").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/reports/get_auto_supplier_by_number',
        data: {"term" : request.term,"status" : status},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['mobile_no'],
                  };
               }));

            }
         }
      });
    },
   
           });

   $("#email").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/reports/get_auto_supplier_by_email',
        data: {"term" : request.term,"status" : status},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['email'],
                  };
               }));

            }
         }
      });
    },
   
           });

   $("#name").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/reports/get_auto_supplier_by_name',
        data: {"term" : request.term,"status" : status},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['name'],
                  };
               }));

            }
         }
      });
    },
   
           });



  $(document).on('submit','.send_email_template_form',function(e){
    e.preventDefault();

    var sub_array = []
    $("input:checkbox[name=process_check_box_td]:checked").each(function(){
     sub_array.push($(this).val());
  });

    if($.isEmptyObject(sub_array)) { 
      $('.check_box_empty_error').text("Please Select Atleast One Record To Send Mail.");
      return false;
   }

   var email_template_id = $('#email_template_id').val();
   $.ajax({
      url : base_url + 'franchise/enquiry/send_bulk_email',
      type : "POST",
      data : {sub_array,email_template_id},
      dataType: 'json',
      beforeSend: function( jqXHR ) {
       $('.email_send_btn').attr('disabled','disabled');
       $('.email_spinner').removeAttr('style');
       $('.email_send_btn').attr('style','display:none');
    },
    success : function(data){
       $('.email_send_btn').removeAttr('disabled','disabled');
       $('.email_spinner').attr('style','display:none');
       $('.email_send_btn').removeAttr('style','display:none');

       if(data.status == 'success'){
        /* Swal.fire("Success!", data.message, "success").then(function(){
           location.reload();
        });*/
         location.reload();
         $('#email_template_model').html("");
         $('#email_template_model').modal('toggle');
         $(".email_send_btn").html(
           );
      }
      else if(data.status == "cred_non_added"){
         $('#email_template_model').modal('toggle');
         Swal.fire("Warning!", data.message, "warning");
      }
      else{
         Swal.fire("Warning!", data.message, "warning");
      }
   }
});

});

  $(document).on('click', '.new_change_process_pool_status', function (e) {
    
   $('.pool_description').val('');
   var cpermission = '<?php echo $company_permission->company_permission ?>';

   var btn_val = $(this).val();
   var pool_record_id = $(this).attr('pool_record_id');
   var service = $(this).attr('data-service');
   if(service != ""){
      service = service;
   }else{
       service = "";
      Swal.fire("Warning!", 'Service Fees Not define', "warning");
      return;
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
     var continue_to = base_url + 'franchise/reports';
   $('.pool_description').val('');
   //$('#pool_status_modal').modal('hide');
   var btn_val = $(this).val();
   var pool_record_id = $(this).attr('pool_record_id');
   //alert($(this).val());
   $('#btn_val').attr('value', btn_val);
   $('#pool_record_id').attr('value', record_id);
  
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
          //$('#pool_status_modal').modal('toggle');
          window.location = continue_to;
          /*Swal.fire("Success!", data.message, "success").then(function(){
           if(data.pool_status=="1"){
            var p_status =  "warning";
         }else if(data.pool_status=="2"){
            var p_status =  "success";
         }else{
            var p_status =  "danger";
         } 
         $('#pool_chane_i'+pool_record_id).attr('class','btn btn-'+p_status+' btn-sm');
         get_process_pool_data();
         get_all_today_follow_up_data();
         get_all_yesterday_follow_up_data();
         get_all_missed_follow_up_data();
      });*/
       }else{
          Swal.fire("Warning!", data.message, "warning");
       }
    }
 });
});
    $(document).ready(function(){

get_all_country();

//var selectc = $('#i_country').select2();
var selectc = $('#i_country');

selectc.on('select2:open', () => {
        //document.querySelector('.select2-search__field').focus();
        selectc.data('select2').$container.addClass('select2-container--open');
    })




$(document).on('submit','.pool_review_form',function(e){
    var continue_to = base_url + 'franchise/reports';
   e.preventDefault();
   var pool_record_id = $('#pool_record_id').val();
   $.ajax({
     url : base_url + 'franchise/enquiry/add_pool_staus_description',
     type : "POST",
     data : $(this).serializeArray(),
     dataType: 'json',
     success : function(data){
        if(data.status == 'success'){
          $('#pool_status_modal').modal('toggle');
          window.location = continue_to;
          /*Swal.fire("Success!", data.message, "success").then(function(){
           if(data.pool_status=="1"){
            var p_status =  "warning";
         }else if(data.pool_status=="2"){
            var p_status =  "success";
         }else{
            var p_status =  "danger";
         } 
         $('#pool_chane_i'+pool_record_id).attr('class','btn btn-'+p_status+' btn-sm');
         get_process_pool_data();
         get_all_today_follow_up_data();
         get_all_yesterday_follow_up_data();
         get_all_missed_follow_up_data();
      });*/
       }else{
          Swal.fire("Warning!", data.message, "warning");
       }
    }
 });

});
    
get_enquiry_report_data();
if ($(".bio_matric_date").length > 0) {
   $('.bio_matric_date').datepicker({
      minDate:new Date(),
      
      selectOtherMonths: true,
   });
}
if ($(".interview_date").length > 0) {
   $('.interview_date').datepicker({
      minDate:new Date(),
      
      selectOtherMonths: true,
   });
}

if ($(".followup").length > 0) {
   $('.followup').datepicker({
      minDate:new Date(),
      
      selectOtherMonths: true,
   });
}

//$('select').select2({ width: '100%',  allowClear: false });


 $('.passport_date').datepicker({
    
    selectOtherMonths: true,
});

 $(document).on('change','#report_check_box_th',function(){
     var array = [];
     if($(this).is(':checked')) {
       $('.enquiry_reports_tbl tbody tr td input[type="checkbox"]').each(function(){
          $(this).prop('checked', true);
      });
   } else {
    $('.enquiry_reports_tbl tbody tr td input[type="checkbox"]').each(function(){
      $(this).prop('checked', false);
  });
}
}); 



/* get visa type name */
    $('.i_country').on('change',function(){
        console.log('111');
        var destination = $(this).val();  
        // if(destination){
            $.ajax({
                type:"POST",
                //url: base_url + "franchise/reports/get_all_visa_by_multi_country_id",
                url: base_url + "franchise/reports/get_all_visa_by_country_id",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(data){
                     
                    if(data.status != "false"){
                    if(data){
                        $(".visatype").empty();
                        $(".visatype").append('<option value="">Select Visa</option>');
                        //alert(data.message[0].type_of_visa);
                        $.each(data.message,function(key,value){

                            
                            $(".visatype").append('<option value="'+data.message[key].visa_type_id+'">'+data.message[key].type_of_visa+'</option>');
                        });
                    }else{
                        $(".visatype").empty();
                    }
                    }else{
                        $(".visatype").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });
 /*$('.i_country').on('change',function(){
   console.log('111');
   var destination = $(this).val();  

        // if(destination){
            $.ajax({
                type:"POST",
                url: base_url + "franchise/reports/get_all_cities_by_country_id",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(data){
                    // data = $.parseJSON(res);     
                    if(data){
                        $("#city").empty();
                        $("#city").append('<option>Select City</option>');
                        $.each(data,function(key,value){
                            $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                        $('#city').select2({
                          placeholder: 'Select City'
                      });
                        
                    }else{
                        $("#city").empty();
                        $('#city').select2({
                          placeholder: 'Select City'
                      });
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }

    });*/

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

 $(document).on('click','.create_batch_btn',function(e){
    e.preventDefault();
    $('#add_batch_modal').modal('toggle');
});
 $(document).on('submit','.create_batch_form',function(e){
    e.preventDefault();

    var batch_name = $('#batch_name').val();
    var sub_array = []
    $("input:checkbox[name=process_check_box_td]:checked").each(function(){
     sub_array.push($(this).val());
 });
    if($.isEmptyObject(sub_array)) {
     $('.create_batch_form .check_box_empty_error').text("Please select atleast one enquiry to create batch.");
     return false;
 }
 if(batch_name == ""){
   $('.create_batch_form .check_box_empty_error').text("Please enter batch name.");
   return false;
}
$.ajax({
    url : base_url+'franchise/reports/create_batch_of_enquiry',
    type : "POST",
    data : {sub_array,batch_name},
    dataType : 'JSON',
    success :function(data){
        if(data.status == "success"){
            $('#add_batch_modal').modal('toggle');
            get_enquiry_report_data();  
        }else{
            $('.check_box_empty_error').text(data.message);
        }
    }
});
});

 $(document).on('submit', '.enquiry_page_report',function(e){
    e.preventDefault();
    $('.detail_search')[0].reset();
    get_enquiry_report_data();
});

 $(document).on('submit', '.detail_search',function(e){
    e.preventDefault();
    
    $(".enquiry_type").val('').trigger('change')
    $(".s_description").val('').trigger('change')
    $('.passport_date').val(null).trigger("change");
    $('.enquiry_page_report')[0].reset();
    get_enquiry_detail_data();
  });

 function get_enquiry_detail_data(){

    $('.sub_btn_detail').attr('disabled', 'disabled');
    $('.spiner_btn_detail').removeAttr('style', 'display: none');
    $('.spiner_btn_detail').attr('style', 'margin-top: 0px');
    $('.sub_btn_detail').attr('style', 'display: none');

    $.ajax({
        url : base_url+'franchise/reports/generate_enquiry_detail_report',
        type : "POST",
        data : $('.detail_search').serializeArray(),
        success :function(data){
            $('.sub_btn_detail').removeAttr('disabled', 'disabled');
            $('.spiner_btn_detail').attr('style', 'display: none');
            $('.sub_btn_detail').removeAttr('style', 'display: none');
            $('.sub_btn_detail').attr('style', 'margin-top: 0px');
            $('#view_enquiry_tbl').html("");
            $('#view_enquiry_tbl').html(data);
                //$('#responsive-datatable').DataTable();
                $('#responsive-datatable').DataTable({});
            }
        });
}


 function get_enquiry_report_data(){


    $('.sub_btn').attr('disabled', 'disabled');
    $('.spiner_btn').removeAttr('style', 'display: none');
    $('.spiner_btn').attr('style', 'margin-top: 0px');
    $('.sub_btn').attr('style', 'display: none');

    $.ajax({
        url : base_url+'franchise/reports/generate_enquiry_report',
        type : "POST",
        data : $('.enquiry_page_report').serializeArray(),
        success :function(data){
            $('.sub_btn').removeAttr('disabled', 'disabled');
            $('.spiner_btn').attr('style', 'display: none');
            $('.sub_btn').removeAttr('style', 'display: none');
            $('.sub_btn').attr('style', 'margin-top: 0px');
            $('#view_enquiry_tbl').html("");
            $('#view_enquiry_tbl').html(data);
                //$('#responsive-datatable').DataTable();
                $('#responsive-datatable').DataTable({});
            }
        });
}

$(document).on('click', '.reset_btn',function(e){
    $('.enquiry_page_report')[0].reset();
    $('.language').val(null).trigger("change");
    $('.s_description').val(null).trigger("change");
    $('.enquiry_type').val(null).trigger("change");
    $('.s_description').val(null).trigger("change");
    $('.i_country').val(null).trigger("change");
    $('.city').trigger("change");
    $('.name').val(null).trigger("change");
    $('.email').val(null).trigger("change");
    $('.number').val(null).trigger("change");
    get_enquiry_report_data();
});

$(document).on('click', '.reset_btn_detail',function(e){ 
    $('.detail_search')[0].reset();
   get_enquiry_detail_data(); 
});




});
</script>