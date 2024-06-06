<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
			parent::__construct();
	}

	function index()
	{ 
			/** page level css & js * */
	        $this->content->extra_js  = array();
	        $this->content->extra_css = array();

	        $title = 'Dashboard';
			$this->content->breadcrumb = array(
					'Home'         	=> 	'',
					$title         	=> 	NULL
			);

			$this->content->title   = 	$title;
			$this->content->action  = 	'';
			$this->content->info   	= 	'';

			$this->load_view('dashboard_view', $title);
	}
	
	private function load_view($viewname = 'dashboard_view', $page_title)
	{
			$this->masterpage->setMasterPage('master_page');
			$this->masterpage->setPageTitle($page_title);
			$this->masterpage->addContentPage('console/'.$viewname , 'content', $this->content);
        	$this->masterpage->show();
	}
	
}
/* end of dashboard */