<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class patient extends CI_Controller {

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
		$this->load->model('doctor_model');	
		$data['dr'] = $this->doctor_model->fetch_doctor();
		$data['dr_count'] = count($data['dr']);
		$this->load->view('view_doctor',$data);
		/*echo "<pre>";
		print_r($data);
		die;*/
	}
	
	function add_patient()
	{
		if($this->session->userdata('user_name'))
		{
			
			$this->load->view("add_patient");
			$this->load->model('doctor_model');
			if($this->input->post('add_dr'))
			{
				$this->doctor_model->add_doctor(); 
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
	
	function del_doctor()
	{
		$id = $this->uri->segment(3);
		$this->load->model('doctor_model');
		$this->doctor_model->del_doctor($id);
	}
	function edit_doctor()
	{
		$id = $this->uri->segment(3);
		$this->load->model('doctor_model');
		$data['dr'] = $this->doctor_model->edit_doctor($id);
		$this->load->view('edit_doctor',$data);
		if($this->session->userdata('user_name'))
		{
			if($this->input->post('update_dr'))
			{
				$this->doctor_model->update_doctor($id); 
			}
			if($this->input->post('cancel'))
			{
				redirect(base_url().'index.php/doctor');	
			}
		}
		else
		{
			redirect(base_url());
		}
	}
}
