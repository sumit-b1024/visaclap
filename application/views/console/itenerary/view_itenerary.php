<?php
$user_role              =  $this->session->userdata('user_role');
$action_access       =   [User_role::SUPER_ADMIN,User_role::FRANCHISE];
 ?>
<div class="row row-sm">
   <div class="col-lg-12">

      
           <form class="pool_page_report cmn-blk">
             <div class="row">

               <div class="col-sm-5 col-md-5 input-inside">
                 <div class="form-group">
                  <label class="form-label">Select Country</label>
                  <select class="form-control select2-show-search country_id" name="country_id" id="country_id" data-placeholder="Select Country">
                     <option value="">Select Country</option>
                     <?php foreach ($get_all_country as $key => $value) { ?>
                        <option value="<?= $value->id ?>" <?= isset($_view) && $value->id == $_view->destination ? "selected" : "" ?>><?= $value->name ?></option>
                     <?php    } ?>
                  </select>
               </div>
            </div>

            <div class="col-sm-4 col-md-4 input-inside">
              <div class="form-group">
                <label class="form-label">Select City</label>
                <select class="form-control city select2-show-search form-select city" name="city" id="city" data-placeholder="Select City">
                </select>
             </div>
          </div>

          <div class="col-sm-2 col-md-2 ">
           <label class="custom-control custom-checkbox-md" style="margin-top: 13% !important;">Is Global
            <input type="checkbox" class="custom-control-input" id="is_local_global" name="is_local_global">
            <span class="custom-control-label"></span>
         </label>
      </div>

      <div class="col-sm-1 col-md-1" style="margin-top: 25px;margin-left: -5%;">
       <button type="button" class="btn btn-dark1 reset_btn" style="background-color: #092243;color: white;">Reset</button>
    </div>
 </div>
</form>

<br/>

