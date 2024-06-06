<table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="responsive-datatable">
  <thead>
     <tr>
        <th class="border-bottom-0 batch_tbl_index_col" >Index</th> 
        <th class="border-bottom-0 batch_tbl_name_col">Name</th>
        <th class="border-bottom-0 batch_tbl_email_col" >Email</th>
        <th class="border-bottom-0" >Mobile No</th>
     </tr>
  </thead>
  <tbody>
    <?php
    $index = 1;
    if(!empty($get_enquiry_list)){
    foreach($get_enquiry_list as $view) { ?>
       <tr>
          <td><b><?= $index++; ?></b></td>
          <td><?= $view->name; ?></td>
          <td><?= $view->email; ?></td>
          <td><?= isset($view->mobile_no) && $view->mobile_no != "" ? $view->mobile_no : "-"; ?></td>
      </tr>
   <?php }  }  ?>
</tbody>
</table>
