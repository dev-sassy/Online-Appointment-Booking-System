<?php

class Reports_model extends CI_Model {

    function Reports_model() {
        parent :: __construct();
    }

    function fetch_patient() {
        $this->db->distinct("p.p_id");
        $this->db->select("p.p_id,p.p_username,p.p_fname,p.p_lname,p.p_reg_date");
        $this->db->from("patient_master p");
        if($this->input->post('dr_list'))
        {
            $dr_id = $this->input->post('dr_list');
            $this->db->join('appointment_master a', 'a.p_id = p.p_id');
            $this->db->where('a.dr_id', $dr_id);
        }
        if ($this->input->post('from_date')) {
            $time = strtotime($this->input->post('from_date'));
            $new_from_date = date('Y-m-d', $time);
            $this->db->where('p.p_reg_date >=', $new_from_date);
        }
        if ($this->input->post('to_date')) {
            $time = strtotime($this->input->post('to_date'));
            $new_to_date = date('Y-m-d', $time);
            $this->db->where('p.p_reg_date <=', $new_to_date);
        }
        $this->db->where('p.is_deleted', (int) 0);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }

    function fetch_appointment() {
        $this->db->select('a.ap_id,a.ap_date,a.ap_time,d.dr_name,d.dr_username,p.p_fname,p.p_lname');
        $this->db->from('appointment_master a');
        $this->db->join('doctor_master d', 'd.dr_id = a.dr_id');
        $this->db->join('patient_master p', 'p.p_id = a.p_id');
        $this->db->where('a.is_cancel', (int) 0);
        $this->db->where('p.is_deleted', (int) 0);
        $this->db->where('d.is_deleted', (int) 0);
        if ($this->input->post('from_date')) {
            $time = strtotime($this->input->post('from_date'));
            $new_from_date = date('Y-m-d', $time);
            $this->db->where('a.ap_date >=', $new_from_date);
        }
        if ($this->input->post('to_date')) {
            $time = strtotime($this->input->post('to_date'));
            $new_to_date = date('Y-m-d', $time);
            $this->db->where('a.ap_date <=', $new_to_date);
        }
        if($this->input->post('dr_list'))
        {
            $this->db->where('a.dr_id', $this->input->post('dr_list'));
        }
        $this->db->order_by('a.ap_date', 'asce');
        $q = $this->db->get();
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

}

?>