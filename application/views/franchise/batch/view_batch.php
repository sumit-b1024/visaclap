<style>
   .batch_tbl_index_col {
      width:15% !important;
   }
   .batch_tbl_name_col {
      width:30% !important;
   }
   .batch_tbl_email_col {
      width:40% !important;
   }
</style>

<div class="row row-sm">
   <div class="col-lg-12">
          <div class="table-responsive">
              <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="responsive-datatable">
                 <thead>
                    <tr>
                       <th class="wd-15p border-bottom-0" style="width:10%">Index</th>
                       <th class="wd-15p border-bottom-0" style="width:70%">Name</th>
                       <th class="wd-25p border-bottom-0" style="width:20%">Action</th>
                    </tr>
                 </thead>
                 <tbody>
                   <?php
                   $index = 1;
                   foreach($_view as $view) { ?>
                      <tr>
                         <td><?= $index++; ?></td>
                         <td><?= $view->batch_name; ?></td>
                         <td>
                           <button type="button" class="box-btn sort-btn bg-transparent text-dark view_batch_enquiry" value="<?= $view->enquiry_id; ?>">View</button>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
         
</div>

<!-- Model For Show -->
<div class="modal fade bd-example-modal-lg" id="view_batch_modal">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <form class="create_batch_form">
            <div class="modal-header">
             <h6 class="modal-title"><b>View Batch</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body" >
            <div class="table-responsive batch_div" >
            </div>
         </div>

         <div class="modal-footer">
           <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
        </div>
     </form>
  </div>
</div>
</div>

</div>
<script>
   $(document).ready(function() {
      $(document).on('click', '.view_batch_enquiry', function (e) {
         e.preventDefault();
         var id = $(this).val();
         $.ajax({
           url : base_url+'franchise/batch/view_batch_enquiry_group',
           type : "POST",
           data : {id},
           success :function(data){
             $('.batch_div').html('');
             $('.batch_div').html(data);
             $('#view_batch_modal').modal('toggle');
             //$('#batch_table').DataTable();
             $('#batch_table').DataTable();
             //$('#batch_table thead tr th').eq(1).css({'min-width': '30%'});
          }
       });
      });

   });
</script>