<div class="card">

   <div class="card-header">
      <div class="row">
         <div class="col-7">
            <h3 class="card-title"><?= $title; ?></h3>
         </div>
         <?php if(in_array($user_role, $action_access)) { ?>
         <div class="col-5" >
            <a href="<?= base_url(). 'franchise/itenerary/add'; ?>" class="box-btn fill_primary pull-right" style="margin: 0 2px;">
               Add 
            </a>
            <!-- <button class="btn btn-success pull-right generate_travel_itenary">
               Create Autometic Itinerary 
            </button> -->
            <button type="button" class="box-btn fill_primary pull-right itinerary_pool_send_mail" style="margin: 0 2px;"><i class="fa fa-plane"></i> Send Mail</button>
         </div>
      <?php } ?>
      <?php if($user_role == User_role::FRANCHISE_STAFF) { ?>
         <div class="col-5" >
            
            <button type="button" class="box-btn fill_primary itinerary_pool_send_mail" ><i class="fa fa-plane"></i> Send Mail</button>

         </div>
      <?php } ?>
      </div>
   </div>

   <div class="card-body">
      <div class="table-responsive itenerary_div">

      </div>
   </div>

   <!-- Model For Show Follow Up -->
   <div class="modal fade bd-example-modal-lg" id="view_itenerary_preview">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content modal-content-demo">
            <form class="">
               <input type="hidden" name="record_id" id="record_id">
               <div class="modal-header">
                  <h6 class="modal-title"><b>View Preview</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>

               <div class="modal-body itenerary_preview_div">
               </div>

               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- modal over -->

   <!-- Model For Show Follow Up -->
   <div class="modal fade " id="generate_itinerary_model" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog " role="document">
         <div class="modal-content modal-content-demo">
            <form class="store_itineraty_form_data">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Generate Autometic Itinerary</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>

               <div class="modal-body follow_up_body">
                  <div class="form-group">
                     <label class="form-label "><b>Itinerary Name</b> <span class="text-red"> *</span></label>
                     <input type="text" class="form-control i_name" name="i_name" placeholder="Enter Itinerary Name">
                  </div>

                  <div class="form-group">
                     <label class="form-label "><b>Days</b> <span class="text-red"> *</span></label>
                     <input type="text" class="form-control i_day" name="i_day" placeholder="Enter Days" max="10" min="1">
                  </div>

                  <div class="form-group">
                     <label class="form-label"><b>Choose Category</b></label>
                     <select class="form-control select2 select2-dropdown turist_category" name="turist_category[]"  multiple="multiple" data-placeholder="Choose Category">
                        <option></option>
                        <?php foreach ($_category as $key => $value) { ?>
                           <option value="<?= $value->category_id ?>"><?= $value->name; ?></option>
                        <?php } ?> 
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label"><b>Country</b><span class="text-red"> *</span></label>
                     <select class="form-control select2-show-search form-select destination" name="destination" id="destination" data-placeholder="Select Destination">
                        <option value="">Select Country</option>
                        <?php foreach ($get_all_country as $key => $value) { ?>
                           <option value="<?= $value->id ?>"><?= $value->name ?></option>
                        <?php    } ?>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label"><b>City </b></label>
                     <select class="form-control select2-show-search city" name="city" id="citys" data-placeholder="Select City">
                        <option value="">Select City</option>
                     </select>
                  </div>


                  <div class="form-group">
                     <label class="form-label"><b>Select Star</b></label>
                     <div class="checkbox_div" style="display: inline-flex !important;">
                        <label class="custom-control custom-checkbox-md">
                           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="1">
                           <span class="custom-control-label" style="padding: 7px;"><b>1</b></span>
                        </label>

                        <label class="custom-control custom-checkbox-md">
                           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="2">
                           <span class="custom-control-label" style="padding: 7px;"><b>2</b></span>
                        </label>

                        <label class="custom-control custom-checkbox-md">
                           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="3">
                           <span class="custom-control-label" style="padding: 7px;"><b>3</b></span>
                        </label>

                        <label class="custom-control custom-checkbox-md">
                           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="4">
                           <span class="custom-control-label" style="padding: 7px;"><b>4</b></span>
                        </label>

                        <label class="custom-control custom-checkbox-md">
                           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="5">
                           <span class="custom-control-label" style="padding: 7px;"><b>5</b></span>
                        </label>
                     </div>
                  </div>
                  <div class="alert alert-danger failed_warn" role="alert" style="display:none">
                  </div>
               </div>
               <br>
               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary generate_itinerary" >Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <div class="modal fade bd-example-modal-lg" data-toggle="modal" id="send_itinerary_mail_model" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content modal-content-demo">
            <form class="send_itinerary_mail">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Send Email</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>

               <div class="modal-body ">
                  <div class="form-group">
                     <label class="form-label "><b>Select Enquiry</b> <span class="text-red"> *</span></label>
                     <select class="form-control select2-show-search form-select" name="enquiry_id[]" multiple id="enquiry_id">
                        <?php foreach ($get_all_enquiry as $key => $value) { ?>
                           <option value="<?= $value->id ?>" ><?=  $value->name.' - '.$value->email  ?></option>
                        <?php  } ?>
                     </select>
                     <label class="form-label "><b>Email</b> </label>
                     <input class="form-control" type="email" name="uemail" >
                  </div>
                  <div class="alert alert-danger failed_warn_email_alert" role="alert" style="display:none">
                  </div>
               </div>
               <br>
               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary email_send_btn">Submit</button>
                  <button class="btn btn-primary email_spinner" type="button" disabled style="display:none;">
                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                   Please Wait...
                </button>
             </div>
          </form>
       </div>
    </div>
 </div>

 <div class="modal fade bd-example-modal-lg" data-toggle="modal" id="send_itinerary_wap_model" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content modal-content-demo">
            <form class="send_itinerary_wap">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Send Itinerary</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>

               <div class="modal-body ">
                  <div class="form-group">
                     <label class="form-label "><b>Select Enquiry</b> <span class="text-red"> *</span></label>
                     <select class="form-control select2-show-search form-select" name="wap_enquiry_id" id="wap_enquiry_id">
                        <option value=""></option>
                        <?php foreach ($get_all_enquiry as $key => $value) { ?>
                           <option value="<?= $value->id ?>" ><?=  $value->name.' - '.$value->email.' - '.$value->mobile_no  ?></option>
                        <?php  } ?>
                     </select>
                  </div>
                  <div class="alert alert-danger failed_warn_wap_alert" role="alert" style="display:none">
                  </div>
                  <input type="hidden" class="singleitinerary" name="singleitinerary" value="">
               </div>
               <br>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary wap_send_btn">Submit</button>
                  <button class="btn btn-primary wap_spinner" type="button" disabled style="display:none;">
                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                   Please Wait...
                </button>
             </div>
          </form>
       </div>
    </div>
 </div>


 <div class="modal fade bd-example-modal-lg" data-toggle="modal" id="send_itinerary_image_model" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content modal-content-demo">
            <form class="send_itinerary_image" id="send_itinerary_image" enctype="multipart/form-data">
               <div class="modal-header">
                  <h6 class="modal-title"><b>View Itinerary Images
