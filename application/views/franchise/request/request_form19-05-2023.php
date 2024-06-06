<style>
   .error{
      color: red;
  }
  .help-block {
    color: #e23e3d;
}
</style>
<div class="row row-sm ">
   <div class="col-lg-12">
      <div class="row row-sm">
        <form name="submittravellerdata" id="submittravellerdata" class="submittravellerdata"><div class="card">
         <div class="col-lg-12">
             <div class="row">
             <div class="col-lg-6">
            <div class="card">
               <input type="hidden" class="no_of_travelers_val" value="1">
               <?php 
                $from = $this->setting_model->get_api_country_by_id($this->uri->segment('4'));
                $to  = $this->setting_model->get_api_country_by_id($this->uri->segment('5'));
                ?>

               <div class="card-body">
                  <h3 class="text-center"><?=$from->countrydata[0]->name ?> TO <?=$to->countrydata[0]->name ?></h3>      
                  <div class="col-md-12 visa_name"></div>
                  <div class="col-md-12 valid"></div>
                  <div class="col-md-12 stay"></div>
                  <div class="col-md-12 days"></div>
                  <div class="col-md-12 fee"></div>
                  <div class="col-md-12 servicefee"></div>
                  <div class="col-md-12 desc"></div>
               </div>
           </div>
             </div>
             <div class="col-lg-6">
                <div class="row">
                 <?php if($franchisdata[0]->logo != ""){ ?>
                     <img src="<?php echo base_url().$franchisdata[0]->logo ?>" style="width:150px"/>
                 <?php } ?>
                </div>
                
             </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                        <div class="col-md-4">

                                    <label class="custom-control custom-checkbox-md">
                                <input type="checkbox" class="custom-control-input display_exist_filter" name="display_exist_filter" id="display_exist_filter" value="1">
                                <span class="custom-control-label"></span>
                                <label for="display_exist_filter">Allready Exist Enquiry</label>
                              </label>
                               
                        </div>
                        <div class="col-md-12 display_exist_inquiry" style="display:none;">
                            <div class="form-group">
                             <label class="form-label "><b>Select Enquiry</b> <span class="text-red"> *</span></label>
                             <select class="form-control  select2-show-search form-select " name="wap_enquiry_id" id="wap_enquiry_id" style="width:100%;">
                                <option value=""></option>
                                <?php foreach ($get_all_enquiry as $key => $value) {  ?>
                                   <option value="<?= $value->mobile_no ?>" data-id="<?= $value->id ?>" ><?=  $value->name.' - '.$value->email.' - '.$value->mobile_no  ?></option>
                                <?php  } ?>
                             </select>
                          </div>
                          <input type="hidden" name="exitenquiry" class="exitenquiry" value="" />
                        </div>    
                        <div class="col-md-12 display_new_inquiry">  
                             <div class="row">
                              <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Name <span class="text-red">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?= isset($enquiry) && !empty($enquiry->name) ? $enquiry->name : set_value('name'); ?>"/>
                                <span id="error_alter_name" class="small text-danger"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Email </label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= isset($_REQUEST["email"]) && !empty($_REQUEST["email"]) ? $_REQUEST["email"] : set_value('email'); ?>">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mobile</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control mobile_no"  placeholder="Enter Mobile No" value="<?= isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : ""; ?>" >
                                <span class="error-text error_mobile"></span>
                                <div id="ajax_loader_mobile" class="text-info small" style="display:none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Follow Up Date <span class="text-red">*</span></label>
                            <div class="wd-200 mg-b-30">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div>
                                    <input class="form-control follow_up_date" id="follow_up_date" name="follow_up_date" placeholder="MM/DD/YYYY" type="text"  value="<?= isset($enquiry) && !empty($enquiry->follow_up_date) ? date('m/d/Y',strtotime($enquiry->follow_up_date)) : set_value('follow_up_date'); ?>" autocomplete="off" readonly><br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Enquiry Type</label>
                                <select class="form-control enquiry_type" id="enquiry_type" name="enquiry_type" data-placeholder="Enquiry Type">
                                    <option value="">Enquiry Type</option>
                                    <?php foreach ($get_enquiry_type as $key => $value) { ?>
                                        <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        


                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Language</label>
                                <select class="form-control language" id="language" name="language">
                                    <option value="">Select Language</option>
                                    <option value="Telugu"  <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "Telugu" ? "selected" : set_value('language'); ?>>Telugu</option>
                                    <option value="Hindi" <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "Hindi" ? "selected" : set_value('language'); ?>>Hindi</option>
                                    <option value="English" <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "English" ? "selected" : set_value('language'); ?>>English</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Description</label>
                                <select class="form-control s_description select2-show-search form-select" name="s_description">
                                    <option value="">Select Description</option>
                                    <?php
                                    foreach ($get_descriptions_of_admin as $key => $value) { ?>
                                        <option value="<?php echo $value->meta_id ?>" <?= isset($enquiry) && $enquiry->s_description == $value->meta_id ? "selected" : set_value('s_description'); ?>><?php echo $value->name; ?></option>
                                    <?php   } ?>
                                </select>
                            </div>
                        </div>


                            

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Intersted Country</label>
                                <select class="form-control i_country multiple_country " id="i_country" name="i_country[]" multiple value="" data-placeholder="Select Intersted Country">
                                    
                                    <!-- <?php foreach ($get_all_country as $key => $value) { ?>
                                        <option value="<?= $value->id ?>" <?= (!empty($enquiry) && in_array($value->id,explode(",",$enquiry->intersted_country))) ? "selected" : "" ?> ><?= $value->name.'  ('.$value->sortname.')'; ?></option>
                                    <?php } ?> -->
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Visa</label>
                                <select class="form-control city select2-show-search form-select" id="visatype" multiple name="visatype[]" data-placeholder="Select Visa">
                                    
                                </select>
                            </div>
                        </div> 
                        <!-- <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <select class="form-control city select2-show-search form-select" id="city" multiple name="city[]" data-placeholder="Select City">
                                    <?php foreach ($get_country_city as $key => $value) { ?>
                                        <option value="<?= $value->id ?>" <?= (!empty($enquiry) && in_array($value->id,explode(",",$enquiry->city))) ? "selected" : "" ?> ><?= $value->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>  -->
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label ">Description</label>
                                <textarea class="form-control description" name="description" placeholder="Enter Description"><?= isset($enquiry) && !empty($enquiry->description) ? $enquiry->description : set_value('name'); ?></textarea>
                            </div>
                        </div>
                        <?php if($this->session->userdata('user_role') == User_role::FRANCHISE) {?>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label ">Assign Enquiry To Staff</label>
                                <select class="form-control enquiry_staff_id select2-show-search form-select"  name="enquiry_staff_id" value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Staff">
                                    <option value="">Select Staff</option>
                                    <?php 
                                    foreach ($get_all_staff_data as $key => $value) { ?>
                                        <option value="<?= $value->user_id ?>" <?= isset($enquiry) && $enquiry->enquiry_staff_id == $value->user_id ? "selected" : ""; ?>><?= $value->first_name ?></option>
                                    <?php   } ?>
                                </select>
                            </div>
                        </div> 
                        <?php } ?>   
                       
                </div>
                 </div>
                </div> 
            <div class="card">
           <div class="card-body">
          <!--  <div class="row"><div class="fovsrm-group ">
                <label class="form-label">NO OF TRAVELERS</label>
               <select class="form-select no_of_travellers" name="no_of_travellers" required >
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
               </select>
            </div>
            </div> -->
        </div>
        </div>
        <div class="card">
           <div class="card-body">
           <div class="row">
               <div class="col-md-6 document">
                  
               </div>   
               <div class="col-md-6 notes">
                  <label class="form-label notes_lanel"></label>
               </div> 
               <div class="col-md-6 process_lanel">
                  
               </div>  

                
            </div>
        </div>
        </div>
           <div class="visa_fields">

           </div>
       </div>
   </div>
</div>
</div>
<script src="<?= base_url() ?>/assets/custom/js/custom_select2.js"></script>
<link href="<?= base_url() ?>/assets/custom/css/custom_select2.css" rel="stylesheet"/>

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
            
             $("#i_country").append('<option value="'+val.id+'" >'+val.name+'</option>');
         });
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}

