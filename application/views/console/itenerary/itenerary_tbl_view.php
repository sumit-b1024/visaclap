<?php
$user_role              =  $this->session->userdata('user_role');
$action_access       =   [User_role::SUPER_ADMIN,User_role::FRANCHISE];
 ?>
<table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
 <thead>
    <tr>
       <th class="wd-15p border-bottom-0">
         <label class="custom-control custom-checkbox-md">
         <input type="radio" class="custom-control-input" id="itinerary_th" name="example-checkbox1" value="" disabled>
         <span class="custom-control-label"></span>
      </label></th>
      <th class="wd-15p border-bottom-0">Itinerary Name</th>
      <th class="wd-15p border-bottom-0">Destination</th>
      <th class="wd-20p border-bottom-0">City</th>
      <th class="wd-25p border-bottom-0">Action</th>
   </tr>
</thead>
<tbody>
  <?php
  foreach($_view as $view)
  {
     ?>
     <tr>
      <td><label class="custom-control custom-checkbox-md">
         <input type="radio" class="custom-control-input" id="itinerary_td" name="itinerary_td" value="<?= $view->id ?>">
         <span class="custom-control-label"></span>
      </label></td>
      <td><?= $view->i_name; ?></td>
      <td><?= $view->c_name; ?></td>
      <td><?= $view->city_nm; ?></td>
      <td><div class="tbl-action-wrap">
         <?php if(in_array($user_role, $action_access)) { ?>
         <a href="<?= ROOT_URL . 'franchise/itenerary/edit_itenerary/' . $view->id; ?>" class="single-action mr-2" title="Edit">
           <img src="<?php echo base_url('assets/img/edit-2.svg');  ?>" />
        </a>
        <a href="javascript:;" data-id="<?= $view->id; ?>"  class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
           <i class="fa fa-trash"></i>
        </a>
<?php } ?>
        <a href="javascript:;" data-id="<?= $view->id; ?>"  class="single-action view mr-2 view_btn" title="View">
          <img src="<?php echo base_url('assets/img/eye.svg');  ?>" />
        </a>
        <button type="button" class="single-action open_itinerary_wap_model" data-id="<?= $view->id; ?>"><img src="<?php echo base_url('assets/img/whatsapp.svg');  ?>" /> </button>
         <?php if(in_array($user_role, $action_access)) { ?>

        <button type="button" class="single-action open_itinerary_image_model" data-id="<?= $view->id; ?>"><img src="<?php echo base_url('assets/img/photo.svg');  ?>" /></button>
      <?php } ?>
   </div>
     </td>
  </tr>
  <?php
}
?>
</tbody>
</table>