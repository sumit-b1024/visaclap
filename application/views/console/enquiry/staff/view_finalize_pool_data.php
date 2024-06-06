<style>
   .error{
      color: red;
   }
</style>
<div class="row row-sm">
   <div class="col-lg-12">
      <div class="row row-sm">
       <div class="col-lg-12">
          <div class="card">
           <div class="card-body">
            <form class="enquiry_page_report">
             <h4>Select Filter</h4>
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

      <div class="col-sm-3 col-md-2 input-inside">
         <div class="form-group">
          <label class="form-label">Select Language</label>
          <select class="form-control language select2-show-search form-select" name="language">
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
    <select name="i_country[]" id="i_country" data-placeholder="Intersted Country" class="i_country select2-show-search form-select">
                </select>
    <!--  <?php foreach ($get_all_country as $key => $value) { ?>
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
      <select class="form-control enquiry_type select2-show-search form-select" name="enquiry_type">
         <option>Select Enquiry Type</option>
         <?php foreach ($get_enquiry_type as $key => $value) { ?>
            <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
         <?php } ?>

      </select>
   </div>
</div>

<div class="col-sm-2 col-md-2 input-inside mt-2">
           <div class="form-group">
            <label class="form-label">Finalize Reason</label>
            <select class="form-control select2-show-search form-select reason_type" name="reason_type">
             <option value="">Select Finalize Reason</option>
             <?php foreach ($get_all_drop_reason as $key => $value) { ?>
              <option value="<?= $value->id ?>"><?= $value->pool_status_info ?></option>
            <?php } ?>

          </select>
        </div>
      </div>
      
      
<div class="col-sm-2 col-md-3" style="margin-top:0%;">
   <button type="submit" class="box-btn fill_primary sub_btn" style="
   margin-top: 34px;">Submit</button>
   <button class="btn btn-primary spiner_btn "  type="button" disabled style="display: none;margin-top: 14px;">
     <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
     Loading...
  </button>
  <button type="button" class="box-btn fil_gray reset_btn " style="
  margin-top: 34px;">Reset</button>
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
                <div class="col-sm-2 col-md-3 input-inside">
                   <div class="form-group">
                      <label class="form-label">Name</label>
                      <input class="form-control name" id="name" name="uname" placeholder="Name" type="text">
                  </div>
              </div>
              <div class="col-sm-2 col-md-3 input-inside">
                 <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-control email" id="email" name="email" placeholder="Email" type="text">
                 </div>
              </div>
              <div class="col-sm-2 col-md-3 input-inside">
                 <div class="form-group">
                    <label class="form-label">Number</label>
                    <input class="form-control number" id="number" name="number" placeholder="Number" type="text">
                </div>
             </div>
             <div class="col-sm-3 col-md-3">
                    <button type="submit" class="box-btn fill_primary sub_btn" style="
                    margin-top: 25px;">Submit</button>
                    <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 25px;">
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
<div class="card">
  <div class="card-header">
     <div class="row">
       <!--  <div class="col-10">
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
      <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
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
          <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
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
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}

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
       $('.detail_search .sub_btn').attr('disabled', 'disabled');
    $('.detail_search .spiner_btn').removeAttr('style', 'display: none');
    $('.detail_search .spiner_btn').attr('style', 'margin-top: 0px');
    $('.detail_search .sub_btn').attr('style', 'display: none');
     $.ajax({
      url : base_url+'franchise/reports/generate_finalize_detail_report',
      type : "POST",
      data : $('.detail_search').serializeArray(),
      success :function(data){
          $('.detail_search .sub_btn').removeAttr('disabled', 'disabled');
        $('.detail_search .spiner_btn').attr('style', 'display: none');
        $('.detail_search .sub_btn').removeAttr('style', 'display: none');
        $('.detail_search .sub_btn').attr('style', 'margin-top: 0px');
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
    $('.enquiry_page_report .sub_btn').attr('disabled', 'disabled');
    $('.enquiry_page_report .spiner_btn').removeAttr('style', 'display: none');
    $('.enquiry_page_report .spiner_btn').attr('style', 'margin-top: 0px');
    $('.enquiry_page_report .sub_btn').attr('style', 'display: none');
     $.ajax({
      url : base_url+'franchise/reports/generate_finalize_enquiry_report',
      type : "POST",
      data : $('.enquiry_page_report').serializeArray(),
      success :function(data){
         $('.enquiry_page_report .sub_btn').removeAttr('disabled', 'disabled');
        $('.enquiry_page_report .spiner_btn').attr('style', 'display: none');
        $('.enquiry_page_report .sub_btn').removeAttr('style', 'display: none');
        $('.enquiry_page_report .sub_btn').attr('style', 'margin-top: 0px');
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
     showOtherMonths: true,
     selectOtherMonths: true,
  });
  get_enquiry_report_data();
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
    $('.language').val(null).trigger("change");
    $('.s_description').val(null).trigger("change");
    $('.i_country').val(null).trigger("change");
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
