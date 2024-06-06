<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="target-densitydpi=device-dpi">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="HandheldFriendly" content="true" />
		<meta name="MobileOptimized" content="width" />
		<title>Patient Treatment</title>
		<style type="text/css">
			*img {height: auto;max-width: 100%;}
			.ExternalClass {width: 100%;}
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
			body {-webkit-text-size-adjust: none;-ms-text-size-adjust: none;margin: 0;padding: 0;}
			table {border-spacing: 0;}
			table td {border-collapse: collapse;}
			body, #body_style {font-family:Arial, Helvetica, sans-serif;font-size: 13px;line-height: 1.4;}
			body {*width:600px;margin: 0 auto;width: 600px\9;}
			@media only screen and (min-width: 600px) {
				body {margin: 0 auto;width: 600px;}
			}
			@media only screen and (max-width: 480px) {
				body, table {width: 100%!important;}
			}
			@media only screen and (max-width: 599px) {
				body[yahoo] .deviceWidth {width:100%!important;}
				body[yahoo] .full {display:table;width:100%;}
				body[yahoo] .hide {display: none !important;}
				body, table {width: 100% !important;}
				table {border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;}
			}
		</style>
	</head>
	<body>
		<?php $project_name = 'Nconnect'; ?>
		<table width="600" style="max-width:600px; margin:0 auto;" border="0" cellspacing="0" cellpadding="0" class="table" align="center">
			<tr>
				<td style="border-right:#e6e6e6 solid 1px; border-left:#e6e6e6 solid 1px; border-top:#e6e6e6 solid 1px; border-bottom:#e6e6e6 solid 1px;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="100%" height="25" align="center" style=" background:#fafafa"></td>
						</tr>

						<tr>
							<td height="15"></td>
						</tr>

						<tr>
							<td>
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="5%"></td>
										<td width="90%">
											<table width="100%" cellpadding="0" cellspacing="0" border="0">
												<tr>
													<td>
														<img style="width:80px;" src="<?= LOGO; ?>">
													</td>
												</tr>

												<tr>
													<td height="15" style="border-bottom:3px solid #641934"></td>
												</tr>

												<tr>
													<td height="15"></td>
												</tr>

												<tr>
													<td style="color:#000; line-height:1.1em; font-size:1.4em;">Hi <?= BASEFULLNAME; ?>,</td>
												</tr>

												<tr>
													<td>&nbsp;</td>
												</tr>

												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Type : <?= Appointment_type::getValue($is_type); ?></td>
												</tr>

												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Name : <?= toPropercase($first_name.' '.$last_name); ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Email : <?= $email; ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Mobile : <?= $mobile; ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Remarks : <?= toPropercase($remarks); ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Illness : <?= Illness::getValue($illness); ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Address : <?= toPropercase($address); ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">City : <?= toPropercase($city); ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">State : <?= toPropercase($state); ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Pincode : <?= $pincode; ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Age : <?= $age; ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Appointment Date : <?= $book_at; ?></td>
												</tr>
												<tr>
													<td style="font-size:1.2em; line-height:1.7em;">Appointment Time : <?= $slot; ?></td>
												</tr>
												<tr>
													<td style="font-size:1em; line-height:1.4em"></td>
												</tr>
												<tr>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td style="font-size:1.1em; line-height:1.5em">Thanks again, </td>
												</tr>
												<tr>
													<td height="15">&nbsp;</td>
												</tr>

												<tr>
													<td width="33%" style="text-align:left; text-decoration:none; color:#641934; font-weight: bold; font-size: 1.4em">Team <?php echo $project_name; ?></td>
												</tr>
												<tr>
													<td height="45">&nbsp;</td>
												</tr>
												<tr>
													<td style="font-size:0.85em; line-height:1.2em;">
													<p>This is auto-generated message from nconnect.health Please don't reply to this message.</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>

									<tr>
										<td height="15">&nbsp;</td>
									</tr>

									<tr>
										<td>
											<table width="100%" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td width="33%" style="text-align:left" style="text-decoration:none; color:#008dbb"></td>
												</tr>
												<tr>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
							<td width="5%"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width="100%" height="25" align="center" style=" background:#ccc"></td>
			</tr>
		</table>
	</body>
</html>