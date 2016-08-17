<?php
class doctor_model extends CI_Model {
	
	function add_doctor()
	{
		$firstname = trim($this->input->post('firstname'));
		$user_name = trim($this->input->post('username'));
		$pass = md5($this->input->post('password'));
		$email = trim($this->input->post('dr_email'));
		$data = array("dr_name"=>$firstname,
					"dr_user_name"=>$user_name,
					"dr_password"=>$pass,
					"dr_email"=>$email);		
		$this->db->insert('doctor_master',$data);
		redirect(base_url().'index.php/doctor');	
	}
	function fetch_doctor()
	{
		$this->db->select('*');
		$q = $this->db->get('doctor_master');
		if($q->num_rows() >= 1)
		{
			return $q->result(); 
		}
	}
	function del_doctor($id)
	{
		$this->db->where("dr_id",$id);
		$this->db->delete("doctor_master");
		redirect(base_url().'index.php/doctor');
	}
	function edit_doctor($id)
	{
		$this->db->where("dr_id",$id);
		$q = $this->db->get("doctor_master");
		if($q->num_rows() >= 1)
		{
			return $q->result_array();
		}
	}
	function update_doctor($id)
	{
		$firstname = trim($this->input->post('firstname'));
		$email = trim($this->input->post('dr_email'));
		$data = array("dr_name"=>$firstname,
					"dr_email"=>$email);	
		$this->db->where('dr_id',$id);				
		$this->db->update('doctor_master',$data);
		redirect(base_url().'index.php/doctor');	
	}
}
?>