</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>

               <div class="modal-body ">
                  <div class="col-md-12">
                      <label class="form-label">itinerary Image</label>
                      <input type="file" name="itinerary_att_image[]" id="itinerary_att_image" class="form-control" multiple accept="image/*" />
                      <span id="img_error" class="small text-danger"></span>
                    </div>
                  <div class="alert alert-danger failed_warn_wap_alert" role="alert" style="display:none">
                  </div>
                  <input type="hidden" class="singleitinerary" name="singleitinerary" value="">
                  <br/>
                  <div class="col-md-12">
                     <div class="view_enc_img"></div>
                  </div>      
               </div>
               <br>
               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="box-btn fill_primary image_send_btn">Submit</button>
                  <button class="btn btn-primary wap_spinner" type="button" disabled style="display:none;">
                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                   Please Wait...
                </button>
             </div>
          </form>
       </div>
    </div>
 </div>

</div>
</div>
</div>

<script>
   function get_itinerary_tbl_records(){


      var destination = $('#country_id').val();
      var city = $('#city').val();
      var checkbox = $('#is_local_global:checkbox:checked').length > 0;
      $.ajax({
         type:"POST",
         url: base_url + "franchise/itenerary/get_itinerary_tbl_records",
         data : {destination : destination,city : city,checkbox : checkbox},
         success:function(res){
            $('.itenerary_div').html(res);
            $('#responsive-datatable').DataTable();
         }
      });
   }
   $("#is_local_global").change(function() {
        get_itinerary_tbl_records();          
  });

   $(document).on('change','#destination',function(){
      var destination = $(this).val();  
      if(destination){
         $.ajax({
            type:"POST",
            url: base_url + "franchise/itenerary/get_all_cities_by_country_ids",
            data : {destination : destination},
            success:function(res){
               data = $.parseJSON(res);      
               if(data){
                  $("#citys").empty();
                  $("#citys").append('<option value="">Select City</option>');
                  $.each(data,function(key,value){
                     $("#citys").append('<option value="'+value.id+'">'+value.name+'</option>');
                  });

               }else{
                  $("#citys").empty();
               }
            }
         });
      }else{
         $("#citys").empty();
      }
   });

   $(document).ready(function() {
      get_itinerary_tbl_records();

      $(document).on('click','.itinerary_pool_send_mail',function(){
         $('#send_itinerary_mail_model').modal('toggle');
         $('#send_itinerary_mail_model').modal({ backdrop: 'static', keyboard: false });
         $('.select2-show-search').select2({
          dropdownParent: $('#send_itinerary_mail_model'),
          width: "100%",
       });
      });

      $(document).on('click','.open_itinerary_wap_model',function(){
         $('.singleitinerary').val($(this).data('id'));
         $('#send_itinerary_wap_model').modal('toggle');
         $('#send_itinerary_wap_model').modal({ backdrop: 'static', keyboard: false });
         $('.select2-show-search').select2({
          dropdownParent: $('#send_itinerary_wap_model'),
          width: "100%",
          placeholder : "Select Enquiry"
       });
      });


      $(document).on('click','.open_itinerary_image_model',function(){
          var record_id = $(this).data('id');
        $('.singleitinerary').val($(this).data('id'));
        $.ajax({
            type: 'POST',
            url: base_url + 'franchise/itenerary/get_all_itinerary_images/',
            data:{record_id},
            success: function(result) {
                $('.view_enc_img').html("");
                $('.view_enc_img').html(result);
                $('#send_itinerary_image_model').modal('toggle');
                $('#send_itinerary_image_model').modal('show');

            }
        });
         
      });


      /*$('#responsive-datatable_wrapper').on('click', '.open_itinerary_image_model', function () { alert('asdfasdf'); 
        var record_id = $(this).data('id');
        $('.singleitinerary').val($(this).data('id'));
        $.ajax({
            type: 'POST',
            url: base_url + 'franchise/itenerary/get_all_itinerary_images/',
            data:{record_id},
            success: function(result) {
                $('.view_enc_img').html("");
                $('.view_enc_img').html(result);
                $('#send_itinerary_image_model').modal('toggle');
                $('#send_itinerary_image_model').modal('show');

            }
        });

    });*/


       $(document).on('submit','.send_itinerary_image',function(e){
        e.preventDefault();

      
      var formdata = new FormData($('#send_itinerary_image').get(0));
      //form.push({ name: "sub_array", value: sub_array });

      $.ajax({
        url : base_url + 'franchise/itenerary/send_itinerary_image',
        type : "POST",
        data : formdata,
        cache:false,
         contentType: false,
         processData: false,
        dataType: 'json',
        beforeSend: function( jqXHR ) {
         $('.image_send_btn').attr('disabled','disabled');
         $('.wap_spinner').removeAttr('style');
         $('.image_send_btn').attr('style','display:none');
      },
      success : function(data){

        $('.image_send_btn').removeAttr('disabled','disabled');
        $('.image_send_btn').removeAttr('style','display:none');
        $('.wap_spinner').attr('style','display:none');
        if(data.status == "success"){
         $('#send_itinerary_image_model').modal('toggle');
         
         
         Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
       });
      }else{
       Swal.fire("Success!", data.message, "success").then(function(){
       });

    }

 }
});
   });


      $(document).on('submit','.send_itinerary_wap',function(e){
        e.preventDefault();

        var sub_array = []
        $("input:radio[name=itinerary_td]:checked").each(function(){
         sub_array.push($(this).val());
      });

        var enquiry_id = $('#wap_enquiry_id').val();
        if($.isEmptyObject(enquiry_id)) {
         $('.failed_warn_wap_alert').removeAttr('style');
         $('.failed_warn_wap_alert').text("Please Select Atleast One Itinerary.");
         return false;

      }else{
         $('.failed_warn_wap_alert').attr('style','display:none');
         $('.failed_warn_wap_alert').text("");
      }

      var form = $(this).serializeArray();
      //form.push({ name: "sub_array", value: sub_array });

      $.ajax({
        url : base_url + 'franchise/itenerary/send_wap_of_itinerary',
        type : "POST",
        data : form,
        dataType: 'json',
        beforeSend: function( jqXHR ) {
         $('.wap_send_btn').attr('disabled','disabled');
         $('.wap_spinner').removeAttr('style');
         $('.wap_send_btn').attr('style','display:none');
      },
      success : function(data){

        $('.wap_send_btn').removeAttr('disabled','disabled');
        $('.wap_send_btn').removeAttr('style','display:none');
        $('.wap_spinner').attr('style','display:none');
        if(data.status == "success"){
         $('#send_itinerary_wap_model').modal('toggle');
         
         window.open( "https://wa.me/"+data.data.mobile_no+"/?text=" + data.data.content, '_blank'); 
          location.reload();
        /* Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
       });*/
      }else{
       Swal.fire("Success!", data.message, "success").then(function(){
       });

    }

 }
});
   });

      
      $(document).on('submit','.send_itinerary_mail',function(e){

        e.preventDefault();

        var sub_array = []
        $("input:radio[name=itinerary_td]:checked").each(function(){
         sub_array.push($(this).val());
      });

        var enquiry_id = $('#enquiry_id').val();
        if($.isEmptyObject(sub_array)) {
         $('.failed_warn_email_alert').removeAttr('style');
         $('.failed_warn_email_alert').text("Please Select Atleast One Itinerary.");
         return false;

      }else{
         $('.failed_warn_email_alert').attr('style','display:none');
         $('.failed_warn_email_alert').text("");
      }

      var form = $(this).serializeArray();
      form.push({ name: "sub_array", value: sub_array });

      $.ajax({
        url : base_url + 'franchise/itenerary/send_email_of_itinerary',
        type : "POST",
        data : form,
        dataType: 'json',
        beforeSend: function( jqXHR ) {
         $('.email_send_btn').attr('disabled','disabled');
         $('.email_spinner').removeAttr('style');
         $('.email_send_btn').attr('style','display:none');
      },
      success : function(data){

        $('.email_send_btn').removeAttr('disabled','disabled');
        $('.email_send_btn').removeAttr('style','display:none');
        $('.email_spinner').attr('style','display:none');
        if(data.status == "success"){
        /* $('#send_itinerary_mail_model').modal('toggle');
         
         
         Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
       });*/
        location.reload();
      }else{
         Swal.fire('Warning!', data.message, 'warning');
    }

 }
});
   });

      $(document).on('change','#itinerary_th',function(){
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

      $(document).on('change','#city',function(){
         get_itinerary_tbl_records();
      });

      $(document).on('click','.generate_travel_itenary',function(){
         $('#generate_itinerary_model').modal('toggle');
         $('.select2-show-search').select2({
          dropdownParent: $('#generate_itinerary_model'),
          width: "100%"
       });
      });

      $('#country_id').on('change',function(){
         var destination = $(this).val();  
         if(destination){
            get_itinerary_tbl_records();
            $.ajax({
               type:"POST",
               url: base_url + "franchise/itenerary/get_all_cities_by_country_ids",
               data : {destination : destination},
               success:function(res){
                  data = $.parseJSON(res);      
                  if(data){
                     $("#city").empty();
                     $("#city").append('<option>Select City</option>');
                     $.each(data,function(key,value){
                        $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                     });

                  }else{
                     $("#city").empty();
                  }
               }
            });
         }else{
            $("#state").empty();
            $("#city").empty();
         }
      });

      $(".store_itineraty_form_data").validate({
         ignore: '',
         rules: {
            "i_day": {
               required:true
            },"i_name": {
               required:true
            },
            "destination": {
               required:true
            },
         },
         messages : {
            "i_day": {
               required:"please enter no of days"
            },"i_name": {
               required:"please enter itinerary name"
            },
            "destination": {
               required:"please select country"
            },
         },
         errorElement: 'span',
         errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
         },
         highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
         },
         unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
         }
      });

      $(document).on('submit','.store_itineraty_form_data',function(e){
         e.preventDefault();
         if($(this).valid()){
            $.ajax({
               type:"POST",
               url: base_url + "franchise/itenerary/generate_autometic_itinerary",
               data : $(this).serializeArray(),
               dataType:"json",
               success:function(res){
                  if(res.status == 'success'){
                     $('#generate_itinerary_model').modal('toggle');
                     Swal.fire("Success!", res.msg, "success").then(function(){
                      location.reload();
                   });
                  }else{
                     $('.failed_warn').removeAttr('style');
                     $('.failed_warn').text(res.msg);
                  }
               }
            });
         }
      });

      // $('#destination').on('change',function(){

         $(document).on('click','.view_btn',function(){
            var r_id = $(this).data('id');
            $.ajax({
             type: 'POST',
             url: base_url + 'franchise/itenerary/fetch_itenerary_data_view',
             data:{'r_id' : r_id},
             success : function(data){
               $('.itenerary_preview_div').html("");
               $('.itenerary_preview_div').html(data);
               $('#view_itenerary_preview').modal('toggle');
            }
         });
         });
         $(document).on('click', '.delete_btn', function () {
            var id = $(this).data('id');
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
                   url: base_url + 'franchise/itenerary/delete_itenerary_data',
                   data:{'id' : id},
                   dataType : 'json',
                   success: function(result) {
                      if(result.status == 'success'){
                         Swal.fire("Deleted!", result.msg, "success").then(function(){
                            location.reload();
                         });
                      }else{
                         Swal.fire('Warning!', result.msg, 'warning')

                      }
                   }
                });
             }

          });

       });

         $(document).on('click', '.reset_btn',function(e){
            $('.country_id').val(null).trigger("change");
            $('.city').val(null).trigger("change");
         });
      });
   </script>