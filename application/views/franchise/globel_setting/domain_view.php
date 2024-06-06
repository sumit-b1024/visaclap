<style>
    .image-radio {
        cursor: pointer;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 4px solid transparent;
        margin-bottom: 0;
        outline: 0;
    }
    .image-radio input[type="radio"] {
        display: none;
    }
    .image-radio-checked {
        border-color: #4783B0;
    }
    .image-radio .glyphicon {
      position: absolute;
      color: #4A79A3;
      background-color: #fff;
      padding: 10px;
      top: 0;
      right: 0;
  }
  .image-radio-checked .glyphicon {
      display: block !important;
      margin: 4px;
  }
  .input-inside label {
    font-size: 12px;
    line-height: 18px;
    color: #575757;
    margin-bottom: 5px;
}
.input-group-text.bg-none{background-color: transparent;border: 1px solid #D9D9D9;
   }
</style>    
<?php 
$userdetail = $this->user_model->user_detail($this->session->userdata('user_id'));
?>

<form id="domain_name_save" class="form-horizontal domain_name_save apply-form" method="POST" enctype="multipart/form-data">
    <div class="row row-sm col-md-12 col-12 offset-md-1">
     <div class="col-lg-12">

       <div class="card-body">
        <div class="alert alert_box" role="alert" style="display:none;">

        </div>

        <h5>Custom Domain (Open you domain dns setting and create A record with ip 137.66.10.64)</h5>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group input-inside">
                    <label class="form-label">Domain Name </label>
                </div>
            </div>
            <div class="col-md-7">
                <input type="text" name="domain_name" id="domain_name" placeholder="Name" class="form-control" value="<?= isset($view) && isset($view->domain_name) ? $view->domain_name : set_value('domain_name'); ?>">
                <span class="error-text domain_error"></span>

                <?php if($userdetail->user_key != ""){ ?>
                   <a target="_blank" href="<?php echo base_url(); ?>s/<?=$userdetail->user_key;?>">Your correct website link is <?php echo base_url(); ?>s/<?=$userdetail->user_key;?></a>

                   <?php if(IS_LIVE == TRUE){ ?>
                    <input type="hidden" name="target_address" value="vughy.com/crm/s/<?=$userdetail->user_key;?>" />
                <?php }else{ ?>
                    <input type="hidden" name="target_address" value="103.240.89.177/visaclaptour/s/<?=$userdetail->user_key;?>" />    
                <?php } ?>    

            <?php } ?>  
        </div>
        <div class="col-md-2">
          <div class="form-group">

             <button type="submit" id="domain_submit_btn" class="box-btn fill_primary mb-0">Assign Domain</button>
             <button class="btn btn-primary save_loader_btn" type="button" disabled style="display:none">
               <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               Loading...
           </button>
           <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
       </div> 
   </div>
</div>

</div>

</div>

</div>

</form>
<hr>
<form id="domain_form" class="form-horizontal domain_form " method="POST" enctype="multipart/form-data">
    <div class="row row-sm">
     <div class="col-md-8 col-12 offset-1">
       <div class="card-body"> 
           <div class="row">
              <h5>Logos and Background</h5>        
              <div class="col-md-6 ">
                <div class="border d-block rounded text-center">
                    <label class="text-dark1 font-weight-normal">Company Logo</label></br>
                    <?php if($view->logo != ""){ ?>
                        <img src="<?php echo base_url().$view->logo ?>" width="150"/></br>
                    <?php } ?>
                    <input id="franchise_logo" type="file" name="franchise_logo" accept="image/x-png, image/jpeg" multiple><br>
                    <span id="error_star" class="small text-danger"></span></br>
                    <span id="error_type">Only these formats are allowed : jpeg, jpg, png</span></br>
                    <span id="error_size">Upload file size up to 2 MB</span><br>
                    <span id="error_file" class="small text-danger"></span>
              </div>
            </div>
            <div class="col-md-6">
                <div class="border d-block rounded text-center">
                   <label class=" text-dark1 font-weight-normal">Background Logo</label></br>
                   <?php if($view->home_bg != ""){ ?>
                        <img src="<?php echo base_url().$view->home_bg ?>" width="150"/></br>
                    <?php } ?>
                <input id="home_bg" type="file" name="home_bg" accept="image/x-png, image/jpeg" multiple /><br>
                <span id="home_error_star" class="small text-danger"></span><br>
                <span id="home_error_type">Only these formats are allowed : jpeg, jpg, png</span><br>
                <span id="home_error_size">Upload file size up to 2 MB</span><br>
                <span id="home_error_file" class="small text-danger"></span>
            </div>
        </div>
    </div> 

