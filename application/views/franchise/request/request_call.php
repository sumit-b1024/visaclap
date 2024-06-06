<style>
 .error{
  color: red;
}
#visa_checkbox{margin: 0 auto;display: block;
  margin-bottom: 18px;
  width: 25px;
  height: 25px;}

  hr{
    border-top: 1px solid #39517c !important;
}    
#bookmark_checkbox {
    margin: 0 auto;
    margin-bottom: 18px;
    width: 20px;
    height: 20px;
}  
.accordion-body p{font-size: 13px !important;
    margin-bottom: 0rem !important;
    line-height: 21px !important;}
</style>

<div class="apply-query-wrap">
  <div action="#" class="apply-form">
       <form class="visa_page_report" style="display: contents;">
            <div class="input-inside">
             <?php echo validation_errors(); ?>
             <label for="" class="d-block">Select Destinations</label>
             <div class="twin-grid">
               <div class="">
                    <select class="form-select select2-show-search" id="f_country" name="f_country" data-placeholder="Select From Country">
                     <option value="">Select Form Country</option>
               </select>
         </div>
         <div class="">
               <select class="form-select select2-show-search" id="t_country" name="t_country" data-placeholder="Select To Country">
                <option value="">Select To Country</option>
          </select>
    </div>
</div>
</div>

<div class="d-block justify-content-md-end">
  <button type="button"  class="box-btn fill_primary m-0 sub_btn">
        Apply Selection
  </button>

  <input type="checkbox" class="bookmark_checkbox" name="bookmark_checkbox" id="bookmark_checkbox">
  <label class="form-label">Add Bookmark</label>
</div>
</form>
<?php if(!empty($bookmark)){
      ?>
      <div class="bookmarks-wrapper">
            <div class="lf">
                  <p class="m-0">Bookmarks:</p>
                  <div class="bookmarks d-flex flex-wrap">
                       <?php  foreach($bookmark as $key=>$val){ 
                            $from = $this->setting_model->get_api_country_by_id($val['from_country']);
                            $to  = $this->setting_model->get_api_country_by_id($val['to_country']); ?> 
                            <a href="javascript:void(0)" data-from="<?=$val['from_country']?>" data-to="<?=$val['to_country']?>" class="getvisabookmark"><?=$from->countrydata[0]->name." TO ".$to->countrydata[0]->name?></a><a href="javascript:void(0)" data-id="<?=$val['id']?>" class="bookmarkdelete" ><i class="fa fa-trash" aria-hidden="true" style='color: red'></i></a>
                      <?php } ?>
                </div>
          </div>

                <!-- <div class="rg text-end">
                  <button class="box-btn style-2 border-0 bg-transparent text-decoration-underline">Edit
                    Bookmarks</button>
              </div> -->
        </div>
  <?php } ?>
</div>
<div class="visabox" style="display:none">
    <div class="visa-pricing-wrapper">
      <div id="visa_type"  style="display: contents;">
      </div>    
</div>
<div class="additional-info-wrapper" id="documents">
      <div class="ad-part">
            <h4>Required Information</h4>
            <div class="accordion" id="accordionExample">
                  <div class="accordion-item border-0 rounded-0 bg-transparent">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        USA Visiting Visa Required Documents
                  </button>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                        <p><strong>This is the first item's accordion body.</strong> It is shown by default, until the
                              collapse plugin adds the appropriate classes that we use to style each element. These classes
                              control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                              modify any of this with custom CSS or overriding our default variables. It's also worth noting
                              that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                              does limit overflow.
                        </p>
                  </div>
            </div>
      </div>
      <div class="accordion-item border-0 rounded-0 bg-transparent">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        USA Business Visa Required Documents
  </button>
  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
  data-bs-parent="#accordionExample">
  <div class="accordion-body">
        <p><strong>This is the first item's accordion body.</strong> It is shown by default, until the
              collapse plugin adds the appropriate classes that we use to style each element. These classes
              control the overall appearance, as well as the showing and hiding via CSS transitions. You can
              modify any of this with custom CSS or overriding our default variables. It's also worth noting
        </div>
  </div>
</div>
<div class="accordion-item border-0 rounded-0 bg-transparent">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
  USA Tourist Visa Required Documents
</button>
<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
data-bs-parent="#accordionExample">
<div class="accordion-body">
  <p><strong>This is the first item's accordion body.</strong> It is shown by default, until the
        collapse plugin adds the appropriate classes that we use to style each element. These classes
        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
        modify any of this with custom CSS or overriding our default variables. It's also worth noting
  </div>
</div>
</div>
</div>
</div>
<div class="ad-part">
  <h4>Notes</h4>
  <div class="accordion" id="accordionExampleTwo">
        <div class="accordion-item border-0 rounded-0 bg-transparent">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseOne">
              United States Visiting Visa Notes
        </button>
        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="headingOne"
        data-bs-parent="#accordionExampleTwo">
        <div class="accordion-body">
              <p><strong>This is the first item's accordion body.</strong> It is shown by default, until the
                    collapse plugin adds the appropriate classes that we use to style each element. These classes
                    control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                    modify any of this with custom CSS or overriding our default variables. It's also worth noting
                    that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                    does limit overflow.
              </p>
        </div>
  </div>
