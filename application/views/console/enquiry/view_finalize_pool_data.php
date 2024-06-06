<style>
   .error{
      color: red;
   }
</style>
<script src="https://unpkg.com/vue@3.4.27/dist/vue.global.js"></script>
<div id='firstApp'>
<h6 class="primary-title1 mb-0" style="    color: #575757;">Select Filter </h6><br>
<div class="row row-sm">
   <div class="col-lg-12">
      <div class="row row-sm">
       <div class="col-lg-12">
          <div class="card">
           <div class="card-body">
            <form class="enquiry_page_report">
             <div class="row">
              <div class="col-sm-3 col-md-2 input-inside">
               <label class="form-label">Follow Up date</label>
               <div class="wd-200 mg-b-30">
                <div class="input-group">
                 <div class="input-group-text">
                  <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="follow_up_date" name="follow_up_date" placeholder="MM/DD/YYYY" type="text" readonly>
            </div>
         </div>
      </div>

      <div class="col-sm-3 col-md-2 input-inside1">
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
    <label class="form-label"> Intersted Country</label>
   <!--  <select class="form-control i_country select2-show-search form-select" id="i_country" name="i_country[]" multiple data-placeholder="Select Intersted Country">
</select> -->
 <select name="i_country[]" id="i_country" data-placeholder="Intersted Country" class="i_country select2-show-search form-select">
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

<div class="col-sm-2 col-md-2">
   <div class="form-group input-inside1">
      <label class="form-label">Enquiry Type</label>
      <select class="enquiry_type form-select" name="enquiry_type">
         <option value="">Select Enquiry Type</option>
         <?php foreach ($get_enquiry_type as $key => $value) { ?>
            <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
         <?php } ?>

      </select>
   </div>
</div>
 <div class="col-sm-2 col-md-2 input-inside1 mt-1">
           <div class="form-group">
            <label class="form-label">Finalize Reason</label>
            <select class="form-select reason_type" name="reason_type">
             <option value="">Select Finalize Reason</option>
             <?php foreach ($get_all_drop_reason as $key => $value) { ?>
              <option value="<?= $value->id ?>"><?= $value->pool_status_info ?></option>
            <?php } ?>

          </select>
        </div>
      </div>
      <div class="col-sm-3 col-md-2 input-inside1 mt-1">
                     <div class="form-group">
                        <label class="form-label">Staff</label>
                        <select class="enquiry_staff_id select2-show-search form-select"  name="enquiry_staff_id" value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Staff">
                           <option value="">Select Staff</option>
                           <?php 
                           foreach ($get_all_staff_data as $key => $value) { ?>
                              <option value="<?= $value->user_id ?>" <?= isset($enquiry) && $enquiry->enquiry_staff_id == $value->user_id ? "selected" : ""; ?>><?= $value->first_name ?></option>
                           <?php    } ?>
                        </select>
                     </div>
                  </div>
      
<div class="col-sm-2 col-md-3 form-btns mt-1" style="margin-top:0%;">
   <button type="submit" class="box-btn fill_primary sub_btn" style="
   margin-top: 25px;">Submit</button>
   <button class="btn btn-primary spiner_btn loader_btn"  type="button" disabled style="display: none;margin-top: 25px;">
     <span class="spinner-border spinner-border-sm btn-sm" role="status" aria-hidden="true"></span>
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
            <div class="row input-inside">
                <div class="col-sm-2 col-md-3 ">
                   <div class="form-group">
                      <label class="form-label">Name</label>
                      <input class="form-control name" id="name" name="uname" placeholder="Name" type="text">
                  </div>
              </div>
              <div class="col-sm-2 col-md-3">
                 <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-control email" id="email" name="email" placeholder="Email" type="text">
                 </div>
              </div>
              <div class="col-sm-2 col-md-3">
                 <div class="form-group">
                    <label class="form-label">Number</label>
                    <input class="form-control number" id="number" name="number" placeholder="Number" type="text">
                </div>
             </div>
             <div class="col-sm-3 col-md-3 form-btns">
                    <button type="submit" class="box-btn fill_primary sub_btn" style="
                    margin-top: 26px;">Submit</button>
                    <button class="btn btn-primary spiner_btn_detail"  type="button" disabled style="display: none;margin-top: 26px;">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                  </button>
                  <button type="button" class="box-btn fil_gray reset_btn_detail" style="
                  margin-top: 26px;">Reset</button>
              </div>
           </div> 
          </form>  
        </div>
    </div>
