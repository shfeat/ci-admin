<?php

class Admin extends MY_Controller {

	/**
	 * @var users_model
	 */
	var $users_model;
	
	public function __construct()
	{
		parent::__construct(false);
	}
	
	public function index()
	{
		if($this->session->userdata('is_logged_in')) {
			redirect('admin/dashboard');
        }
        redirect('admin/login');
	}
	
	public function login()
	{
		$this->viewdata['back'] = $this->input->get('back')? : '';
		$this->view('admin/login');
	}
	
	public function do_login()
	{	
		$this->load->model('users_model');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->users_model->login($email, $password);
		
		if($user)
		{
			$data = array(
				'email' => $email,
				'username' => $user['username'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			$back = $this->input->post('back')? : 'admin/dashboard';  
			redirect($back);
		}
		else // incorrect username or password
		{
			$this->viewdata['error'] = true;
			$this->load->view('admin/login', $this->viewdata);	
		}
	}	

	public function signup()
	{
		redirect('admin');
		$this->load->view('admin/signup');	
	}
	

	public function do_signup()
	{
		redirect('admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/signup');
		}
		else
		{
			$this->load->model('users_model');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if($this->users_model->create($email, $password, $username))
			{
				$this->load->view('admin/signup_successful');	
			}
			else
			{
				$this->load->view('admin/signup');
			}
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	
	public function dashboard()
	{
		$this->check_auth();
		$this->viewdata['tpl_title'] = 'Dashboard';
		$this->viewdata['tpl_content'] = 'admin/dashboard';
		$this->load->view('layouts/tpl', $this->viewdata);
	}

}