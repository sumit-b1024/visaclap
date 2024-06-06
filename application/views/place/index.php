<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
          <form class="pool_page_report">
           <div class="row">

            <div class="col-sm-5 col-md-5">
             <div class="form-group input-inside1">
               <label class="form-label">Select Country</label>
               <select class="form-select country_id" name="country_id" id="country_id" data-placeholder="Select Country">
                  <option value="">Select Country</option>
                  <?php foreach ($get_all_country as $key => $value) { ?>
                     <option value="<?= $value->id ?>" <?= isset($_view) && $value->id == $_view->destination ? "selected" : "" ?>><?= $value->name ?></option>
                  <?php    } ?>
               </select>
            </div>
         </div>

     <div class="col-sm-2 col-md-2" style="margin-top: 25px;">
        <button type="button" class="box-btn fil_gray reset_btn">Reset</button>
     </div>
  </div>
</form>
</div>
</div>
<br/>
<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">

         <div class="card-header">
            <div class="row">
               <div class="col-12">
                  <a href="<?= base_url(). 'add_place/add'; ?>" class="box-btn fill_primary pull-right">
                     <i class="fa fa-plus"></i> Add City
                  </a>
               </div>                    
            </div>
         </div>

         <div class="card-body">
           <div class="table-responsive  places_div">
              
          </div>
       </div>

    </div>
 </div>
</div>

<script>
    function get_place_by_country_records(){
      var destination = $('#country_id').val();
      $.ajax({
         type:"POST",
         url: base_url + "add_place/get_place_tbl_records",
         data : {destination : destination},
         success:function(res){
            console.log(res);
            $('.places_div').html(res);
            $('#responsive-datatable').DataTable();
         }
      });
   }
   $(document).on('change','#country_id',function(){
     get_place_by_country_records();
   });

   $(document).ready(function() {
      get_place_by_country_records();
      $('#responsive-datatable').on('click', '.delete_btn', function () {
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
                url: base_url + 'add_place/delete_country_city',
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
       $(document).on('click', '.reset_btn',function(e){
            $('.country_id').val(null).trigger("change");
         });
   });
</script>