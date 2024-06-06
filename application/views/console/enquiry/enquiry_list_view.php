<?php echo add_edit_form_part(); ?>
<!-- BASIC MODAL For Add Follow Up -->
<style type="text/css">
   .t_loader, .m_loader, .y_loader, .loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid blue;
    border-right: 16px solid green;
    border-bottom: 16px solid red;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
 }
 .alert {
  background-color: #337CFF;
  color: white;
  padding: 9px 13px;
  border: none;
}
.cusbanner{margin: 0 auto;width: auto;}

</style>
<?php 
/*echo '<pre>'; 
print_r($this->session->userdata());
exit;*/
$wallet =  $this->setting_model->get_wallet($this->session->userdata('user_id'));

 ?>
<input type="hidden" name="userwallet" id="userwallet" value="<?= ($wallet->balance) ? $wallet->balance :0; ?>">
<!-- follow uo form -->
<div class="modal fade" id="enquiry_model">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="follow_up_form">
           <input type="hidden" name="record_id" id="record_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Follow Up Form</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

           <div class="modal-body">
              <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label">Follow Up Date<span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control enquiry_date" name="enquiry_date" placeholder="MM/DD/YYYY" type="text" readonly>
                    </div>
                    <span class="enquiry_date_error_msg text-red"></span>
                 </div>
              </div>

              <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label">Follow Up Time </label>
                 <div class="wd-150 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                       </div>
                       <!-- input-group-text -->
                       <input  class="form-control follow_up_time" id="follow_up_time"  placeholder="Set time" name="follow_up_time" type="time" >
                    </div>
                    <span class="f_date_error text-red"></span>

                 </div>
              </div>

              <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label">Select Status </label>
                 <select class="form-select" name="enquiry_status" id="enquiry_status" data-placeholder="Choose Status" style="width: 100% !important;">
                    <option value="">Select Status</option>
                    <?php foreach ($get_all_enquiry_status as $key => $enc_status) { ?>
                       <option value="<?= $enc_status->meta_id ?>"><?= $enc_status->name; ?></option>
                    <?php  } ?>
                 </select>
                 <span class="e_error text-red"></span>
              </div>

              <div class="col-sm-12 col-md-12 input-inside mb-1">
                <div class="form-group">
                   <label class="form-label ">Description</label>
                   <textarea class="form-control e_description" name="e_description"></textarea>
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
<!-- End follow up form -->
<!-- Model For Show Interview -->
<div class="modal fade" id="add_interview">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="interview_form">
           <input type="hidden" name="record_id" id="record_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Set Interview Date</b></h6>
              <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
           </div>

           <div class="modal-body">
              <div class="col-sm-12 col-md-12 input-inside mb-1">
                 <label class="form-label"><b>Biometric Date</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control bio_matric_date" name="bio_matric_date" placeholder="MM/DD/YYYY" type="text" readonly>
                    </div>
                    <span class="bio_matric_date_error_msg text-red"></span>
                 </div>
              </div>
              <div class="col-sm-12 col-md-12 input-inside">
                 <label class="form-label"><b>Interview Date</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control interview_date" name="interview_date" placeholder="MM/DD/YYYY" type="text" readonly>
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
               <select class="w_template_id form-select mb-1" id="w_template_id" required style="width:100% !important;">
                  <option value="">Select Template</option>
                  <?php foreach ($get_whatsup_template_data as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->name ?></option>
                  <?php } ?>
               </select>
               <label class="form-label"><b> Itinerary </b><span class="text-red">*</span></label>
               <select class="email_itinerary_name form-select" id="email_itinerary_name" style="width:100%;">
                  <option value="">Select Itinerary</option>
                  <?php foreach ($get_all_itenerary_names as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->i_name ?></option>
                  <?php } ?>
               </select>
            </div>

            <div class="modal-footer">
             <div class="spinner-border text-primary whatsup_spinner" style="display:none" role="status">
              <span class="sr-only">Loading...</span>
           </div>
           <button type="submit" class="box-btn fill_primary whatsup_send_btn">Submit</button>
           <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>

<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="view_notification_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
            <div class="modal-header">
               <h6 class="modal-title"><b> Notification</b></h6>
            </div>
            <form class="readnotification">
            <div class="modal-body">
                  <div class="table-responsive" id="notification_div">
                  </div>
            </div>
 
            <div class="modal-footer">
               <button type="submit"  class="btn btn-primary readnoti">Yes Read</button>
               <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
      </div>
   </div>
