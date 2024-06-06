<?php
$user_role              =  $this->session->userdata('user_role');
$action_access       =   [User_role::SUPER_ADMIN,User_role::FRANCHISE];
 ?>
<table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
 <thead>
    <tr>
      <!-- <th class="wd-15p border-bottom-0">Index</th> --> 
      <th class="wd-15p border-bottom-0" style="width:10%">Name</th>
      <th class="wd-15p border-bottom-0" style="width:10%">Number</th>
      <th class="wd-15p border-bottom-0" style="width:10%">Origin</th>
      <th class="wd-15p border-bottom-0" style="width:30%">Destination</th>
      <th class="wd-15p border-bottom-0" style="width:10%">Date</th>
      <th class="wd-15p border-bottom-0" style="width:10%">Action</th>
      
   </tr>
</thead>
<tbody>
  <?php
  $index = 1;
  foreach($_view as $view)
  {
     ?>
     <tr>
      <!-- <td><?= $index++; ?></td> -->
      <td>
          <?php 
          $ename = $this->setting_model->get_enquiry_name($view->passing);
         echo  $ename->name;
           ?>
      </td>
      <td><?= $view->passing; ?></td>
      <td><?= $view->origin_country; ?></td>
      <td><?= $view->destination_country; ?></td>
      <td><?= date("d-m-Y",strtotime($view->created_at)); ?></td>
      <td><a href="javascript:;" data-id="<?= $view->group_id; ?>"  class="btn btn-icon btn-primary btn-sm mr-2 view_application" title="View">
           <i class="fa fa-eye"></i>
        </a></td>
  </tr>
  <?php
}
?>
</tbody>
</table>