</div>
<div class="accordion-item border-0 rounded-0 bg-transparent">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
  data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
  Bhavintestnotes
</button>
<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingTwo"
data-bs-parent="#accordionExampleTwo">
<div class="accordion-body">
  <p><strong>This is the first item's accordion body.</strong> It is shown by default, until the
        collapse plugin adds the appropriate classes that we use to style each element. These classes
        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
        modify any of this with custom CSS or overriding our default variables. It's also worth noting
  </div>
</div>
</div>
</div>
</div>
<div class="ad-part">
  <h4>Full Process</h4>
  <ul class="process-list">
        <li>1. Enter Information</li>
        <li>2. Do payment</li>
        <li>3. Just fly</li>
  </ul>
</div>
</div>
</div>

<div class="row row-sm">

<!-- <div class="card visabox" style="display:none">    
    <div class="card-header">
        <div class="row">
            <div class="col-md-10"><h3 class="card-title"><b>View Visa</b></h3></div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success btn-sm pull-right create_mail_btn" style="display:none;">
                    Send Email
                </button>
                <button type="button" class="btn btn-success btn-sm pull-right create_watsapp_btn" style="display:none;">
                    Send Watsapp
                </button>
            </div>
        </div>        
    </div>    
        <div class="card-body" id="visa_type">
        </div>
        <div class="card-body" id="documents">
        </div>
  </div> -->


  <div class="modal fade " id="create_mail_application" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog " role="document">
         <div class="modal-content modal-content-demo">
              <form class="store_visa_application_form">
                   <div class="modal-header">
                        <h6 class="modal-title"><b>Send Email</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body follow_up_body">
                        <div class="col-sm-12 col-md-12 mb-1">
                              <div class="alert alert-danger failed_warn_email_alert" role="alert" style="display:none">
                              </div> 
                              <div class="form-group input-inside">
                                   <label class="form-label ">Select Enquiry </label>
                                   <select class="form-select enquiry_id" name="enquiry_id[]" multiple id="enquiry_id" style="width:100%;">
                                        <?php foreach ($get_all_enquiry as $key => $value) { ?>
                                             <option value="<?= $value->id ?>" ><?=  $value->name.' - '.$value->email  ?></option>
                                       <?php  } ?>
                                 </select>
                           </div>
                     </div>  
                     <input type="hidden" name="emailvisaid" class="emailvisaid" />   
                     <div class="col-sm-12 col-md-12">
                           <div class="form-group input-inside">
                                <label class="form-label">Enter Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                          </div>
                    </div>
                    <div class="alert alert-danger failed_warn" role="alert" style="display:none"></div>
                    <div class="alert alert-danger not_failed_warn" role="alert" style="display:none"></div>
              </div>
              <br>
              <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="box-btn fill_primary " >Submit</button>
            </div>
      </form>
</div>
</div>
</div>


<div class="modal fade" id="create_watsapp_application" data-backdrop="static" data-keyboard="true">
      <div class="modal-dialog " role="document">
           <div class="modal-content modal-content-demo">
                <form class="store_watsapp_application_form">
                     <div class="modal-header">
                          <h6 class="modal-title"><b>Send Watsapp</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body follow_up_body">

                     <div class="col-sm-12 col-md-12 mb-1">
                      <div class="alert alert-danger failed_warn_wats_alert" role="alert" style="display:none">
                      </div> 
                      <div class="form-group input-inside">
                       <label class="form-label"><b>Select Enquiry</b> </label>
                       <select class="form-select" name="enquiry_id" id="wats_enquiry_id" style="width:100%;">
                            <option value="">Select Enquiry</option>
                            <?php foreach ($get_all_enquiry as $key => $value) { ?>
                                 <option value="<?= $value->mobile_no ?>" ><?=  $value->name.' - '.$value->email.' - '.$value->mobile_no  ?></option>
                           <?php  } ?>

                     </select>
                     <input type="hidden" name="visaid" class="visaid" value="" />
               </div>
         </div>


         <div class="col-sm-12 col-md-12">
          <div class="form-group input-inside">
            <label class="form-label"><b>Enter Phone no with country code without plus</b></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="">
      </div>
</div>
<div class="alert alert-danger failed_warn" role="alert" style="display:none"></div>
<div class="alert alert-danger failed_phone" role="alert" style="display:none"></div>
</div>
<br>
<div class="modal-footer">
      <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="box-btn fill_primary" >Submit</button>
</div>
</form>
</div>
</div>
</div>
<?php 

if($this->session->userdata('user_role') == User_role::FRANCHISE){
    $walletuser =  $this->session->userdata('user_id');
}else if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
    $walletuser =  $this->session->userdata('franchise_id');
}

