<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
 <div class="alert alert-success alert_box" role="alert" style="display:none;">

                </div>

            <form id="domain_form" class="form-horizontal domain_form" method="POST" enctype="multipart/form-data">
             <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">Domain Name <span class="text-red">*</span></label>
                    <input type="text" name="domain_name" id="domain_name" placeholder="Name" class="form-control" value="<?= isset($view) && isset($view->domain_name) ? $view->domain_name : set_value('domain_name'); ?>">
                   </div> 
              </div>

           </div>
           <input type="hidden" name="dom_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
           <div class="row">
           </div>
           <div class="row">
             <div class="col-sm-6 col-md-4">
               <button type="submit" id="submit_btn" class="btn btn-primary mt-4 mb-0">
                 Submit
              </button>
              
           </div>
        </div>
     </form>
  </div>
</div>


<div class="card">

   <div class="card-header">
      <div class="row">
         <div class="col-7">
            <h3 class="card-title"><?= $title; ?></h3>
         </div>

      </div>
   </div>

  
   <div class="card-body">
      <div class="table-responsive view_domain">

      </div>
   </div>
  
</div>
</div>
</div>

<script>
  
   
    function get_all_domain(){
       $.post( "<?php echo base_url('franchise/globel_setting/get_all_domain'); ?>", function( data ){
        $('.view_domain').html("");
        $('.view_domain').html(data);
        $('#responsive-datatable').DataTable();
    });
   }


$(document).ready(function() {
   var continue_to = base_url + 'franchise/globel_setting/';
    get_all_domain();
$('.domain_form').validate({
        rules : {
            "domain_name" : {
                required: true,
            }

        },
        messages : {
         "domain_name" : {
            required: "Enter Domain name",
        }

    },
         errorElement: 'span',
         errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
         },
         highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
         },
         unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
         }
});


 $(document).on('click','.delete_btn',function(e){
          
            var r_id = $(this).data('id'); 

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
                        url: base_url + 'franchise/globel_setting/remove_domain',
                        data:{'r_id' : r_id},
                        success: function(result) {
                            if(result == 'success')
                            // Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')
                        Swal.fire('Deleted!', 'Domain has been deleted.', 'success')

                            $('#r_'+r_id).addClass('d-none');
                        }
                    });
                }

            });

        });

 
$(document).on('submit','.domain_form',function(e){
        e.preventDefault();
        if($(this).valid()){
            $.ajax({
                url : base_url + "franchise/globel_setting/save_domain_data",
                type : "POST",
                data : $(this).serializeArray(),
                dataType : "json",
                success : function(data){
                    if(data.status == "success"){
                        $('.domain_form')[0].reset();
                        
                     quick_swal("success", data.message);
                      setTimeout(function() {
                       window.location = continue_to;
                     }, 2500);   

                    }else{
                        $('.alert_box').removeAttr('style');
                        $('.alert_box').text(data.message);

                    }

                }
            });
        }

    });

});
</script>