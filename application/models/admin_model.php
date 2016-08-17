<?php
class admin_model extends CI_Model {
	
	function chk_login()
	{
		$user_name = trim($this->input->post('username'));
		$pass = md5($this->input->post('password'));
		$this->db->where('as_id',$user_name);
		$this->db->where('as_password',$pass);
		$q=$this->db->get('admin_staff');
		if($q->num_rows() == 1 )
		{
			$this->session->set_userdata('user_name',$user_name);
			redirect(base_url().'admin/success_login');
		}
		else
		{
			echo 'Invalid User Name Or Password';	
		}	
	}
}
?>