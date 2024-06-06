<div class="row row-sm">
    <div class="col-lg-12">
     <!-- filter start -->
     <div class="card">
         <div class="card-body">
          <!-- <form method="get" action="" accept-charset="utf-8"> -->
              <form class="filter_turist_att_form">
               <div class="row">

                <?php 
                $country_id = $_GET['country'];
                $city_id = $_GET['city'];
                $turist_category_id = explode(',',$_GET['turist_category']);
                $star_url_arr = explode(',',$_GET['star']);
                $place_box = $_GET['place'];
                ?>
                <div class="col-sm-2 col-md-2">
                 <div class="form-group input-inside">
                    <label class="form-label">Choose Country</label>
                    <select class="form-control country form-select" name="country" id="country" data-placeholder="Country">
                      <option value="">Choose Country</option>
                      <?php
                      if(isset($_countries) && !empty($_countries))
                      {
                         foreach($_countries as $value) : 
                            $selected = (isset($country_id) && $country_id == $value->id ? 'selected' : '');
                            ?>
                            <option value="<?= $value->id; ?>" <?= $selected; ?>>
                               <?= toPropercase($value->name); ?>
                           </option>
                           <?php 
                       endforeach;  
                   }
                   ?>
               </select>
           </div>
       </div>

       <div class="col-sm-2 col-md-2">

         <div class="form-group input-inside">
            <label class="form-label">Choose City</label>
            <select class="form-control city form-select" name="city" data-placeholder="City" id="city">
              <option value="">Choose City</option>
              <?php if(isset($get_all_city_by_country_id)){ 
                foreach ($get_all_city_by_country_id as $key => $value) { ?>  
                  <option value="<?= $value->id ?>" <?= isset($city_id) && $city_id == $value->id ? "selected" : ""; ?>><?= $value->name ?></option>
              <?php } ?>
          <?php } ?> 
      </select>
  </div>
</div>

<div class="col-sm-4 col-md-4">
 <div class="form-group input-inside">
     <label class="form-label"><b>Star</b></label>
     <div class="checkbox_div" style="">
        <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star" id="never_expiry" value="1" <?= isset($star_url_arr) && in_array('1',$star_url_arr) ? "checked" : ""; ?>>
           <span class="custom-control-label" style="padding: 7px;"><b>1</b></span>
       </label>

       <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star" id="never_expiry" value="2" <?= isset($star_url_arr) && in_array('2',$star_url_arr) ? "checked" : ""; ?>>
           <span class="custom-control-label" style="padding: 7px;"><b>2</b></span>
       </label>

       <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star" id="never_expiry" value="3" <?= isset($star_url_arr) && in_array('3',$star_url_arr) ? "checked" : ""; ?>>
           <span class="custom-control-label" style="padding: 7px;"><b>3</b></span>
       </label>

       <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star" id="never_expiry" value="4" <?= isset($star_url_arr) && in_array('4',$star_url_arr) ? "checked" : ""; ?>>
           <span class="custom-control-label" style="padding: 7px;"><b>4</b></span>
       </label>

       <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star" id="never_expiry" value="5" <?= isset($star_url_arr) && in_array('5',$star_url_arr) ? "checked" : ""; ?>>
           <span class="custom-control-label" style="padding: 7px;"><b>5</b></span>
       </label>
   </div>
</div>
</div>
<!-- </div> -->

<div class="col-md-2 col-sm-2 input-inside">
  <label class="form-label">Choose Category</label>
  <select name="turist_category" class="form-control select2 turist_category" data-placeholder="Choose Category" multiple id="turist_category">
   <option value=""></option>
   <?php foreach ($_category as $key => $value) { ?>
     <option value="<?= $value->category_id ?>" <?= isset($turist_category_id) && in_array($value->category_id, $turist_category_id) ? "selected" : ""; ?>><?= $value->name; ?></option>
 <?php } ?>
</select>
</div>

