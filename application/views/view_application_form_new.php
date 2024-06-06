<style>
   .error{
      color: red;
  }
</style>
<div class="row row-sm ">
   <div class="col-lg-12 ">
      <div class="row row-sm ">
        <form name="submittravellerdata" id="submittravellerdata" class="submittravellerdata"><div class="card">
            <br/>
         <div class="col-lg-12 container-fluid px-3 px-md-4">
            <div class="card ">
               <input type="hidden" class="no_of_travelers_val" value="1">
                <div class="card-body">
                  <div class="col-md-12 visa_name"></div>
                  <div class="col-md-12 valid"></div>
                  <div class="col-md-12 stay"></div>
                  <div class="col-md-12 days"></div>
                  <div class="col-md-12 fee"></div>
                  <!-- <div class="col-md-12 servicefee"></div> -->
                  <div class="col-md-12 desc"></div>
               </div>
               </div>
           </div>
            <!-- <div class="card">
           <div class="card-body">
           <div class="row no_of" style="display:none;"><div class="fovsrm-group ">
                <label class="form-label">NO OF TRAVELERS</label>
               <select class="form-select no_of_travellers" name="no_of_travellers" required  >
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
            </div>
        </div>
        </div> -->
        
           <div class="card-body container-fluid px-3 px-md-4">
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
        
        
           <div class="visa_fields container-fluid px-3 px-md-4">
                
                       <input type="hidden" name="totalvisacharge" value="<?=$total_visa_charge?>"> 
                       <input type="hidden" name="origincountry" value="<?=$origincountry?>"> 
                       <input type="hidden" name="destinationcountry" value="<?=$destinationcountry?>"> 
                       <input type="hidden" name="visaname" value="<?=$visaname?>"> 
                       <input type="hidden" name="visaid" value="<?=$visaid?>"> 
                       <input type="hidden" name="groupid" value="<?=$groupid?>"> 
                       <?php if(!empty($formfield)){?> 
                       <div class="nooftra">
                            <div class="alert alert-dark" role="alert"><b>Enter Details for Applicant     #1</b></div>
                       </div>
                      <?php foreach($formfield as $key=>$fields){
                        $days = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
                        $year = date("Y")+17; 
                        ?>
                           <br/><div class="card container-fluid px-3 px-md-4" style="padding:20px 0px;">
                                <h3><?=$key?></h3>
                                <div class="row col-md-12">
                                    <?php $labekey = strtolower(str_replace(" ","_",$key)); ?>
                                    
                                    <?php if(!empty($fields)){ foreach($fields as $kfiel=>$vfiel){ //echo '<pre>'; print_r($vfiel);
                                        $labelname = strtolower(str_replace(" ","_",$vfiel->label_name)); 
                                        ?>
                                        <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo $vfiel->label_name;?></label>
                                        <?php if($vfiel->field_type == 'text'){?>
                                            <input class="form-control" type="text" name="<?=$labekey."[".str_replace(",",":",$labelname)."]"?>" placeholder="<?=$vfiel->label_name?>" value="<?=$vfiel->new_value ?>">
                                        <?php } ?>
                                        <?php if($vfiel->field_type == 'date'){?>
                                            <?php $date = explode("-", $vfiel->new_value);?>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                      <select name="<?=$labekey."[".$labelname."]"."[month]"?>" id="month" class="form-select">
                                                        <option value="">Select Month</option>
                                                        <?php for ($m=1; $m<=12; $m++) {
                                                            $month = date('F', mktime(0,0,0,$m, 1, date('Y'))); ?>
                                                            <option value="<?=$month?>" <?php if($date[0] == $month) {?> selected="selected" <?php }?>><?=$month?></option>
                                                        <?php  } ?>
                                                        </select>  
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <select name="<?=$labekey."[".$labelname."]"."[day]"?>" id="day" class="form-select">
                                                        <option value="">day</option>
                                                        <?php foreach ($days as $k=>$d) { ?>
                                                             <option value="<?=$d?>" <?php if($date[1] == $d) {?> selected="selected" <?php }?>><?=$d?></option>
                                                       <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <select name="<?=$labekey."[".$labelname."]"."[year]"?>" id="day" class="form-select">
                                                        <option value="">Year</option>
                                                        <?php for ($i=1920; $i<=$year; $i++) { ?>
                                                             <option value="<?=$i?>" <?php if($date[2] == $i) {?> selected="selected" <?php }?>><?=$i?></option>
                                                        <?php } ?>
                                                    </select>
                                                    
                                                </div>    
                                            </div>
                                        <?php } ?>
                                        <?php if($vfiel->field_type == 'textarea'){?>
                                            <textarea class="form-control" name="<?=$labekey."[".$labelname."]"?>"></textarea>
                                        <?php } ?>
                                        <?php if($vfiel->field_type == 'country'){?>
                                             <select name="<?=$labekey."[".$labelname."]"?>" id="day" class="form-select">
                                                        <option value="">Select Country</option>
                                                        <?php foreach ($countrylist as $ck=>$cname) { ?>
                                                            <option value="<?=$cname->name?>" <?php if($cname->name == $vfiel->new_value) {?> selected="selected" <?php }?>><?=$cname->name?></option>
                                                        <?php }?>
                                             </select>
                                        <?php } ?>
                                        <?php if($vfiel->field_type == 'dropdown'){?>
                                             <select name="<?=$labekey."[".$labelname."]"?>" id="" class="form-select">
                                                        <option value="">Select</option>
                                                        <?php foreach ($vfiel->list_value as $ck=>$cname) { ?>
                                                            <option value="<?=$cname->name?>" <?php if($cname->name == $vfiel->new_value) {?> selected="selected" <?php }?>><?=$cname->name?></option>
                                                       <?php }?>
                                             </select>
                                        <?php } ?>
                                        <?php if($vfiel->field_type == 'checkbox'){?>
                                              <?php if(!empty($vfiel->list_value)){ foreach($vfiel->list_value as $kv=>$fieldval){
                                                $vnew = explode(',',$vfiel->new_value);
                                                ?>
                                                    <input type="checkbox" name="<?=$labekey."[".$labelname."][]"?>" id="<?=$fieldval->name?>" value="<?=$fieldval->name?>" <?php if(in_array($fieldval->name,$vnew)) {?> checked="checked" <?php }?>><label for="<?=$fieldval->name?>"><?=$fieldval->name?></label>
                                             <?php } } ?> 
                                        <?php } ?>
                                        <?php if($vfiel->field_type == 'radio'){?>
                                             <?php if(!empty($vfiel->list_value)){ foreach($vfiel->list_value as $kv=>$fieldval){?>
                                                    <input type="radio" name="<?=$labekey."[".$labelname."]"?>" id="<?=$fieldval->name?>" value="<?=$fieldval->name?>" <?php if($fieldval->name == $vfiel->new_value) {?> checked="checked" <?php }?>><label for="<?=$fieldval->name?>"><?=$fieldval->name?></label>
                                             <?php } } ?>   
                                        <?php } ?>
                                         </div>   
                                    </div>  
                                    <?php } } ?> 
                                </div>  
                           </div>
                       <?php } ?>
                       <!-- <span class="totalprice">Total Price : $ <?=$total_visa_charge ?></span> -->
                       <br/><div class="card"><div class="card-body">&nbsp;<button type="submit" class="btn btn-primary mt-4 mb-0 enquiry_btn submit_btn" id="submit_btn">Submit</button></div></div>
                   <?php } ?>
                </div>    
           </div>
       </form>
       </div>
   
</div>
</div>

<script type="text/javascript">
   function capitalizeFirstLetter(string) {
     return string.charAt(0).toUpperCase() + string.slice(1);
 }
 $(document).ready(function(){
   get_all_traveller_data();
   function get_all_traveller_data(){

      var origincountry =  '<?php echo $this->uri->segment('3'); ?>';
      
      var destinationcountry =  '<?php echo $this->uri->segment('4'); ?>';
      var gid =  '<?php echo $this->uri->segment('5'); ?>';
      var visaid =  '<?php echo $this->uri->segment('6'); ?>';
      var visatype =  '<?php echo $this->uri->segment('7'); ?>';
      var passing =  '<?php echo $this->uri->segment('9'); ?>';
      var api_url = '<?php echo API_URL ?>';
      console.log(passing);
      $.ajax({
         type:"POST",
         //url : api_url + "/api/getform_visa",
         url: base_url + 'common/getform_visafield',
         data : {gid : gid,visaid : visaid,visatype : visatype,origincountry : origincountry,destinationcountry : destinationcountry},
         dataType : 'json',
         success:function(res){
          var visaname;
          var displayfields = "";


          var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
          var days = [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
          var currentyear = new Date().getFullYear();
 
          if(res){
            $('.no_of').removeAttr('style');
           visaname = '<h4>Applicants Applying For Visa '+capitalizeFirstLetter(res.visaname.name)+'</h4>'; 
           //displayfields += '<form name="submittravellerdata" id="submittravellerdata" class="submittravellerdata"><div class="card">';
           displayfields += '<input type="hidden" name="totalvisacharge" value="'+res.total_visa_charge+'" >';
           displayfields += '<input type="hidden" name="origincountry" value="'+res.origincountry+'" >';
           displayfields += '<input type="hidden" name="destinationcountry" value="'+res.destinationcountry+'" >';
           displayfields += '<input type="hidden" name="visaid" value="'+visaid+'" >';
           displayfields += '<input type="hidden" name="visaname" value="'+res.visaname.name+'" >';
           //displayfields += '<input type="hidden" name="destinationcountry" value="'+destinationcountry+'" >';
          

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
                     for(var i = 1920; i <= currentyear; i++){
                        //displayfields += '<option value='+i+'>'+i+'</option>';     
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
                    displayfields += '<input type="radio" name="fields['+submitdata+']['+informtitle+']['+namefieldlabel+']['+genderval+']" id="'+list_value.name+'_'+genderval+'" value="'+list_value.name+'" checked><label for="'+list_value.name+'_'+genderval+'">'+list_value.name+'</label>';     
                }); 
               }    
             }else if(field.field_type == 'checkbox'){ console.log('checkbox');
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

            //displayfields += '<span class="totalprice">Total Price : $ '+total_count_by_price+'</span>';
            displayfields += '&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary mt-4 mb-0 enquiry_btn submit_btn" id="submit_btn">Submit</button>';
            displayfields += '</div>';    
            displayfields += '</div>';
        }
    }else{
        
        
    }
    $('.visa_name').html(visaname);
    $('.valid').html('Valid for '+res.all_data[0].visa_validity);
    $('.stay').html(res.all_data[0].length_of_stay+' Of Stay');
    $('.days').html('Time to get visa '+res.all_data[0].time_to_get_visa);
    $('.fee').html('Visa Fee '+res.all_data[0].price);
    $('.servicefee').html('Our Service Fees '+res.all_data[0].service_charge);
    $('.desc').html(res.all_data[0].description);
    //$('.visa_fields').html(displayfields);


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
   var total_count_by_price = numItems*totalvisaservice;
$('select[name^="no_of_travellers"] option[value='+numItems+']').attr("selected","selected");   
   //$('.totalprice').html("Total Price : $ "+total_count_by_price+"");
});



 
      $(document).on('submit','.submittravellerdata',function(e){
         var gid =  '<?php echo $this->uri->segment('4'); ?>';
      var visaid =  '<?php echo $this->uri->segment('5'); ?>';
      var visatype =  '<?php echo $this->uri->segment('6'); ?>';
      var franchiseid =  '<?php echo $this->uri->segment('8'); ?>';
      var passing =  '<?php echo $this->uri->segment('9'); ?>';
      var api_url = '<?php echo API_URL ?>';
        var continue_to = base_url + 'franchise/request/get_form/' +gid+'/'+visaid+'/'+visatype+'/'+passing;
        e.preventDefault();
     $('#submit_btn').attr('disabled', 'disabled');
     var visaformdata = new FormData($('#submittravellerdata').get(0));
     
     visaformdata.append('franchise_id',franchiseid);
     visaformdata.append('visatype',visatype);
     visaformdata.append('passing',passing);
     
     $.ajax({
        type: 'POST',
        url: base_url + 'apply_visa/new_submit_traveler',
        data: visaformdata,
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(data) {
         
           $('#submit_btn').removeAttr('disabled');
           setTimeout(function() {
              if(data.status == 'success') {
                 //quick_swal("success", data.message);
                  Swal.fire(
                    'success!',
                    data.message,
                    
                )
              } else if(data.status == 'exits') {
                 quick_swal("info", data.message);
              } else {
                 quick_swal("warning", "Error! Unable to complete process.");
              }
           }, 500);
           setTimeout(function() { 
             // window.location.reload();
           }, 2500);
        }, error: function(data) {
           $('#submit_btn').removeAttr('disabled');
           quick_swal("warning","Error! Unable to complete process.");
        }
     });
  });
});
</script>
