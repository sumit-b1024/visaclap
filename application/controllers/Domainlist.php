<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Domainlist extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('setting_model'));
	}

	function index()
	{ 

		$this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','select2.full.min','select2');
		$this->content->extra_css = array('custom');
		$title = 'Domain List';
		$this->content->breadcrumb = array(
			'Dashboard'      => 	'',
			$title         	=> 	NULL
		);
		$this->content->title   	= 	$title;
		$this->content->meta  		= 	$meta;
		$this->content->action  	= 	'';
		$this->content->info   		= 	'';
		//$this->content->view      	= 	$this->setting_model->get_domain_list();	
		
		$url = DOMAIN_LIST;
        $ch = curl_init($url);
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, DOMAIN_API);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $data = json_decode($result);
        $this->content->view      	= 	$data->data;
		$this->load_view('domain_view', $title);
		
	}

	
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
		$this->masterpage->setMasterPage('master_page');
		$this->masterpage->setPageTitle($page_title);
		$this->masterpage->addContentPage('console/domainlist/'.$viewname , 'content', $this->content);
		$this->masterpage->show();
	}

}
/* end of settings */ 