<div class="col-sm-2 col-md-2 input-inside">
 <div class="form-group">
     <label class="form-label d-block"><b>Include My Places</b></label>
     <div class="checkbox_div" style="display: inline-flex !important;">
       <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input include_place" name="include_place" id="include_place" value="1"  <?= isset($place_box) && $place_box == "1" ? "checked" : ""; ?>>
           <span class="custom-control-label" style="padding: 7px;"  ><b></b></span>
       </label>
   </div>
</div>
</div>

<div class="col-sm-12 col-md-12 ">
   <button type="submit" class="box-btn fill_primary pull-right">Submit</button>
   <a href="<?php echo base_url(); ?>franchise/settings/meta/tourist_attraction"  class="box-btn fil_gray pull-right mx-2">Reset</a>
</div>
</div>
</form>
</div>
</div>
<!-- filter end -->
<br/>
<div class="card">
 <!-- Model For Show Follow Up -->
 <div class="modal fade bd-example-modal-lg" id="view_follow_up_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="follow_up_form">
            <input type="hidden" name="record_id" id="record_id">
            <div class="modal-header">
                <h6 class="modal-title"><b>View Tourist Images</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body view_enc_img">
            </div>

            <div class="modal-footer">
               <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
           </div>
       </form>
   </div>
</div>
</div>

<div class="card-header">


    <div class="modal fade " id="create_itinerary_franchise" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog " role="document">
         <div class="modal-content modal-content-demo">
            <form class="store_itineraty_form_data_franchise">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Generate Autometic Itinerary</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body follow_up_body">

                <div class="col-sm-12 col-md-12">
                     <div class="form-group">
                        <label class="form-label"><b>Enter Days <span class="text-red">*</span></b></label>
                        <input type="text" class="form-control i_day" name="i_day" placeholder="Enter Days" required>
                    </div>
                 </div>

                <div class="col-sm-12 col-md-12">
                 <div class="form-group">
                    <label class="form-label"><b>Enter Itineray Title <span class="text-red">*</span></b></label>
                    <input type="text" class="form-control" name="itinerary_title" placeholder="Enter Itineray Title" required>
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


<div class="row">
   

    <div class="col-12">
        <a href="<?= FRANCHISE . '/settings/add-meta/' . $meta; ?>" class="box-btn fill_primary pull-right">
            <i class="fa fa-plus"></i> Add
        </a>
        <button type="button" class="btn btn-success btn-sm pull-right create_iti_btn" style="display:none;">
            Create Itinerary
        </button>
    </div>                    
