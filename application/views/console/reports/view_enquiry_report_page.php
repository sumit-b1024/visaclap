<button type="button" class="box-btn fill_primary btn-sm create_batch_btn" style="margin-bottom: 17px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Crete Batch</button>


<!--<button type="button" class="btn btn-success btn-sm send_mail" value="<?= $template->id ?>"><span class="fa fa-send"></span> Send Mail</button>--> 


<a class="box-btn fill_primary send_mail pull-right"  data-bs-target="#email_template_model" data-bs-toggle="modal" href="javascript:void(0)">
            <i class="fa fa-plane"></i>&nbsp;&nbsp;Send Mail
         </a>

<table class="table table-bordered text-nowrap border-bottom enquiry_reports_tbl" id="responsive-datatable">
  <thead>
     <tr>
        <!-- <th class="wd-15p border-bottom-0">Index</th> -->
        <th class="wd-15p border-bottom-0" style="width:10%;">
          <label class="custom-control custom-checkbox-md">
           <input type="checkbox" class="custom-control-input" id="report_check_box_th" name="example-checkbox1">
           <span class="custom-control-label"></span>
        </label>
     </th>
     <th class="wd-15p border-bottom-0"  style="width:30%;">Name</th>
     <th class="wd-15p border-bottom-0" style="width:10%;" >Mobile No</th>
      <th width="wd-15p border-bottom-0" style="width:10%;"> Created </th> 
     <th class="wd-15p border-bottom-0" style="width:15%;">Follow Up Date</th>
  <!--    <th class="wd-15p border-bottom-0" >Passport No</th>
     <th class="wd-15p border-bottom-0" >Valid From</th>
     <th class="wd-15p border-bottom-0" >Valid To</th> -->
     
     <th class="wd-15p border-bottom-0" style="width:10%;">Current Pool</th>
     <th class="wd-15p border-bottom-0" style="width:15%;">Action</th>
  </tr>
