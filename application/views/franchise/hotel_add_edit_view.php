
<div class="row">
   <div class="col-md-12 col-xl-12">
      <div class="card">
        <!--  <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
         </div> -->
         <div class="card-body">
            <form id="hotel_form" class="form-horizontal well" method="POST" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-12 input-inside mb-2">
                     <label class="form-label">Name <span class="text-red">*</span></label>
                     <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?= isset($view) ? $view->name : set_value('name'); ?>" />
                     <span id="error_name" class="small text-danger"></span>
                  </div>

                  <input type="hidden" name="longitude" id="longitude" placeholder="Longitude" class="form-control" readonly value="<?= isset($view) ? $view->longitude : set_value('longitude'); ?>" />
                  <input type="hidden" name="latitude" id="latitude" placeholder="Latitude" class="form-control" readonly value="<?= isset($view) ? $view->latitude : set_value('latitude'); ?>" />
               </div>

               <div class="row">
                 <?php
                 if( isset($is_meta) && !empty($is_meta) && in_array($is_meta, [Meta::HOTEL, Meta::TOURIST_ATTRACTION]))
                 { ?>
                    <div class="col-md-6 input-inside mb-2">
                       <label class="form-label">Address</label>
                       <textarea name="address" id="address" placeholder="Address" class="form-control" rows="2"><?= isset($view) ? $view->address : set_value('address'); ?></textarea>
                       <span id="error_address" class="small text-danger"></span>
                    </div>

                    <div class="col-md-3 input-inside">
                       <label class="form-label">Country</label>
                       <select class=" form-select select2-show-search country" name="country" id="country" data-placeholder="Choose country">
                          <option value="">Country</option>
                          <?php
                          if(isset($_countries) && !empty($_countries))
                          {
                             foreach($_countries as $value) : 
                                $selected = (isset($view) && isset($view->country) && $view->country == $value->id ? 'selected' : '');
                                ?>
                                <option value="<?= $value->id; ?>" <?= $selected; ?>>
                                   <?= toPropercase($value->name); ?>
                                </option>
                                <?php 
                             endforeach;  
                          }
                          ?>
                       </select>
                       <span class="form-text text-danger" id="error_country"></span>
                    </div>

                    <div class="col-md-3 input-inside">
                      <label class="form-label">City</label>
                      <select class="form-select city" name="city" id="city" data-placeholder="Choose city">
                         <option value="">City</option>
                         <?php
                         if(isset($_cities) && !empty($_cities))
                         {
                            foreach($_cities as $value) : 
                               $selected = (isset($view) && isset($view->city) && $view->city == $value->id ? 'selected' : '');
                               ?>
                               <option value="<?= $value->id; ?>" <?= $selected; ?>>
                                  <?= toPropercase($value->name); ?>
                               </option>
                               <?php 
                            endforeach;  
                         }
                         ?>
                      </select>
                      <span class="form-text text-danger" id="error_city"></span>
                   </div>

                   <?php
                   if( isset($is_meta) && !empty($is_meta) && in_array($is_meta, [Meta::HOTEL]) )
                   {
                     ?>
                     <div class="col-md-3 input-inside">
                        <label class="form-label">Sales Rate</label>
                        <input type="text" name="sales_rate" id="sales_rate" placeholder="Sales rate" class="form-control numbers_only" value="<?= isset($view) ? $view->sales_rate : set_value('sales_rate'); ?>" maxlength="7"/>
                        <span id="error_sales_rate" class="small text-danger"></span>
                     </div>

                     <div class="col-md-3 input-inside">
                        <label class="form-label">Purchase Rate</label>
                        <input type="text" name="room_price" id="room_price" placeholder="Purchase rate" class="form-control numbers_only" value="<?= isset($view) ? $view->room_price : set_value('room_price'); ?>" maxlength="7"/>
                        <span id="error_room_price" class="small text-danger"></span>
                     </div>

                     <div class="col-md-3 input-inside">
                        <label class="form-label">Room Category</label>
                        <select class="form-control select2-show-search form-select" id="room_category" name="room_category" data-placeholder="Choose room category">
                           <option></option>
                           <?php
                           foreach($cats as $val) :
                              $selected = ((!empty($cats) && $val->meta_id == $view->room_category) ? 'selected' : ''); ?>
                              <option value="<?= $val->meta_id; ?>" <?= $selected; ?>>
                                 <?= ucfirst($val->name); ?>
                              </option>
                              <?php
                           endforeach;
                           ?>
                        </select>
                        <span id="error_room_category" class="small text-danger"></span>
                     </div>
                     <?php
                  }
                  ?>

                  <div class="col-md-3 input-inside mb-2">
                    <label class="form-label">Star</label>
                    <input type="text" name="star" id="star" placeholder="Star" class="form-control numbers_only" value="<?= isset($view) ? $view->star : set_value('star'); ?>" maxlength="1"/>
                    <span id="error_star" class="small text-danger"></span>
                 </div>

                 <?php if( isset($is_meta) && !empty($is_meta) && in_array($is_meta, [Meta::TOURIST_ATTRACTION]) )
                 { ?>
                    <div class="col-md-9 input-inside">
                       <label class="form-label">Select Image</label>
                       <input type="file" name="turist_att_image[]" id="turist_att_image" class="form-control " multiple accept="image/*" />
                       <span id="img_error" class="small text-danger"></span>
                    </div>

                    <div class="row">
                       <div class="col-md-12 input-inside mb-2">
                          <label class="form-label">Enter Description <span class="text-red">*</span></label>
                          <textarea class="form-control description" id="description" name="description" placeholder="Enter Description"><?= isset($view) ? $view->description : set_value('description'); ?></textarea>
                       </div>
                       <div class="col-md-6 input-inside">
                        <label class="form-label">Enter Duration<span class="text-red">*</span> <span style="color:red"> (duration in minutes)</span></label>
                        <input type="number" min="10" class="form-control duration" name="duration" id="duration" placeholder="Enter Duration" value="<?= isset($view) && $view->duration != "" ? $view->duration : set_value('duration'); ?>">
                        <span id="error_duration" class="small text-danger"></span>
                     </div>
                     <div class="col-md-6 input-inside">
                        <label class="form-label">Enter Price</label>
                        <input type="number" class="form-control price" name="price" id="price" placeholder="Enter Price" value="<?= isset($view) && $view->price != "" ? $view->price : set_value('price'); ?>" min="1">
                     </div>
                  </div>
                  <div class="row">
                        <div class="col-md-12 input-inside">
                         <label class="form-label">Important things</label>
                         <?php if(!empty($all_sub_things)){ 
                           $i = 1;
                           foreach ($all_sub_things as $key => $val) { ?>

                             <div class="row question_div" style="margin-top: 5px !important;">

                               <input type="hidden" class="form-control" name="things_id[]" id="things_id"  value="<?= $val->id; ?>">


                               <div class="col-sm-4 col-md-4">

                                 <input type="text" class="form-control things"  name="things[]" id="things_<?= $i; ?>" value="<?= $val->things_name ?>">

                               </div>
                               <div class="col-sm-1 col-md-1">
                                 <button type="button" class="btn btn-danger remove_row" data-master="<?= $val->master_id; ?>" value="<?= $val->id; ?>"><i class="fa fa-minus"></i></button>
                               </div>
                             </div>

                             <?php $i++; } } else { ?>
                               <div class="row question_div" style="margin-top: 5px !important;">
                                 <input type="hidden" class="form-control" name="things_id[]" id="things_id"  value="0">
                                 <div class="col-sm-6 col-md-6">
                                   <p>
                                     <input type="text" class="form-control things" name="things[]" placeholder="things" id="things_1">
                                   </p>
                                 </div>
                                 <div class="col-sm-1 col-md-1">
                                   <button type="button" class="btn btn-danger remove_row" value="0"><i class="fa fa-minus"></i></button>
                                 </div>

                               </div>
                             <?php } ?>
                             <div class="row mb-2">
                               <div class="col-sm-4 col-md-4">
                                 <button type="button" class="btn btn-success add_more_row" id="add_more_row">Add More</button>
                               </div>
                             </div>
                           </div>
                         </div>
                  <br/>
                  
                      <div class="row mb-3">  
                      
                       <div class="col-sm-12 col-md-12 input-inside">
                     <label class="form-label"> What's Included</label>
                        <div id="summernote" class="note-codable"><?= isset($view) && !empty($view) ? $view->includedescription : ""; ?></div>
                     </div>
                   </div>  
                   
                  <div class="col-md-12 input-inside">
                     <label class="form-label">Choose Category</label>
                     <select name="turist_category[]" class="form-control select2 turist_category" multiple data-placeholder="Choose Category" value="<?= $view->category_id ?>">
                        <option value=""></option>
                        <?php foreach ($_category as $key => $value) { ?>
                           <option value="<?= $value->category_id ?>" <?= isset($view) && in_array($value->category_id,explode(',',$view->category_id)) ? "selected" : "" ?>><?= $value->name; ?></option>
                        <?php } ?>
                     </select>
                  </div>


               <?php } } ?>

            </div>
            <div class="row">
             <div class="col-sm-6 col-md-4">
                <button type="submit" id="submit_btn" class="box-btn fill_primary mt-4 mb-0">
                   Submit
                </button>
                <input type="hidden" name="is_meta" value="<?= isset($view) ? $view->is_meta : $is_meta; ?>">
                <input type="hidden" name="meta_id" value="<?= isset($view) ? $view->meta_id : ''; ?>">
             </div>
          </div>

       </form>
    </div>
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

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDdm4CEGhsdy430JUxYD1rQk5O11_9LK0&v=3.exp&signed_in=true&libraries=places"></script> -->