</div>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
            <thead>
                <tr>
                    <th width="wd-15p border-bottom-0"> 
                        <label class="custom-control custom-checkbox-md">
                         <input type="checkbox" class="custom-control-input never_expiry_franchis" name="itinerary_star[]" id="never_expiry_franchis" value="3">
                         <span class="custom-control-label" style="padding: 7px;"></span>
                     </label> </th>
                     <th width="wd-15p border-bottom-0"> Name </th>
                     <?php
                     if(isset($title) && in_array($title, ['Hotel', 'Tourist Attraction']))
                     {
                        ?>
                        <th width="wd-15p border-bottom-0"> Star </th>
                        <?php
                        if(isset($title) && in_array($title, ['Hotel']))
                        {
                            ?>
                            <th width="wd-15p border-bottom-0"> Category </th>
                            <th width="wd-15p border-bottom-0"> Sales Rate </th>
                            <th width="wd-15p border-bottom-0"> Purchase Rate </th>
                            <th width="wd-15p border-bottom-0"> Address </th>
                            <?php
                        }
                        ?>
                        <th width="wd-15p border-bottom-0"> Country </th>
                        <th width="wd-15p border-bottom-0"> City </th>
                        <th width="wd-15p border-bottom-0"> Status </th>
                        <?php
                    }
                    else
                    {
                        ?>
                        <th width="wd-15p border-bottom-0"> Created on </th>
                        <?php
                    }
                    ?>
                    <th width="wd-15p border-bottom-0"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_view as $view):
                    ?>
                    <tr id='r-<?= $view->meta_id; ?>'>
                       <td>
                        <label class="custom-control custom-checkbox-md">
                         <input type="checkbox" class="custom-control-input itinerary_checkbox" name="itinerary_checkbox" id="itinerary_checkbox" value="<?= $view->meta_id; ?>">
                         <span class="custom-control-label" style="padding: 7px;"></span>
                     </label>
                 </td>
                 <td> 
                    <?php
                    if(isset($title) && $title == 'Destination' || $title == 'Hotel')
                    {
                        ?>
                        <a href="<?= base_url('settings/get-media').'/'.$view->meta_id; ?>">
                            <?= toPropercase(decode($view->name)); ?>
                        </a>
                        <?php
                    }
                    else
                    {
                        echo toPropercase(decode($view->name));
                    }
                    ?>
                </td>
                <?php
                if(isset($title) && in_array($title, ['Hotel', 'Tourist Attraction']))
                {
                    ?>
                    <td><?= $view->star; ?> Star</td>
                    <?php
                    if(isset($title) && in_array($title, ['Hotel']))
                    {
                        ?>
                        <td><?= Hotel_category::getValue($view->room_category); ?></td>
                        <td><?= number_format($view->sales_rate, 0); ?></td>
                        <td><?= number_format($view->room_price, 0); ?></td>
                        <td><?= toPropercase($view->address); ?></td>
                        <?php
                    }
                    ?>
                    <td><?= toPropercase($view->country); ?></td>
                    <td><?= toPropercase($view->city); ?></td>
                    <td id="status_<?=$view->meta_id ?>"><?= ($view->is_status == "1") ? "Deactive" : "Active" ?></td>
                    <?php
                }
                else
                {
                    ?>
                    <td><?= date('d M Y H:i', $view->created_on); ?></td>
                    <?php
                }
                ?>
                <td>
                    <?php if($view->is_local_or_global == "1"){ ?>
                        <a href="<?= ROOT_URL . 'franchise/settings/edit-meta/' . $meta .'/'. $view->meta_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <a href="javascript:;" data-id="<?= $view->meta_id; ?>" data-table="<?= TBL_PACKAGE_META; ?>" data-row="meta_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    <?php } ?>

                    <?php if(isset($title) && in_array($title, ['Tourist Attraction']))
                    { ?>

                        <a class="btn btn-secondary btn-sm view_all_tour_images"  href="javascript:void(0)" value="<?= $view->meta_id ?>"  data-toggle="tooltip" data-placement="top" title="View Enquiry Image">
                         <i class="fa fa-eye"></i>
                     </a>

                 <?php  } ?>
             </td>
         </tr>
         <?php
     endforeach;
     ?>
 </tbody>
</table>
</div>
</div>

</div>
</div>
</div>

