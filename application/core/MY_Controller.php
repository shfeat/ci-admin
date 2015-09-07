<?php
class MY_Controller extends CI_Controller {
	
	// 主模版的一些参数
	protected $viewdata = array(
		'tpl_menu' => '',
		'tpl_username' => '',
		'tpl_title' => 'Title',
		'tpl_desc' => '',
		'tpl_breadcrumb' => '',
		'tpl_content' => 'admin/dashboard'
	);
	
	public function __construct($check_auth=true)
	{
		parent::__construct();
		$check_auth AND $this->check_auth();
		
		if($this->session->userdata('is_logged_in')) 
		{
			$this->load->config('app', true);
			$this->viewdata['tpl_menu'] = $this->config->item('menu', 'app');
			$this->viewdata['tpl_activenode'] = 'admin/dashboard';
			$this->viewdata['tpl_username'] = $this->session->userdata('username');
			$this->viewdata['tpl_breadcrumb'] = array();
		}
	}
	
	// 载入视图
	public function view($view, $data=null)
	{
		$data = $data? : $this->viewdata;
		$this->load->view($view, $data);
	}
	
	// 未登录，则截断
	protected function check_auth()
	{
		if(!$this->session->userdata('is_logged_in')) {
			redirect('admin/login?back='.site_url($this->uri->uri_string));
		}
	}
	
	
	/**
	 * @var CI_Loader
	 */
	var $load;
	/**
	 * @var CI_DB_mysqli_driver
	 */
	var $db;
	/**
	 * @var CI_Config
	 */
	var $config;
	/**
	 * @var CI_Calendar
	 */
	var $calendar;
	/**
	 * @var CI_Email
	 */
	var $email;
	/**
	 * @var CI_Encrypt
	 */
	var $encrypt;
	/**
	 * @var CI_Ftp
	 */
	var $ftp;
	/**
	 * @var CI_Hooks
	 */
	var $hooks;
	/**
	 * @var CI_Image_lib
	 */
	var $image_lib;
	/**
	 * @var CI_Lang
	 */
	var $lang;
	/**
	 * @var CI_Log
	 */
	var $log;
	/**
	 * @var CI_Input
	 */
	var $input;
	/**
	 * @var CI_Output
	 */
	var $output;
	/**
	 * @var CI_Pagination
	 */
	var $pagination;
	/**
	 * @var CI_Parser
	 */
	var $parser;
	/**
	 * @var CI_Session
	 */
	var $session;
	/**
	 * @var CI_Table
	 */
	var $table;
	/**
	 * @var CI_Trackback
	 */
	var $trackback;
	/**
	 * @var CI_Unit_test
	 */
	var $unit;
	/**
	 * @var CI_Upload
	 */
	var $upload;
	/**
	 * @var CI_URI
	 */
	var $uri;
	/**
	 * @var CI_User_agent
	 */
	var $agent;
	/**
	 * @var CI_Form_validation
	 */
	var $form_validation;
	/**
	 * @var CI_Xmlrpc
	 */
	var $xmlrpc;
	/**
	 * @var CI_Zip
	 */
	var $zip;
}