$wallet =  $this->setting_model->get_wallet($walletuser);

 ?>
<input type="hidden" name="userwallet" id="userwallet" value="<?= ($wallet->balance) ?$wallet->balance :0; ?>">
<!-- 
<div class="card">
   <div class="card-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="card-title"><b>View Visa</b></h3>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-sm pull-right create_mail_btn" style="display:none;">
                Send Email
            </button>
            <button type="button" class="btn btn-success btn-sm pull-right create_watsapp_btn" style="display:none;">
                Send Watsapp
            </button>
        </div> 
    </div>
    



<div class="card-body" id="visa_type">
</div>

<div class="card-body" id="documents">
</div>
</div>
</div>
</div>

<div class="modal fade" id="create_watsapp_application" data-backdrop="static" data-keyboard="true">
  <div class="modal-dialog " role="document">
   <div class="modal-content modal-content-demo">
    <form class="store_watsapp_application_form">
     <div class="modal-header">
      <h6 class="modal-title"><b>Send Watsapp</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
     </div>

  <div class="modal-body follow_up_body">

 <div class="col-sm-12 col-md-12">
     <div class="form-group">
           <label class="form-label"><b>Select Enquiry</b> </label>
           <select class="form-control select2-show-search form-select" name="enquiry_id[]" id="enquiry_id">
            <option value="">Select Enquiry</option>
            <?php foreach ($get_all_enquiry as $key => $value) { ?>
             <option value="<?= $value->id ?>" ><?=  $value->name.' - '.$value->email.' - '.$value->mobile_no  ?></option>
         <?php  } ?>
            
     </select>
    </div>
 </div>


    <div class="col-sm-12 col-md-12">
        <div class="form-group">
            <label class="form-label"><b>Enter Phone<span class="text-red">*</span></b></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="">
        </div>
    </div>
        <div class="alert alert-danger failed_warn" role="alert" style="display:none"></div>
        <div class="alert alert-danger failed_phone" role="alert" style="display:none"></div>
</div>
<br>
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary " >Submit</button>
        </div>
</form>
</div>
</div>
</div> -->
<?php 
    if($this->session->userdata('user_role') == User_role::FRANCHISE){
    $appvisac =     $this->session->userdata('country');
    }else if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
    $appvisac =     $this->session->userdata('franchise_country');
    }
?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">

  var country = '<?php echo $appvisac;?>';
  var franchise_country = '<?php echo $this->session->userdata('franchise_country');?>';

  var api_url = '<?php echo API_URL ?>';

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
                      let selected="";
                      if(val.id == country){
                            selected = 'selected';
                        }
                  $("#f_country").append('<option value="'+val.id+'" '+selected+'>'+val.name+'</option>');
                  $("#t_country").append('<option value="'+val.id+'">'+val.name+'</option>');

            });
          }else{
           alert("Please Enter Domain key.");
          }
}
});
}



$(document).ready(function(){
    $(document).on('click', '.bookmark_checkbox', function () {
         var id = $(this).data('id');
         var from_country = $('#f_country').val();
         var to_country = $('#t_country').val();
         if(from_country == "" || to_country == ""){
          alert('Please Select both Country');

          $(this).prop('checked', false);
          return;
    }
    Swal.fire({
           //title: 'Are you sure?',
     text: "Do you want to add this bookmark ?",
     icon: 'info',
     showCancelButton: true,
     confirmButtonText: 'Yes, Bookmark!'
}).then(function (result) {
     if (result.value)
     {
      $.ajax({
       type: 'POST',
       url: base_url + 'franchise/request/savebookmark',
       data:{from_country,to_country},
       dataType : 'json',
       success: function(result) {
         if (result.status == 'dulicate'){
            $('.bookmark_checkbox').prop('checked', false);
             Swal.fire(
                    'Allready!',
                    'Allready Exist!',
                    'warning'
                )
         }else{
            location.reload();
         }
  }
});
}
});

});

    $(document).on('click', '.bookmarkdelete', function () {
         var id = $(this).data('id');

         Swal.fire({
               title: 'Are you sure?',
               text: "You won't Delete ?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, delete it!'
         }).then(function (result) {
               if (result.value)
               {
                $.ajax({
                 type: 'POST',
                 url: base_url + 'franchise/request/deletebookmark',
                 data:{id},
                 dataType : 'json',
                     success: function(result) {
                      location.reload();
                    }
             });
          }

    });

   });


});

