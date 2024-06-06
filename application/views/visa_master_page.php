<!doctype html>
<html lang="en" dir="ltr">

<!--begin::Head-->
<?php $this->load->view('common/head_view'); ?>
<!--end::Head-->

<body class="app sidebar-mini ltr">

	<div class="page">
	<div class="page-main">
		
		<?php //$this->load->view('common/header_view'); ?>

		<!--app-content open-->
		<div class="main-content mt-0">
		    <div class="side-app">

		        <!-- CONTAINER -->
		        <div class="main-container container-fluid">

		            <!-- PAGE-HEADER -->
		            <br/>
		            <!-- PAGE-HEADER END -->

		            <!--Row-->
		            <!-- <div class="container"> -->
		                
		            	<!--begin::Content-->
						<mp:Content/>
						<!--end::Content-->

		            <!-- </div> -->
		            <!--End Row-->
		        </div>
		        <!-- CONTAINER CLOSED -->
		    </div>
		</div>
		<!--app-content closed-->
	
	</div>

    <?php $this->load->view('common/footer_view'); ?>
	</div>

</body>

</html>