</div> 
</div> 
<br/>
<div class="card">
  <div class="card-header">
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
</div>
<div class="card-body">
  <div class="table-responsive" id="view_enquiry_tbl">
   hello {{dataFromServer.length}}
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
        <tr v-for="template in dataFromServer" :key="template.id">
          <td>
            <label class="custom-control custom-checkbox-md">
              <input type="checkbox" class="custom-control-input pool_finalize_td" :value="template.id">
              <span class="custom-control-label"></span>
            </label>
          </td>
          <td>
            <div class="cell_content">
              <p>
                {{ template.name }}
                <span v-if="sessionUserRole === 'FRANCHISE' && template.staff_name" class="d-inine orange-text">({{ template.staff_name }})</span>
                <span class="d-inine orange-text">({{  Math.round((  new Date()-new Date(template.created_at)) / (1000 * 60 * 60 * 24)) }} Days)</span>
              </p>
              <p class="fonts11">
                <span v-if="template.enquiry_type_name">({{ template.enquiry_type_name }})</span>
                <span v-if="template.intersted_country_name">
                  ({{  template.intersted_country_name }})
                </span>
                <span v-if="template.visa_id">
                  ({{  template.visa_name }})
                </span>
              </p>
              <div class="type-actions">
                <button v-if="template.enquiry_type_id == '32'" class="new_change_process_pool_status" :data-service="template.service" :pool_record_id="template.id" value="1">Process Pool</button>
                <button v-else class="change_process_pool_status" :pool_record_id="template.id" value="1">Process Pool</button>
              </div>
            </div>
          </td>
          <td>{{ template.mobile_no }}</td>
          <td>{{ new Date(template.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) }}</td>
          <td>{{ new Date(template.follow_up_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) }}</td>
          <td>
            <div class="tbl-action-wrap">
              <button class="single-action whatsapp open_whatsup_modal" :value="template.id"><img src="<?php echo base_url('assets/img/whatsapp.svg');  ?>"></button>
              <button class="single-action view mr-2" title="View" id="view_pool_des" :value="template.id"><img src="<?php echo base_url('assets/img/eye.svg');  ?>"></button>
              <a v-if="sessionUserRole === 'FRANCHISE' || sessionUserRole === 'FRANCHISE_STAFF' && template.passing == 'yes' && template.mobile_no" class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" :value="template.mobile_no" data-toggle="tooltip" data-placement="top" title="View Visa"><i class="fa fa-cc-visa"></i></a>
              <a v-if="sessionUserRole === 'FRANCHISE' || sessionUserRole === 'FRANCHISE_STAFF' && template.emailpassing == 'yes' && template.email" class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" :value="template.email" data-toggle="tooltip" data-placement="top" title="View Visa"><i class="fa fa-cc-visa"></i></a>
              <button v-if="template.dtotal > 0" class="btn btn-success btn-sm get_enquirey_document" href="javascript:void(0)" :value="template.id" data-toggle="tooltip" data-placement="top" title="View Document"><i class="fa fa-file"></i></button>
            </div>
          </td>
        </tr>
      </tbody>

  </table>
  </div>
</div>
</div>
<!-- modal start -->
<div class="modal fade" id="pool_status_modal">
 <div class="modal-dialog" role="document">
    <div class="modal-content modal-content-demo">
       <form class="pool_review_form">
          <div class="modal-header">
             <h6 class="modal-title"><b>Pool Form</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            <input type="hidden" name="btn_val" id="btn_val">
            <input type="hidden" name="pool_record_id" id="pool_record_id">

            <div class="col-sm-12 col-md-12">
              <div class="form-group">
               <label class="form-label "><b>Pool Status</b></label>
               <select class="form-control pool_status select2" name="pool_status" >
                 <option value="">Select Pool Status</option>
              </select>
           </div>
        </div>

        <div class="col-sm-12 col-md-12">
           <div class="form-group">
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

      <button class="btn btn-primary upload_file">Submit</button>
      <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
   </div>
