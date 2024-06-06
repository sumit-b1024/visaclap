
   <div class="col-lg-12">
     
       
          <div class="row">
             
             <div class="col-12">
                <a href="<?= base_url(). 'franchise/template/add_template'; ?>" class="box-btn fill_primary pull-right">
                   <i class="fa fa-plus"></i> Add Template
                </a>
             </div>                    
          </div>
      
       <br/>
       <div class="card-body">
        <div class="table-responsive">
           <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
              <thead>
                 <tr>
                    <th class="border-bottom-0" style="width:10%">Index</th>
                    <th class="border-bottom-0" style="width:10%">Name</th>
                    <th class="border-bottom-0" style="width:50%">Description</th>
                    <th class="border-bottom-0" style="width:10%">Date</th>
                    <th class="border-bottom-0" style="width:10%">Exiry Date</th>
                    <th class="border-bottom-0" style="width:10%">Action</th>
                 </tr>
              </thead>
              <tbody>
               <?php
               $index = 1;
               foreach ($get_all_templates as $template)
                  { ?>
                     <tr>
                        <td><?= $index++; ?></td>
                        <td><?= $template->name; ?></td>
                        <td><?php

                        $string = strip_tags($template->description);
                        if (strlen($string) > 80) {
                          $stringCut = substr($string, 0, 80);
                          $endPoint = strrpos($stringCut, ' ');
                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                          $string .= '...';
                       }
                       echo $string ?></td>
                       <td>
                       <?php echo date('d-M-Y', strtotime($template->created_at)) ?>
                    </td>
                       <td>
                        <?php if($template->is_expiry != 1){?>
                        <?= date('d-M-Y',strtotime($template->expiry_date)); ?>
                        <?php }else{ ?>
                          Never 
                        <?php } ?>   
                       </td>

                       <td>
                         <a href="<?= ROOT_URL . 'franchise/template/edit_template/' . $template->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                            <i class="fa fa-pencil"></i>
                         </a>

                         <a href="javascript:;" data-id="<?= $template->id; ?>" data-table="<?= TBL_TEMPLATE_STORE; ?>" data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                            <i class="fa fa-trash"></i>
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
 </div>


<script>
   $(document).ready(function() {

      $('#responsive-datatable').on('click', '.delete_btn', function () {
         var table   =     $(this).data('table');
         var row     =     $(this).data('row');
         var id      =     $(this).data('id');

         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
         }).then(function (result) {
            if (result.value)
            {
               $.ajax({
                  type: 'POST',
                  url: base_url + 'franchise/template/delete_template_data',
                  data:{'table' : table, 'row' : row, 'id' : id},
                  dataType : 'json',
                  success: function(result) {
                     if(result.status == 'success'){
                        Swal.fire("Deleted!", result.message, "success").then(function(){
                           location.reload();
                        });
                     }else{
                        Swal.fire('Warning!', result.message, 'warning')

                     }
                  }
               });
            }

         });

      });

   });
</script>