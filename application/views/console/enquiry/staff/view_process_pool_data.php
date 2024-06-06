<button type="button" class="btn btn-danger btn-sm process_pool_send_mail" style="display:none;"><i class="fa fa-send"></i> Send Mail</button>
<br>
<br>
<table class="table table-bordered text-nowrap border-bottom" id="responsive_process_pool">
  <thead>
    <tr>
      <th width="wd-15p border-bottom-0">
        <label class="custom-control custom-checkbox-md">
          <input type="checkbox" class="custom-control-input" id="process_check_box_th" name="example-checkbox1" >
          <span class="custom-control-label"></span>
        </label>
      </th>
      <th width="wd-15p border-bottom-0"> Name </th>
      <th width="wd-15p border-bottom-0"> Mobile </th>
      <!--<th width="wd-15p border-bottom-0"> Follow Up Date </th>-->
      
      <th width="wd-15p border-bottom-0"> Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $index = 1;
    foreach($fetch_process_enquiry_data as $view){ ?>
     <tr>
      <td>
       <label class="custom-control custom-checkbox-md">
        <input type="checkbox" class="custom-control-input process_check_box_td" name="process_check_box_td" id="process_check_box_td" value="<?= $view->id; ?>" >
        <span class="custom-control-label"></span>
      </label>
    </td>
    <td width="50%"><div class="cell_content"><p>
      <?php
      $fetch_process_pool_entry = $this->setting_model->fetch_process_pool_last_entry($view->pool_status,$view->id);
       $interview_date = date('d-M-Y',strtotime($view->interview_date));
        $biomatric_date = date('d-M-Y',strtotime($view->biomatric_date));

      if(!empty($fetch_process_pool_entry)){
        $date = date('Y-m-d',strtotime($fetch_process_pool_entry->created_at));
       
        $startTimeStamp = strtotime($date);
        $endTimeStamp = strtotime(date('Y-m-d'));
        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        if(isset($view->enquiry_type_icon_img) && $view->enquiry_type_icon_img != ""){
          echo '<img src="'.base_url($view->enquiry_type_icon_img).'" alt="img" class="avatar-sm  profile-user brround cover-image">&nbsp;&nbsp;'; 
        }
        
         if($view->company != ""){
          ?><img src="<?php echo base_url('assets/img/bo.svg');  ?>" ><?php echo '<b>&nbsp;&nbsp;</b>'; ?><?php 
        }
        echo $view->name . '<b style="color:red"> ('.$numberDays = $timeDiff/86400 . '  Days)</b>';
        if($this->session->userdata('user_role') == User_role::FRANCHISE && isset($view->staff_name)){
         echo '<b style="color:red">('.$view->staff_name.')</b>';
       }
     }else{
       if($view->company != ""){
          ?><img src="<?php echo base_url('assets/img/bo.svg');  ?>" ><?php echo '<b>&nbsp;&nbsp;</b>'; ?><?php 
        }
      echo $view->name . '<b style="color:red"> ('.'0' . '  Days)</b>';
    }
    if($view->interview_date != "" && $view->biomatric_date != ""){
    echo '<br/><b class="fonts11" style="color:#6c5ffc;"> (Biometric Date : '.$biomatric_date.')'.'</b><b class="fonts11" style="color:#6c5ffc;font-size: 11px;"> (Interview Date : '.$interview_date.')'.'</b>';
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
  <div class="type-actions">
  <button type="button" class="change_pool_status" pool_record_id="<?= $view->id; ?>"  value="2">Finalize Pool</button>
  <button type="button" class="change_pool_status" pool_record_id="<?= $view->id; ?>"  value="3">Drop Pool</button>  
</div>
</td>
<td width="5%"><?= $view->mobile_no ?></td>
<!--<td width="5%"><?= $view->follow_up_date != "0000-00-00" ? date('d-M-Y',strtotime($view->follow_up_date)) : ""; ?></td>-->


<td> <div class="tbl-action-wrap">
  <?php if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
    <a data-original-title="Edit Course" data-placement="top" data-toggle="tooltip" data-control="enquiry" href="classes/edit/1" class="btn btn-icon btn-warning btn-sm mr-2 open_my_form_form edit_btn" data-id="<?= $view->id ?>" id="class_edit_1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
  <?php } ?>

 <!--  <a class="btn btn-primary btn-sm enquiry_model_click" data-bs-target="#enquiry_model" data-bs-toggle="modal" href="javascript:void(0)" value="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="Add Follow Up">
   <i class="fa fa-plus"></i>
 </a> -->

 <a class="single-action view get_follow_up" href="javascript:void(0)" value="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="View All Follow Up">
   <img src="<?php echo base_url('assets/img/eye.svg');  ?>" >
 </a>

<!--  <button type="button" class="btn btn-success btn-sm open_whatsup_modal" value="<?= $view->id ?>"><span class="fa fa-whatsapp"></span> </button> -->

<button type="button" class="single-action whatsapp open_whatsup_modal" value="<?= $view->id ?>"><img src="<?php echo base_url('assets/img/whatsapp.svg');  ?>" > </button>


<a class="box-btn bg-transparent add_interview_click" data-bs-target="#add_interview" data-bs-toggle="modal" href="javascript:void(0)" value="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="Add Follow Up">
<img src="<?php echo base_url('assets/img/add.svg');  ?>" >
Add deadline</a>
<?php if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){  if($view->passing == "yes" &&  $view->mobile_no != "") { ?>
                  <button class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$view->mobile_no ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </button>
               <?php } if($view->emailpassing == "yes" &&  $view->email != ""){ ?>   
                   <button class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" value="<?=$view->email; ?>"  data-toggle="tooltip" data-placement="top" title="View Visa">
               <i class="fa fa-cc-visa"></i>
                  </button>
            <?php } }  ?>
            <?php if($view->dtotal > 0){ ?>
            <button class="btn btn-success btn-sm get_enquirey_document" href="javascript:void(0)" value="<?= $view->id ?>" data-toggle="tooltip" data-placement="top" title="View Document">
               <i class="fa fa-file"></i>
                  </button> 
                <?php } ?>
</div>
</td>
</tr>
<?php  } ?>
</tbody>
</table>