$(document).on('click','.create_mail_btn',function(){
    $('#create_mail_application').modal('show');
   /* $('.enquiry_id').select2({
          dropdownParent: $('#create_mail_application'),
          width: "100%",
    });*/
    $('#create_mail_application .enquiry_id ').select2({
         dropdownParent: $('#create_mail_application'),
         width: "100%"
      });

    var mailselectc = $('.enquiry_id');
    mailselectc.on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    })
    var datavis = $(this).attr('data-visa');
  $('.emailvisaid').val(datavis);
});
$(document).on('click','.create_watsapp_btn',function(){

    $('#create_watsapp_application').modal('show');

     $('#create_watsapp_application #wats_enquiry_id ').select2({
         dropdownParent: $('#create_watsapp_application'),
         width: "100%"
      });

     var watsselectc = $('#wats_enquiry_id');
    watsselectc.on('select2:open', () => {
         document.querySelector('.select2-search__field').focus();
    })
      var datavis = $(this).attr('data-visa');
      $('.visaid').val(datavis);
  
});



$(document).on('click','.visa_checkbox',function(){

    var isChecked = $('#visa_type input[name="visa_checkbox"]:checked').length;

    if(isChecked > 0) {
         $('.create_mail_btn').removeAttr('style','display:none');
         $('.create_watsapp_btn').removeAttr('style','display:none');
   } else {
         $('.create_mail_btn').attr('style','display:none');
         $('.create_watsapp_btn').attr('style','display:none');
   }
});

$("#phone").keypress(function (e){
    var charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
    }
});

<?php if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
    var continue_to = base_url + 'franchise/enquiry/addinquiry';
<?php }else{  ?>
    var continue_to = base_url + 'franchise/staff/enquiry/addinquiry';
<?php } ?>    


