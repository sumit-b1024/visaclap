<div class="row row-sm">
   <div class="col-lg-12">
    <div class="card">
     <div class="card-header">
        <div class="row">
           <div class="col-12">
              <a href="<?= base_url(). 'pool_master/add'; ?>" class="box-btn fill_primary pull-right">
                 <i class="fa fa-plus"></i> Add Status
              </a>
           </div>                    
        </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
             <thead>
                <tr>
                   <th class="wd-15p border-bottom-0" style="width:10%">Index</th>
                   <th class="wd-15p border-bottom-0" style="width:60%">Name</th>
                   <th class="wd-15p border-bottom-0" style="width:15%">Pull Type</th>
                   <th class="wd-25p border-bottom-0" style="width:15%">Action</th>
                </tr>
             </thead>
             <tbody>
               <?php
               $index = 1;
               foreach ($fetch_pool_data as $pool)
                  { ?>
                     <tr>
                        <td><?= $index++; ?></td>
                        <td><?= $pool->pool_status_info; ?></td>
                        <td><?= $pool->status; ?></td>
                        <td>
                          <a href="<?= ROOT_URL . 'pool_master/edit/' . $pool->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                             <i class="fa fa-pencil"></i>
                          </a>

                          <a href="javascript:;" data-id="<?= $pool->id; ?>" data-table="<?= TBL_POOL_MASTER_TBL; ?>" data-row="id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
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
                  url: base_url + 'pool_master/delete_pool_data',
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