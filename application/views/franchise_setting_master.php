<!doctype html>
<html lang="en" dir="ltr">

<!--begin::Head-->
<?php $this->load->view('common/head_view'); ?>
<!--end::Head-->

<body>

  <div id="overlay" class="position-fixed top-0 end-0 bottom-0 start-0 vw-100 vh-100"></div>
	<div class="page-wrapper">
		
		<?php $this->load->view('common/franchise_header_view'); ?>

		<!--app-content open-->
		<main class="main_content">
		    

		            <div class="container-fluid px-3 px-md-4">
            

			          <div class="enquiry-wrap">
			            <h4 class="primary-title1 mb-0"><?= toPropercase($title); ?></h4>
			            
			          </div>
			        <hr style="width: 98%;">
			        </div>
		         <div class="container-fluid px-3 px-md-4">       
						<mp:Content/>
						 </div>
		          
		        </main>
		        

    <?php $this->load->view('common/footer_view'); ?>
	
</body>

</html>