<script>
   $(document).ready(function() {
    $(document).on('submit','.filter_turist_att_form',function(e){
        e.preventDefault();
        var country = $('#country :selected').val();
        var city = $('#city :selected').val();
        var turist_category = $('select[name=turist_category]').val();

        if($("#include_place").prop("checked") == true){
            var place = '1';
        } else {
            var place = '2';
        }         
        var array = [];  
        $('input[name="itinerary_star"]:checked').each(function() {
         array.push(this.value);
     });
        var star = array.toString();
        var url = base_url + "franchise/settings/meta/tourist_attraction?country=" + country + "&city=" + city + "&star=" + star + "&turist_category=" + turist_category.join(',') + "&place=" + place;
        window.location.href = url; 
        country_change_events();
        // $('.url_city_id').attr('value',city);
    });  


    function country_change_events(){

      var destination = $('#country').val();  
      var url_city_id = $('.url_city_id').val();
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
                    // if(url_city_id != "" && value.id == url_city_id){
                    //     var selected = "selected";
                    // }else{
                    //     var selected = "";
                    // }
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

}

$(document).on('click','.create_iti_btn',function(){
    $('#create_itinerary_franchise').modal('show');
    $('.select2-show-search').select2({
        dropdownParent: $('#create_itinerary_franchise'),
        width: "100%"
    });
});


var $checkboxes = $('#responsive-datatable td input[type="checkbox"]');
$(document).on('change','.never_expiry_franchis',function(){
 if($(this).prop('checked')){
  $('#responsive-datatable tbody tr td input[type="checkbox"]').each(function(){
   $(this).prop('checked', true);
   $('.create_iti_btn').removeAttr('style','display:none');

});
}else{
  $('#responsive-datatable tbody tr td input[type="checkbox"]').each(function(){
   $(this).prop('checked', false);
   $('.create_iti_btn').attr('style','display:none');

});
}
});

$(document).on('click','.itinerary_checkbox',function(){

    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;

        if(countCheckedCheckboxes >= 1) {
           $('.create_iti_btn').removeAttr('style','display:none');
       } else {
           $('.create_iti_btn').attr('style','display:none');
       }
   });
       
   });  




    $(document).on('submit','.store_itineraty_form_data_franchise',function(e){
        e.preventDefault();

        var sub_array = []
        $("input:checkbox[name=itinerary_checkbox]:checked").each(function(){
         sub_array.push($(this).val());
     });

        if(sub_array.length < 0)
        {
            $('.failed_warn').text('Select Atleast One Attraction');
            return false;
        }else{
            $('.failed_warn').text('');
        }
        var seri_form = $(this).serializeArray();
        seri_form.push({ name: "att_id", value: sub_array });
            // console.log(seri_form);

            $.ajax({
                type:"POST",
                url: base_url + "franchise/itenerary/create_itinerary_by_turist_att_franchise",
                data : seri_form,
                dataType : "json",
                success:function(res){
                    if(res.status == "success"){
                        $('#create_itinerary_franchise').modal('toggle');
                        Swal.fire('Success!', res.msg, 'success');
                        location.reload();
                    }else{
                        $('.failed_warn').text(res.msg);
                    }

                }
            });
            
        });

$('#country').on('change',function(){
    country_change_events();
});


$('#responsive-datatable').on('click', '.view_all_tour_images', function () {
    var record_id = $(this).attr('value');
    $.ajax({
        type: 'POST',
        url: base_url + 'franchise/settings/get_all_enquiry_images/',
        data:{record_id},
        success: function(result) {
            $('.view_enc_img').html("");
            $('.view_enc_img').html(result);
            $('#view_follow_up_model').modal('toggle');
            $('#view_follow_up_model').modal('show');

        }
    });

});

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
                url: base_url + 'common/delete/',
                data:{'table' : table, 'row' : row, 'id' : id},
                success: function(result) {
                    if(result == 'success')
                        Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')

                    $('#r-'+id).addClass('d-none');
                }
            });
        }

    });

});
$('#responsive-datatable').on('click', '.update_category_status', function () {

    var table   =     $(this).data('table');
    var row     =     $(this).data('row');
    var id      =     $(this).data('id');
    var status  =     $(this).attr('data-status');
    if(status == "1"){
        var status_msg ="Active";
    }else{
        var status_msg = "Deactive";
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to "+ status_msg + "  category",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, update it!'
    }).then(function (result) {

        if (result.value)
        {
            $.ajax({
                type: 'POST',
                url: base_url + 'settings/update-turist-category-status/',
                data:{'table' : table, 'row' : row, 'id' : id,'status':status},
                success: function(result) {
                    data = $.parseJSON(result);
                    if(data.status == 'success')
                        Swal.fire('Updated!', data.message ,'success')
                    $('#ia-'+id).attr('data-status', data.is_active);

                    $('#status_'+id).html((status == "2") ? "Deactive" : "Active");
                }
            });
        }

    });

});

});
</script>