</thead>
<tbody>
   <?php
   $index = 1;
   if(!empty($fetch_enquiry_array)){
      foreach ($fetch_enquiry_array as $template ) 
      { 
        //print_r($template); exit;
         ?>
         <tr>
            <td><label class="custom-control custom-checkbox-md">
              <input type="checkbox" class="custom-control-input" id="process_check_box_td" name="process_check_box_td" value="<?= $template->id; ?>">
              <span class="custom-control-label"></span>
           </label></td>
           <td>
             <div class="cell_content"><p>
               <?= $template->name;

if($this->session->userdata('user_role') == User_role::FRANCHISE && isset($template->staff_name)){
            echo '<span class="d-inine orange-text">('.$template->staff_name.')</span>';
         }
                ?>
           </p><p class="fonts11">
               <?php
                if(isset($template->enquiry_type_name) && $template->enquiry_type_name != ""){
                     echo '('.$template->enquiry_type_name.")"; 
                   }
       
              if($template->intersted_country != ""){
       /*$country = explode(",",$template->intersted_country);
       $allcountryname = array();
        for($i=0;$i<count($country);$i++){ //echo $country[$i]; exit;
           $from = $this->setting_model->get_api_country_by_id($country[$i]);
           $allcountryname[] = $from->countrydata[0]->name;
         } 
         echo ' ('.implode(",", $allcountryname).')';*/
         echo '('.$template->intersted_country_name.")";
       
      }
       if($template->visa_id != ""){
         /*$visaid = explode(",",$template->visa_id);
         $allvisaname = array();
          for($j=0;$j<count($visaid);$j++){ 
               $visaidval = $this->setting_model->get_api_visaname_by_id($visaid[$j]);
              $allvisaname[] =  $visaidval->visaname->name;
           } 
          echo ' ('.implode("<br/>", $allvisaname).')';*/
           echo '('.$template->visa_name.")";
        }
        if($template->enquiry_type_id == "32"){
            $proclass = "new_change_process_pool_status";
        }else{
           $proclass = "change_process_pool_status"; 
        }    

        if($template->visa_id != ""){ 
      //$visafee = $this->setting_model->get_api_servicecharge($view->visaserviceid);  
       $visafee = $this->setting_model->get_api_servicecharge($template->visa_id,$template->intersted_country);  
       $service = explode("-",$visafee->visaservice->service_charge);
       $service = $service[0];

     }else{
      $service= "";
     }
                ?></p>
           
             <div class="type-actions">
               <?php if($template->current_pull == Enquiry_pool_status::NO_STATUS) { ?>
                <button  href="javascript:void(0)" class="<?=$proclass?>" data-service="<?= $service; ?>"  pool_record_id="<?= $template->id; ?>"  value="1" >Process Pool</button>
                <button  href="javascript:void(0)" class="change_pool_status" pool_record_id="<?= $template->id; ?>"  value="3" >Drop Pool</button>  
               <?php } ?>
                <?php if($template->current_pull == Enquiry_pool_status::PROCESS) { ?>
                      <button  href="javascript:void(0)" class="change_pool_status" pool_record_id="<?= $template->id; ?>"  value="2" >Finalize Pool</button>
                       <button  href="javascript:void(0)" class="change_pool_status" pool_record_id="<?= $template->id; ?>"  value="3" >Drop Pool</button>  
                 <?php } ?> 
                 <?php if($template->current_pull == Enquiry_pool_status::DROP) { ?>
                      <button  href="javascript:void(0)" class="change_pool_status" pool_record_id="<?= $template->id; ?>"  value="2" >Finalize Pool</button>
                       <button  href="javascript:void(0)" class="<?=$proclass?>" data-service="<?= $service; ?>"  pool_record_id="<?= $template->id; ?>"  value="1" >Process Pool</button> 
                 <?php } ?>
                  <?php if($template->current_pull == Enquiry_pool_status::FINALIZE) { ?>
                     <button href="javascript:void(0)" class=" <?=$proclass?>" data-service="<?= $service; ?>"  pool_record_id="<?= $template->id; ?>"  value="1" >Process Pool</button>
                      
                 <?php } ?> 
               </div>
               </div>
           </td>
           <td><?= $template->mobile_no; ?></td>
           
           <td><?= date('d-M-Y',strtotime($template->created_at)); ?></td>
          

           <td><?= date('d-M-Y',strtotime($template->follow_up_date)); ?></td>
           <!--<td><?= isset($template->passport_no) && $template->passport_no != "" ? $template->passport_no :"-"; ?></td>
           <td><?= !is_null($template->p_valid_from) ? date('d-M-Y',strtotime($template->p_valid_from)) : "-"; ?></td>
           <td><?= !is_null($template->p_valid_to) ? date('d-M-Y',strtotime($template->p_valid_to)) : "-"; ?></td>-->
          
         <td><?php if($template->current_pull == 0) { echo "No Status";}elseif($template->current_pull == 1){ echo "Process"; }elseif($template->current_pull == 2){ echo "Finalize"; }elseif($template->current_pull == 3){ echo "Drop"; }else{ echo "Error"; } ?></td>
         <td><div class="tbl-action-wrap">
            <?php if($this->session->userdata('user_role') == User_role::FRANCHISE ){ ?>
                 <a data-original-title="Edit Course" data-placement="top" data-toggle="tooltip" href="<?php echo base_url(); ?>franchise/enquiry/editinquiry/<?= $template->id; ?>" class="single-action btn-warning btn-sm mr-2" id="class_edit_1" data-toggle="tooltip" data-placement="top" title="Edit"><img src="<?php echo base_url('assets/img/edit-2.svg');  ?>" ></a>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){ ?>
                 <a data-original-title="Edit Course" data-placement="top" data-toggle="tooltip" href="<?php echo base_url(); ?>franchise/enquiry/staffeditinquiry/<?= $template->id; ?>" class="single-action btn-warning btn-sm mr-2" id="class_edit_1" data-toggle="tooltip" data-placement="top" title="Edit"><img src="<?php echo base_url('assets/img/edit-2.svg');  ?>" ></a>
            <?php } ?>
             <?php if($this->session->userdata('user_role') == User_role::FRANCHISE || $this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){ ?>

               <button type="button" class="single-action whatsapp open_whatsup_modal" value="<?= $template->id ?>"><img src="<?php echo base_url('assets/img/whatsapp.svg');  ?>" > </button> 
               <a class="get_follow_up" href="javascript:void(0)" value="<?= $template->id ?>"  data-toggle="tooltip" data-placement="top" title="View All Follow Up">
               <img src="<?php echo base_url('assets/img/eye.svg');  ?>" >
             </a>
        
           <a class="box-btn bg-transparent add_interview_click" data-bs-target="#add_interview" data-bs-toggle="modal" href="javascript:void(0)" value="<?= $template->id ?>"  data-toggle="tooltip" data-placement="top" title="Add Follow Up"><img src="<?php echo base_url('assets/img/add.svg');  ?>" >Add deadline</a>
           
            <a class="box-btn bg-transparent add_followup_click" data-bs-target="#add_followup" data-bs-toggle="modal" href="javascript:void(0)" value="<?= $template->id ?>"  data-toggle="tooltip" data-placement="top" title="Add Follow Up">Follow Up</a>

        <?php } ?>
        <?php if($this->session->userdata('user_role') == User_role::FRANCHISE || $this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){  if($template->passing == "yes" &&  $template->mobile_no != "") { ?>
                  <a class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$template->mobile_no ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </a>
               <?php } if($template->emailpassing == "yes" &&  $template->email != ""){ ?>   
                   <a class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$template->email; ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </a>
            <?php } }  ?>
            <?php if($template->dtotal > 0){ ?>
            <button class="btn btn-success btn-sm get_enquirey_document" href="javascript:void(0)" value="<?= $template->id ?>" data-toggle="tooltip" data-placement="top" title="View Document"><i class="fa fa-file"></i></button>
            <?php } ?>
        </div>
         </td>

      </tr>
      <?php
   }
} ?>
</tbody>
</table>