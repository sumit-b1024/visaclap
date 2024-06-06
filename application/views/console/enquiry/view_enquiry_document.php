    <!-- <div class="table-responsive"> -->

      <table class="table table-bordered text-nowrap border-bottom enquiry_document_tbl dt-responsive" id="responsive-datatable" style="width:100% !important;">
       <thead>
         <tr>
           <th width="wd-15p border-bottom-0"> Index </th>
           <th width="wd-15p border-bottom-0"> Title </th>
           <th width="wd-15p border-bottom-0"> File </th>
           
         </tr>
       </thead>
       <tbody>
         <?php 
         $i = 1; foreach ($get_enquiry_document as $key => $value) {  ?>
           <tr>
            <td><?= $i++; ?></td>
            <td><?= $value->doc_name; ?></td>
            <td>
                <?php 
                          if (file_exists($value->doc_file)) { 
                             $image_info = getimagesize($value->doc_file);
                              if ($image_info !== false) { 
                           ?>
                              <a href="<?php echo base_url().$value->doc_file; ?>" target="_blank" ><img style="width:30%" src="<?php echo base_url().$value->doc_file; ?>" class="openlink" /></a>
                            <?php }else{ ?>
                              <a href="<?php echo base_url().$value->doc_file; ?>" target="_blank" class="openlink">View File</a>
                            <?php } } ?>
            </td>
          </tr>
        <?php } ?>    
      </tbody>
    </table>
    <!-- </div> -->





