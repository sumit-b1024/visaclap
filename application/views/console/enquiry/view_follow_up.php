    <!-- <div class="table-responsive"> -->

      <table class="table table-bordered text-nowrap border-bottom today_follw_up_tbl dt-responsive" id="responsive-datatable" style="width:100% !important;">
       <thead>
         <tr>
           <th width="wd-15p border-bottom-0"> Index </th>
           <th width="wd-15p border-bottom-0"> Next followup </th>
           <th width="wd-15p border-bottom-0"> Previous Description </th>
           <th width="wd-15p border-bottom-0"> Description </th>
         </tr>
       </thead>
       <tbody>
         <?php 
         $i = 1; foreach ($get_enquiry as $key => $value) {  ?>
           <tr>
            <td><?= $i++; ?></td>
            <td><?= $value->enquiry_date != "0000-00-00" ?date('d-M-Y',strtotime($value->enquiry_date)) : "-"; ?></td>
            <td><?= ucfirst($value->enquiry_status); ?></td>
            <td><?= $value->e_description; ?></td>
          </tr>
        <?php } ?>    
      </tbody>
    </table>
    <!-- </div> -->





