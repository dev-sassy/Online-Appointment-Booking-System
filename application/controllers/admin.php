<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin_login');
		$this->load->model('admin_model');
		if($this->input->post('chk_login'))
		{
			$this->admin_model->chk_login();	
		}
	}
	function success_login()
	{
		//$this->load->view("menu");
		if($this->session->userdata('user_name'))
		{
			$data['title'] = "Home Page";
			$data['content'] = $this->load->view("admin_login",$data,true);
			$this->load->view("default_layout",$data);
		}
		else
		{
			redirect(base_url());
		}
		
	}
	function add_doctor()
	{
		if($this->session->userdata('user_name'))
		{
			
			$this->load->view("add_doctor");
			$this->load->model('admin_model');
			if($this->input->post('add_dr'))
			{
				//$this->admin_model 
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	function chk_username()
    {
		$user_name=$this->input->post('id');
		$this->db->where('dr_user_name',$user_name);
		$q=$this->db->get('doctor_master');
		if($q->num_rows() >= 1)
		{
			echo "UserName already exist";
		}
		else
		{
			echo "valid";
		}
			
    }
	
	function logout()
	{
		$this->session->unset_userdata('user_name');
		redirect(base_url());
	}
}
