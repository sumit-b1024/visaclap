<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">  
   <div class="card-header">
    <div class="row">
     <div class="col-9">
      <h3 class="card-title"><?= $title; ?></h3>
     </div>
     <div class="col-3">
      
      
     </div>                    
    </div>
   </div>
 
   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0">Name</th>
        <th class="wd-25p border-bottom-0">Action</th>
       </tr>
      </thead>
      <tbody>
       <?php
       foreach ( $_list as $list )
       {
        ?>
        <tr id="r-<?= $list->form_id; ?>">
         
          <td>Form Id => <?= $list->form_id; ?></td>
          
          <td>
           <a href="<?= ROOT_URL . 'fieldarrange/view-fields/' . $list->form_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="View Fields">
            <i class="fa fa-eye"></i>
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

