<style type="text/css">
 body{color: #000;overflow-x: hidden;height: 100%;background-image: url("");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: -40px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}.error{color: red;}
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
    <h5 class="text-center mb-4">Register</h5>
    <div class="alert alert-success alert_box" role="alert" style="display:none;">
    </div>
    <form class="form-card register_submit">
     <div class="row justify-content-between text-left">
      <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Name<span class="text-danger"> *</span></label> <input type="text" id="u_name" name="u_name" placeholder="enter name"> </div>

      <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Email<span class="text-danger"> *</span></label> <input type="email" id="u_email" name="u_email" placeholder="enter email"> </div>

      <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label">Country Name<span class="text-danger"> *</span></label> <input type="text" id="u_country" name="u_country" placeholder="enter country name"> </div>

      <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label">Password<span class="text-danger"> *</span></label> <input type="password" id="u_password" name="u_password" placeholder="enter password"> </div>

      <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label">Retype Password<span class="text-danger"> *</span></label> <input type="password" id="r_password" name="r_password" placeholder="enter retype password"> </div>
     </div>

     <div class="row justify-content-end">
      <div class="form-group col-sm-12"> <button type="submit" class="btn-block btn-primary">Register</button> </div>
     </div>
    </form>
    <a href="<?= base_url('api/cred'); ?>"><u>Click To Login</u></a>

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
  $('.register_submit').validate({
   rules : {
    "u_name" : {
     required: true,
    },
    "u_email": {
     required: true,
     remote: {
      type: "post",  
      url : base_url + "api/cred/email_check_duplication",          
      data:{checkUsername:function(){return $("#email").val()}            
     }
    }
   },
   "u_country" : {
    required: true,
   },"u_password" : {
    required: true,
   },"r_password" : {
    required: true,
    equalTo : "#u_password"
   },
  },
  messages : {
   "u_name" : {
    required: "please enter name",
   },
   "u_email" : {
    required: "please enter email",
    remote: "email already taken!"
   },"u_country" : {
    required: "please enter country",
   },"u_password" : {
    required: "plase enter password",
   },"r_password" : {
    required: "plase enter retype password"
   },
  },
 });
  $(document).on('submit','.register_submit',function(e){
   e.preventDefault();
   if($(this).valid()){
    $.ajax({
     url : base_url + "api/cred/register_user",
     type : "POST",
     data : $(this).serializeArray(),
     dataType : "json",
     success : function(data){
      console.log(data);
      if(data.status == "success"){
       window.location.href = base_url + "api/cred/";
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