<br>
    <div class="row ">
       <div class="col-md-12">
          <div class="form-group">
             <button type="submit" id="submit_btn" class="box-btn fill_primary">Submit</button>
             <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
         </div> 
     </div>
 </div>


</div>
</div>
</div>
<hr>
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <div class="card-body"> 
       <div class="row">
           <h5>Tourist attractions and iteneries</h5>    
           <div class="col-sm-12 col-md-6">
            <div class="form-group input-inside">
                <label class=" text-dark1 font-weight-normal">Select Countries you serve</label>
                <select name="country[]" class="form-control select2 country" multiple data-placeholder="Choose Country" value="<?= $view->country_id ?>">
                    <option value=""></option>
                    <?php foreach ($_country as $key => $value1) {
                        if($view->country_id == ""){
                         $view->country_id = "229,231"; 
                     }    
                     ?>
                     <option value="<?= $value1->id ?>" <?= isset($view) && in_array($value1->id,explode(',',$view->country_id)) ? "selected" : "" ?>><?= $value1->name; ?></option>
                 <?php } ?>
             </select>
         </div>
     </div>
     <div class="col-sm-12 col-md-6">
        <div class="form-group input-inside">
            <label class=" text-dark1 font-weight-normal">What is your main business</label>
            <select name="business[]" class="form-control select2 business" multiple data-placeholder="Choose business">
                <option value=""></option>
                <?php   foreach ($get_enquiry_type as $key => $value2) { 
                    if(!empty($view->business)){
                        if(in_array($value2->meta_id,explode(',',$view->business))){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                    }
                    ?>
                    <option value="<?= $value2->meta_id ?>" <?php echo $selected ?>><?= $value2->name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>  

<div class="row mt-3">
 <div class="col-md-6">
  <div class="form-group input-inside form-check1">
    <label class="d-block text-dark1 font-weight-normal">Do You Want To Show Tourist Attraction From Admin</label>
    <input type="radio" name="tou_att" id="att_yes" value="1" <?= ($view->tou_att == '1') ? "checked" : ""; ?> <?= ($view->tou_att == NULL) ? "checked" : ""; ?> class="form-check-input" /><label for="att_yes">&nbsp;Yes</label>
    <input type="radio" name="tou_att" id="att_no" value="0"  <?= ($view->tou_att == '0') ? "checked" : ""; ?> class="form-check-input" /><label for="att_no">&nbsp;No</label>
</div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside form-check1">
    <label class="d-block text-dark1 font-weight-normal">Do You Want To Show Travel Itinerary From Admin</label>
    <input type="radio" name="tou_iti" id="iti_yes" value="1" <?= ($view->tou_iti == '1') ? "checked" : ""; ?>  <?= ($view->tou_iti == NULL) ? "checked" : ""; ?> class="form-check-input" /><label for="iti_yes">&nbsp;Yes</label>
    <input type="radio" name="tou_iti" id="iti_no" value="0" <?= ($view->tou_iti == '0') ? "checked" : ""; ?> class="form-check-input" /><label for="iti_no">&nbsp;No</label>
</div> 
</div>
</div>
<div class="row mt-2">
   <div class="col-md-4">
      <div class="form-group input-inside">
        <label class="form-label">&nbsp;</label>
        <button type="submit" id="submit_btn" class="box-btn fill_primary pull-left">Submit</button>
        <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
    </div> 
</div>

</div>
</div>


</div>
</div>     
<hr>
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <div class="card-body"> 
    <div class="row align-items-end">
        <h5>Mark ups</h5>   
        <div class="col-md-6">
          <div class="form-group input-inside">
            <label class="form-label">Mark up for packages</label>
            <input type="text" name="markup_package" id="markup_package" placeholder="Mark up for packages" maxlength="2" class="form-control" value="<?= isset($view) && isset($view->markup_package) ? $view->markup_package : set_value('markup_package'); ?>" onkeypress="allowNumbersOnly(event)">
        </div> 
    </div>
    <div class="col-md-6">
      <div class="form-group input-inside">
        <label class="form-label">Mark up for Visa</label>
        <input type="text" name="markup_visa" id="markup_visa" placeholder="Mark up for Visa" maxlength="2" class="form-control" value="<?= isset($view) && isset($view->markup_visa) ? $view->markup_visa : set_value('markup_visa'); ?>" onkeypress="allowNumbersOnly(event)">
    </div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="form-label">Mark up for flights</label>
    <input type="text" name="markup_flight" id="markup_flight" placeholder="Mark up for flights" maxlength="2" class="form-control" value="<?= isset($view) && isset($view->markup_flight) ? $view->markup_flight : set_value('markup_flight'); ?>" onkeypress="allowNumbersOnly(event)">
</div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="form-label">Mark up for hotel</label>
    <input type="text" name="markup_hotel" id="markup_hotel" placeholder="Mark up for hotel" maxlength="2" class="form-control" value="<?= isset($view) && isset($view->markup_hotel) ? $view->markup_hotel : set_value('markup_hotel'); ?>" onkeypress="allowNumbersOnly(event)">
</div> 
</div>

<div class="col-md-5 mt-2">
  <div class="form-group">
     <button type="submit" id="submit_btn" class="box-btn fill_primary pull-left">Submit</button>
     <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
 </div> 
</div>
</div>
</div>
</div>
</div> 
<hr>
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <div class="card-body"> 
    <div class="row ">
       <h5>Customer Care and Contact Number</h5>  
       <div class="col-md-6">
          <div class="form-group input-inside">
            <label class="form-label">Customer care number </label>
            <input type="text" name="coustmer_number" id="coustmer_number" placeholder="Customer Care Number " class="form-control numbers_only" value="<?= isset($view) && isset($view->coustmer_number) ? $view->coustmer_number : set_value('coustmer_number'); ?>">
        </div> 
    </div>
    <div class="col-md-6">
      <div class="form-group input-inside">
        <label class="form-label">Whatsapp number </label>
        <input type="text" name="watsapp_number" id="watsapp_number" placeholder="Whatsapp Number" class="form-control numbers_only" value="<?= isset($view) && isset($view->watsapp_number) ? $view->watsapp_number : set_value('watsapp_number'); ?>">
    </div> 
</div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group input-inside">
        <label class="form-label">Address </label>
        <textarea class="form-control" name="address"><?= isset($view) && isset($view->address) ? $view->address : set_value('address'); ?></textarea>
    </div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="form-label">Contact Address </label>
    <textarea class="form-control" name="contact_address"><?= isset($view) && isset($view->contact_address) ? $view->contact_address : set_value('contact_address'); ?></textarea>
</div> 
</div>
<div class="col-md-4 mt-2">
  <div class="form-group input-inside">
     <button type="submit" id="submit_btn" class="box-btn fill_primary pull-left">Submit</button>
     <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
 </div> 
</div>
</div>

</div>
</div>
</div> 
<hr>
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <div class="card-body"> 
    <div class="row">
        <h5>Website Settings</h5>  
        <div class="col-md-6">
          <div class="form-group input-inside">
            <label class="form-label">Title</label>
            <textarea class="form-control" name="title" placeholder="Title"><?= isset($view) && isset($view->title) ? $view->title : set_value('title'); ?></textarea>
        </div> 
    </div>
    <div class="col-md-6">
      <div class="form-group input-inside">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="Description"><?= isset($view) && isset($view->description) ? $view->description : set_value('description'); ?></textarea>
    </div> 
</div>
</div>
<div class="row align-items-end">
 <div class="col-md-6">
  <div class="form-group input-inside">
    <label class="form-label">Keywords</label>
    <textarea class="form-control" name="keywords" placeholder="Keywords"><?= isset($view) && isset($view->keywords) ? $view->keywords : set_value('keywords'); ?></textarea>
</div> 
</div>
<div class="col-md-4">
  <div class="form-group input-inside">
    <label class="form-label">&nbsp;</label>
    <button type="submit" id="submit_btn" class="box-btn fill_primary pull-left">Submit</button>
    <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
</div> 
</div>
</div>
</div>
</div>
</div>   
<hr>        
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <div class="card-body"> 
      <div class="row">
       <h5>Social media settings</h5>  
       <div class="col-md-6">
          <div class="form-group input-inside">
            <label class="d-block text-dark1 font-weight-normal">Facebook</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-none" id="basic-addon3" style="border-radius: 2px;padding: 7px 10px;">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_103_83469)">
                        <path d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z" fill="#1877F2"/>
                        <path d="M16.6711 15.4688L17.2031 12H13.875V9.75C13.875 8.80102 14.34 7.875 15.8306 7.875H17.3438V4.92188C17.3438 4.92188 15.9705 4.6875 14.6576 4.6875C11.9166 4.6875 10.125 6.34875 10.125 9.35625V12H7.07812V15.4688H10.125V23.8542C11.3674 24.0486 12.6326 24.0486 13.875 23.8542V15.4688H16.6711Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_103_83469">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </span>
        </div>
        <input type="text" name="facebook" id="coustmer_number"  placeholder="Facebook" class="form-control" value="<?= isset($view) && isset($view->facebook) ? $view->facebook : set_value('facebook'); ?>">
    </div>    

</div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="d-block text-dark1 font-weight-normal">Linkedin</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text bg-none" id="basic-addon3" style="border-radius: 2px;padding: 7px 10px;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_103_83479)">
                <path d="M22.2283 0H1.77167C1.30179 0 0.851161 0.186657 0.518909 0.518909C0.186657 0.851161 0 1.30179 0 1.77167V22.2283C0 22.6982 0.186657 23.1488 0.518909 23.4811C0.851161 23.8133 1.30179 24 1.77167 24H22.2283C22.6982 24 23.1488 23.8133 23.4811 23.4811C23.8133 23.1488 24 22.6982 24 22.2283V1.77167C24 1.30179 23.8133 0.851161 23.4811 0.518909C23.1488 0.186657 22.6982 0 22.2283 0ZM7.15333 20.445H3.545V8.98333H7.15333V20.445ZM5.34667 7.395C4.93736 7.3927 4.53792 7.2692 4.19873 7.04009C3.85955 6.81098 3.59584 6.48653 3.44088 6.10769C3.28591 5.72885 3.24665 5.31259 3.32803 4.91145C3.40941 4.51032 3.6078 4.14228 3.89816 3.85378C4.18851 3.56529 4.55782 3.36927 4.95947 3.29046C5.36112 3.21165 5.77711 3.25359 6.15495 3.41099C6.53279 3.56838 6.85554 3.83417 7.08247 4.17481C7.30939 4.51546 7.43032 4.91569 7.43 5.325C7.43386 5.59903 7.38251 5.87104 7.27901 6.1248C7.17551 6.37857 7.02198 6.6089 6.82757 6.80207C6.63316 6.99523 6.40185 7.14728 6.14742 7.24915C5.893 7.35102 5.62067 7.40062 5.34667 7.395ZM20.4533 20.455H16.8467V14.1933C16.8467 12.3467 16.0617 11.7767 15.0483 11.7767C13.9783 11.7767 12.9283 12.5833 12.9283 14.24V20.455H9.32V8.99167H12.79V10.58H12.8367C13.185 9.875 14.405 8.67 16.2667 8.67C18.28 8.67 20.455 9.865 20.455 13.365L20.4533 20.455Z" fill="#0A66C2"/>
            </g>
            <defs>
                <clipPath id="clip0_103_83479">
                    <rect width="24" height="24" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </span>
</div>
<input type="text" name="linkedinlink" id="linkedinlink" placeholder="Linkedin" class="form-control" value="<?= isset($view) && isset($view->linkedinlink) ? $view->linkedinlink : set_value('linkedinlink'); ?>">
</div>

</div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="d-block text-dark1 font-weight-normal">Twitter</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text bg-none" id="basic-addon3" style="border-radius: 2px;padding: 7px 10px;">
          <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.7887 28C8.55374 28 5.53817 27.0591 3 25.4356C5.15499 25.5751 8.95807 25.2411 11.3236 22.9848C7.76508 22.8215 6.16026 20.0923 5.95094 18.926C6.25329 19.0426 7.6953 19.1826 8.50934 18.856C4.4159 17.8296 3.78793 14.2373 3.92748 13.141C4.695 13.6775 5.99745 13.8641 6.50913 13.8174C2.69479 11.0882 4.06703 6.98276 4.74151 6.09635C7.47882 9.88867 11.5812 12.0186 16.6564 12.137C16.5607 11.7174 16.5102 11.2804 16.5102 10.8316C16.5102 7.61092 19.1134 5 22.3247 5C24.0025 5 25.5144 5.71275 26.5757 6.85284C27.6969 6.59011 29.3843 5.97507 30.2092 5.4432C29.7934 6.93611 28.4989 8.18149 27.7159 8.64308C27.7095 8.62731 27.7224 8.65878 27.7159 8.64308C28.4037 8.53904 30.2648 8.18137 31 7.68256C30.6364 8.52125 29.264 9.91573 28.1377 10.6964C28.3473 19.9381 21.2765 28 11.7887 28Z" fill="#47ACDF"/>
        </svg>
    </span>
</div>
<input type="text" name="twitter" id="twitter" placeholder="Twitter" class="form-control" value="<?= isset($view) && isset($view->twitter) ? $view->twitter : set_value('twitter'); ?>">
</div>

</div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="d-block text-dark1 font-weight-normal">Youtube</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text bg-none" id="basic-addon3" style="border-radius: 2px;padding: 7px 10px;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_103_83523)">
                <path d="M23.522 6.18541C23.3863 5.67482 23.1189 5.20883 22.7465 4.83407C22.3741 4.4593 21.9099 4.18891 21.4002 4.04996C19.5238 3.54541 12.0238 3.54541 12.0238 3.54541C12.0238 3.54541 4.5238 3.54541 2.64744 4.04996C2.13773 4.18891 1.67346 4.4593 1.30109 4.83407C0.92872 5.20883 0.661309 5.67482 0.525622 6.18541C0.0238038 8.06996 0.0238037 12 0.0238037 12C0.0238037 12 0.0238038 15.93 0.525622 17.8145C0.661309 18.3251 0.92872 18.7911 1.30109 19.1658C1.67346 19.5406 2.13773 19.811 2.64744 19.95C4.5238 20.4545 12.0238 20.4545 12.0238 20.4545C12.0238 20.4545 19.5238 20.4545 21.4002 19.95C21.9099 19.811 22.3741 19.5406 22.7465 19.1658C23.1189 18.7911 23.3863 18.3251 23.522 17.8145C24.0238 15.93 24.0238 12 24.0238 12C24.0238 12 24.0238 8.06996 23.522 6.18541Z" fill="#FF0302"/>
                <path d="M9.56934 15.5689V8.43164L15.8421 12.0003L9.56934 15.5689Z" fill="#FEFEFE"/>
            </g>
            <defs>
                <clipPath id="clip0_103_83523">
                    <rect width="24" height="24" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </span>
