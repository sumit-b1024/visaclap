<table class="table table-bordered text-nowrap border-bottom" id="responsive_pool">
 <thead>
    <tr>
       <th width="wd-15p border-bottom-0"> Index </th>
       <th width="wd-15p border-bottom-0"> Pool Status </th>
       <th width="wd-15p border-bottom-0"> Pool Description </th>
       <th width="wd-15p border-bottom-0"> Status </th>
       <th width="wd-15p border-bottom-0"> Create Date </th>
    </tr>
 </thead>
 <tbody>
    <?php
    $index = 1;

    foreach($get_all_status_des as $view){ ?>
     <tr>
        <td><?= $index++; ?></td>
        <td><?= $view->pool_status_info ?></td>
        <td><?= $view->pool_description ?></td>
        <td><?= Enquiry_pool_status::getValue($view->pool_status); ?></td>
        <td><?= date('d-M-Y',strtotime($view->created_at)); ?></td>
     </tr>

  <?php  } ?>
</tbody>
</table>