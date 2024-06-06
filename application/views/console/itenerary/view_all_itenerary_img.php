<div class="row">

	<?php
	if(!empty($fetch_all_images)){

		foreach ($fetch_all_images as $key => $value) { ?>
			<div class="col-2">
				<img src="<?= base_url("$value->img_name") ?>" class="img-rounded" >
			</div>
		<?php } } else{ ?>

			<div class="col-md-12">
				<span><b>No Data Found.
				</b></span>

			</div>


		<?php } ?>


	</div>