<script type="text/javascript">
   $("#name").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/enquiry/get_auto_suggestion_by_name',
        data: {"term" : request.term},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  //initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['value'],
                     val: item['value'],
                     address: item['address'],
                     latitude: item['latitude'],
                     longitude: item['longitude'],
                  };
               }));

            }
         }
      });
    },
    select: function (e, u) {
                //If the No match found" item is selected, clear the TextBox.
                $('#address').val(u.item.address);
                $("#longitude").val(u.item.longitude);
                $("#latitude").val(u.item.latitude);
                if (u.item.val == -1) {
                    //Clear the AutoComplete TextBox.
                    $(this).val("");
                    return false;
                 }
              }
           });
  /* function initialize() {
      var autocomplete = new google.maps.places.Autocomplete(document.getElementById('name'));
      google.maps.event.addListener(autocomplete, 'place_changed', function () {
         var place = autocomplete.getPlace();
         $("#address").val(place.formatted_address);
         $("#longitude").val(place.geometry.location.lng());
         $("#latitude").val(place.geometry.location.lat());
      });
   }*/
</script>

<script type="text/javascript">
  var meta = '<?= $meta ?>';
  $('.goBack').click(function() {
     window.location.href = base_url + 'franchise/settings/meta/' + meta;
  });
  var continue_to = base_url + 'franchise/settings/meta/' + meta;
  var url = $(location).attr('href').split("/").splice(0, 8).join("/");
  if(url == base_url + "franchise/settings/add-meta/tourist_attraction"){
  }
 
  $(document).ready(function() {
   $(document).on('click','#add_more_row',function(){

    var numberIncr = 0;

    var total_tr = $('.question_div').length + 1;
    var $tr=$(".question_div").last();

    var $clone=$tr.clone();
    $clone.find('.remove_row').val("0");
    $clone.find('.things').val('');
    $clone.find('#things_id').val("0");  
    $clone.find('.things').attr('id','things_'+total_tr);

    $tr.after($clone);

  });

  jQuery(document).on('click', '.remove_row', function() {



                var obj = $(this);
                var total_tr = $('.question_div').length;
                var r_id = $(this).val();
                var masterid =  $(this).attr('data-master');

               
                console.log(total_tr);
                console.log(r_id);
                if (total_tr > 1 && r_id == 0) {
                  jQuery(this).closest('.question_div').remove();
                }else if(r_id != 0){
                  swal({
                    title: "Are you sure?",
                    text: "You will not be able recover this record",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes delete it!",
                    closeOnConfirm: false
                  },
                  function () {
                    $.ajax({
                      url: base_url + "franchise/settings/remove_things",
                      type : "POST",
                      data : {
                        "r_id": r_id,
                      },
                      dataType: 'json',
                      success : function(data){
                        if(data.status == "success")
                        {
                          window.location.href = base_url + 'franchise/settings/edit-meta/tourist_attraction/'+masterid;
                        }else {
                          swal({
                            title: "error",
                            text: "something went wrong",
                            type: "error"
                          });

                        }

                      }
                    });
                  }); 

                }


  });
      

   $('#country').on('change',function(){
      var destination = $(this).val();  
      if(destination){
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
        $("#city").empty();
     }
  });

   $('input').change(function() {
     $(this).closest('.form-group').removeClass('has-error');
  });

   $('body').on('blur change', '#name', function() {
     $('#error_name').html('').hide();
     if($(this).val().trim() == '') {
        $('#error_name').html('Please enter name').show();
        $('#name').focus();
     }
  });

   $('body').on('blur change', '#duration', function() {
     $('#error_duration').html('').hide();
     if($(this).val().trim() == '') {
        $('#error_duration').html('Please enter duration').show();
        $('#duration').focus();
     }
  });

   $('body').on('blur change', '#star', function() {
     $('#error_star').html('').hide();
     if($(this).val().trim() == '') {
        $('#error_star').html('Please enter star').show();
        $('#star').focus();
     }
  });

   $('#submit_btn').click(function(e) {
     e.preventDefault();
     var isValid = 1;

     if(url == base_url + "franchise/settings/add-meta/tourist_attraction" || url == base_url + "franchise/settings/edit-meta/tourist_attraction"){
      if($('#duration').val().trim() == '') {
        isValid = 0;
        $('#duration').parents('.form-group').addClass('has-error');
        $('#error_duration').html('Please enter duration').show();
     }
  }else{
     isValid = 1;
  }

  if($('#name').val().trim() == '') {
     isValid = 0;
     $('#name').parents('.form-group').addClass('has-error');
     $('#error_name').html('Please enter name').show();
  }

  var file_nm = $("#turist_att_image").get(0);
  if( typeof file_nm != 'undefined' || file_nm != null ){
     for (var i = 0; i < $("#turist_att_image").get(0).files.length; ++i) {
        var file1=$("#turist_att_image").get(0).files[i].name;
        if(file1){                        
           var file_size=$("#turist_att_image").get(0).files[i].size;
           if(file_size < 20971520){
              var ext = file1.split('.').pop().toLowerCase();                            
              if($.inArray(ext,['jpg','jpeg','gif','png','webp','svg'])===-1){
                 $('#img_error').text("Invalid file extension.please select only 'jpg, jpeg', gif, png, webp, svg' this type of file.");
                 return false;
              }
           }else{
             $('#img_error').text("Image size is too large.upload less than 20 mb.");
             return false;
          }                        
       }
    }
 }

 if(isValid) {
   submit_form();
}
});

   function submit_form() {
     $('#submit_btn').attr('disabled', 'disabled');
     var notedescription = $('.note-codable').summernote('code');
     var formdata = new FormData($('#hotel_form').get(0));
formdata.append('includedescription',notedescription);
     $.ajax({
        type: 'POST',
        url: base_url + 'franchise/settings/ajax-add-hotel',
        data: formdata,
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(data) {
           $('#submit_btn').removeAttr('disabled');
           setTimeout(function() {
              if(data.status == 'success') {
                 quick_swal("success", data.message);
              } else if(data.status == 'exits') {
                 quick_swal("info", data.message);
              } else {
                 quick_swal("warning", "Error! Unable to complete process.");
              }
           }, 500);
           setTimeout(function() {
              window.location = continue_to;
           }, 2500);
        }, error: function(data) {
           $('#submit_btn').removeAttr('disabled');
           quick_swal("warning","Error! Unable to complete process.");
        }
     });
  }

});
</script>