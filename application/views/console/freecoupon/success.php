
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<center>
						<img src="<?php echo base_url().'assets/images/payment-success.png'?>">
						<h5 class="card-title text-center">Payment successfull !</h5>
						<p>Your order ID : <?php echo $_SESSION['razorpay_order_id'];?></p>
						<!--<a href="<?php echo base_url();?>" class="btn btn-primary">Next Registration</a>-->
					</center>

					
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
/*$filename = date('Y-m-d');
		$amount = $_SESSION['payable_amount'];
		$mpdf = new \Mpdf\Mpdf();
		$html = '<h1>Credit, '.$amount.'</h1>';
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename.'.pdf', 'D');*/

?>