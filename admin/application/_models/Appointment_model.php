<?php

class Appointment_model extends CI_Model {

    function Appointment_model() {
        parent :: __construct();
        $this->table = "appointment_master";
    }

    function fetch_all_appointment() {
        $this->db->select('a.ap_id,a.ap_date,a.ap_time,d.dr_name,d.dr_username,p.p_fname,p.p_lname');
        $this->db->from('appointment_master a');
        $this->db->join('doctor_master d', 'd.dr_id = a.dr_id');
        $this->db->join('patient_master p', 'p.p_id = a.p_id');
        $this->db->where('a.is_cancel', (int) 0);
        $this->db->where('p.is_deleted', (int) 0);
        $this->db->where('d.is_deleted', (int) 0);
        if ($this->uri->segment(3)) {
            $this->db->where('a.p_id', $this->uri->segment(3));
        }
        if($this->session->userdata('route_path') == 'users/doctor')
        {
            $this->db->where('d.dr_username', $this->session->userdata('user_name'));
        }
        //$this->db->order_by('a.ap_id', 'desc');
        $q = $this->db->get();
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    function fetch_all_dr() {
        $this->db->select('dr_id,dr_name,dr_username');
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get('doctor_master');
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    function fetch_all_patient() {
        $this->db->select('p_id,p_fname,p_lname');
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get('patient_master');
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    function book_appointment() {
        $this->load->helper('date');
        $as_id = $this->fetch_staff_id();
        $time = strtotime($this->input->post('app_date'));
        $newformat = date('Y-m-d', $time);
        $data = array("ap_date" => $newformat,
            "ap_time" => $this->input->post('app_time'),
            "dr_id" => $this->input->post('dr_list'),
            "p_id" => $this->input->post('p_list'),
            'as_id' => $as_id,
            "created_on" => date('Y-m-d'),
            "updated_on" => date('Y-m-d')
        );
        $this->db->insert($this->table, $data);
        redirect(base_url() . 'appointment');
    }

    function fetch_staff_id() {
        $this->db->select('as_id');
        $this->db->where('as_username', $this->session->userdata('user_name'));
        $q = $this->db->get('admin_staff');
        if ($q->num_rows() == 1) {
            foreach ($q->result_array() as $row) {
                return $row['as_id'];
            }
        }
    }

    function chk_available_appointment($dr_id, $app_date) {
        $time = strtotime($app_date);
        $newformat = date('Y-m-d', $time);
        $this->db->select('ap_time');
        $this->db->where('dr_id', $dr_id);
        $this->db->where('ap_date', $newformat);
        $this->db->where('is_cancel', (int) 0);
        $q = $this->db->get('appointment_master');
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    function cancel_appointment($ap_id) {
        $data = array('is_cancel' => (int) 1);
        $this->db->where("ap_id", $ap_id);
        $this->db->update($this->table, $data);
        if ($this->uri->segment(3)) {
            redirect(base_url() . 'patient/view_appointment_record/' . $this->uri->segment(3));
        }
        else
        {
           redirect(base_url() . 'appointment'); 
        }
    }

}
