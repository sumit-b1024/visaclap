
   <div class="col-lg-12">

       
            <div class="row">
              

              <div class="col-12">
                  <a href="<?= base_url(). 'franchise/email_template/add'; ?>" class="box-btn fill_primary pull-right">
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
                    <th class="wd-15p border-bottom-0" style="width:10%">Index</th>
                    <th class="wd-15p border-bottom-0" style="width:50%">Name</th>
                    <th class="border-bottom-0" style="width:10%">Date</th>
                    <th class="wd-20p border-bottom-0" style="width:10%">Exiry Date</th>
                    <th class="wd-25p border-bottom-0" style="width:20%">Action</th>
                </tr>
            </thead>
            <tbody>
             <?php
             $index = 1;
             foreach($get_email_template as $template )
             {
                ?>
                <tr>
                   <td><?= $index++; ?></td>
                   <td><?= $template->name; ?></td>
                   <td><?php echo date('d-M-Y', strtotime($template->created_at)) ?></td>
                   <td><?php if($template->is_expiry != 1){?>
                        <?= date('d-M-Y',strtotime($template->expiry_date)); ?>
                        <?php }else{ ?>
                          Never 
                        <?php } ?> </td>
                   <td>
                      <a href="<?= ROOT_URL . 'franchise/email_template/edit_email_template/' . $template->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                         <i class="fa fa-pencil"></i>
                     </a>
                     <a href="javascript:;" data-id="<?= $template->id; ?>"  data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
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
   // var table   =     $(this).data('table');
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
          url: base_url + 'franchise/email_template/delete_email_template_data',
          data:{'row' : row, 'id' : id},
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