</div>

<div class="container-fluid px-3 px-md-4">
  <div class="row text-center">
    <div class="col-lg-12 text-center" style="font-size:12px;"><b>Missed the advertisement? Refresh the page for <?=$get_offer_count[0]->total?></b></div>
    <!-- <p style="text-align: center;"><span style="position: absolute; margin-top: 34px;margin-left: -93px;">Advertisement Here</span></p> -->
    <a class="cusbanner" href="<?=$get_offer->link?>" target="_blank"><?php if($get_offer->image) { ?><image src="<?php echo base_url().$get_offer->image ?>" lass="img-fluid" style="width: 100%" /><?php }?></a>
  </div>

  <div class="enquiry-wrap">
    <h2 class="primary-title mb-0">Enquiries</h2>
    <div class="enquiry-right-zone d-flex align-items-center justify-content-center justify-content-md-end">
      <div class="dropdown">
        <button class="box-btn sort-btn bg-transparent" data-bs-toggle="dropdown">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.25 5.25H15.75" stroke="#787878" stroke-width="1.5" stroke-linecap="round" />
            <path d="M4.5 9H13.5" stroke="#787878" stroke-width="1.5" stroke-linecap="round" />
            <path d="M7.5 12.75H10.5" stroke="#787878" stroke-width="1.5" stroke-linecap="round" />
          </svg>
          Filter
        </button>
        <div class="dropdown-menu border-0 filter-dropdown">
            <form class="pool_page_report">
            <div class="input-inside1">
              <label for="" class="d-block">Select Enquiry Type</label>
              <select name="enquiry_type" class="form-select enquiry_type">
                <option value="">Select Enquiry</option>
                <?php foreach ($get_enquiry_type as $key => $value) { ?>
                    <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
                 <?php } ?>
              </select>
            </div>
            <div class="input-inside1">
              <label for="" class="d-block">Select Staff</label>
              <select name="" class="form-select">
                <option value="">Choose Staff</option>
                <?php 
                  foreach ($get_all_staff as $key => $value) { ?>
                     <option value="<?= $value->user_id ?>" <?= isset($enquiry) && $enquiry->enquiry_staff_id == $value->user_id ? "selected" : ""; ?>><?= $value->first_name ?></option>
                  <?php    } ?>
              </select>
            </div>

            <div class="twin-grid">
             <!--  <button type="submit" class="box-btn fill_primary m-0">
                Apply
              </button> -->
              <button type="button" class="box-btn fil_gray m-0 reset_btn">Reset</button>
               
            </div>
          </form>
        </div>
      </div>
     <!--  <button class="box-btn fill_primary" data-bs-toggle="modal" data-bs-target="#enquery">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.5 9H13.5" stroke="white" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
          <path d="M9 13.5V4.5" stroke="white" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
        </svg>
        Add Enquiry
      </button> -->
        <a href="javascript:void(0)" class="btn box-btn fill_primary pull-right open_my_form_form" data-control="enquiry" data-mathod="add"><i class="fa fa-plus"></i>
              Add Enquiry
            </a> 
    </div>
  </div>

  <ul class="nav nav-pills subpage_menu d-flex align-items-center flex-wrap">
    <li>
      <button class="px-0 py-1 my-1 active" data-bs-toggle="pill" data-bs-target="#proce-pool" type="button" role="tab">Process Pool<span
        class="process-count d-inline-block procecount"><?=pull_record_count('process_pool')?></span></button>
      </li>
      <li><button class="px-0 py-1 my-1" data-bs-toggle="pill" data-bs-target="#today-follow" type="button" role="tab">Today Follow Up<span
        class="process-count d-inline-block procecount"><?=pull_record_count('today_follow') ?></span></button></li>
      <li>
        <button class="px-0 py-1 my-1" data-bs-toggle="pill" data-bs-target="#yesterday-follow" type="button" role="tab">Yesterday Follow Up<span
        class="process-count d-inline-block procecount"><?=pull_record_count('yesterday_follow') ?></span></button>
      </li>
      <li>
        <button class="px-0 py-1 my-1" data-bs-toggle="pill" data-bs-target="#missed-follow" type="button" role="tab">Missed Follow Up
          <span class="process-count d-inline-block missedcount"><?=pull_record_count('missed_follow') ?></span></button>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="proce-pool">
            <center><div class="loader"></div></center>
            <div class="table-responsive" id="process_pool_div"></div>
        </div>
        <div class="tab-pane fade show" id="today-follow">
          <center><div class="t_loader"></div></center>
            <div class="table-responsive" id="today_follow_up_div"></div>
        </div>
        <div class="tab-pane fade show" id="yesterday-follow">
            <center><div class="y_loader"></div></center>
             <div class="table-responsive" id="yesterday_follow_up_div"></div>
        </div>
        <div class="tab-pane fade show" id="missed-follow">
          <center><div class="m_loader"></div></center>
             <div class="table-responsive" id="missed_follow_up_div"></div>
        </div>
      </div>
