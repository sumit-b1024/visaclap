<style>
 .error{
  color: red;
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
<div class="row row-sm">
 <div class="col-lg-12">
  <div class="row row-sm">
    <div class="col-lg-12">

     <div class="card">
       <div class="card-body">
         <form class="enquiry_page_report">
           <h4>Select Filter</h4>
           <div class="row">
             <div class="col-sm-3 col-md-2 input-inside mb-1">
               <label class="form-label">Follow Up Date</label>
               <div class="wd-200 mg-b-30">
                 <div class="input-group">
                   <div class="input-group-text">
                     <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                   </div><input class="form-control passport_date" id="follow_up_date" name="follow_up_date" placeholder="MM/DD/YYYY" type="text">
                 </div>
               </div>
             </div>

             <div class="col-sm-3 col-md-2 input-inside">
              <div class="form-group">
                <label class="form-label">Select Language</label>
                <select class="language form-select" name="language">
                  <option value="">Select Language</option>
                  <option value="Telugu">Telugu</option>
                  <option value="Hindi">Hindi</option>
                  <option value="English">English</option>
                </select>
              </div>
            </div>
             <div class="col-sm-3 col-md-2 input-inside">
              <div class="form-group">
                <label class="form-label">Intersted Country</label>
                <select class="form-control i_country select2-show-search form-select" id="i_country" name="i_country[]" multiple data-placeholder="Select Intersted Country">
                  <!-- <?php foreach ($get_all_country as $key => $value) { ?>
                    <option value="<?= $value->id ?>"><?= $value->name.'  ('.$value->sortname.')'; ?></option>
                  <?php } ?> -->
                </select>
              </div>
            </div>

            
          <div class="col-sm-2 col-md-2 input-inside">
           <label class="form-label">Enquiry From</label>
           <div class="wd-200 mg-b-30">
             <div class="input-group">
               <div class="input-group-text">
                 <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="enquiry_from" name="enquiry_from" placeholder="MM/DD/YYYY" type="text" readonly>
             </div>
           </div>
         </div>

         <div class="col-sm-2 col-md-2 input-inside">
           <label class="form-label">Enquiry To</label>
           <div class="wd-200 mg-b-30">
             <div class="input-group">
               <div class="input-group-text">
                 <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="enquiry_to" name="enquiry_to" placeholder="MM/DD/YYYY" type="text" readonly>
             </div>
           </div>
         </div>

         <div class="col-sm-2 col-md-2 input-inside">
           <div class="form-group">
            <label class="form-label">Enquiry Type</label>
            <select class="enquiry_type  form-select" name="enquiry_type">
             <option value="">Select Enquiry Type</option>
             <?php foreach ($get_enquiry_type as $key => $value) { ?>
              <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
            <?php } ?>

          </select>
        </div>
      </div>
      <div class="col-sm-2 col-md-2 input-inside ">
           <div class="form-group">
            <label class="form-label">Drop Reason</label>
            <select class=" form-select reason_type" name="reason_type">
              <option value="">Select Drop Reason</option>
              <?php foreach ($get_all_drop_reason as $key => $value) { ?>
                <option value="<?= $value->id ?>"><?= $value->pool_status_info ?></option>
              <?php } ?>
           </select>
        </div>
      </div>
      
      <div class="col-sm-2 col-md-3" style="margin-top:0%;">
       <button type="submit" class="box-btn fill_primary sub_btn" style="
       margin-top: 25px;">Submit</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 0px;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
      </button>
      <button type="button" class="box-btn fil_gray reset_btn" style="
      margin-top: 25px;">Reset</button>
    </div>

  </div>

</form>
</div>
</div>
<br/>
<div style="float:left; width: 44%;" class="hr1"><hr/></div>
          <div style="float:right; width: 43%;" class="hr2"><hr/></div>&nbsp; Or Search With <br><br>
<div class="row">
 <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
           <form class="detail_search">
            <div class="row">
                <div class="col-sm-2 col-md-2 input-inside">
                   <div class="form-group">
                      <label class="form-label">Name</label>
                      <input class="form-control name" id="name" name="uname" placeholder="Name" type="text">
                  </div>
              </div>
              <div class="col-sm-2 col-md-2 input-inside">
                 <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-control email" id="email" name="email" placeholder="Email" type="text">
                 </div>
              </div>
              <div class="col-sm-2 col-md-2 input-inside">
                 <div class="form-group">
                    <label class="form-label">Number</label>
                    <input class="form-control number" id="number" name="number" placeholder="Number" type="text">
                </div>
             </div>
             <div class="col-sm-3 col-md-3">
                    <button type="submit" class="box-btn fill_primary sub_btn" style="
                    margin-top: 25px;">Submit</button>
                    <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 0px;">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                  </button>
                  <button type="button" class="box-btn fil_gray reset_btn_detail" style="
                  margin-top: 25px;">Reset</button>
              </div>
           </div> 
          </form>  
        </div>
    </div>
</div> 
</div>  
<br/>
  
   <div class="row">
    <!-- <div class="col-10">
     <h3 class="card-title"><?= $title; ?></h3>
   </div> -->
   <div class="col-12">
     <a class="box-btn fill_primary send_mail pull-right"  data-bs-target="#email_template_model" data-bs-toggle="modal" href="javascript:void(0)">
      <i class="fa fa-plane"></i> Send Mail
    </a>
  </div>                    
</div>
<br/>
<div class="card-body">
  <div class="table-responsive" id="finalize_pool_data">

  </div>
</div>

<!-- modal start -->
<div class="modal fade" id="pool_status_modal">
 <div class="modal-dialog" role="document">
  <div class="modal-content modal-content-demo">

   <form class="pool_review_form">
    <div class="modal-header">
     <h6 class="modal-title">Pool Form</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
   </div>

   <div class="modal-body">
    <input type="hidden" name="btn_val" id="btn_val">
    <input type="hidden" name="pool_record_id" id="pool_record_id"> 

    <div class="col-sm-12 col-md-12">
      <div class="form-group">
       <label class="form-label "><b>Pool Status</b><span style="color:red;">  *</span></label>
       <select class="form-control pool_status select2" name="pool_status" >
         <option value="">Select Pool Status</option>
       </select>
     </div>
   </div>

   <div class="col-sm-12 col-md-12">
    <div class="form-group">
     <label class="form-label "><b>Description</b><span style="color:red;">  *</span></label>
     <textarea class="form-control pool_description" name="pool_description"></textarea>
   </div>
 </div>
</div>

<div class="modal-footer">
 <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>

<button class="btn btn-primary">Submit</button>
<button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<!-- modal end -->
<div class="modal fade bd-example-modal-lg" id="whatsup_template_model">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
   <form class="send_whatsup_template_form">
    <div class="modal-header">
     <h6 class="modal-title"><b>Whatsup Template</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
   </div>
   <input type="hidden" class="w_template_user_id" id="w_template_user_id">
   <div class="modal-body follow_up_body">
     <label class="form-label"><b>Select Whatsup Template</b><span class="text-red">*</span></label>
     <select class="form-control w_template_id form-control city select2-show-search form-select" id="w_template_id" required>
      <option value="">Select Template</option>
      <?php foreach ($get_whatsup_template_data as $key => $value) { ?>
       <option value="<?= $value->id ?>"><?= $value->name ?></option>
     <?php } ?>
   </select>
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
<!-- modal end -->
<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="email_template_model">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
   <form class="send_email_template_form">
    <div class="modal-header">
     <h6 class="modal-title">Send Email</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
   </div>
   <div class="modal-body follow_up_body">
     <label class="form-label">Select Template <span class="text-red">*</span></label>
     <select class="form-control email_template_id select2-show-search form-select" id="email_template_id" required>
      <option value="">Select Template</option>
      <?php foreach ($get_email_template_data as $key => $value) { ?>
       <option value="<?= $value->id ?>"><?= $value->name ?></option>
     <?php } ?>
   </select>
   <span class="check_box_empty_error" style="color:red;"></span>
 </div>

 <div class="modal-footer">
  <div class="spinner-border text-primary email_spinner" style="display:none" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <button type="submit" class="btn btn-primary email_send_btn">Submit</button>
  <button type="button" class="box-btn btn-grey btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<!-- modal end -->


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
              <div class="col-sm-12 col-md-12">
                 <label class="form-label"><b>Follow up</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control followup" name="followup" placeholder="MM/DD/YYYY" type="text" readonly>
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
           <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>
<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="pool_view_model">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
    <form class="">
      <div class="modal-header">
       <h6 class="modal-title"><b>View All Pool</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
     </div>
     <div class="modal-body view_all_pool">

     </div>

     <div class="modal-footer">
      <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
    </div>
  </form>
</div>
</div>
</div>
<!-- modal end -->
</div>
</div>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
crossorigin="anonymous"
></script>  
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
          $.each(data.message, function (key, val) {
             $("#i_country").append('<option value="'+val.id+'">'+val.name+'</option>');
         });
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}
var status = <?php echo Enquiry_pool_status::DROP; ?>


