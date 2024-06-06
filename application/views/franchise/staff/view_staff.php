<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">

         <div class="card-header">
            <div class="row">
               <div class="col-12">
                  <a href="<?= base_url(). 'franchise/add_franchise_staff/add'; ?>" class="box-btn fill_primary pull-right">
                     <i class="fa fa-plus"></i> Add Staff
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
                       <th class="wd-15p border-bottom-0" style="width:30%">Name</th>
                       <th class="wd-20p border-bottom-0" style="width:30%">Email</th>
                       <th class="wd-25p border-bottom-0" style="width:30%">Action</th>
                    </tr>
                 </thead>
                 <tbody>
                   <?php
                   $index = 1;
                   foreach($get_all_staff as $view)
                   {
                      ?>
                      <tr>
                         <td><?= $index++; ?></td>
                         <td><?= $view->first_name; ?></td>
                         <td><?= $view->email; ?></td>
                         <td>
                           <a href="<?= ROOT_URL . 'franchise/add_franchise_staff/edit_staff/' . $view->user_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                            <i class="fa fa-pencil"></i>
                         </a>
                         <a href="javascript:;" data-id="<?= $view->user_id; ?>"  class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                            <i class="fa fa-trash"></i>
                         </a>
                      </td>
                   </tr>
                <?php } ?>
             </tbody>
          </table>
       </div>
    </div>
 </div>
</div>
</div>

<script>
   $(document).ready(function() {
      $(document).on('click', '.delete_btn', function () {
         var id = $(this).data('id');
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
                 url: base_url + 'franchise/add_franchise_staff/remove_staff',
                 data:{'id' : id},
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