</div>
<input type="text" name="youtube" id="youtube" placeholder="Youtube" class="form-control" value="<?= isset($view) && isset($view->youtube) ? $view->youtube : set_value('youtube'); ?>">
</div>
</div> 
</div>
<div class="col-md-6">
  <div class="form-group input-inside">
    <label class="d-block text-dark1 font-weight-normal">Instagram</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text bg-none" id="basic-addon3" style="border-radius: 2px;padding: 7px 10px;">
          <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint0_radial_103_83494)"/>
            <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint1_radial_103_83494)"/>
            <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint2_radial_103_83494)"/>
            <path d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z" fill="white"/>
            <defs>
                <radialGradient id="paint0_radial_103_83494" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                    <stop stop-color="#B13589"/>
                    <stop offset="0.79309" stop-color="#C62F94"/>
                    <stop offset="1" stop-color="#8A3AC8"/>
                </radialGradient>
                <radialGradient id="paint1_radial_103_83494" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                    <stop stop-color="#E0E8B7"/>
                    <stop offset="0.444662" stop-color="#FB8A2E"/>
                    <stop offset="0.71474" stop-color="#E2425C"/>
                    <stop offset="1" stop-color="#E2425C" stop-opacity="0"/>
                </radialGradient>
                <radialGradient id="paint2_radial_103_83494" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                    <stop offset="0.156701" stop-color="#406ADC"/>
                    <stop offset="0.467799" stop-color="#6A45BE"/>
                    <stop offset="1" stop-color="#6A45BE" stop-opacity="0"/>
                </radialGradient>
            </defs>
        </svg>
    </span>