$(document).on('click','.add_followup_click',function(){
   $(".followup_form")[0].reset();
   var record_id = $(this).attr('value');
   $('form.followup_form #record_id').val(record_id);
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
      url : base_url + 'franchise/enquiry/add_dropfollowup_date',
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

  // $(document).ready(function(){
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

    $('.pool_review_form').validate({
     rules : {
      "pool_status" : {
       required : true
     },
     "pool_description" : {
       required : true
     }
   },
   messages :{
    "pool_status" : {
     required : "Select Status"
   },
   "pool_description" : {
     required : "Enter Description"
   }
 }
});

    $(document).on('submit','.pool_review_form',function(e){
     e.preventDefault();
     if($('.pool_review_form').valid()){
      $.ajax({
       url : base_url + 'franchise/enquiry/add_pool_staus_description',
       type : "POST",
       data : $(this).serializeArray(),
       dataType: 'json',
       success : function(data){
        if(data.status == 'success'){
         Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
        });
         $('#pool_status_modal').modal('toggle');
       }else{
         Swal.fire("Warning!", data.message, "warning");
       }
     }
   });
    }
  });
  // });

  $(document).on('submit', '.enquiry_page_report',function(e){
    e.preventDefault();
    get_enquiry_report_data();
  });

   $(document).on('submit', '.detail_search',function(e){
    e.preventDefault();
    $(".enquiry_type").val('').trigger('change');
     $('.passport_date').val(null).trigger("change");
    
    $('.enquiry_page_report')[0].reset();
    get_detail_data();
  });


   function get_detail_data(){
     $('.detail_search .sub_btn').attr('disabled', 'disabled');
    $('.detail_search .spiner_btn').removeAttr('style', 'display: none');
    $('.detail_search .spiner_btn').attr('style', 'margin-top: 0px');
    $('.detail_search .sub_btn').attr('style', 'display: none');
    $.ajax({
      url : base_url+'franchise/reports/generate_drop_detail_report',
      type : "POST",
      data : $('.detail_search').serializeArray(),
      success :function(data){
          $('.detail_search .sub_btn').removeAttr('disabled', 'disabled');
        $('.detail_search .spiner_btn').attr('style', 'display: none');
        $('.detail_search .sub_btn').removeAttr('style', 'display: none');
        $('.detail_search .sub_btn').attr('style', 'margin-top: 0px');

        $('#finalize_pool_data').html("");
        $('#finalize_pool_data').html(data);
        
        $('#drop_enquiry_report_pool').DataTable({
        order: [[5, 'desc']],
       });
      }
    });
  }

  function get_enquiry_report_data(){
     $('.enquiry_page_report .sub_btn').attr('disabled', 'disabled');
    $('.enquiry_page_report .spiner_btn').removeAttr('style', 'display: none');
    $('.enquiry_page_report .spiner_btn').attr('style', 'margin-top: 0px');
    $('.enquiry_page_report .sub_btn').attr('style', 'display: none');

    $.ajax({
      url : base_url+'franchise/reports/generate_drop_enquiry_report',
      type : "POST",
      data : $('.enquiry_page_report').serializeArray(),
      success :function(data){
         $('.enquiry_page_report .sub_btn').removeAttr('disabled', 'disabled');
        $('.enquiry_page_report .spiner_btn').attr('style', 'display: none');
        $('.enquiry_page_report .sub_btn').removeAttr('style', 'display: none');
        $('.enquiry_page_report .sub_btn').attr('style', 'margin-top: 0px');


        $('#finalize_pool_data').html("");
        $('#finalize_pool_data').html(data);
        
        $('#drop_enquiry_report_pool').DataTable({
        order: [[5, 'desc']],
       });
      }
    });
  }

  $(document).ready(function(){
    get_all_country();

    if ($(".followup").length > 0) {
   $('.followup').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}

    $('.passport_date').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
    });

    $(document).on('change','#pool_drop_th',function(){
     if($(this).prop('checked')){
      $('#drop_enquiry_report_pool tbody tr td input[type="checkbox"]').each(function(){
       $(this).prop('checked', true);
     });
    }else{
      $('#drop_enquiry_report_pool tbody tr td input[type="checkbox"]').each(function(){
       $(this).prop('checked', false);
     });
    }
  });

    $(document).on('click','.open_whatsup_modal',function(){
     var record_id = $(this).val();
     $('.w_template_user_id').attr('value',record_id);
     $('#whatsup_template_model').modal('show');
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
         if(data){
          window.open( "https://wa.me/"+data.mobile_no+"/?text=" + data.content, '_blank'); 
        }else{
          window.open( "https://wa.me/"+''+"/?text=" + '', '_blank'); 
        }
      }
    });
    });

    get_enquiry_report_data();
 //  $(document).on('click', '.change_pool_status', function () {

 //    $('#pool_status_modal').modal('show');
 //    var btn_val = $(this).val();
 //    var record_id = $(this).attr('pool_record_id');
 //    $('#btn_val').attr('value', btn_val);
 //    $('#pool_record_id').attr('value', record_id);
 // });
 $(document).on('click', '.change_pool_status', function () {
   $('.pool_description').val('');
   $('.error').text('');
   $('#pool_status_modal').modal('show');
   var btn_val = $(this).val();
   var record_id = $(this).attr('pool_record_id');
   $('#btn_val').attr('value', btn_val);
   $('#pool_record_id').attr('value', record_id);
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

 // $(document).on('submit','.pool_review_form',function(e){
 //   e.preventDefault();
 //   $.ajax({
 //     url : base_url + 'franchise/enquiry/add_pool_staus_description',
 //     type : "POST",
 //     data : $(this).serializeArray(),
 //     dataType: 'json',
 //     success : function(data){
 //      if(data.status == 'success'){
 //        Swal.fire("Success!", data.message, "success").then(function(){
 //         location.reload();
 //       });
 //        $('#pool_status_modal').modal('toggle');
 //      }else{
 //        Swal.fire("Warning!", data.message, "warning");
 //      }
 //    }
 //  });

 // });

 $(document).on('click', '.reset_btn',function(e){
   $('.enquiry_page_report')[0].reset();
   $('.language').val(null).trigger("change");
   $('.s_description').val(null).trigger("change");
   $('.i_country').val(null).trigger("change");
   $('.reason_type').val(null).trigger("change");
   $('.name').val(null).trigger("change");
   $('.email').val(null).trigger("change");
   $('.number').val(null).trigger("change");
   
   get_enquiry_report_data();
 });
$(document).on('click', '.reset_btn_detail',function(e){
    $('.detail_search')[0].reset();
   get_detail_data(); 
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


});

</script>