</div>
      
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

<!-- Pool Form -->
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

            <div class="col-sm-12 col-md-12 pool_status_drop input-inside">
             <div class="form-group input-inside mb-1">
               <label class="form-label "><b>Pool Status</b></label>
               <select class="form-select pool_status" name="pool_status" required>
                <option value="">Select Pool Status</option>
             </select>
          </div>
       </div>

       <div class="col-sm-12 col-md-12 input-inside">
          <div class="form-group input-inside mb-1">
             <label class="form-label "><b>Description</b></label>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>



  $(document).on('click','.open_whatsup_modal',function(){
     var record_id = $(this).val();
     $('.w_template_user_id').attr('value',record_id);
     $('#whatsup_template_model').modal('show');
     $('.select2-show-search').select2({
        dropdownParent: $('#whatsup_template_model'),
        width: "100%"
     });

  });

    $(document).on('click','.nav-pills li button',function(){
      var panelshow = $(this).attr('data-bs-target');

       var shod =  panelshow.replace('#', '');
      if(shod == 'today-follow'){
         $('#today-follow').html();
         get_all_today_follow_up_data();
      }else if(shod == 'yesterday-follow'){
         $('#yesterday-follow').html();
         get_all_yesterday_follow_up_data();
      }else if(shod == 'missed-follow'){
         $('#missed-follow').html();
         get_all_missed_follow_up_data();
      }else if(shod == 'proce-pool'){
         $('#proce-pool').html();
         get_process_pool_data();
      }

   });

  

   $(document).on('click','.send_mail',function(){
     var record_id = $(this).val();
     $('#email_template_model').modal('show');
     $('.select2-show-search').select2({
        dropdownParent: $('#email_template_model'),
        width: "100%"
     });

  });


  function get_interview_process_pool_data(start,end){
   var startdate = start;
   var enddate = end;
   var enquiry_type = $('.enquiry_type').val();
   var staff_id = $('.staff_id').val();
   
   $.ajax({
      url : base_url + 'franchise/enquiry/fetch_date_process_pool_data',
      type : "POST",
      data : {startdate,enddate,enquiry_type,staff_id},
      beforeSend: function(){
       $(".loader").show();
    },
    success : function(data){
       $(".loader").hide();
       $('#process_pool_div').html("");
       $('#process_pool_div').html(data);
       $('#responsive_process_pool').DataTable();
    }
 });
}


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

  function get_process_pool_data(){

   var enquiry_type = $('.enquiry_type').val();
   var staff_id = $('.staff_id').val();
   $('.open_my_form_form').addClass('disabled');

   $.ajax({
      url : base_url + 'franchise/enquiry/fetch_process_pool_data',
      type : "POST",
      data : {enquiry_type,staff_id},
      beforeSend: function(){
       $(".loader").show();
    },
    success : function(data){
       $(".loader").hide();
       $('#process_pool_div').html("");
       $('#process_pool_div').html(data);
       $('#responsive_process_pool').DataTable();
       $('.open_my_form_form').removeClass('disabled');
    }
 });
}

function get_all_notification(){

   $.ajax({
      url : base_url + 'notification/fetch_today_notification',
      type : "POST",
      data : "",
      beforeSend: function(){
       $(".loader").show();
    },
    success : function(data){
      console.log(data);
      if(data == 'empty'){ 

      }else{
         
          $("#view_notification_model").modal('show');
          $(".loader").hide();
          $('#notification_div').html("");
          $('#notification_div').html(data);
          $('#notification_data').DataTable();
     }  
    }
 });
}

