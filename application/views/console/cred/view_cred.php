<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">

         <div class="card-header">
            <div class="row">
               <div class="col-10">
                  <h3 class="card-title"><?= $title; ?></h3>
               </div>

               <div class="col-2">
                  <a href="<?= base_url(). 'franchise/credencials/add'; ?>" class="btn btn-info btn-sm pull-right">
                     Add
                  </a>
               </div>                    
            </div>
         </div>

         <div class="card-body">
           <div class="table-responsive">
              <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                 <thead>
                    <tr>
                       <th class="wd-15p border-bottom-0">Index</th>
                       <th class="wd-15p border-bottom-0">Email</th>
                       <th class="wd-25p border-bottom-0">Action</th>
                    </tr>
                 </thead>
                 <tbody>
                   <?php
                   $index = 1;
                   foreach($get_cred as $cred)
                   {
                      ?>
                      <tr>
                         <td><?= $index++; ?></td>
                         <td><?= $cred->email; ?></td>
                         <td>
                            <a href="<?= ROOT_URL . 'franchise/credencials/edit/' . $cred->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                               <i class="fa fa-pencil"></i>
                            </a>
                            <a href="javascript:;" data-id="<?= $cred->id; ?>"  data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
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
         var id  = $(this).data('id');
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
                url: base_url + 'franchise/credencials/delete_email_cread',
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