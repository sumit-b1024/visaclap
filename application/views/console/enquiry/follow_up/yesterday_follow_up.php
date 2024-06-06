<button type="button" class="btn btn-danger btn-sm yesterday_pool_send_mail" style="display:none;" ><i class="fa fa-send"></i> Send Mail</button>
<br>
<table class="table table-bordered text-nowrap border-bottom" id="responsive_datatable_yesterday">
  <thead>
     <tr>
        <th width="wd-15p border-bottom-0" style="width:5%;">
           <label class="custom-control custom-checkbox-md">
              <input type="checkbox" class="custom-control-input" id="yesterday_check_box_th" name="process_check_box_td" value="option1" >
              <span class="custom-control-label"></span>
           </label>
        </th>
        <th width="wd-15p border-bottom-0" style="width:40%;"> Name </th>
        <th width="wd-15p border-bottom-0" style="width:5%;"> Mobile </th>
        <th width="wd-15p border-bottom-0" style="width:5%;"> Created </th>
        <th width="wd-15p border-bottom-0" style="width:30%;"> Description</th>
        <th width="wd-15p border-bottom-0" style="width:20%;"> Action</th>
     </tr>
  </thead>
  <tbody>
     <?php
     $index = 1;
     //echo '<pre>'; print_r($view);
     foreach($_view as $view){  ?>
      <tr>
       <td width="5%">
          <label class="custom-control custom-checkbox-md">
             <input type="checkbox" class="custom-control-input" name="yesterday_check_box_td"  value="<?= $view->id; ?>"  id="yesterday_tbl_td">
             <span class="custom-control-label"></span>
          </label>
       </td>
       <td width="40%">
         <div class="cell_content"><p>
         <?php
         $date = date('Y-m-d',strtotime($view->created_at));
         $startTimeStamp = strtotime($date);
         $endTimeStamp = strtotime(date('Y-m-d'));
         $timeDiff = abs($endTimeStamp - $startTimeStamp);

          if(isset($view->enquiry_type_icon_img) && $view->enquiry_type_icon_img != ""){
            echo '<img src="'.base_url($view->enquiry_type_icon_img).'" alt="img" class="avatar-sm  profile-user brround cover-image">&nbsp;&nbsp;'; 
         }

         echo $view->name . '<span class="d-inine orange-text"> ('.$numberDays = $timeDiff/86400 . '  Days)</span>';
         if($this->session->userdata('user_role') == User_role::FRANCHISE && isset($view->staff_name)){
            echo '<b style="color:red">('.$view->staff_name.')</b>';
         }
         ?></p><p class="fonts11"><?php 
         if(isset($view->enquiry_type_name) && $view->enquiry_type_name != ""){
            echo '('.$view->enquiry_type_name.")"; 
          }
           if($view->intersted_country != ""){
                $country = explode(",",$view->intersted_country);
                $allcountryname = array();
                 for($i=0;$i<count($country);$i++){ //echo $country[$i]; exit;
                    $from = $this->setting_model->get_api_country_by_id($country[$i]);
                    $allcountryname[] = $from->countrydata[0]->name;
                  } 
               echo ' ('.implode(",", $allcountryname).')';
            }
           if($view->visa_id != ""){
             $visaid = explode(",",$view->visa_id);
             $allvisaname = array();
              for($j=0;$j<count($visaid);$j++){ 
                   $visaidval = $this->setting_model->get_api_visaname_by_id($visaid[$j]);
                  $allvisaname[] =  $visaidval->visaname->name;
               } 
              echo ' ('.implode(",", $allvisaname).')';

            }
      ?><br>
      <!-- change_process_pool_status -->
      <!-- get service charge -->
      <?php  

     if($view->visaserviceid != ""){ 
      //$visafee = $this->setting_model->get_api_servicecharge($view->visaserviceid);  
$visafee = $this->setting_model->get_api_servicecharge($view->visa_id,$view->intersted_country);  
      $service = explode("-",$visafee->visaservice->service_charge);
      $service = $service[0];
     }else{
      $service= "";
     }
   ?>
   </p><div class="type-actions">
      <button type="button" class="new_change_process_pool_status" data-service="<?= $service; ?>"  pool_record_id="<?= $view->id; ?>"  value="1" >Process Pool</button>
      <button type="button" class="change_pool_status" pool_record_id="<?= $view->id; ?>"  value="3" >Drop Pool</button>
   </div>
   </div>
   </td>
   <td width="5%"><?= $view->mobile_no ?></td>
   <td width="5%"><?= date('d-M-Y',strtotime($view->created_at)); ?></td>
   <td width="30%" style="white-space: normal;"><?= $view->description ?></td>

   <td width="20%"><div class="tbl-action-wrap">
      <?php if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
       <a data-original-title="Edit Course" data-placement="top" data-toggle="tooltip" data-control="enquiry" href="classes/edit/1" class="single-action open_my_form_form edit_btn" data-id="<?= $view->id ?>" id="class_edit_1" data-toggle="tooltip" data-placement="top" title="Edit"><img src="<?php echo base_url('assets/img/edit-2.svg');  ?>" ></a>
    <?php } ?>


    <a class="box-btn bg-transparent enquiry_model_click" data-bs-target="#enquiry_model" data-bs-toggle="modal" href="javascript:void(0)" value="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="Add Follow Up">
     Follow Up
  </a>

  <a class="single-action view get_follow_up" href="javascript:void(0)" value="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="View All Follow Up">
     <img src="<?php echo base_url('assets/img/eye.svg');  ?>" >
  </a>

  <button type="button" class="single-action whatsapp open_whatsup_modal" value="<?= $view->id ?>"><img src="<?php echo base_url('assets/img/whatsapp.svg');  ?>" > </button>

  <?php if($this->session->userdata('user_role') == User_role::FRANCHISE || $this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){  if($view->passing == "yes" &&  $view->mobile_no != "") { ?>
                  <a class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$view->mobile_no ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </a>
               <?php } if($view->emailpassing == "yes" &&  $view->email != ""){ ?>   
                   <a class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$view->email; ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </a>
            <?php } }  ?>
            <?php if($view->dtotal > 0){ ?>
            <button class="btn btn-success btn-sm get_enquirey_document" href="javascript:void(0)" value="<?= $view->id ?>" data-toggle="tooltip" data-placement="top" title="View Document"><i class="fa fa-file"></i></button> 
                  <?php } ?>
   </div>
</td>
</tr>
<?php   } ?>
</tbody>
</table>