function get_all_today_follow_up_data(){
   var enquiry_type = $('.enquiry_type').val();
   var staff_id = $('.staff_id').val();
   $('.open_my_form_form').addClass('disabled');
//alert(enquiry_type);
   $.ajax({
      url : base_url + 'franchise/enquiry/get_all_today_follow_up_data',
      type : "POST",
      data : {enquiry_type,staff_id},  
      beforeSend: function(){
       $(".t_loader").show();
    },
    success : function(data){
     $(".t_loader").hide();
     $('#today_follow_up_div').html("");
     $('#today_follow_up_div').html(data);
     $('#responsive_datatable_today').DataTable(); 
     $('.open_my_form_form').removeClass('disabled');

  }
});

}
function get_all_yesterday_follow_up_data(){
   var enquiry_type = $('.enquiry_type').val();
   var staff_id = $('.staff_id').val();
   $('.open_my_form_form').addClass('disabled');

   $.ajax({
      url : base_url + 'franchise/enquiry/get_all_yesterday_follow_up_data',
      type : "POST",
      data : {enquiry_type,staff_id},  
      beforeSend: function(){
       $(".y_loader").show();
    },
    success : function(data){
       $(".y_loader").hide();
       $('#yesterday_follow_up_div').html("");
       $('#yesterday_follow_up_div').html(data);
       $('#responsive_datatable_yesterday').DataTable();
       $('.open_my_form_form').removeClass('disabled');
    }
 });
}

function get_all_missed_follow_up_data(){
   var enquiry_type = $('.enquiry_type').val();
   var staff_id = $('.staff_id').val();
   

   $.ajax({
      url : base_url + 'franchise/enquiry/get_all_missed_follow_up_data',
      type : "POST",
      data : {enquiry_type,staff_id},  
      beforeSend: function(){
       $(".m_loader").show();
       $('.open_my_form_form').addClass('disabled');
    },
    success : function(data){

       $(".m_loader").hide();
       $('#missed_follow_up_div').html("");
       $('#missed_follow_up_div').html(data);
       $('#responsive_datatable_missed').DataTable();
      $('.open_my_form_form').removeClass('disabled');
    }
 });
}

