<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>

                                       
                </div>
            </div>

            <div class="card-body">
                <div class="page-hero d-flex align-items-center justify-content-center">
                    <?php if($view->company_permission == 1) { $p =  "0"; }else{$p= "1";} ?>
                  <input id="com_per" type="checkbox" name="companypermission" class="companypermission" data-val="<?php echo $p; ?>" <?php  echo ($view->company_permission == 1) ? "checked" :""; ?>  /><label for="com_per">Company Permission</label>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click', '.companypermission', function () {
         var val = $(this).data('val');
         var profit_id = 1;
    
    Swal.fire({
           //title: 'Are you sure?',
     text: "Do you want to permission ?",
     icon: 'info',
     showCancelButton: false,
     confirmButtonText: 'Change permission'
}).then(function (result) {
     if (result.value)
     {
      
      $.ajax({
                url : base_url + "settings/save_company_permission",
               type : "POST",
                    data:{val,profit_id},
                    dataType : "json",
                success : function(data){
                    if(data.status == "success"){
                      location.reload();
                    }else{
                     Swal.fire('Warning!', data.message, 'warning')
                    }
                }
            });





}
});

});
});
</script>