$(document).on('submit','.store_watsapp_application_form',function(e){

    e.preventDefault();
    var selected = $('.visaid').val();

    if(selected > 0) { 
     $('.failed_warn').text('');
     $('.failed_warn').attr('style','display:none');

 } else { 
     $('.failed_warn').text('Select Atleast One Visa');
     $('.failed_warn').removeAttr('style','display:none');
     return false;
 }

   var mobNum = $('#phone').val();
   var filter = /((\+*)((0[ -]*)*|((91 )*))((\d{12})+|(\d{10})+))|\d{5}([- ]*)\d{6}/;


   var enquiry_id = $('.store_watsapp_application_form #wats_enquiry_id').children("option:selected").val();
   var phone = $('#phone').val();
   console.log(enquiry_id);

   if(enquiry_id == "" && phone == "") {
         $('.failed_warn_wats_alert').removeAttr('style');
         $('.failed_warn_wats_alert').text("Please Select Atleast One.");
         return false;
   }else{
         $('.failed_warn_wats_alert').attr('style','display:none');
         $('.failed_warn_wats_alert').text("");
   }


   
   var from_country = $('#f_country').val();
   var to_country = $('#t_country').val();
   var gid = $('input[name="gid"]').val();
   var seri_form = $(this).serializeArray();
   var selectdvisa =  selected;
   seri_form.push({ name: "from_country", value: from_country });
   seri_form.push({ name: "to_country", value: to_country });
   seri_form.push({ name: "selectdvisa", value: selectdvisa });
   seri_form.push({ name: "gid", value: gid });

            // console.log(seri_form);
   $.ajax({
        type:"POST",
        url: base_url + "franchise/request/send_watsapp_of_application",
        data : seri_form,
        dataType : "json",
        success:function(res){
             $('#create_watsapp_application').modal('toggle');
             $('.store_watsapp_application_form #enquiry_id').val(null).trigger("change");
             $('.store_watsapp_application_form')[0].reset();
             if(res.enquirystatus == "yes"){
               Swal.fire({
                     title: 'This enquiry is not in database',
                     text: "Do you want to add it",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonText: 'Yes, Add it!'
               }).then(function (result) {
                     if (result.value)
                     {
                         window.location.href = continue_to+'?phone='+res.data.mobile_no;
                     }
          });
         }
         $('#enquiry_id').val(null).trigger("change");
         $('.store_watsapp_application_form')[0].reset();
         window.open( "https://wa.me/"+res.data.mobile_no+"/?text=" + res.data.content, '_blank'); 
                    /*if(res.status == 'success'){
                        Swal.fire('Success!', res.message, 'success');
                        location.reload();
                    }*/

   }
});

}); 
$(document).on('submit','.store_visa_application_form',function(e){

    e.preventDefault();
    var selected = $('.emailvisaid').val();

    if(selected > 0) { 
     $('.failed_warn').text('');
     $('.failed_warn').attr('style','display:none');
     } else { 
         $('.failed_warn').text('Select Atleast One Visa');
         $('.failed_warn').removeAttr('style','display:none');
         return false;
     }

    /*var isChecked = $('#visa_type input[name="visa_checkbox"]:checked').length;

    if(isChecked > 0) { 
         $('.failed_warn').text('');
         $('.failed_warn').attr('style','display:none');

   } else { 
         $('.failed_warn').text('Select Atleast One Visa');
         $('.failed_warn').removeAttr('style','display:none');
         return false;
   }*/

   var enquiry_id = $('#enquiry_id').val();
   var emailid = $('#email').val();
   if($.isEmptyObject(enquiry_id) && emailid == "") {
         $('.failed_warn_email_alert').removeAttr('style');
         $('.failed_warn_email_alert').text("Please Select Atleast One.");

         return false;

   }else{
         $('.failed_warn_email_alert').attr('style','display:none');
         $('.failed_warn_email_alert').text("");
     // $("#email").removeAttr("required");
         console.log('11');
   }


   /*var selected = [];
   $('#visa_type input[name="visa_checkbox"]:checked').each(function() {
        selected.push($(this).attr('value'));
  });*/
   console.log(selected);
   var from_country = $('#f_country').val();
   var to_country = $('#t_country').val();
   var gid = $('input[name="gid"]').val();
   var seri_form = $(this).serializeArray();
   var selectdvisa =  selected;
   seri_form.push({ name: "from_country", value: from_country });
   seri_form.push({ name: "to_country", value: to_country });
   seri_form.push({ name: "selectdvisa", value: selectdvisa });
   seri_form.push({ name: "gid", value: gid });
   $('.not_failed_warn').attr('style','display:none');
   $('.not_failed_warn').text("");
            // console.log(seri_form);
   $.ajax({
        type:"POST",
        url: base_url + "franchise/request/send_email_of_application",
        data : seri_form,
        dataType : "json",
        success:function(res){
          if(res.status == "success"){
            $('#create_mail_application').modal('toggle');
                        //Swal.fire('Success!', res.message, 'success');
            if(res.enquiry == "yes"){
              Swal.fire({
               title: 'This enquiry is not in database',
               text: "Do you want to add it",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, Add it!'
         }).then(function (result) {
               if (result.value)
               {
                     window.location.href = continue_to+'?email='+res.data.email;
               }

    });
   }

}else{

                        //quick_swal("error", res.message);
     $('.not_failed_warn').removeAttr('style');
     $('.not_failed_warn').text(res.message);
}
$('#enquiry_id').val(null).trigger("change");
$('.store_visa_application_form')[0].reset();

}
});

});      
$(document).ready(function(){

    $(document).on('click', '.reset_btn',function(e){
     $('#f_country').val(null).trigger("change");
     $('#t_country').val(null).trigger("change");


});
    get_all_country();


    function capitalizeFirstLetter(string){
         return string.charAt(0).toUpperCase() + string.slice(1);
   }


   $(".visa_page_report").validate({
    rules: {
      "f_country": {
        required:true
  },
  "t_country": {
        required:true
  },


},

messages : {
  "f_country": {
    required:"Select Form Country"
},
"t_country": {
    required:"Select To Country"
},
},
});

   $(document).on('click', '.getvisabookmark',function(e){
    var from_country = $(this).attr('data-from');
    var to_country = $(this).attr('data-to');
    $('#f_country').val(from_country);
    $('#t_country').val(to_country);

    var api_url = '<?php echo API_URL ?>';
    $.ajax({
         //url : api_url + "api/visacountry",
         url: base_url + 'franchise/request/getvisadocument',
         type : "POST",
         data:{from_country,to_country},
         dataType : 'json',
         success:function(data){
          if(data.code == 500){
           alert("Please Enter Domain key");
           return;
     }
     var html = "";
     if(data.message.length >= 1){
          const visaform = data.message[0].visaformcompare || ' ';
          var visaformdisplay = visaform.split(",");
          html += "";
          $.each(data.message, function (key, val) {
            var gid =  val.id;
            var origincountry =  val.origin_country;
            var destinationcountry =  val.destination_country;
            var type_of_visa = val.type_of_visa.split(",");
            var price = val.price.split(",");
            var visa_type_id = val.visa_type_id.split(",");
            var visa_validity = val.visa_validity.split(",");
            var length_of_stay = val.length_of_stay.split(",");
            var time_to_get_visa = val.time_to_get_visa.split(",");
            var entry_type = val.entry_type.split(",");
            var description = val.description.split(",");
            var service_charge = val.service_charge.split(",");
            var allid = val.visa_type_form_id.split(",");

            var visaformcompare_val =   val.visaformcompare || "";                          
            var visaformcompare = visaformcompare_val.split(",");

            allid.sort(function(a, b) {
                  return a - b;
            });


            $.each(type_of_visa,function(i){
                    //var total = parseInt(price[i])+parseInt(service_charge[i]);
              var total = parseInt(service_charge[i]);
              var userwallet = $("#userwallet").val();
              var myarray = [];

              if(jQuery.inArray(allid[key],visaformcompare) == -1){

                   var formurl = "javascript:void(0)";
                   var style = "display:block;width:40%;cursor:not-allowed";
                   var datt = "disabled";
                   var cls = "";

             }else{
                   var extrav = "data-origincountry="+origincountry+" data-destinationcountry="+destinationcountry+" data-gid="+gid+" data-visa_type_id="+visa_type_id[i]+" data-allid="+allid[key]+" data-userwallet="+userwallet+" data-service="+total;  
                   if(parseInt(userwallet) > parseInt(total)){ 
                           /* var formurl = base_url +"franchise/request/get_form/"+origincountry+"/"+destinationcountry+"/"+gid+"/"+visa_type_id[i]+"/"+allid[key];    
                            var formurl = "javascript:void(0);";    
                            var style = "display:block;width:40%;";
                            var datt = "";
                            var cls="confirmform";*/

                    var formurl = "javascript:void(0)"; 
                    var style = "display:block;";

                    var datt = "";
                    var cls="confirmform";
              }else{ 
                            //Swal.fire('error!', "Please Check Your Balance", 'error')   
                            //var extrav = "";
                    var formurl = "javascript:void(0);";    
                    var style = "display:block;";
                    var datt = "";
                    var cls="confirmform";

              }  
        };  

        html += "<div class='visa-card-outer'><div class='visa-card'><input type='hidden' name='gid' value="+gid+" /><h5>"+capitalizeFirstLetter(type_of_visa[i])+"</h5><h6>"+price[i]+"</h6><a target='_blank' style="+style+" href="+formurl +" "+datt+" "+extrav+" class='box-btn fill_primary w-100 "+cls+"' >Apply Visa</a><ul class='visa-feature-list'><li>Valid for "+visa_validity[i]+"</li><li>"+length_of_stay[i]+ " Of Stay</li><li>Time to get visa "+time_to_get_visa[i]+"</li><li>Visa Fee "+price[i]+"</li><li>Our Service Fees "+service_charge[i]+"</li></ul><div class='visa-card-ft-content'><p>"+description[i]+"</p></div></div><div class='send-btns'><a href='javascript:void(0)' data-visa="+allid[key]+" class='box-btn fill_black create_mail_btn'><span class='fa fa-envelope'></span>Send Mail</a><a href='javascript:void(0)' data-visa="+allid[key]+" class='create_watsapp_btn box-btn fill_green flex-grow-1'><span class='fa fa-whatsapp'></span>Send Whatsapp</a></div></div></div>";
  });
      });
          html += "";
    }else{
       html += "<span>No Visa Data Found.</span>";
 }

 documents = "";

 documents += "<div class='ad-part'><h4>Required Documents</h4>";


 if(data.documents.length >= 1){

      documents += "<div class='accordion' id='accordionExample'>";

      var index = 0; 

      if(data.documents.length > 0 ){

       $.each(data.documents, function (key, docu) {
        index++;
        if(index == 1){
         var active_class = "active";
   }else{
         var active_class = "";
   }

   if(docu[0].name != null){
        const str = docu[0].document_name || ' ';
        var result = str.split(",");
                       //documents += '<li><a href="#tab_'+docu[0].id+'" class="'+active_class+'" data-bs-toggle="tab">'+capitalizeFirstLetter(docu[0].name)+'</a></li>';  
        documents += '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'+docu[0].id+'" aria-expanded="false" aria-controls="collapse'+docu[0].id+'">'+capitalizeFirstLetter(docu[0].name)+'</button>';
        documents += '<div id="collapse'+docu[0].id+'" class="accordion-collapse collapse" aria-labelledby="heading'+docu[0].id+'" data-bs-parent="#accordionExample"><div class="accordion-body">';
        $.each(result, function (key, docu) {
            var index= key+1;
            documents += '<p>'+index+ '.  '+capitalizeFirstLetter(docu)+'</p>';
        });
        documents += "</div></div>";

    }else{
       documents += '<span>No Document Data Found.</span>';
    }
});
 }else{
       documents += '<span>No Document Data Found.</span>';
 }
}else{
    documents += "<span>No Document Data Found.</span>";
}
documents += "</div></div>";

documents += "<div class='ad-part'><h4>Notes</h4>";

if(data.notes.length >= 1){ 
    documents += "<div class='accordion' id='accordionExample'>";
    var index1 = 0; 
    $.each(data.notes[0], function (key, note){   
     

      if(note.note_name != null){
           const str = note.notes_desc || ' ';
         var result = str.split(",");
             documents += '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'+note.notes+'" aria-expanded="false" aria-controls="collapse'+note.notes+'">'+capitalizeFirstLetter(note.note_name)+'</button>';
              documents += '<div id="collapse'+note.notes+'" class="accordion-collapse collapse" aria-labelledby="heading'+note.notes+'" data-bs-parent="#accordionExample"><div class="accordion-body">';
               if(result.length > 0){
                $.each(result, function (key, docu) {
                 var index= key+1;
                 documents += '<p>'+index+ '.  '+capitalizeFirstLetter(docu)+'</p>';
                  });
                }
                documents += "</div></div>";
      }else{
            documents += '<span>No Notes Found</span>';
      }
      });
    documents += "</div>";
    documents += "</div>";
}else{
    documents += "<span>Notes Data Found.</span>";
}
documents += "</div>";
documents += "<div class='ad-part'><h4>Full Process</h4>";
if(data.process.length >= 1){
    documents += "<ul class='process-list'>";
    $.each(data.process, function (key, pro) {
         var index= key+1;
         documents += '<li>'+index+ '.  '+pro[0].text+'</li>';
   });
     documents += "</ul>";
}else{
    documents += "<span>No Process Documents Data Found.</span>";
}

documents += "</div></div></div>";
$('.visabox').show();
$('#visa_type').html(html);
$('#documents').html(documents);
}
});
});    


$(document).on('click', '.sub_btn',function(e){
     var from_country = $('#f_country').val();
     var to_country = $('#t_country').val();
     var api_url = '<?php echo API_URL ?>';

    //var from_country = 1;
    //var to_country = 235;
     if($('.visa_page_report').valid()){

          $.ajax({
         //url : api_url + "api/visacountry",
           url: base_url + 'franchise/request/getvisadocument',
           type : "POST",
           data:{from_country,to_country},
           dataType : 'json',
           success:function(data){
            if(data.code == 500){
             alert("Please Enter Domain key");
             return;
       }
       var html = "";

       if(data.message.length >= 1){
          const visaform = data.message[0].visaformcompare || ' ';
          var visaformdisplay = visaform.split(",");
          html += "";
          $.each(data.message, function (key, val) {
            var gid =  val.id;
            var origincountry =  val.origin_country;
            var destinationcountry =  val.destination_country;
            var type_of_visa = val.type_of_visa.split(",");
            var price = val.price.split(",");
            var visa_type_id = val.visa_type_id.split(",");
            var visa_validity = val.visa_validity.split(",");
            var length_of_stay = val.length_of_stay.split(",");
            var time_to_get_visa = val.time_to_get_visa.split(",");
            var entry_type = val.entry_type.split(",");
            var description = val.description.split(",");
            var service_charge = val.service_charge.split(",");
            var allid = val.visa_type_form_id.split(",");

            var visaformcompare_val =   val.visaformcompare || "";                          
            var visaformcompare = visaformcompare_val.split(",");

            allid.sort(function(a, b) {
                  return a - b;
            });


            $.each(type_of_visa,function(i){
                    //var total = parseInt(price[i])+parseInt(service_charge[i]);
              var total = parseInt(service_charge[i]);
              var userwallet = $("#userwallet").val();
              var myarray = [];

              if(jQuery.inArray(allid[key],visaformcompare) == -1){

                   var formurl = "javascript:void(0)";
                   var style = "display:block;width:40%;cursor:not-allowed";
                   var datt = "disabled";
                   var cls = "";

             }else{
                   var extrav = "data-origincountry="+origincountry+" data-destinationcountry="+destinationcountry+" data-gid="+gid+" data-visa_type_id="+visa_type_id[i]+" data-allid="+allid[key]+" data-userwallet="+userwallet+" data-service="+total;  
                   if(parseInt(userwallet) > parseInt(total)){ 
                           /* var formurl = base_url +"franchise/request/get_form/"+origincountry+"/"+destinationcountry+"/"+gid+"/"+visa_type_id[i]+"/"+allid[key];    
                            var formurl = "javascript:void(0);";    
                            var style = "display:block;width:40%;";
                            var datt = "";
                            var cls="confirmform";*/

                    var formurl = "javascript:void(0)"; 
                    var style = "display:block;";

                    var datt = "";
                    var cls="confirmform";
              }else{ 
                            //Swal.fire('error!', "Please Check Your Balance", 'error')   
                            //var extrav = "";
                    var formurl = "javascript:void(0);";    
                    var style = "display:block;";
                    var datt = "";
                    var cls="confirmform";

              }  
        };  

        html += "<div class='visa-card-outer'><div class='visa-card'><input type='hidden' name='gid' value="+gid+" /><h5>"+capitalizeFirstLetter(type_of_visa[i])+"</h5><h6>"+price[i]+"</h6><a target='_blank' style="+style+" href="+formurl +" "+datt+" "+extrav+" class='box-btn fill_primary w-100 "+cls+"' >Apply Visa</a><ul class='visa-feature-list'><li>Valid for "+visa_validity[i]+"</li><li>"+length_of_stay[i]+ " Of Stay</li><li>Time to get visa "+time_to_get_visa[i]+"</li><li>Visa Fee "+price[i]+"</li><li>Our Service Fees "+service_charge[i]+"</li></ul><div class='visa-card-ft-content'><p>"+description[i]+"</p></div></div><div class='send-btns'><a href='javascript:void(0)' data-visa="+allid[key]+" class='box-btn fill_black create_mail_btn'><span class='fa fa-envelope'></span>Send Mail</a><a href='javascript:void(0)' data-visa="+allid[key]+" class='create_watsapp_btn box-btn fill_green flex-grow-1'><span class='fa fa-whatsapp'></span>Send Whatsapp</a></div></div></div>";
  });
      });
          html += "";
    }else{
       html += "<span>No Visa Data Found.</span>";
 }

 documents = "";

 documents += "<div class='ad-part'><h4>Required Documents</h4>";


 if(data.documents.length >= 1){

      documents += "<div class='accordion' id='accordionExample'>";

      var index = 0; 

      if(data.documents.length > 0 ){

       $.each(data.documents, function (key, docu) {
        index++;
        if(index == 1){
         var active_class = "active";
   }else{
         var active_class = "";
   }

   if(docu[0].name != null){
        const str = docu[0].document_name || ' ';
        var result = str.split(",");
                       //documents += '<li><a href="#tab_'+docu[0].id+'" class="'+active_class+'" data-bs-toggle="tab">'+capitalizeFirstLetter(docu[0].name)+'</a></li>';  
        documents += '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'+docu[0].id+'" aria-expanded="false" aria-controls="collapse'+docu[0].id+'">'+capitalizeFirstLetter(docu[0].name)+'</button>';
        documents += '<div id="collapse'+docu[0].id+'" class="accordion-collapse collapse" aria-labelledby="heading'+docu[0].id+'" data-bs-parent="#accordionExample"><div class="accordion-body">';
        $.each(result, function (key, docu) {
            var index= key+1;
            documents += '<p>'+index+ '.  '+capitalizeFirstLetter(docu)+'</p>';
        });
        documents += "</div></div>";

    }else{
       documents += '<span>No Document Data Found.</span>';
    }
});
 }else{
       documents += '<span>No Document Data Found.</span>';
 }
}else{
    documents += "<span>No Document Data Found.</span>";
}
documents += "</div></div>";

documents += "<div class='ad-part'><h4>Notes</h4>";

if(data.notes.length >= 1){ 
    documents += "<div class='accordion' id='accordionExample'>";
    var index1 = 0; 
    $.each(data.notes[0], function (key, note){   
     if(note.note_name != null){
           const str = note.notes_desc || ' ';
         var result = str.split(",");
             documents += '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'+note.notes+'" aria-expanded="false" aria-controls="collapse'+note.notes+'">'+capitalizeFirstLetter(note.note_name)+'</button>';
              documents += '<div id="collapse'+note.notes+'" class="accordion-collapse collapse" aria-labelledby="heading'+note.notes+'" data-bs-parent="#accordionExample"><div class="accordion-body">';
               if(result.length > 0){
                $.each(result, function (key, docu) {
                 var index= key+1;
                 documents += '<p>'+index+ '.  '+capitalizeFirstLetter(docu)+'</p>';
                  });
                }
                documents += "</div></div>";
      }else{
            documents += '<span>No Notes Found</span>';
      }
      });
    documents += "</div>";
    documents += "</div>";
}else{
    documents += "<span>Notes Data Found.</span>";
}
documents += "</div>";
documents += "<div class='ad-part'><h4>Full Process</h4>";
if(data.process.length >= 1){
documents += "<ul class='process-list'>";
    $.each(data.process, function (key, pro) {
         var index= key+1;
         documents += '<li>'+index+ '.  '+pro[0].text+'</li>';
   });
documents += "</ul>"; 
}else{
    documents += "<span>No Process Documents Data Found.</span>";
}

documents += "</div></div></div>";
$('.visabox').show();
$('#visa_type').html(html);
$('#documents').html(documents);
}
});
}

});

});

