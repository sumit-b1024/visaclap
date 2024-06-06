<div class="row">
    <div class="col-md-12 col-xl-12">
           
        <div class="card">
            <div class="card-body">
             <form id="amount_form" class="form-horizontal amount_form" action="<?php echo base_url() ?>franchise/franchise_payment/sendpaymeny" method="post">
                <div class="row mb-2">
                   <div class="col-md-12 input-inside">
                      <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input type="text" name="amount" id="amount" placeholder="Amount" class="form-control amount" value="" onkeypress="allowNumbersOnly(event)">
                        <span class="error-text error_amount"></span>
                       </div> 

                  </div>
               </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" id="submit_btn" class="box-btn fill_primary mb-0">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- <a href="<?php echo base_url(); ?>/franchise/globel_setting/generatepdf">Generate Pdf</a> -->
        </div>
        <br/>
         <div class="card">
            <div class="card-body text-center center">
                <h2>Scan and Pay (get 100% of money without any payment gatway charges)</h2> 
                <img src="<?php echo base_url('assets/img/visaqrcode.png');  ?>" width="20%" > 
                <br/><br/>
                <h5>Once Payment is Done call us on <span class="text_primary">8008694696</span></h5> 
            </div>
        </div>

    </div>
</div>

<script>
  
   
   function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
}

$(document).ready(function() {
    

   var continue_to = base_url + 'franchise/globel_setting/';

$('body').on('change blur', 'input', function() {
        $(this).closest('.form-control').removeClass('is-invalid');
    });

 $('body').on('change blur', '.amount', function() {
        $('.error_amount').html('').hide();
        $('.amount').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.amount').addClass('is-invalid');
            $('.error_amount').html('Enter Amount').show();
        }
    });



 $('#submit_btn').click(function(e) {
        e.preventDefault();
        var isValid = 1;

        if($('.amount').val().trim() == '') {
            isValid = 0;
            $('.amount').addClass('is-invalid');
            $('.error_amount').html('Enter Amount').show();
        }

       

         if (isValid) {

              
                $("#amount_form").submit();
                //submit_form();
            }
    });
  function submit_form() {
      
     // var formdata = new FormData($('#amount_form').get(0));
      //form.push({ name: "sub_array", value: sub_array });

     /* $.ajax({
        url : base_url + 'franchise/franchise_payment/sendpaymeny',
        type : "POST",
        data : formdata,
        cache:false,
         contentType: false,
         processData: false,
        dataType: 'json',
        beforeSend: function( jqXHR ) {
         
      },
      success : function(data){
    if(data.status == "success"){
         Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
       });
      }else{
       Swal.fire("Success!", data.message, "success").then(function(){
       });

    }

     }
    });*/
   };


});
</script>