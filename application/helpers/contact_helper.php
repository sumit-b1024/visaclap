<?php 
defined('CONTACT_MAIL')				OR define('CONTACT_MAIL', '');
defined('CONTACT_NUMBER')			OR define('CONTACT_NUMBER', '');
defined('CONTACT_MOBILE')			OR define('CONTACT_MOBILE', '');
defined('ERROR_REPORT_MAIL')		OR define('ERROR_REPORT_MAIL', '');

####### Returns Contact mail link #######
function contact_mail($type = 'text') {
	if($type == 'text') {
		return CONTACT_MAIL;
	} else if($type == 'link') {
		return 'mailto:'. CONTACT_MAIL;
	}
}

####### Returns contact number #######
function contact_number($type = 'text') {
	if($type == 'text') {
		return CONTACT_NUMBER;
	} else if($type == 'link') {
		return 'tel:'. CONTACT_NUMBER;
	}
}

#######	Returns contact mobile #######
function contact_mobile($type = 'text') {
	if($type == 'text') {
		return CONTACT_MOBILE;
	} else if($type == 'link') {
		return 'tel:'. CONTACT_MOBILE;
	}
}

###### Returns error reporting mail link to report an error #######
function error_report_mail($type = 'text') {
	if($type == 'text') {
		return ERROR_REPORT_MAIL;
	} else if($type == 'link') {
		return 'mailto:'.ERROR_REPORT_MAIL.'?subject=Error%20Report';
	}
}

/* end contact helper */