<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
          <form class="pool_page_report">
           <h4>Select Filter</h4>
           <div class="row">

            <div class="col-sm-5 col-md-5">
             <div class="form-group">
               <label class="form-label">Select Country</label>
               <select class="form-control select2-show-search country_id" name="country_id" id="country_id" data-placeholder="Select Country">
                  <option value=""></option>
                  <?php foreach ($get_all_country as $key => $value) { ?>
                     <option value="<?= $value->id ?>" <?= isset($_view) && $value->id == $_view->destination ? "selected" : "" ?>><?= $value->name ?></option>
                  <?php    } ?>
               </select>
            </div>
         </div>

         <div class="col-sm-5 col-md-5">
          <div class="form-group">
           <label class="form-label">Select City</label>
           <select class="form-control city select2-show-search form-select city" name="city" id="city" data-placeholder="Select City">
           </select>
        </div>
     </div>

     <div class="col-sm-2 col-md-2" style="margin-top: 35px;">
        <button type="button" class="btn btn-primary reset_btn">Reset</button>
     </div>
  </div>
</form>
</div>
</div>


<div class="card">

   <div class="card-header">
      <div class="row">
         <div class="col-7">
            <h3 class="card-title"><?= $title; ?></h3>
         </div>
         <div class="col-5" >
            <a href="<?= base_url(). 'itenerary/add'; ?>" class="btn btn-info btn-sm pull-right" style="margin: 0 2px;">
               Add 
            </a>
            <button class="btn btn-success btn-sm pull-right btn-sm generate_travel_itenary" data-bs-effect="effect-rotate-left" style="margin: 0 2px;">
               Create Autometic Itinerary 
            </button>
         </div>
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
                     <select name="turist_category[]" class="form-control select2 turist_category" data-placeholder="Choose Category" multiple>
                        <option value=""></option>
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
</div>
</div>
</div>

<script>
   function get_itinerary_tbl_records(){
      var destination = $('#country_id').val();
      var city = $('#city').val();
      $.ajax({
         type:"POST",
         url: base_url + "itenerary/get_itinerary_tbl_records",
         data : {destination : destination,city : city},
         success:function(res){
            $('.itenerary_div').html(res);
            $('#responsive-datatable').DataTable();
         }
      });
   }
   $(document).on('change','#destination',function(){
      var destination = $(this).val();  
      if(destination){
         $.ajax({
            type:"POST",
            url: base_url + "itenerary/get_all_cities_by_country_ids",
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
           searchInputPlaceholder: "assss"
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
       url : base_url + 'itenerary/send_email_of_itinerary',
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
         $('#send_itinerary_mail_model').modal('toggle');
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
               url: base_url + "itenerary/get_all_cities_by_country_ids",
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
            },
            "destination": {
               required:true
            },
            "i_name": {
               required:true
            },
         },
         messages : {
            "i_day": {
               required:"please enter no of days"
            },
            "destination": {
               required:"please select country"
            },
            "i_name": {
               required:"please enter itinerary name"
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
               url: base_url + "itenerary/generate_autometic_itinerary",
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
              url: base_url + 'itenerary/fetch_itenerary_data_view',
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
                    url: base_url + 'itenerary/delete_itenerary_data',
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