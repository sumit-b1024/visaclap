

   <div class="table_wrapper">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0" style='width: 20%;'>Username</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Firm Name</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Mobile</th>
        <th class="wd-20p border-bottom-0" style='width: 20%;'>Email</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Role</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Status</th>
        <th class="wd-10p border-bottom-0" style='width: 10%;'>Created On</th>
        <th class="wd-25p border-bottom-0" style='width: 10%;'>Action</th>
       </tr>
      </thead>
      <tbody>
       <?php
       foreach ( $_list as $list )
       {
        ?>
        <tr id="r-<?= $list->user_id; ?>">
         <td>
          <?php 
          if($list->role == User_role::FRANCHISE_STAFF){  
           $get_franchise_name =  $this->setting_model->get_franchise_name_by_franch_staff($list->created_by);
           // print_r($get_franchise_name);
           echo toPropercase($list->first_name .' '. $list->last_name).' <b>('.$get_franchise_name->first_name.''.$get_franchise_name->last_name.')</b>'; 

           }else{ 
           echo toPropercase($list->first_name .' '. $list->last_name);
          } ?>
          </td>
          <td><?= $list->firm_name; ?></td>
          <td><?= $list->mobile; ?></td>
          <td><?= $list->email; ?></td>
          <td><?= User_role::getValue($list->role); ?></td>
          <td id="status_<?= $list->user_id ?>">
           <?php if($list->user_status == "2"){
            echo "Deactive";   
           }else if($list->user_status == "1")   {
            echo "Active";
           }else{
            echo "Inactive";
           }
          ?></td>

          <td><?= date('d M Y H:i', $list->created_on); ?></td>
          <td>
           <a href="javascript:void(0)" class="btn btn-icon btn-primary btn-sm mr-2 assigncountry" data-uid="<?=$list->user_id?>" title="Assign Country">
            <i class="fa fa-tasks"></i>
           </a>

          </td>
         </tr>
         <?php
        }
        ?>
       </tbody>
      </table>
     </div>
    </div>
 
 <!-- Model For Show Interview -->
<div class="modal fade" id="assign_country">
  <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content modal-content-demo ">
        <form class="assign_country_form">
           <input type="hidden" name="user_id" id="user_id">
           <div class="modal-header">
              <h6 class="modal-title"><b>Assign Country</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
           </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 col-md-12 input-inside mb-1">
                    <div class="form-group">
                        <label class="form-label">From Country</label>
                        <select class="form-control i_country  select2-show-search form-select" id="from_country" name="from_country[]" multiple data-placeholder="Select Country">
                            
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 input-inside">
                    <div class="form-group">
                        <label class="form-label">To Country</label>
                        <select class="form-control i_country select2-show-search form-select" id="to_country" name="to_country[]" multiple data-placeholder="Select Country">
                            
                        </select>
                    </div>
                </div>
            </div>    
          </div>

          <div class="modal-footer">
           <button class="btn btn-primary loader_btn" type="button" disabled style="display:none">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
           </button>

           <button class="box-btn fill_primary save_country">Submit</button>
           <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>
<script src="<?= base_url() ?>/assets/custom/js/custom_select2.js"></script>
<link href="<?= base_url() ?>/assets/custom/css/custom_select2.css" rel="stylesheet"/>
 <script>
   
   
   $('#from_country').select2({width: '100%'});
  $('#to_country').select2({width: '100%'});
     function get_all_country(){
    $.ajax({
     //url : api_url+"api/visacountry",
     url: base_url + 'settings/getvisacountry',
     type:"GET",
     dataType:"json",
     success:function(data){
        
      $.each(data.message, function (key, val) {
        /*let selected="";
                if(val.id == country){
                    selected = 'selected';
                }*/
        $("#from_country").append('<option value="'+val.id+'" data-id="'+val.id+'">'+val.name+'</option>');
        $("#to_country").append('<option value="'+val.id+'" data-id="'+val.id+'">'+val.name+'</option>');
   });
  }
});
}
  $(document).ready(function() {
 

get_all_country();
   $('#responsive-datatable').on('click', '.assigncountry', function (e) {

    e.preventDefault();
    var userid = $(this).attr('data-uid');
    $("#user_id").val(userid);
    $.ajax({
            type: 'POST',
            url: base_url + 'settings/get_assigncountry',
            data:{'userid' : userid},
            dataType : 'json',
            success: function(result) {
               if(result.status == 'success'){
                $('.assign_country_form')[0].reset();
                 $("#from_country").val(null).trigger("change");
                 $("#to_country").val(null).trigger("change");
                if(result.data.assign_from_country != null){
                var fc = result.data.assign_from_country.split(',');
                var tc = result.data.assign_to_country.split(',');
                    $("#from_country").val(fc);
                    $("#from_country").trigger('change');
                    $("#to_country").val(tc);
                    $("#to_country").trigger('change');
               }
                   $('#assign_country').modal('toggle');  
               } 
            }
         });
              

   });

   $(document).on('submit','.assign_country_form',function(e){     
   e.preventDefault();
   
   $.ajax({
      url : base_url + 'settings/save_assigncountry',
      type : "POST",
      data : $(this).serializeArray(),
      dataType: 'json',
      success : function(data){
         if(data.status == 'success'){
            $('#assign_country').modal('toggle');  
            Swal.fire("Success!", data.message, "success").then(function(){
               // location.reload();
            });
         }else if(data.status == "failed"){
          $('.failed').text(data.message);
       }else{
         Swal.fire("Warning!", data.message, "warning");
      }
   }
});
});

     });
   

 </script>

