<style>
 label.error{
  color: red;
}
</style> 
<style>
        [v-cloak] {
            display: none;
        }
    </style>   
 
<script src="https://unpkg.com/vue@3.4.27/dist/vue.global.js"></script>

<div id='firstApp' v-cloak>
<h6 class="primary-title1 mb-0" style="    color: #575757;">Select Filter </h6><br>
<div class="row row-sm">
 <div class="col-lg-12">
  <div class="row row-sm">
    <div class="col-lg-12">

     <div class="card">
       <div class="card-body">
         <form class="enquiry_page_report"  @submit.prevent="getFormValues">
           <div class="row">
             <div class="col-sm-3 col-md-2 input-inside mb-1">
               <label class="form-label">Follow Up Date</label>
               <div class="wd-200 mg-b-30">
                 <div class="input-group">
                   <div class="input-group-text">
                     <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                   </div><input class="form-control passport_date" id="follow_up_date" name="follow_up_date" placeholder="MM/DD/YYYY" type="text" readonly>
                 </div>
               </div>
             </div>

             <div class="col-sm-3 col-md-2 input-inside1 mb-1">
              <div class="form-group">
                <label class="form-label">Select Language</label>
                <select class="language form-select" name="language">
                  <option value="">Select Language</option>
                  <option value="Telugu">Telugu</option>
                  <option value="Hindi">Hindi</option>
                  <option value="English">English</option>
                </select>
              </div>
            </div>
             <div class="col-sm-3 col-md-3">
              <div class="form-group input-inside">
                <label class="form-label"> Intersted Country</label>
                 <select name="i_country[]" id="i_country" data-placeholder="Intersted Country" class="i_country form-select">
                </select>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group input-inside">
                    <label class="form-label">Select Visa</label>
                   <select class="city  visatype form-control "  id="visatype" name="visatype[]" data-placeholder="Select Visa">
                    </select>
                </div>
            </div>
           
          <div class="col-sm-2 col-md-2 input-inside">
           <label class="form-label">Enquiry From</label>
           <div class="wd-200 mg-b-30">
             <div class="input-group">
               <div class="input-group-text">
                 <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="enquiry_from" name="enquiry_from" placeholder="MM/DD/YYYY" type="text" readonly>
             </div>
           </div>
         </div>

         <div class="col-sm-2 col-md-2 input-inside">
           <label class="form-label">Enquiry To</label>
           <div class="wd-200 mg-b-30">
             <div class="input-group">
               <div class="input-group-text">
                 <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="enquiry_to" name="enquiry_to" placeholder="MM/DD/YYYY" type="text" readonly>
             </div>
           </div>
         </div>

         <div class="col-sm-2 col-md-2 input-inside1">
           <div class="form-group">
            <label class="form-label">Enquiry Type</label>
            <select class="enquiry_type select2-show-search form-select" name="enquiry_type">
             <option value="">Select Enquiry Type</option>
             <?php foreach ($get_enquiry_type as $key => $value) { ?>
              <option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-sm-3 col-md-2 input-inside1">
         <div class="form-group">
            <label class="form-label ">Staff</label>
            <select class="enquiry_staff_id  form-select"  name="enquiry_staff_id" value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Staff">
               <option value="">Select Staff</option>
               <?php 
               foreach ($get_all_staff_data as $key => $value) { ?>
                  <option value="<?= $value->user_id ?>" <?= isset($enquiry) && $enquiry->enquiry_staff_id == $value->user_id ? "selected" : ""; ?>><?= $value->first_name ?></option>
               <?php    } ?>
            </select>
         </div>
      </div>
      <div class="col-sm-2 col-md-4 form-btns">
       <button type="submit" class="box-btn fill_primary sub_btn" style="
       margin-top: 25px;">Submit</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top:25px;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
      </button>
      <button type="button" class="box-btn fil_grey reset_btn"  @click="reset"  style="
      margin-top: 25px;">Reset</button>
    </div>

  </div>

</form>
</div>
</div><br/>
<div style="float:left; width: 44%;" class="hr1"><hr/></div>
          <div style="float:right; width: 43%;" class="hr2"><hr/></div>&nbsp; Or Search With <br><br>
<div class="row">
 <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
           <form class="detail_search" @submit.prevent="getFormValuesSimple">
            <div class="row input-inside">
                <div class="col-sm-2 col-md-3 ">
                   <div class="form-group">
                      <label class="form-label">Name</label>
                      <input class="form-control name" id="name" name="uname" placeholder="Name" type="text">
                  </div>
              </div>
              <div class="col-sm-2 col-md-3">
                 <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-control email" id="email" name="email" placeholder="Email" type="text">
                 </div>
              </div>
              <div class="col-sm-2 col-md-3">
                 <div class="form-group">
                    <label class="form-label">Number</label>
                    <input class="form-control number" id="number" name="number" placeholder="Number" type="text">
                </div>
             </div>
             <div class="col-sm-3 col-md-3 form-btns">
                    <button type="submit" class="box-btn fill_primary sub_detail_btn" style="
                    margin-top: 25px;">Submit</button>
                    <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 0px;">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                  </button>
                  <button type="button" class="box-btn fil_grey reset_btn_detail"  @click="resetDetail"  style="
                  margin-top: 25px;">Reset</button>
              </div>
           </div> 
          </form>  
        </div>
    </div>
</div> 
</div>    
<br/>
<div class="card">
  <div class="card-header">
   <div class="row">
   <!--  <div class="col-10">
     <h3 class="card-title"><?= $title; ?></h3>
   </div> -->
   <div class="col-12">
     <a class="box-btn fill_primary send_mail pull-right"  data-bs-target="#email_template_model" data-bs-toggle="modal" href="javascript:void(0)">
      <i class="fa fa-plane"></i> Send Mail
    </a>
  </div>                    
</div>
</div>
<div class="card-body">
              
  <div class="table-responsive" id="process_pool_data">
  <table class="table table-bordered text-nowrap border-bottom" id="responsive_process_pool">
  <thead>
    <tr>
     <th width="wd-15p border-bottom-0" style="width:10%">
        <label class="custom-control custom-checkbox-md">
          <input type="checkbox" class="custom-control-input" id="process_check_box_th" name="example-checkbox1" >
          <span class="custom-control-label"></span>
        </label>
      </th>
      <th width="wd-15p border-bottom-0" style="width:50%"> Name </th>
      <th width="wd-15p border-bottom-0" style="width:10%"> Mobile </th>
      <!--<th width="wd-15p border-bottom-0"> Follow Up Date </th>-->
      
      <th width="wd-15p border-bottom-0" style="width:20%"> Action</th>
    </tr>
  </thead>
  <tbody>
   
        <tr v-for="view in dataFromServer" :key="view.id">
          <td>
            <label class="custom-control custom-checkbox-md">
              <input type="checkbox" class="custom-control-input process_check_box_td" :value="view.id">
              <span class="custom-control-label"></span>
            </label>
          </td>
          <td>
            <div class="cell_content">
              <p>
                <img v-if="view.enquiry_type_icon_img" :src="getBaseUrl() + view.enquiry_type_icon_img" alt="img" class="avatar-sm profile-user brround cover-image">&nbsp;&nbsp;
                <img v-if="'<?= $this->session->userdata('user_role')?>' === '<?=User_role::FRANCHISE_STAFF?>' && view.company" src="<?php echo base_url('assets/img/bo.svg'); ?>" >
                {{ view.name }}
                <span class="d-inine orange-text">({{ getDaysDifference(view.created_at) }} Days)</span>
                <span v-if="'<?= $this->session->userdata('user_role')?>' === '<?=User_role::FRANCHISE?>' && view.staff_name" class="d-inine orange-text">({{ view.staff_name }})</span>
                <br/>
                <b v-if="view.interview_date && view.biomatric_date" class="fonts11" style="color:#6c5ffc">
                  (Biometric Date: {{ formatDate(view.biomatric_date) }}) (Interview Date: {{ formatDate(view.interview_date) }})
                </b>
              </p>
              <p class="fonts11">
                <span v-if="view.enquiry_type_name">({{ view.enquiry_type_name }})</span>
                <span v-if="view.intersted_country">
                  ({{  (view.intersted_country_name) }})
                </span>
                <span v-if="view.visa_id">
                  ({{  (view.visa_name) }})
                </span>
              </p>
              <div class="type-actions">
                <button  href="javascript:void(0)" class="change_pool_status" :pool_record_id="view.id" value="2">Finalize Pool</button>
                <button  href="javascript:void(0)" class="change_pool_status" :pool_record_id="view.id" value="3">Drop Pool</button>  
              </div>
            </div>
          </td>
          <td>{{ view.mobile_no }}</td>
          <td>
            <div class="tbl-action-wrap">
              <a v-if="'<?=$this->session->userdata('user_role')?>' === '<?=User_role::FRANCHISE?>'" class="single-action view get_follow_up" href="javascript:void(0)" :value="view.id" data-toggle="tooltip" data-placement="top" title="View All Follow Up">
                <img src="<?php echo base_url('assets/img/eye.svg'); ?>">
              </a>
              <button type="button" class="single-action whatsapp open_whatsup_modal" :value="view.id"><img src="<?php echo base_url('assets/img/whatsapp.svg'); ?>"></button>
              <a class="box-btn bg-transparent add_interview_click" data-bs-target="#add_interview" data-bs-toggle="modal" href="javascript:void(0)" :value="view.id" data-toggle="tooltip" data-placement="top" title="Add Follow Up"><img src="<?php echo base_url('assets/img/add.svg'); ?>">Add deadline</a>
              <a v-if="'<?=$this->session->userdata('user_role')?>' === '<?=User_role::FRANCHISE?>' && view.passing === 'yes' && view.mobile_no" class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" :value="view.mobile_no" data-toggle="tooltip" data-placement="top" title="View Visa"><i class="fa fa-cc-visa"></i></a>
              <a v-if="'<?=$this->session->userdata('user_role')?>' === '<?=User_role::FRANCHISE?>' && view.emailpassing === 'yes' && view.email" class="btn btn-success btn-sm get_visa_data" href="javascript:void(0)" :value="view.email" data-toggle="tooltip" data-placement="top" title="View Visa"><i class="fa fa-cc-visa"></i></a>
              <button v-if="view.dtotal > 0" class="btn btn-success btn-sm get_enquirey_document" href="javascript:void(0)" :value="view.id" data-toggle="tooltip" data-placement="top" title="View Document"><i class="fa fa-file"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
  </table>
  </div>
</div>
</div>
<!-- modal start -->
<div class="modal fade" id="pool_status_modal">
 <div class="modal-dialog" role="document">
  <div class="modal-content modal-content-demo">

   <form class="pool_review_form">
    <div class="modal-header">
     <h6 class="modal-title">Pool Form</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
   </div>

   <div class="modal-body">
    <input type="hidden" name="btn_val" id="btn_val">
    <input type="hidden" name="pool_record_id" id="pool_record_id"> 

    <div class="col-sm-12 col-md-12 input-inside mb-1">
      <div class="form-group">
       <label class="form-label "><b>Pool Status</b><span style="color:red;">  *</span></label>
       <select class="form-control pool_status select2" name="pool_status" >
         <option value="">Select Pool Status</option>
       </select>
     </div>
   </div>

   <div class="col-sm-12 col-md-12 input-inside">
    <div class="form-group">
     <label class="form-label "><b>Description</b><span style="color:red;">  *</span></label>
     <textarea class="form-control pool_description" name="pool_description"></textarea>
   </div>
 </div>
</div>

<div class="modal-footer">
 <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>

<button class="box-btn fill_primary">Submit</button>
<button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<!-- modal end -->
<div class="modal fade bd-example-modal-lg" id="whatsup_template_model">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
   <form class="send_whatsup_template_form">
    <div class="modal-header">
     <h6 class="modal-title"><b>Whatsup Template</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
   </div>
   <input type="hidden" class="w_template_user_id" id="w_template_user_id">
   <div class="modal-body follow_up_body">
     <label class="form-label"><b>Select Whatsup Template</b><span class="text-red">*</span></label>
     <select class="form-control w_template_id form-control city select2-show-search form-select" id="w_template_id" required>
      <option value="">Select Template</option>
      <?php foreach ($get_whatsup_template_data as $key => $value) { ?>
       <option value="<?= $value->id ?>"><?= $value->name ?></option>
     <?php } ?>
   </select>
 </div>

 <div class="modal-footer">
  <div class="spinner-border text-primary whatsup_spinner" style="display:none" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <button type="submit" class="btn btn-primary whatsup_send_btn">Submit</button>
  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<!-- modal end -->
<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="email_template_model">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
   <form class="send_email_template_form">
    <div class="modal-header">
     <h6 class="modal-title">Send Email</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
   </div>
   <div class="modal-body follow_up_body">
    <div class="col-12 input-inside mb-2">
     <label class="form-label" style="display: block;">Select Template <span class="text-red">*</span></label>
     <select class="form-control email_template_id select2-show-search form-select" id="email_template_id" required>
      <option value="">Select Template</option>
      <?php foreach ($get_email_template_data as $key => $value) { ?>
       <option value="<?= $value->id ?>"><?= $value->name ?></option>
     <?php } ?>
   </select>
</div>
<div class="col-12 input-inside">
    <label class="form-label" style="display: block;">Itinerary</label>
            <select class="form-control email_itinerary_names select2-show-search" id="email_itinerary_names" style="width:100%;">
               <option value="">Select Itinerary</option>
               <?php foreach ($get_all_itenerary_names as $key => $value) { ?>
                  <option value="<?= $value->id ?>"><?= $value->i_name ?></option>
               <?php } ?>
            </select>
        </div>
   <span class="check_box_empty_error" style="color:red;"></span>
 </div>

 <div class="modal-footer">
  <div class="spinner-border text-primary email_spinner" style="display:none" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <button type="submit" class="box-btn fill_primary email_send_btn">Submit</button>
  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<!-- modal end -->

<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="view_follow_up_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="">
            <input type="hidden" name="record_id" id="record_id">
            <div class="modal-header">
               <h6 class="modal-title"><b>View All Follow  Up</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body follow_up_body">
            </div>

            <div class="modal-footer">
               <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- Model For Show follow up -->
<div class="modal fade" id="add_followup">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="followup_form">
           <input type="hidden" name="record_id" id="record_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Set Follow up Date</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

           <div class="modal-body">
              <div class="col-sm-12 col-md-12">
                 <label class="form-label"><b>Follow up</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control followup" name="followup" placeholder="MM/DD/YYYY" type="text">
                    </div>
                    <span class="followup_date_error_msg text-red"></span>
                 </div>
              </div>
          </div>

          <div class="modal-footer">
           <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
           </button>

           <button class="btn btn-primary upload_file">Submit</button>
           <button type="button" class="btn btn-light btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>

<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="pool_view_model">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
    <form class="">
      <div class="modal-header">
       <h6 class="modal-title"><b>View All Pool</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
     </div>
     <div class="modal-body view_all_pool">

     </div>

     <div class="modal-footer">
      <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
    </div>
  </form>
</div>
</div>
</div>
<!-- modal end -->

<!-- Model For Show Interview -->
<div class="modal fade" id="add_interview">
  <div class="modal-dialog" role="document">
     <div class="modal-content modal-content-demo">
        <form class="interview_form">
           <input type="hidden" name="record_id" id="record_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Set Interview Date</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

           <div class="modal-body">
              <div class="col-sm-12 col-md-12 input-inside">
                 <label class="form-label"><b>Biometric Date</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control bio_matric_date" name="bio_matric_date" placeholder="MM/DD/YYYY" type="text">
                    </div>
                    <span class="bio_matric_date_error_msg text-red"></span>
                 </div>
              </div>
              <div class="col-sm-12 col-md-12 input-inside">
                 <label class="form-label"><b>Interview Date</b><span class="text-red">*</span></label>
                 <div class="wd-200 mg-b-30">
                    <div class="input-group">
                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control interview_date" name="interview_date" placeholder="MM/DD/YYYY" type="text">
                    </div>
                    <span class="interview_date_error_msg text-red"></span>
                 </div>
              </div>
              <div class="col-sm-12 col-md-12 input-inside">
                 <label class="form-label"><b>Description</b><span class="text-red">*</span></label>
                    <textarea class="form-control deadline_desc" name="deadline_desc" id="deadline_desc" placeholder="Description" ></textarea>
                    <span class="deadline_desc_error_msg text-red"></span>
              </div>
          </div>

          <div class="modal-footer">
           <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
           </button>

           <button class="box-btn fill_primary upload_file">Submit</button>
           <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>


 <!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="visa_template_model">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="send_email_template_form">
            <div class="modal-header">
               <h6 class="modal-title"><b>Send Email</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body visa_data_number">
              
            
         </div>

         <div class="modal-footer">
           <div class="spinner-border text-primary email_spinner" style="display:none" role="status">
             <span class="sr-only">Loading...</span>
          </div>
          
          <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
       </div>
    </form>
 </div>
</div>
</div>

   <!-- Model For Show Follow Up -->
   <div class="modal fade bd-example-modal-lg" id="view_application_preview">
      <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content modal-content-demo">
            <form class="">
               <input type="hidden" name="record_id" id="record_id">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Application Visa</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>
               
               <div class="modal-body application_preview_div">
               </div>

               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>

</div>
</div>
</div>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>

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
            $('#i_country').append('<option value="">Select</option>');
          $.each(data.message, function (key, val) {
             $("#i_country").append('<option value="'+val.id+'">'+val.name+'</option>');
         });
           $('.enquiry_page_report .i_country').select2({
                 dropdownParent: $('.enquiry_page_report'),
                 width: "100%"
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
                //url: base_url + "franchise/reports/get_all_visa_by_multi_country_id",
                url: base_url + "franchise/reports/get_all_visa_by_country_id",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(data){
                     
                    if(data.status != "false"){
                    if(data){
                        $(".visatype").empty();
                        $(".visatype").append('<option value="">Select Visa</option>');
                        //alert(data.message[0].type_of_visa);
                        $.each(data.message,function(key,value){

                            
                            $(".visatype").append('<option value="'+data.message[key].visa_type_id+'">'+data.message[key].type_of_visa+'</option>');
                        });
                    }else{
                        $(".visatype").empty();
                    }
                    }else{
                        $(".visatype").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });


    $(document).on('click', '.get_visa_data', function () {
  var number  =  $(this).attr('value');
  $.ajax({
    type: 'POST',
    url: base_url + 'franchise/enquiry/view_all_visa_report',
    data:{'number' : number},
    success: function(result) {
      $('.visa_data_number').html("");
         // $('.follow_up_body').html("data");
         $('.visa_data_number').html(result);
         $('.visa_data_tbl').DataTable();
         $('#visa_template_model').modal('show');

         // $('#responsive-datatable').DataTable();
      }
   });

});
   $(document).on('click','.send_mail',function(){
     var record_id = $(this).val();
     $('#email_template_model').modal('show');
     $('.select2-show-search').select2({
        dropdownParent: $('#email_template_model'),
        width: "100%"
     });

  });
var status = <?php echo Enquiry_pool_status::DROP; ?>

$(document).on('click','.add_followup_click',function(){
   $(".followup_form")[0].reset();
   var record_id = $(this).attr('value');
   $('form.followup_form #record_id').val(record_id);
});

$(document).on('click','.view_application',function(){
            var group_id = $(this).data('id');
            $.ajax({
             type: 'POST',
             url: base_url + 'franchise/request/fetch_visaapplication_data_groupby',
             data:{'group_id' : group_id},

             success : function(data){
               $('.application_preview_div').html("");
               $('.application_preview_div').html(data);
               $('#view_application_preview').modal('toggle');
            }
         });
         });

/* Interview form submit */
$(document).on('submit','.interview_form',function(e){     
   e.preventDefault();
   var bio_matric_date = $('.bio_matric_date').val();
   var interview_date = $('.interview_date').val();
   var deadline_desc = $('textarea#deadline_desc').val();
   if(bio_matric_date == ""){
      $('.bio_matric_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.bio_matric_date_error_msg').text('');
   }
   if(interview_date == ""){
      $('.interview_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.interview_date_error_msg').text('');
   }
   if(deadline_desc == ""){
      $('.deadline_desc_error_msg').text('Please Enter Description');
      return false;
   }else{
      $('.deadline_desc_error_msg').text('');
   }
  
   $.ajax({
      url : base_url + 'franchise/enquiry/add_interview_date',
      type : "POST",
      data : $(this).serializeArray(),
      dataType: 'json',
      success : function(data){
         if(data.status == 'success'){
            $(".interview_form")[0].reset();
            $('#add_interview').modal('toggle');
            get_all_today_follow_up_data();
            get_all_yesterday_follow_up_data();
            get_all_missed_follow_up_data();
            location.reload();
            /*Swal.fire("Success!", data.message, "success").then(function(){
               // location.reload();
            });*/
         }else if(data.status == "date_error"){
          $('.enquiry_date_error_msg').text(data.message);
       }else{
         Swal.fire("Warning!", data.message, "warning");
      }
   }
});
});

/* Follow form submit */
$(document).on('submit','.followup_form',function(e){     
   e.preventDefault();
   var foll_matric_date = $('.followup').val();
   if(foll_matric_date == ""){
      $('.followup_date_error_msg').text('Please select Date');
      return false;
   }else{
      $('.followup_date_error_msg').text('');
   }
   
   $.ajax({
      url : base_url + 'franchise/enquiry/add_dropfollowup_date',
      type : "POST",
      data : $(this).serializeArray(),
      dataType: 'json',
      success : function(data){
         if(data.status == 'success'){
            $(".followup_form")[0].reset();
            $('#add_followup').modal('toggle');
            //get_all_today_follow_up_data();
           // get_all_yesterday_follow_up_data();
            //get_all_missed_follow_up_data();
            location.reload();
            /*Swal.fire("Success!", data.message, "success").then(function(){
               // location.reload();
            });*/
         }else if(data.status == "date_error"){
          $('.followup_date_error_msg').text(data.message);
       }else{
         Swal.fire("Warning!", data.message, "warning");
      }
   }
});
});

  $("#number").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/reports/get_auto_supplier_by_number',
        data: {"term" : request.term,"status" : status},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['mobile_no'],
                  };
               }));

            }
         }
      });
    },
   
           });

   $("#email").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/reports/get_auto_supplier_by_email',
        data: {"term" : request.term,"status" : status},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['email'],
                  };
               }));

            }
         }
      });
    },
   
           });

   $("#name").autocomplete({
      source: function (request, response) {
       $.ajax({
        url: base_url + 'franchise/reports/get_auto_supplier_by_name',
        data: {"term" : request.term,"status" : status},
        dataType: "json",
        type: "POST",
        async: true, 
        success: function (data) {
         if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
                  initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['name'],
                  };
               }));

            }
         }
      });
    },
   
           });

  // $(document).ready(function(){
    $(document).on('submit','.send_email_template_form',function(e){
     e.preventDefault();

     var sub_array = []
     $("input:checkbox[name=process_check_box_td]:checked").each(function(){
       sub_array.push($(this).val());
     });

     if($.isEmptyObject(sub_array)) {
       $('.check_box_empty_error').text("Please Select Atleast One Record To Send Mail.");
       return false;
     }
     var email_template_id = $('#email_template_id').val();
      var email_itinerary_name = $('#email_itinerary_names').val();
     $.ajax({
       url : base_url + 'franchise/enquiry/send_bulk_email',
       type : "POST",
       data : {sub_array,email_template_id,email_itinerary_name},
       dataType: 'json',
       beforeSend: function( jqXHR ) {
         $('.email_send_btn').attr('disabled','disabled');
         $('.email_spinner').removeAttr('style');
         $('.email_send_btn').attr('style','display:none');
       },
       success : function(data){
         $('.email_send_btn').removeAttr('disabled','disabled');
         $('.email_spinner').attr('style','display:none');
         $('.email_send_btn').removeAttr('style','display:none');

         if(data.status == 'success'){
          Swal.fire("Success!", data.message, "success").then(function(){
           location.reload();
         });
          $('#email_template_model').html("");
          $('#email_template_model').modal('toggle');
          $(".email_send_btn").html(
           );
        }
        else if(data.status == "cred_non_added"){
          $('#email_template_model').modal('toggle');
          Swal.fire("Warning!", data.message, "warning");
        }
        else{
          Swal.fire("Warning!", data.message, "warning");
        }
      }
    });
   });
 $(document).ready(function(){
    $('.pool_review_form').validate({
     rules : {
      "pool_status" : {
       required : true
     },
     "pool_description" : {
       required : true
     }
   },
   messages :{
    "pool_status" : {
     required : "Select Status"
   },
   "pool_description" : {
     required : "Enter Description"
   }
 }
});
    });

    $(document).on('submit','.pool_review_form',function(e){
     e.preventDefault();
     if($('.pool_review_form').valid()){
      $.ajax({
       url : base_url + 'franchise/enquiry/add_pool_staus_description',
       type : "POST",
       data : $(this).serializeArray(),
       dataType: 'json',
       success : function(data){
        if(data.status == 'success'){
         Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
        });
         $('#pool_status_modal').modal('toggle');
       }else{
         Swal.fire("Warning!", data.message, "warning");
       }
     }
   });
    }
  });
  // });

 
 

  function get_detail_data(){

     $('.detail_search .sub_btn').attr('disabled', 'disabled');
    $('.detail_search .spiner_btn').removeAttr('style', 'display: none');
    $('.detail_search .spiner_btn').attr('style', 'margin-top: 0px');
    $('.detail_search .sub_btn').attr('style', 'display: none');

    $.ajax({
      url : base_url+'franchise/reports/generate_process_detail_report',
      type : "POST",
      data : $('.detail_search').serializeArray(),
      success :function(data){
        $('.detail_search .sub_btn').removeAttr('disabled', 'disabled');
        $('.detail_search .spiner_btn').attr('style', 'display: none');
        $('.detail_search .sub_btn').removeAttr('style', 'display: none');
        $('.detail_search .sub_btn').attr('style', 'margin-top: 0px');

        $('#process_pool_data').html("");
        $('#process_pool_data').html(data);
        
        $('#responsive_process_pool').DataTable();
      }
    });
  }
  
  function get_enquiry_report_data(){

     $('.enquiry_page_report .sub_btn').attr('disabled', 'disabled');
    $('.enquiry_page_report .spiner_btn').removeAttr('style', 'display: none');
    $('.enquiry_page_report .spiner_btn').attr('style', 'margin-top: 0px');
    $('.enquiry_page_report .sub_btn').attr('style', 'display: none');

    $.ajax({
      url : base_url+'franchise/reports/generate_process_enquiry_report',
      type : "POST",
      data : $('.enquiry_page_report').serializeArray(),
      success :function(data){
        $('.enquiry_page_report .sub_btn').removeAttr('disabled', 'disabled');
        $('.enquiry_page_report .spiner_btn').attr('style', 'display: none');
        $('.enquiry_page_report .sub_btn').removeAttr('style', 'display: none');
        $('.enquiry_page_report .sub_btn').attr('style', 'margin-top: 0px');
        
        $('#process_pool_data').html("");
        $('#process_pool_data').html(data);
        
       /*$('#responsive_process_pool').DataTable({
        order: [[6, 'desc']],
       });*/

        $('#responsive_process_pool').DataTable({
        order: [[0, 'desc']],
       });
      }
    });
  }


  $(document).on('click', '.get_follow_up', function () { 
  var id  =  $(this).attr('value');
  $.ajax({
    type: 'POST',
    url: base_url + 'franchise/enquiry/view_all_followup_enquiry',
    data:{'id' : id},
    success: function(result) {
      $('.follow_up_body').html("");
         // $('.follow_up_body').html("data");
         $('.follow_up_body').html(result);
         $('.today_follw_up_tbl').DataTable();
         $('#view_follow_up_model').modal('show');

         // $('#responsive-datatable').DataTable();
      }
   });

});


  $(document).on('click','.add_interview_click',function(){
   $(".interview_form")[0].reset();
   var record_id = $(this).attr('value');
   $('form.interview_form #record_id').val(record_id);
});
  $(document).ready(function(){
    //$('select').select2({ width: '100%',  allowClear: false });
    get_all_country();
if ($(".followup").length > 0) {
   $('.followup').datepicker({
      minDate:new Date(),
      showOtherMonths: true,
      selectOtherMonths: true,
   });
}

    $('.passport_date').datepicker({
      //showOtherMonths: true,
      selectOtherMonths: true,
    });

    $(document).on('change','#pool_drop_th',function(){
     if($(this).prop('checked')){
      $('#drop_enquiry_report_pool tbody tr td input[type="checkbox"]').each(function(){
       $(this).prop('checked', true);
     });
    }else{
      $('#drop_enquiry_report_pool tbody tr td input[type="checkbox"]').each(function(){
       $(this).prop('checked', false);
     });
    }
  });

    $(document).on('click','.open_whatsup_modal',function(){
     var record_id = $(this).val();
     $('.w_template_user_id').attr('value',record_id);
     $('#whatsup_template_model').modal('show');
     $('.select2-show-search').select2({
        dropdownParent: $('#whatsup_template_model'),
        width: "100%"
     });
   });

    $(document).on('submit','.send_whatsup_template_form',function(e){
      e.preventDefault();

      var w_template_user_id = $('.w_template_user_id').val();
      var w_template_id = $('#w_template_id').val();

      $.ajax({
       url : base_url + 'franchise/enquiry/send_whats_up_description',
       type : "POST",
       data : {w_template_user_id,w_template_id},
       dataType: 'json',
       success : function(data){
         if(data){
          window.open( "https://wa.me/"+data.mobile_no+"/?text=" + data.content, '_blank'); 
        }else{
          window.open( "https://wa.me/"+''+"/?text=" + '', '_blank'); 
        }
      }
    });
    });

     
 //  $(document).on('click', '.change_pool_status', function () {

 //    $('#pool_status_modal').modal('show');
 //    var btn_val = $(this).val();
 //    var record_id = $(this).attr('pool_record_id');
 //    $('#btn_val').attr('value', btn_val);
 //    $('#pool_record_id').attr('value', record_id);
 // });
 $(document).on('click', '.change_pool_status', function () {
   $('.pool_description').val('');
   $('.error').text('');
   $('#pool_status_modal').modal('show');
   var btn_val = $(this).val();
   var record_id = $(this).attr('pool_record_id');
   $('#btn_val').attr('value', btn_val);
   $('#pool_record_id').attr('value', record_id);
   $.ajax({
    url : base_url + 'franchise/enquiry/get_pool_status_change',
    type : "POST",
    data : {btn_val},
    dataType :'json',
    success : function(result){
     $('.pool_status').empty();
     $('.pool_status').append('<option value="">Select Pool Status</option>');

     $.each(result,function(index,data){
      $('.pool_status').append('<option value="'+data['id']+'">'+data['pool_status_info']+'</option>');
    });
   }
 });

 });

 // $(document).on('submit','.pool_review_form',function(e){
 //   e.preventDefault();
 //   $.ajax({
 //     url : base_url + 'franchise/enquiry/add_pool_staus_description',
 //     type : "POST",
 //     data : $(this).serializeArray(),
 //     dataType: 'json',
 //     success : function(data){
 //      if(data.status == 'success'){
 //        Swal.fire("Success!", data.message, "success").then(function(){
 //         location.reload();
 //       });
 //        $('#pool_status_modal').modal('toggle');
 //      }else{
 //        Swal.fire("Warning!", data.message, "warning");
 //      }
 //    }
 //  });

 // });

 

 $(document).on('click', '#view_pool_des',function(e){
   var record_id = $(this).val();
   $.ajax({
    url : base_url+"pool_master/get_all_pool_description",
    type : "POST",
    data : {record_id},
    success : function(data){
     $('.view_all_pool').html("");
     $('#pool_view_model').modal('show');
     $('.view_all_pool').html(data);
     $('#responsive_pool').DataTable();
   }
 });

 });


});