$('#visa_type').on('click', '.notbalance', function (e) {
  e.preventDefault();
  Swal.fire('error!', "Please Check Your Balance", 'error');   
});  
$('#visa_type').on('click', '.confirmform', function (e) {

  e.preventDefault();
    //formurl = base_url +"franchise/request/get_form/"+origincountry+"/"+destinationcountry+"/"+gid+"/"+visa_type_id[i]+"/"+allid[key];    

  var origincountry = $(this).attr("data-origincountry");
  var destinationcountry = $(this).attr("data-destinationcountry");
  var gid = $(this).attr("data-gid");
  var visa_type_id = $(this).attr("data-visa_type_id");
  var allid = $(this).attr("data-allid");
  var userwallet = $(this).attr("data-userwallet");
  var service = $(this).attr("data-service");

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
              var nurl = base_url +"franchise/request/get_form";
              window.location = nurl+"/"+origincountry+"/"+destinationcountry+"/"+gid+"/"+visa_type_id+"/"+allid+"/nocompany";
        } else if (result.isDenied) {
            //alert(userwallet);
           // alert(service);
              if(parseInt(userwallet) >= parseInt(service)){ 
                var nurl = base_url +"franchise/request/get_form";
                window.location = nurl+"/"+origincountry+"/"+destinationcountry+"/"+gid+"/"+visa_type_id+"/"+allid+"/company";
          }else{    

                //$(".notbalance").trigger('click');
               e.preventDefault();
               Swal.fire('error!', "Please Check Your Balance", 'error');   
         }
   }
})

});    
</script>