</form>
</div>
</div>
</div>
<!-- modal end -->
<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="whatsup_template_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="send_whatsup_template_form">
            <div class="modal-header">
               <h6 class="modal-title"><b>Whatsup Template</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <input type="hidden" class="w_template_user_id" id="w_template_user_id">
            <div class="modal-body">
              <div class="form-group">

               <label class="form-label"><b>Select Whatsup Template</b><span class="text-red">*</span></label>
               <select class="form-control w_template_id form-control city select2-show-search" id="w_template_id" required>
                  <option value="">Select Template</option>
                  <?php foreach ($get_whatsup_template_data as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->name ?></option>
                  <?php } ?>
               </select>
            </div>
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
               <h6 class="modal-title"><b>Send Email</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body follow_up_body">
              <div class="form-group">
               <label class="form-label"><b>Select Template </b><span class="text-red">*</span></label>
               <select class="form-control email_template_id select2-show-search form-select" id="email_template_id" data-placeholder="Select Template" required>
                  <option value="">Select Template</option>
                  <?php foreach ($get_email_template_data as $key => $value) { ?>
                     <option value="<?= $value->id ?>"><?= $value->name ?></option>
                  <?php } ?>
               </select>
               <label class="form-label"><b> Itinerary </b></label>
                  <select class="form-control email_itinerary_names select2-show-search" id="email_itinerary_names" style="width:100%;">
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
          <button type="submit" class="btn btn-primary email_send_btn">Submit</button>
          <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
       </div>
    </form>
 </div>
</div>
</div>
<!-- modal end -->
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
          <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
       </div>
    </form>
 </div>
