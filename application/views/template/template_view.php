<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">  
   <div class="card-header">
    <div class="row">
     <div class="col-12">
      <a href="<?php echo base_url() ?>template/add-template" class="box-btn fill_primary btn-sm pull-right"><i class="fa fa-plus"></i>
       Add Template
      </a>
      
     </div>                    
    </div>
   </div>
 
   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0">Name</th>
        <th class="wd-15p border-bottom-0">Image</th>
        <th class="wd-25p border-bottom-0">Action</th>
       </tr>
      </thead>
      <tbody>
       <?php
       foreach ( $_list as $list )
       {
        ?>
        <tr id="r-<?= $list->user_id; ?>">
         
          <td><?= $list->name; ?></td>
          <td><?php if($list->image) { ?><image src="<?php echo base_url().$list->image ?>" width="60"/><?php }?></td>

          
          <td>
           <a href="<?= ROOT_URL . 'template/edit-template/' . $list->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
            <i class="fa fa-pencil"></i>
           </a>
            <a href="javascript:;" data-id="<?= $list->id; ?>"  class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
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
                 url: base_url + 'template/remove_template',
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

  });
 </script>