</div>
<input type="text" name="instagram" id="youtube" placeholder="Instagram" class="form-control" value="<?= isset($view) && isset($view->instagram) ? $view->instagram : set_value('instagram'); ?>">
</div>

</div> 
</div>
<div class="col-md-4 mt-4">
  <div class="form-group">
     <button type="submit" id="submit_btn" class="box-btn fill_primary pull-left">Submit</button>
     <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
 </div> 
</div>
</div>
</div>
</div>
</div>    
<hr>
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <div class="card-body"> 
    <div class="row align-items-end">
        <h5>Google analytics Code</h5>  

        <div class="col-md-10">
          <div class="form-group input-inside">
            <label class="form-label">Google analytics Code</label>
            <textarea class="form-control" name="analytic_code" rows="10" placeholder="Google analytics Code
            "><?= isset($view) && isset($view->analytic_code) ? $view->analytic_code : set_value('analytic_code'); ?></textarea>
        </div> 
    </div>
    <div class="col-md-2">
      <div class="form-group ">
        <label class="form-label">&nbsp;</label>
        <button type="submit" id="submit_btn" class="box-btn fill_primary pull-left">Submit</button>
        <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
    </div> 
</div>
</div>
</div>
</div>
</div> 
<hr>
<div class="row row-sm">
 <div class="col-md-8 col-12 offset-1">
   <form id="template_form" class="form-horizontal template_form" method="POST" enctype="multipart/form-data">
       <div class="card-body"> 

        <div class="row">
           <div class="col-12">
            <h4 for="" class="d-block text-dark ">Select Template</h4>
        </div>
    </div>
    <div class="row">
     <div class="col-md-6 input-inside">
      <div class="form-group">
        <button type="button" class="btn select_template" style="background-color: #429D94;border-color:  #429D94;color: #fff;"><span class="fa fa-html5"></span> Select Template</button>

    </div> 