$(document).ready(function() {
 get_process_pool_data();
 //get_all_today_follow_up_data();
 //get_all_yesterday_follow_up_data();
 //get_all_missed_follow_up_data();
 get_all_notification();

 var continue_to = base_url + 'franchise/enquiry';

 $(document).on('submit','.pool_review_form',function(e){
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

 $(document).on('change','.enquiry_type, .staff_id',function(){

   get_process_pool_data();
   get_all_today_follow_up_data();
   get_all_yesterday_follow_up_data();
   get_all_missed_follow_up_data();
});

 $(document).on('click', '.reset_btn',function(e){
    $('.enquiry_type').val(null).trigger("change");
    $('.staff_id').val(null).trigger("change");
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

 $(document).on('submit','.readnotification',function(e){
  e.preventDefault();
  
  var noteid = $("input[name='noteid[]']")
              .map(function(){return $(this).val();}).get();
  $.ajax({
     url : base_url + 'notification/read_notification',
     type : "POST",
     data : {noteid},
     dataType: 'json',
     success : function(data){
        if(data.status == 'success'){
        $("#view_notification_model").modal('hide');
     }
     }
  });
});

 $(document).on('change','#display_date_filter',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.display_date_field').removeAttr('style','display:none');
  } else {
     $('.display_date_field').attr('style','display:none');
  }
});


 $(document).on('change','#main_enquiry_checkbox',function(){
   var array = []
   $("input:checkbox[name=main_enquiry_checkbox]:checked").each(function(){
    array.push($(this).val());
 });
});

 $(document).on('change','#header_box',function(){
  var array = []
  $("input:checkbox[name=main_enquiry_checkbox]:checked").each(function(){
    array.push($(this).val());
 });
});
 $(document).on('change','#process_check_box_th',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.process_pool_send_mail').removeAttr('style','display:none');
  } else {
     $('.process_pool_send_mail').attr('style','display:none');
  }
});
 $(document).on('change','#process_check_box_td',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.process_pool_send_mail').removeAttr('style','display:none');
  } else {
     $('.process_pool_send_mail').attr('style','display:none');
  }
});

 $(document).on('change','#process_check_box_th',function(){
   if($(this).prop('checked')){
      $('#responsive_process_pool tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#responsive_process_pool tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});
 $(document).on('change','#missed_check_box_th',function(){
   if($(this).prop('checked')){
      $('#responsive_datatable_missed tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#responsive_datatable_missed tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});




$(document).on('click','.send_enquiry_link',function(e){

   var visaid = $(this).data('visaid');
   var to_country = $(this).data('dest');
   var phone = $(this).data('phone');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't Send this enquiry",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Send it!'
        }).then(function (result) {

            if (result.value)
            {
               
                $.ajax({
                    type: 'POST',
                    url: base_url + "franchise/request/send_watsapp_of_enquiry",
                    data:{'phone' : phone,'to_country' : to_country, 'visaid' : visaid},
                     dataType : "json",
                    success: function(res) {

                    
                     window.open( "https://wa.me/"+res.data.mobile_no+"/?text=" + res.data.content, '_blank'); 
                                   
                    }
                });
            }

        });


}); 




//  $(document).on('change','#yesterday_check_box_th',function(){
//    if($(this).prop('checked')){
//       $('#responsive_datatable_yesterday tbody tr td input[type="checkbox"]').each(function(){
//          $(this).prop('checked', true);
//       });
//    }else{
//       $('#responsive_datatable_yesterday tbody tr td input[type="checkbox"]').each(function(){
//          $(this).prop('checked', false);
//       });
//    }
// });
//  $(document).on('change','#yesterday_check_box_td',function(){
//   if($(this).is(':checked')) {
//      $('.yesterday_pool_send_mail').removeAttr('style','display:none');
//   } else {
//      $('.yesterday_pool_send_mail').attr('style','display:none');
//   }
// });
//   $(document).on('change','#table_one',function(){
//    if($(this).prop('checked')){
//       $('#responsive_datatable_today tbody tr td input[type="checkbox"]').each(function(){
//          $(this).prop('checked', true);
//       });
//    }else{
//       $('#responsive_datatable_today tbody tr td input[type="checkbox"]').each(function(){
//          $(this).prop('checked', false);
//       });
//    }
// });

$(document).on('change','#table_one',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.today_pool_send_mail').removeAttr('style','display:none');

     $('#responsive_datatable_today tbody tr td input[type="checkbox"]').each(function(){
      $(this).prop('checked', true);
   });

  } else {
     $('.today_pool_send_mail').attr('style','display:none');

     $('#responsive_datatable_today tbody tr td input[type="checkbox"]').each(function(){
      $(this).prop('checked', false);
   });

  }
});
$(document).on('change','#tbl_one_td',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.today_pool_send_mail').removeAttr('style','display:none');
  } else {
     $('.today_pool_send_mail').attr('style','display:none');
  }
});

$(document).on('change','#yesterday_check_box_th',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.yesterday_pool_send_mail').removeAttr('style','display:none');

     $('#responsive_datatable_yesterday tbody tr td input[type="checkbox"]').each(function(){
      $(this).prop('checked', true);
   });

  } else {
   $('#responsive_datatable_yesterday tbody tr td input[type="checkbox"]').each(function(){
      $(this).prop('checked', false);
   });
   $('.yesterday_pool_send_mail').attr('style','display:none');
}
});
$(document).on('change','#yesterday_tbl_td',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.yesterday_pool_send_mail').removeAttr('style','display:none');
  } else {
     $('.yesterday_pool_send_mail').attr('style','display:none');
  }
});


$(document).on('change','#missed_check_box_th',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.missed_pool_send_mail').removeAttr('style','display:none');

     $('#responsive_datatable_missed tbody tr td input[type="checkbox"]').each(function(){
      $(this).prop('checked', true);
   });

  } else {
     $('.missed_pool_send_mail').attr('style','display:none');
  }
});


$(document).on('change','#missed_check_box_td',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.missed_pool_send_mail').removeAttr('style','display:none');
  } else {
     $('.missed_pool_send_mail').attr('style','display:none');
  }
});

// $(document).on('change','#yesterday_tbl_td',function(){
//   var array = [];
//   if($(this).is(':checked')) {
//      $('.missed_pool_send_mail').removeAttr('style','display:none');
//   } else {
//      $('.missed_pool_send_mail').attr('style','display:none');
//   }
// });

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
var email_itinerary_name = $('#email_itinerary_names').val();


if(email_template_id > 0 && email_itinerary_name > 0){
   $('.check_box_empty_error').text("Select Only One Dropdown Value.");
   return false;
}else if(email_template_id == "" && email_itinerary_name == ""){
   $('.check_box_empty_error').text("Select Atleast One Dropdown.");
   return false;
}
else{
   $('.check_box_empty_error').text("");
}