/* get visa type name */
    $('.i_country').on('change',function(){
        console.log('111');
        var destination = $(this).val();  
        // if(destination){
            $.ajax({
                type:"POST",
                url: base_url + "franchise/reports/get_all_visa_by_country_id",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(data){
                     
                    if(data.status != "false"){
                    if(data){
                        $("#visatype").empty();
                        $("#visatype").append('<option value="">Select Visa</option>');
                        $.each(data.message,function(key,value){
                            $("#visatype").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }else{
                        $("#visatype").empty();
                    }
                    }else{
                        $("#visatype").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });

$('body').on('change blur', '.mobile_no', function() {
        $('.error_mobile').html('').hide();
        if($('.mobile_no').val().trim() == '') {
            $('.error_mobile').html('Enter contact no').show();
        } else if(!validateNumber($(this).val().trim())) {
            $('.error_mobile').html('Enter valid contact no').show();
        }  else {
                $('#ajax_loader_mobile').show();
                $('.submit_btn').prop('disabled', false);
                var mobile = $(this).val().trim();
                var query_id = $("input[name=query_id]").val();
                $.ajax({
                        type: 'POST',
                        url:  base_url + 'franchise/enquiry/ajax_enquiry_number_exist',
                        data: {'mobile':mobile,'query_id':query_id},
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(function() {
                                $('#ajax_loader_mobile').hide();
                                if(data.user_exist == true)
                                {
                                    email_exist = true;
                                    $('.submit_btn').prop('disabled', true);

                                    $('.mobile').val('');
                                    $('.error_mobile').html('This mobile number is already exist').show();
                                } else {
                                    $('.submit_btn').prop('disabled', false);
                                }
                            },1000);
                        },
                        error: function(data)
                        {
                            ajax_error_swal(data.status);
                        }
                });
        }
    });
    $('.multiple_country').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });

                $('.multiple_country').on('click', () => {
                    let selectField = document.querySelectorAll('.multiple_country .select2-search__field')
                    selectField.forEach((element, index) => {
                        element.focus();
                    })
                });


                $('.city').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });

                $('.city').on('click', () => {
                    let selectField = document.querySelectorAll('.select2-search__field')
                    selectField.forEach((element, index) => {
                        element.focus();
                    })
                });

                $('#language').select2();
                 $('#wap_enquiry_id').select2();
               
              

                
                $('.enquiry_type').select2();

                $('.s_description').select2();
                $('.enquiry_staff_id').select2();


$(document).on('change','#display_exist_filter',function(){
  var array = [];
  if($(this).is(':checked')) {
     $('.display_exist_inquiry').removeAttr('style','display:none');
     $('.display_new_inquiry').attr('style','display:none');
     
  } else {
     $('.display_exist_inquiry').attr('style','display:none');
     $('.display_new_inquiry').removeAttr('style','display:none');

  }
});
   function capitalizeFirstLetter(string) {
     return string.charAt(0).toUpperCase() + string.slice(1);
 }

 
$('#wap_enquiry_id').on('change',function(){
     var value = $(this).find('option:selected').attr("data-id");
     $(".exitenquiry").val(value);
});    

$('.i_country').on('change',function(){
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
                    }else{
                        $("#city").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });
 $(document).ready(function(){
get_all_country();

    $('#submittravellerdata').validate({
        rules : {
            "name":{
                required: true,
            },
            "follow_up_date" : {
                required: true,
            }
        },
        messages :{
            "name":{
                required: "please enter name",
            },
            "follow_up_date" : {
                required: "please select date",
            }
        },
        highlight: function (element)
        {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element)
        {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element)
        {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    if ($(".follow_up_date").length > 0) {

                    $('.follow_up_date').datepicker({
                        minDate:new Date(),
                        showOtherMonths: true,
                        selectOtherMonths: true,
                    });
                }


   get_all_traveller_data();
   let franchiseid = '<?=$this->session->userdata('user_id');?>';
   function get_all_traveller_data(){

      var origincountry =  '<?php echo $this->uri->segment('4'); ?>';
      var destinationcountry =  '<?php echo $this->uri->segment('5'); ?>';
      var gid =  '<?php echo $this->uri->segment('6'); ?>';
      var visaid =  '<?php echo $this->uri->segment('7'); ?>';
      var visatype =  '<?php echo $this->uri->segment('8'); ?>';
      var company =  '<?php echo $this->uri->segment('9'); ?>';
      

      var api_url = '<?php echo API_URL ?>';
      $.ajax({
         type:"POST",
         //url : api_url + "/api/getform_visa",
         url: base_url + 'franchise/request/getform_visafield',
         data : {gid : gid,visaid : visaid,visatype : visatype,origincountry : origincountry,destinationcountry : destinationcountry},
         dataType : 'json',
         success:function(res){
             if(res.code == 500){
               alert("Please Enter Domain key");
                return;
            }
          var visaname;
          var displayfields = "";


          var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
          var days = [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
          var currentyear = new Date().getFullYear();
          console.log(res); 
          if(res){
            
           visaname = '<h4>Applicants Applying For Visa '+capitalizeFirstLetter(res.visaname.name)+'</h4>'; 
           displayfields += '<form name="submittravellerdata" id="submittravellerdata" class="submittravellerdata"><div class="card">';
           displayfields += '<input type="hidden" name="totalvisacharge" value="'+res.total_visa_charge+'" >';
           displayfields += '<input type="hidden" name="origincountry" value="'+res.origincountry+'" >';
           displayfields += '<input type="hidden" name="destinationcountry" value="'+res.destinationcountry+'" >';
           displayfields += '<input type="hidden" name="visaid" value="'+visaid+'" >';
           displayfields += '<input type="hidden" name="visaname" value="'+res.visaname.name+'" >';
           displayfields += '<input type="hidden" name="franchise_id" value="'+franchiseid+'" >';
           displayfields += '<input type="hidden" name="companycheck" value="'+company+'" >';

           console.log(res.formdata);
        if(res.formdata != ""){
            var total_no_of_travellers = $('.no_of_travelers_val').val();

         for(let i = 1; i <= total_no_of_travellers; i++){
                if(i != 1){
                    var remove = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="cursor: pointer;color:#6c5ffc;" class="removecurrent">Remove</a>';
                }else{
                    var remove = '';
                }
                displayfields += '<div class="nooftra addclass'+i+'"><div class="alert alert-dark" role="alert"><b>Enter Details for Applicant     #'+i+'</b>'+remove+'</div>';

                $.each(res.formdata, function (keys, fields) {
                   var genderval = i;
                   var submitdata = i-1;
                   var informtitle = keys.toLowerCase().replace(/ /g, "_");

                 displayfields += '<div class="card">';
                 displayfields += '<div class="card-body">';
                 displayfields += '<h3> '+capitalizeFirstLetter(keys)+'</h3>';
                 // displayfields += '<input type="hidden" value="'+capitalizeFirstLetter(keys)+'" />';
                 displayfields += '<div class="row">';

                 
                 $.each(fields, function (key, field) {
                   // console.log(field);
                 displayfields += '<input type="hidden" name="label_id[]" value="'+capitalizeFirstLetter(keys)+'" />';
               
                     var namefieldlabel = field.label_name.toLowerCase().replace(/ /g, "_");
                  displayfields += '<div class="col-sm-4 col-md-4">';
                  displayfields += '<div class="form-group"><label class="form-label">'+field.label_name+'</label>';

                  if(field.field_type == 'text'){
                        displayfields += '<input class="form-control" type="text" class='+namefieldlabel+' name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+']" placeholder="'+field.label_name+'" />';

                 }else if(field.field_type == 'date'){

                     displayfields += '<div class="row">';
                     displayfields += '<div class=" col-md-6 col-sm-6"><select class="form-select" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+'][month]['+genderval+']"><option value="">Month</option>';
                     $.each(months, function (key, month) {
                        displayfields += '<option value='+month+'>'+month+'</option>';     
                    });
                     displayfields += '</select></div>';
                     displayfields += '<div class=" col-md-3 col-sm-3"><select class="form-select" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+'][day]['+genderval+']"><option value="">Day</option>';
                     $.each(days, function (key, day) {
                        displayfields += '<option value='+day+'>'+day+'</option>';     
                    });
                     displayfields += '</select></div>';
                     displayfields += '<div class=" col-md-3 col-sm-3"><select class="form-select" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+'][year]['+genderval+']" ><option  value='+i+'>Year</option>';
                     for(var i = 1970; i <= currentyear; i++){
                        displayfields += '<option value='+i+'>'+i+'</option>';     
                    }
                    displayfields += '</select></div>';
                    displayfields += '</div>';
                }
                else if(field.field_type == 'textarea'){

                 displayfields += '<textarea class="form-control" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+']" ></textarea>';
             }else if(field.field_type == 'dropdown'){  
                 displayfields += '<select class="form-select" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+']" >';
                 displayfields += '<option value="">Select '+field.label_name+'</option>';
                 if(fields[key].list_value.length > 0){  console.log(fields[key].list_value.length);
                  $.each(fields[key].list_value, function (key, list_value) {
                    displayfields += '<option value='+list_value.name+'>'+list_value.name+'</option>';     
                }); 
               }

                 displayfields += '</select>';
             }else if(field.field_type == 'country'){

                 displayfields += '<select class="form-select" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+']" >';
                 displayfields += '<option value="">Select Country</option>';
                 $.each(res.countrylist, function (key, country) {
                    displayfields += '<option value='+country.name+'>'+country.name+'</option>';     
                });
                 displayfields += '</select>';
             }else if(field.field_type == 'radio'){
                if(fields[key].list_value.length > 0){
                  $.each(fields[key].list_value, function (key, list_value) {
                    displayfields += '<input type="radio" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+']" id="'+list_value.name+'_'+genderval+'" value="'+list_value.name+'"><label for="'+list_value.name+'_'+genderval+'">'+list_value.name+'</label>';     
                }); 
               }    
             }else if(field.field_type == 'checkbox'){
                if(fields[key].list_value.length > 0){
                  $.each(fields[key].list_value, function (key, list_value) {
                    displayfields += '<input type="checkbox" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+'][]" id="'+list_value.name+'_'+genderval+'" value="'+list_value.name+'"><label for="'+list_value.name+'_'+genderval+'">'+list_value.name+'</label>';     
                }); 
               }    
             }
             displayfields += '</div></div>';    
         });  
                 displayfields += '</div>';
                 displayfields += '</div>';    
                 displayfields += '</div>';
             });
                 displayfields += '</div>';
            }
            
            var total_count_by_price = total_no_of_travellers * res.total_visa_charge; 


            displayfields += '<div class="card">';
            displayfields += '<div class="card-body">';

            displayfields += '<span class="totalprice">Total Price : $ '+total_count_by_price+'</span>';
            displayfields += '&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary mt-4 mb-0 enquiry_btn submit_btn" id="submit_btn">Submit</button>';
            displayfields += '</div></form>';    
            displayfields += '</div>';
        }
    }else{
    }
    console.log(res.all_data[0].visa_validity);
    $('.visa_name').html(visaname);
    $('.valid').html('Valid for '+res.all_data[0].visa_validity);
    $('.stay').html(res.all_data[0].length_of_stay+' Of Stay');
    $('.days').html('Time to get visa '+res.all_data[0].time_to_get_visa);
    $('.fee').html('Visa Fee '+res.all_data[0].price);
    $('.servicefee').html('Our Service Fees '+res.all_data[0].service_charge);
    $('.desc').html(res.all_data[0].description);
    $('.visa_fields').html(displayfields);

    $('.document').html('');
    $('.document').html('<label class="form-label"><h5><strong>'+res.documentname+'</strong></h5></label>');
               const str = res.documents || ' ';
               var result = str.split(",");
           $.each(result, function (key, docu) {
               var index= key+1;
               $('.document').append('<p>'+index+ '.  '+capitalizeFirstLetter(docu)+'</p>');
           });           
    if(res.allnotes != "" && res.allnotes[0].name != null && res.allnotes[0].all_note != null){       
       $('.notes_lanel').html('');
         $('.notes_lanel').html('<label class="form-label"><h5><strong>'+res.allnotes[0].name+'</strong></h5></label>');
               const str1 = res.allnotes[0].all_note || ' ';
               var result1 = str1.split(",");

           $.each(result1, function (key, note) {
               var index= key+1;
               $('.notes_lanel').append('<p>'+index+ '.  '+capitalizeFirstLetter(note)+'</p>');
           });           

      }
      if(res.process_visa[0].all_precess != ""){       
       $('.process_lanel').html('');
       console.log(res.process_visa[0].all_precess);

       $('.process_lanel').html('<label class="form-label"><h5><strong>Process</strong></h5></label>');
               const str12 = res.process_visa[0].all_precess || ' ';
               var result12 = str12.split(",");
           $.each(result12, function (key, pro) {
               var index= key+1;
               $('.process_lanel').append('<p>'+index+ '.  '+capitalizeFirstLetter(pro)+'</p>');
           });           

      }
           

   }
});
}

