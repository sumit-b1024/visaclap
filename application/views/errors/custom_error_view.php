<div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(media/error/bg5.jpg);">
	<div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
		<h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12">
			<?= $status_code; ?>
		</h1>
		<p class="font-weight-boldest display-4"><?= $heading; ?></p>
		<p class="font-size-h3"><?= $message; ?></p>

		<?php 
			echo $reason;
			echo $action;
		?>

		<div class="text-center mt-12 mb-12">
			<a class="btn btn-light-success font-weight-bold mr-2" href="<?= ROOT_URL; ?>">GO BACK HOME</a>
			<a class="btn btn-light-primary font-weight-bold mr-2" target="_blank" href="<?= error_report_mail('link'); ?>">REPORT THIS ERROR</a>
		</div>

		<p class="display-5">
			<span class="font-weight-boldest"> Error code: <?= $status_code; ?> </span> <br>
			<span class="font-weight-boldest"> More information about this error: </span> <br>
			<?= $error_info; ?>
		</p>
	</div>
</div>