$.ajax({
  url : base_url + 'franchise/enquiry/send_bulk_email',
  type : "POST",
  data : {sub_array,email_template_id,email_itinerary_name},
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
     Swal.fire("Success!", data.message, "success").then(function(){
        location.reload();
     });
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

$(".select2").select2({ width: '100%' }); 

$('#responsive_process_pool').DataTable();
$('#header_box').change(function(){
   if($(this).prop('checked')){
      $('#responsive-datatable tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#responsive-datatable tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});

$('#table_one').change(function(){
   if($(this).prop('checked')){
      $('#responsive_datatable_today tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#responsive_datatable_today tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});

$('#table_two').change(function(){
   if($(this).prop('checked')){
      $('#responsive_datatable_yesterday tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#responsive_datatable_yesterday tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});

$('#table_three').change(function(){
   if($(this).prop('checked')){
      $('#responsive_datatable_missed tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#responsive_datatable_missed tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});

$(document).on('click','.enquiry_model_click',function(){
   $(".follow_up_form")[0].reset();
   var record_id = $(this).attr('value');
   $('#record_id').val(record_id);
});
$(document).on('click','.add_interview_click',function(){
   $(".interview_form")[0].reset();
   var record_id = $(this).attr('value');
   $('form.interview_form #record_id').val(record_id);
});

$(document).on('click','.btn_cancel',function(){
   $("form")[0].reset();
});

$(document).on('submit','.follow_up_form',function(e){     
   e.preventDefault();
   var enquiry_status = $('.enquiry_date').val();
   if(enquiry_status == ""){
      $('.enquiry_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.enquiry_date_error_msg').text('');
   }
   // var enquiry_status = $('#enquiry_status').val();
   // if(enquiry_status == ""){
   //    $('.e_error').text('Please select status');
   //    return false;
   // }else{
   //    $('.e_error').text('');
   // }
   $.ajax({
      url : base_url + 'franchise/enquiry/add_enquiry_status',
      type : "POST",
      data : $(this).serializeArray(),
      dataType: 'json',
      success : function(data){
         if(data.status == 'success'){
            $(".follow_up_form")[0].reset();
            $('#enquiry_model').modal('toggle');
            get_all_today_follow_up_data();
            get_all_yesterday_follow_up_data();
            get_all_missed_follow_up_data();
            Swal.fire("Success!", data.message, "success").then(function(){
                //location.reload();
                 window.location = continue_to;
            });
         }else if(data.status == "date_error"){
          $('.enquiry_date_error_msg').text(data.message);
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

if ($(".enquiry_date").length > 0) {
   $('.enquiry_date').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}



  $('input[name="select_interview_date"]').daterangepicker({
    opens: 'left',
    locale: {
      format: 'DD/M/YYYY'
    }
  }, function(start, end, label) {
    //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    get_interview_process_pool_data(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
  });



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
            url: base_url + 'franchise/enquiry/remove_enquiry',
            data:{'table' : table, 'row' : row, 'id' : id},
            dataType : 'json',
            success: function(result) {
               if(result.status == 'success')
                  Swal.fire("Deleted!", "Supplier has been deleted.", "success").then(function(){
                     location.reload();
                  });
            }
         });
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


$(document).on('click', '.change_process_pool_status', function () {
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

$(document).on('click', '.new_change_process_pool_status', function (e) {

   $('.pool_description').val('');
   var cpermission = '<?php echo $company_permission->company_permission ?>';

   var btn_val = $(this).val();
   var pool_record_id = $(this).attr('pool_record_id');
   var service = $(this).attr('data-service');
   if(service != "" && service != 0){
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
          /* Read more about isConfirmed, isDenied below */
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
          confirmButtonText: 'I will Process',
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
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
   /* $.ajax({
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
   });*/
});




$(document).on('click','.process_pool_send_mail',function(){
   $('#email_template_model').modal('toggle');
   $("#email_template_id").val(null).trigger("change");
   $("#email_itinerary_name").val(null).trigger("change");
});
$(document).on('click','.today_pool_send_mail',function(){
   $('#email_template_model').modal('toggle');
   $("#email_template_id").val(null).trigger("change");
   $("#email_itinerary_name").val(null).trigger("change");

});
$(document).on('click','.yesterday_pool_send_mail',function(){
   $('#email_template_model').modal('toggle');
   $("#email_template_id").val(null).trigger("change");
   $("#email_itinerary_name").val(null).trigger("change");

});
$(document).on('click','.missed_pool_send_mail',function(){
   $('#email_template_model').modal('toggle');
   $("#email_template_id").val(null).trigger("change");
   $("#email_itinerary_name").val(null).trigger("change");

});


});
</script>