$(document).on('change','.no_of_travellers',function(){
   var val = $(this).val();
   $('.no_of_travelers_val').val(val); 
   get_all_traveller_data();     
});

$(document).on('click','.removecurrent',function(){
   $(this).parent().parent().remove();
   var totalvisaservice  = $('.visa_fields').find('input[name="totalvisacharge"]').val();
   var numItems = $('.nooftra').length
   $('select[name^="no_of_travellers"] option[value='+numItems+']').attr("selected","selected");   
   var total_count_by_price = numItems*totalvisaservice;

   $('.totalprice').html("Total Price : $ "+total_count_by_price+"");
});

$('.i_country').on('change',function(){
        console.log('111');
        var destination = $(this).val();  
        // if(destination){
            $.ajax({
                type:"POST",
                url: base_url + "franchise/reports/get_all_visa_by_country_id",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(data){
                     var visaidarray = visaid.split(','); 
                    if(data.status != "false"){
                    if(data){
                        $("#visatype").empty();
                        $("#visatype").append('<option value="">Select Visa</option>');
                        $.each(data.message,function(key,value){
                            let selected="";
                              if(jQuery.inArray(value.id, visaidarray) != -1) {
                                    selected = 'selected';
                                }
                            $("#visatype").append('<option value="'+value.id+'" '+selected+'>'+value.name+'</option>');
                        });
                    }else{
                        $("#visatype").empty();
                    }
                    }else{
                        $("#visatype").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });

 
      $(document).on('submit','.submittravellerdata',function(e){
         var gid =  '<?php echo $this->uri->segment('4'); ?>';
      var visaid =  '<?php echo $this->uri->segment('5'); ?>';
      var visatype =  '<?php echo $this->uri->segment('6'); ?>';
      var api_url = '<?php echo API_URL ?>';
        var continue_to = base_url + 'franchise/request/get_form/' +gid+'/'+visaid+'/'+visatype;
        e.preventDefault();
     $('#submit_btn').attr('disabled', 'disabled');
     var formdata = new FormData($('#submittravellerdata').get(0));
     $.ajax({
        type: 'POST',
        url: base_url + 'franchise/request/submit_traveler',
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
              window.location.reload();
           }, 2500);
        }, error: function(data) {
           $('#submit_btn').removeAttr('disabled');
           quick_swal("warning","Error! Unable to complete process.");
        }
     });
  });
});
</script>
