    <!-- <div class="table-responsive"> -->
      <table class="table table-bordered text-nowrap border-bottom visa_data_tbl" id="responsive-datatable">
       <thead>
         <tr>
           <th  width="wd-15p border-bottom-0" style="width:10%"> Origin </th>
           <th  width="wd-15p border-bottom-0" style="width:20%"> Destination </th>
           <th  width="wd-15p border-bottom-0" style="width:30%"> Date </th>
           <th  width="wd-15p border-bottom-0" style="width:10%"> Action </th>
         </tr>
       </thead>
       <tbody>
         <?php 
         $i = 1; foreach ($get_enquiry as $key => $value) {  ?>
           <tr>
            <td><?= $value->origin_country; ?></td>
            <td><?= $value->destination_country; ?></td>
            <td><?= date("d-m-Y",strtotime($value->created_at)); ?></td>
            <td><button href="#" data-id="<?= $value->group_id; ?>"  class="btn btn-icon btn-primary btn-sm mr-2 view_application" title="View">
           <i class="fa fa-eye"></i>
        </button></td>



           <!--  <td><?= $value->origin_country; ?></td>
      <td><?= $value->destination_country; ?></td>
      <td><?= date("d-m-Y",strtotime($value->created_at)); ?></td>
      <td><a href="javascript:;" data-id="<?= $value->group_id; ?>"  class="btn btn-icon btn-primary btn-sm mr-2 view_application" title="View">
           <i class="fa fa-eye"></i>
        </a></td> -->
          </tr>
        <?php } ?>    
      </tbody>
    </table>
    <!-- </div> -->





