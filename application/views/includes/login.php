<style type="text/css">
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 50px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}.error{color: red;}
</style>
<script>
    var base_url = "<?= base_url(); ?>";
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row">
        <div class="col-4 text-center">
        </div>

        <div class="col-4 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Login</h5>

                <div class="alert alert-danger alert_box" role="alert" style="display:none;">

                </div>

                <form class="form-card login_form">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Email<span class="text-danger"> *</span></label> <input type="text" id="u_email" name="u_email" placeholder="Enter email"> </div>


                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label">Password<span class="text-danger"> *</span></label> <input type="password" id="u_pwd" name="u_pwd" placeholder="Enter password" min="1"> </div>
                    </div>
                    <input type="hidden" name="record_id" id="record_id">
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-12"> <button type="submit" class="btn-block btn-primary sub_btn">Login</button> 
                            <button class="form-group btn-success col-sm-12 loader_btn" type="button" disabled style="display:none">
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                              Loading...
                          </button>
                      </div>

                  </div>
              </form>

              <a href="<?= base_url('api/cred/register'); ?>"><u>Click To Register</u></a>
          </div>
      </div>
      <div class="col-4 text-center">
      </div>

  </div>
</div>
<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script type="text/javascript">
    $(document).ready(function(){
        $('.login_form').validate({
            rules : {
                "u_email" : {
                    required: true,
                },
                "u_pwd" : {
                    required: true,
                }
            },
            messages : {
               "u_email" : {
                required: "enter email",
            },
            "u_pwd" : {
                required: "enter password",
            }
        },
    });
        $(document).on('submit','.login_form',function(e){
            e.preventDefault();
            if($(this).valid()){

                $('.sub_btn').attr('disabled','disabled');
                $('.sub_btn').attr('style','display:none');
                $('.loader_btn').removeAttr('style');

                $.ajax({
                    url : base_url + "api/cred/login_register_user",
                    type : "POST",
                    data : $(this).serializeArray(),
                    dataType : "json",
                    timeout: 5000,
                    success : function(data){
                        $('.sub_btn').attr('disabled','disabled');
                        $('.sub_btn').removeAttr('style');
                        $('.loader_btn').attr('style','display:none');
                        if(data.status == "success"){
                            window.location.href = base_url + "api/packages";
                        }else{
                            $('.alert_box').removeAttr('style');
                            $('.alert_box').text(data.msg);

                        }
                    }
                });
            }

        });
    });
</script>