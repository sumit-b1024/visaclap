<!doctype html>
<html lang="en" dir="ltr">

<!--begin::Head-->
<?php $this->load->view('common/head_view'); ?>
<!--end::Head-->

<body>

	<!-- Overlay for sidebar specially -->
  <div id="overlay" class="position-fixed top-0 end-0 bottom-0 start-0 vw-100 vh-100"></div>
	<div class="page-wrapper">
		
		<?php $this->load->view('common/header_view'); ?>

		

		            <!-- PAGE-HEADER -->
		            <main class="main_content">
        					
		            	
		            <!-- PAGE-HEADER END -->
		            <div class="container-fluid px-3 px-md-4">
            

			          <div class="enquiry-wrap">
			            <h4 class="primary-title1 mb-0"><?= toPropercase($title); ?></h4>
			            <!-- <div class="enquiry-right-zone d-flex align-items-center justify-content-center justify-content-md-end">
			              <div class="row">
			                <input type="text" class="form-control" placeholder="Search here...">
			              </div>
			            </div> -->
			          </div>
			        </div>
			         <hr style="width: 100%;">
		            <div class="container-fluid px-3 px-md-4">  
						<mp:Content/>
						 </div>
		            <!--End Row-->
		          
		        </main>
		        <!-- CONTAINER CLOSED -->
		    

    <?php $this->load->view('common/footer_view'); ?>
	
</body>

</html>