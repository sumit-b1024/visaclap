<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">  
   <div class="card-header">
    <div class="row">
     
     <div class="col-12">
      <a href="<?php echo base_url() ?>offer/add-offer" class="box-btn fill_primary pull-right"><i class="fa fa-plus"></i>
      Create New Ad
      </a>
      
     </div>                    
    </div>
   </div>
 
   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0" style="width:65%">Name</th>
        <th class="wd-15p border-bottom-0" style="width:15%">Date</th>
        <th class="wd-25p border-bottom-0" style="width:15%">Action</th>
       </tr>
      </thead>
      <tbody>
       <?php
       foreach ( $_list as $list )
       {
        ?>
        <tr id="r-<?= $list->user_id; ?>">
         
          <td><?= $list->name; ?></td>
           <td><?= $list->offer_date; ?></td>
          
          
          <td>
           <a href="<?= ROOT_URL . 'offer/edit-offer/' . $list->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
            <i class="fa fa-pencil"></i>
           </a>
            <?php
                  if($list->status == "0"){

                      $status =  "check";
                       $btnclass =  "btn-primary";
                        
                        $ass =  "1";
                  }else{
                       $status =  "close";
                        $btnclass =  "btn-danger";
                       $ass =  "0";
                  }
               
             ?>

           <a href="javascript:;" data-id="<?= $list->id; ?>"  data-status="<?= $ass; ?>" class="btn btn-icon  <?=$btnclass?> btn-sm mr-2 statuschange" title="Status">
                            <i class="fa fa-<?=$status?>"></i>
                         </a>


                         

            <a href="javascript:;" data-id="<?= $list->id; ?>" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
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
                 url: base_url + 'offer/remove_offer',
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

      $(document).on('click', '.statuschange', function () {
         var id = $(this).data('id');
         var status = $(this).data('status');
         Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Yes, Status Change'
        }).then(function (result) {
           if (result.value)
           {
              $.ajax({
                 type: 'POST',
                 url: base_url + 'offer/statuschnage',
                 data:{'id' : id,'status' : status},
                 dataType : 'json',
                 success: function(result) {
                    if(result.status == 'success'){
                     location.reload();
                       /*Swal.fire("Success!", result.message, "success").then(function(){
                          location.reload();
                       });*/
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