</div>
</div>
<!-- modal end -->
</div>
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
referrerpolicy="no-referrer"
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

    $(document).on('click','.send_mail',function(){
     var record_id = $(this).val();
     $('#email_template_model').modal('show');
     $('.select2-show-search').select2({
        dropdownParent: $('#email_template_model'),
        width: "100%"
     });

  });

   var status = <?php echo Enquiry_pool_status::FINALIZE; ?>


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




   $(document).ready(function () {
      get_all_country();
    $('#finalize_enquiry_report_pool').DataTable({
        order: [[6, 'desc']],
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
   var email_itinerary_name = $('#email_itinerary_names').val();
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
   if($(this).valid()){
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

  $(document).on('submit', '.enquiry_page_report',function(e){
    e.preventDefault();
    $('.detail_search')[0].reset();
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
     $('.sub_btn').attr('disabled', 'disabled');
    $('.spiner_btn').removeAttr('style', 'display: none');
    $('.spiner_btn').attr('style', 'margin-top: 0px');
    $('.sub_btn').attr('style', 'display: none');

     $.ajax({
      url : base_url+'franchise/reports/generate_finalize_detail_report',
      type : "POST",
      data : $('.detail_search').serializeArray(),
      success :function(data){
          $('.sub_btn').removeAttr('disabled', 'disabled');
            $('.spiner_btn').attr('style', 'display: none');
            $('.sub_btn').removeAttr('style', 'display: none');
            $('.sub_btn').attr('style', 'margin-top: 0px');
       $('#view_enquiry_tbl').html("");
       $('#view_enquiry_tbl').html(data);
       //$('#finalize_enquiry_report_pool').DataTable();
       $('#finalize_enquiry_report_pool').DataTable({
        order: [[4, 'desc']],
       });
    }
 });
  }

  function get_enquiry_report_data(){
    $('.sub_btn').attr('disabled', 'disabled');
    $('.spiner_btn').removeAttr('style', 'display: none');
    $('.spiner_btn').attr('style', 'margin-top: 0px');
    $('.sub_btn').attr('style', 'display: none');
     $.ajax({
      url : base_url+'franchise/reports/generate_finalize_enquiry_report',
      type : "POST",
      data : $('.enquiry_page_report').serializeArray(),
      success :function(data){
         $('.sub_btn').removeAttr('disabled', 'disabled');
            $('.spiner_btn').attr('style', 'display: none');
            $('.sub_btn').removeAttr('style', 'display: none');
            $('.sub_btn').attr('style', 'margin-top: 0px');
       $('#view_enquiry_tbl').html("");
       $('#view_enquiry_tbl').html(data);
       //$('#finalize_enquiry_report_pool').DataTable();
       $('#finalize_enquiry_report_pool').DataTable({
        order: [[4, 'desc']],
       });
    }
 });
  }
  $(document).ready(function(){
    $(document).on('click','.open_whatsup_modal',function(){
       var record_id = $(this).val();
       $('.w_template_user_id').attr('value',record_id);
       $('#whatsup_template_model').modal('show');
       $('.select2-show-search').select2({
        dropdownParent: $('#whatsup_template_model'),
        width: "100%"
     }); 
    })

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

    $(document).on('change','#pool_finalize_th',function(){
       var array = []
       $("input:checkbox[name=pool_finalize_td]:checked").each(function(){
        array.push($(this).val());
     });
    // if(array.length > 0){
    //    $('.send_mail').removeAttr('style','display:none');
    // }else{
    //    $('.send_mail').attr('style','display:none');
    // }
 });

  //  $(document).on('change','#pool_finalize_td',function(){
  //     var array = []
  //     $("input:checkbox[name=pool_finalize_td]:checked").each(function(){
  //      array.push($(this).val());
  //   });
  //    //  if(array.length > 0){
  //    //    $('.send_mail').removeAttr('style','display:none');
  //    //    $('.send_mail').attr('style','margin-left: 52px;');
  //    // }else{
  //    //    $('.send_mail').attr('style','display:none');
  //    // }
  // });

  $(document).on('change','#pool_finalize_th',function(){
   if($(this).prop('checked')){
      $('#finalize_enquiry_report_pool tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', true);
      });
   }else{
      $('#finalize_enquiry_report_pool tbody tr td input[type="checkbox"]').each(function(){
         $(this).prop('checked', false);
      });
   }
});

  $('.passport_date').datepicker({
     //showOtherMonths: true,
     selectOtherMonths: true,
  });
  //get_enquiry_report_data();
  // $(document).on('click', '.change_pool_status', function () {
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

  $(document).on('click', '.reset_btn',function(e){
    $('.enquiry_page_report')[0].reset();
     $(".enquiry_type").val(null).trigger('change');
    $('.language').val(null).trigger("change");
    $('.i_country').val(null).trigger("change");
    $('.reason_type').val(null).trigger("change");
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

<script >
 
    const { createApp, ref, watch ,nextTick} = Vue;

document.addEventListener('DOMContentLoaded', () => {
 
   const { createApp } = Vue;
   const dataFromServer = ref([])

const app = createApp({
   
    data() {
      
        return {
         currentPage: 1,
         dataTable:null,
         dataFromServer,
                totalPages: 1,
            message: ''
        };
    },
    watch: {
      dataFromServer(newValue, oldValue) {
         if(this.dataTable)
            {
                  console.log( this.dataTable);
                  this.dataTable.destroy();
            }
         nextTick(() => {
           
          
 
           this.dataTable= $('#finalize_enquiry_report_pool').DataTable({
        order: [[4, 'desc']],
       });
                 
                 
                });

         
        }
    },
    methods:
   {
    
      fetchData(page,formData) {
          
                const self = this;  // Preserve the Vue instance context

                $.ajax({
      url : base_url+'franchise/reports/generate_finalize_enquiry_report',
      type : "POST",
      data : $('.detail_search').serializeArray(),
      success :function(data){
        
         self.dataFromServer = data.fetch_enquiry_array;
         self.currentPage = data.current_page;
         self.totalPages = data.total_pages;
         
         
       //$('#finalize_enquiry_report_pool').DataTable();
       $('#finalize_enquiry_report_pool').DataTable({
        order: [[4, 'desc']],
       });
       
      }});
            },
            getFormValues()
      {
         
        this.fetchData(this.currentPage,$('.enquiry_page_report').serializeArray());
      },
      getFormValuesSimple()
      {
         this.fetchData(this.currentPage);
      }
   },
    
    mounted() {
      const self = this; 
      this.fetchData(this.currentPage,$('.enquiry_page_report').serializeArray());

    },
    beforeDestroy() {
    // Destroy the DataTable instance to prevent memory leaks
    if (this.dataTable) {
      this.dataTable.destroy();
    }
  }
   });

app.mount('#firstApp');
});
</script>