</div>
<div class="col-md-6">
    <?php if($view->template_id != ""){ ?>
        <h4>Template Name :  <?php echo $view->template_id; ?></h4>
    <?php } ?>
    <div class="form-group">
        <label class="form-label">&nbsp;</label>
        <!-- <button type="submit" id="submit_btn" class="btn btn-primary mb-0 pull-left">Submit</button> -->
        <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
    </div> 
</div>
</div>

</div>
</form> 
</div>
</div>                    


<?php
   //echo FCPATH;
    //$scan = scandir(FCPATH."/upload/template/");
$scan = FCPATH."/upload/template/";

?>

<!-- modal start -->
<div class="modal fade" id="select_template">
  <div class="modal-dialog modal-xl" role="document">
   <div class="modal-content modal-content-demo">
    <form class="select_template_form" id="select_template_form">

     <div class="modal-header">
      <h6 class="modal-title"><b>Select Template</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
  </div>

  <div class="modal-body">
    <div class="row">
        <?php 
        if (is_dir($scan)) {
            $files = opendir($scan); {

                if ($files) {
                                    //READING NAMES OF EACH ELEMENT INSIDE THE DIRECTORY
                    while (($gfg_subfolder = readdir($files)) !== FALSE) {
                                        // CHECKING FOR FILENAME ERRORS
                       if ($gfg_subfolder != '.' && $gfg_subfolder != '..') {
                        ?>
                        <div class="col-xs-4 col-sm-3 col-md-3 nopad text-center">
                            <label class="image-radio <?php  ($template->id == $view->template_id) ? "image-radio-checked" : ""; ?>">
                             <?php 
                             $dirpath = FCPATH."/upload/template/" . $gfg_subfolder . "/";
                             if (is_dir($dirpath)) {
                                $file = opendir($dirpath); {
                                    if ($file) {
                                        while (($gfg_filename = readdir($file)) !== FALSE) {
                                            if ($gfg_filename != '.' && $gfg_filename != '..') {
                                                ?>
                                                <img class="img-responsive" src="<?= base_url()."upload/template/".$gfg_subfolder."/".$gfg_filename?>" style="width:100%" />
                                                <?php 
                                            }
                                        }
                                    }    
                                }    
                            } 
                            ?>     
                            <input type="radio" name="image_radio" value="<?=$gfg_subfolder?>" <?php  if($gfg_subfolder == $view->template_id) { ?> checked <?php } ?> />
                        </label>
                        <span><?=$gfg_subfolder?></span>
                    </div>
                    <?php 

                }
            }
        }
    }    
}    
?>
<?php foreach($scan as $key=>$template){ ?>
    <div class="col-xs-4 col-sm-3 col-md-3 nopad text-center">
        <label class="image-radio <?php  ($template->id == $view->template_id) ? "image-radio-checked" : ""; ?>">
            <img class="img-responsive" src="<?php echo base_url().$template->image ?>" />
            <input type="radio" name="image_radio" value="<?=$template->id?>" <?php  if($template->id == $view->template_id) { ?> checked <?php } ?> />
        </label>
        <span><?=$template?></span>
    </div>
<?php } ?>