</script>




<script >
 
    const { createApp, ref, watch ,nextTick} = Vue;

document.addEventListener('DOMContentLoaded', () => {
 
   const { createApp } = Vue;
   const dataFromServer = ref([])

const app = createApp({
   
    data() {
      
        return {
         currentPage: 1,
         dataTable:null,
         dataFromServer,
                totalPages: 1,
            message: ''
        };
    },
    watch: {
      dataFromServer(newValue, oldValue) {
        
         if(this.dataTable)
            {

                  console.log( this.dataTable);
                  this.dataTable.destroy();
            }
         nextTick(() => {
           
            console.log(this.dataFromServer);
 
           this.dataTable=  $('#responsive_process_pool').DataTable({
        order: [[0, 'desc']],
       });
                 
                 
                });

         
        }
    },
    methods:
   {
      resetDetail()
      {
         $('.detail_search')[0].reset();
         this.fetchData(this.currentPage , $(".detail_search").serializeArray(),'generate_process_detail_report');
      },
   reset()
   {
      $('.enquiry_page_report')[0].reset();
   $('.language').val(null).trigger("change");
   $('.s_description').val(null).trigger("change");
   $(".enquiry_type").val(null).trigger('change');
   $('.i_country').val(null).trigger("change");
   $('.reason_type').val(null).trigger("change");
   $('.name').val(null).trigger("change");
   $('.email').val(null).trigger("change");
   $('.number').val(null).trigger("change"); 
      this.fetchData(this.page,$('.enquiry_page_report').serializeArray());
   },
    
    
      formatDate(date) {
          return new Date(date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
        },
      getBaseUrl() {
          return '<?php echo base_url(); ?>';
        },
        getDaysDifference(date) {
          const startTimeStamp = new Date(date).getTime();
          const endTimeStamp = new Date().getTime();
          const timeDiff = Math.abs(endTimeStamp - startTimeStamp);
          return Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        },
      fetchData(page,formData,endpoint='generate_process_enquiry_report') {
          
                const self = this;  // Preserve the Vue instance context

                $.ajax({
      url : base_url+'franchise/reports/'+endpoint,
      type : "POST",
      data : $('.detail_search').serializeArray(),
      success :function(data){
         
         self.dataFromServer = data.fetch_process_enquiry_data;
         self.currentPage = data.current_page;
         self.totalPages = data.total_pages;
         
         
    
      }});
            },
      getFormValues()
      {
        $('.detail_search')[0].reset();
        this.fetchData(this.currentPage,$('.enquiry_page_report').serializeArray() );
      },
      getFormValuesSimple()
      {
         $(".enquiry_type").val('').trigger('change');
         $('.passport_date').val(null).trigger("change");
         $('.enquiry_page_report')[0].reset();
         this.fetchData(this.currentPage , $(".detail_search").serializeArray(),'generate_process_detail_report');
      }
   },
    
    mounted() {
      const self = this; 
      this.fetchData(this.currentPage,$('.enquiry_page_report').serializeArray());

    },
    beforeDestroy() {
    // Destroy the DataTable instance to prevent memory leaks
    if (this.dataTable) {
      this.dataTable.destroy();
    }
  }
   });

app.mount('#firstApp');
});
</script>

