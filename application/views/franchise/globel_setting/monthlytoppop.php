
<div class="row">
    <div class="col-md-12 col-xl-12">
           
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>

            <div class="card-body">

                <form id="amount_form" class="form-horizontal amount_form" action="<?php echo base_url() ?>franchise/franchise_payment_monthly/sendpaymeny" method="post">
                    
                   <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input type="text" name="amount" id="amount" placeholder="Amount" class="form-control amount" value="<?=MINIMUM_BALANCE?>" onkeypress="allowNumbersOnly(event)">
                        <span class="error-text error_amount"></span>
                       </div> 
                       <input type="hidden" name="oldbalance" value="<?php echo $currentuser->balance;?>" >
                  </div>
               </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" id="submit_btn" class="btn btn-primary mb-0">
                                Submit
                            </button>
                            
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<?php 
    $walletbalance = $this->setting_model->get_wallet($this->session->userdata('user_id'));
if($this->uri->segment(4) != "" && $this->uri->segment(4) == 'addpayment' && $walletbalance->balance < MINIMUM_BALANCE ) {?>
          <div class="modal fade" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- Add this line to your code -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your 90 days of trial is expired. Please top-up your balance 1000 inr per month</h5>
            </div>
              
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> <!-- And the relavant closing div tag -->
<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>
        <?php }else{ ?> 
            <script type="text/javascript">
                $("#amount_form").submit();
             </script>
        <?php } ?>

<script>
  
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