</div> 
<span class="select_template_error_msg text-red"></span>   
</div>
<div class="modal-footer">
  <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
   Loading...
</button>
<button type="button" id="" class="box-btn fill_primary pull-left save_template">Submit</button>
<button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script>


   function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
}

$(document).on('click', '.select_template', function () {
 $('#select_template').modal('show');
});

$(document).ready(function(){
    $('select').select2({ width: '100%',  allowClear: false });
    // add/remove checked class
    $(".image-radio").each(function(){
        if($(this).find('input[type="radio"]').first().attr("checked")){
            $(this).addClass('image-radio-checked');
        }else{
            $(this).removeClass('image-radio-checked');
        }
    });

    // sync the input state
    $(".image-radio").on("click", function(e){
        $(".image-radio").removeClass('image-radio-checked');
        $(this).addClass('image-radio-checked');
        var $radio = $(this).find('input[type="radio"]');
        $radio.prop("checked",!$radio.prop("checked"));

        e.preventDefault();
    });
});

$(document).ready(function() {

  $(document).on('click','.save_template',function(e){


     e.preventDefault();
     var formdata = new FormData($('#select_template_form').get(0));
     if ($('input[name="image_radio"]:checked').length == 0) {
      $('.select_template_error_msg').text('Please Select Template');
      return false;
  }else{
   $.ajax({
    url : base_url + "franchise/globel_setting/set_template",
    type : "POST",
    data : formdata,
    dataType : "json",
    cache:false,
    contentType: false,
    processData: false,

    success : function(data){

        if(data.status == "success"){ 
            $('#select_template').modal('toggle');
                     /*Swal.fire("Sucess!", data.message, "success").then(function(){
                          location.reload();
                       });*/
            location.reload();
        }else{
           Swal.fire('Warning!', data.message, 'warning')
       }

   }
});
   
}

});

  var continue_to = base_url + 'franchise/globel_setting/';

  $('#franchise_logo').change(function() {  
    $('#error_file').html('').hide();
    $('#error_size').css("color", "black");
    $('#error_type').css("color", "black");
    var fp = $("#franchise_logo");
    var lg = fp[0].files.length;
    var items = fp[0].files;
    var fileSize = 0;
    var fileExtension = ['jpeg', 'jpg', 'png'];

    if (lg > 0) {
        for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 2097152) {
                    /* var msg = 'Upload file size up to 50 MB';
                    $('#error_file').html(msg).show(); */
                    $('#error_size').css("color", "red");
                }
            }
            
            if($(this).val() == '') {
                $('#error_file').html('Choose file').show();
            } else if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $('#error_type').css("color", "red");
            }
        });

  $('#home_bg').change(function() {  
    $('#home_error_file').html('').hide();
    $('#home_error_size').css("color", "black");
    $('#home_error_type').css("color", "black");
    var fp = $("#home_bg");
    var lg = fp[0].files.length;
    var items = fp[0].files;
    var fileSize = 0;
    var fileExtension = ['jpeg', 'jpg', 'png'];

    if (lg > 0) {
        for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 2097152) {
                    /* var msg = 'Upload file size up to 50 MB';
                    $('#error_file').html(msg).show(); */
                    $('#home_error_size').css("color", "red");
                }
            }
            
            if($(this).val() == '') {
                $('#home_error_file').html('Choose file').show();
            } else if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $('#home_error_type').css("color", "red");
            }
        });

  $(document).on('submit','.domain_form',function(e){
    e.preventDefault();
    var formdata = new FormData($('#domain_form').get(0));

    $.ajax({
        url : base_url + "franchise/globel_setting/save_domain_data",
        type : "POST",
        data : formdata,
        dataType : "json",
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success : function(data){
            if(data.status == "success"){
                $('.domain_form')[0].reset();

                    // quick_swal("success", data.message);
                setTimeout(function() {
                 window.location = continue_to;
             }, 2500);   
                window.location = continue_to;
            }else{
                $('.alert_box').removeAttr('style');
                $('.alert_box').text(data.message);

            }

        }
    });


});



  function frmValidate(source) {
    var val = source;
    if (/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/.test(val)) {
        $(".domain_error").html();
        return true;
    } else {

        $(".domain_error").html("Enter valid domain name");
        val.name.focus();
        return false;
    }
}


$(document).on('submit','.domain_name_save',function(e){
    e.preventDefault();
    var doname = $('#domain_name').val();
    frmValidate(doname);

    $('.save_loader_btn').show();
    var formdata = new FormData($('#domain_name_save').get(0));

    $.ajax({
        url : base_url + "franchise/globel_setting/save_domain_name",
        type : "POST",
        data : formdata,
        dataType : "json",
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success : function(data){
            $('.save_loader_btn').hide();

            if(data.status == "success"){
             $('.alert_box').removeAttr('style');
             $('.alert_box').addClass('alert-success');
             $('.alert_box').text(data.message);
             setTimeout(function() {
                 window.location = continue_to;
             }, 4500);   

         }else{
            $('.alert_box').removeAttr('style');
            $('.alert_box').addClass('alert-danger');
            $('.alert_box').text(data.message);

        }

    }
});


});




});
</script>