<?php

class patient_model extends CI_Model {

    function patient_model() {
        parent :: __construct();
        $this->table = "patient_master";
        $this->diagnosis_table = "diagnosis_record";
    }

    /*
     * Function Name : add_patient()
     * Purpose : Add new patient to patient master table and redirect to patient view page
     */

    function add_patient($pass) {
        $data = array("p_fname" => trim($this->input->post('firstname')),
            "p_lname" => trim($this->input->post('lastname')),
            "p_username" => trim($this->input->post('username')),
            "p_password" => md5($pass),
            "p_email" => trim($this->input->post('p_email')),
            "p_address" => trim($this->input->post('p_addr')),
            "p_contact" => trim($this->input->post('p_contact')),
            "p_emergency_c_name" => trim($this->input->post('p_eme_contact_name')),
            "p_emergency_c_number" => trim($this->input->post('p_eme_contact_num')),
            "p_emergency_c_relationship" => trim($this->input->post('p_eme_contact_rel')),
            "is_deleted" => (int) 0,
            "p_is_verified" => (int) 0,
            "p_reg_date" => date('Y-m-d'),
            "updated_on" => date('Y-m-d')
        );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            $message = "Welcome " . trim($this->input->post('firstname')) . "To Appoinment Management System. Your Login Details Are As Follow. </br>"
                    . "User Name : " . trim($this->input->post('username')) . '</br>'
                    . "Password : " . $pass;
            $this->load->library('email');
            $this->email->clear();
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from("divyesh.sassyinfotech@gmail.com", 'Appointment Management');
            $this->email->to(trim($this->input->post('p_email')));
            $this->email->subject('Appointment Management: Successfully Registration.');
            $this->email->message($message);
            $this->email->send();
        }
        redirect(base_url() . 'patient');
    }

    /*
     * Function Name : fetch_last_p_id()
     * Purpose : Fetch Maximum patient id for autonaming of username field in patient master
     */

    function fetch_last_p_id() {
        $this->db->select_max("p_id");
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            foreach ($q->result_array() as $row) {
                return $row['p_id'];
                //echo $row['dr_id'];die;
            }
        }
    }

    /*
     * Function Name : index()
     * Purpose : Fetch patient from patient master table and return result to index page of patient controller  
     */

    function fetch_patient() {
        $this->db->select('*');
        $this->db->where('is_deleted', (int) 0);
        $this->db->order_by('p_username', 'desc');
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    /*
     * Function Name : del_patient()
     * Purpose : Soft delete specific patient and redirect to patient view page
     */

    function del_patient($id) {
        $data = array('is_deleted' => (int) 1);
        $this->db->where("p_id", $id);
        $this->db->update($this->table, $data);
        redirect(base_url() . 'patient');
    }

    /*
     * Function Name : edit_patient()
     * Purpose : Fetch information of specific patient and redirect to patient edit page
     */

    function edit_patient($id) {
        $this->db->where("p_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            return $q->result_array();
        }
    }

    /*
     * Function Name : update_doctor()
     * Purpose : Update specific patient and redirect to patient view page
     */

    function update_patient($id) {
        $data = array("p_fname" => trim($this->input->post('firstname')),
            "p_lname" => trim($this->input->post('lastname')),
            "p_email" => trim($this->input->post('p_email')),
            "p_address" => trim($this->input->post('p_addr')),
            "p_contact" => trim($this->input->post('p_contact')),
            "p_emergency_c_name" => trim($this->input->post('p_eme_contact_name')),
            "p_emergency_c_number" => trim($this->input->post('p_eme_contact_num')),
            "p_emergency_c_relationship" => trim($this->input->post('p_eme_contact_rel')),
            "updated_on" => date('Y-m-d')
        );
        $this->db->where('p_id', $id);
        $this->db->update($this->table, $data);
        redirect(base_url() . 'patient');
    }

    function fetch_spec_appointment($a_id) {
        $this->db->select('a.ap_id,a.ap_date,a.ap_time,a.p_id,a.dr_id,d.dr_name,d.dr_username,p.p_fname,p.p_lname');
        $this->db->from('appointment_master a');
        $this->db->join('doctor_master d', 'd.dr_id = a.dr_id');
        $this->db->join('patient_master p', 'p.p_id = a.p_id');
        $this->db->where('a.ap_id', $a_id);
        //$this->db->order_by('a.ap_id', 'desc');
        $q = $this->db->get();
        if ($q->num_rows() >= 1) {
            return $q->result_array();
        }
    }

    /*
     * Function Name : add_diagnosis()
     * Purpose : Add Diagnosis Record to diagnosis_record table
     */

    function add_diagnosis($a_id) {
        $dr_id = $this->fetch_dr_id();
        $data = array("pdr_date" => date('Y-m-d'),
            "pdr_detail" => trim($this->input->post('description')),
            "p_id" => trim($this->input->post('p_id')),
            "ap_id" => $a_id,
            "updated_on" => date('Y-m-d'));
        $this->db->insert($this->diagnosis_table, $data);
        if ($this->uri->segment(4)) {
            redirect(base_url() . 'patient/view_appointment_record/' . $this->uri->segment(4));
        } else {
            redirect(base_url() . 'appointment');
        }
    }

    /*
     * Function Name : fetch_diagnois_record()
     * Purpose : Fetch Diagnosis Record from diagnosis_record table
     */

    function fetch_diagnois_record() {
        $dr_id = $this->fetch_dr_id();
        $this->db->select('d.pdr_id,d.pdr_detail,d.pdr_date,p.p_username,p.p_fname,p.p_lname');
        $this->db->from('diagnosis_record d');
        $this->db->join('patient_master p', 'd.p_id = p.p_id');
        $this->db->join('appointment_master a', 'a.ap_id = d.ap_id');
        $this->db->where('a.dr_id', $dr_id);
        $this->db->where('a.is_cancel', (int) 0);
        $this->db->where('p.is_deleted', (int) 0);
        if ($this->uri->segment(3)) {
            $this->db->where('d.ap_id', $this->uri->segment(3));
        }
        $q = $this->db->get();
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    /*
     * Function Name : fetch_dr_id()
     * Purpose : Fetch doctor id for doctor master based on doctor username.
     */

    function fetch_dr_id() {
        $username = $this->session->userdata('user_name');
        $this->db->select('dr_id');
        $this->db->where('dr_username', $username);
        $dr_id = $this->db->get('doctor_master');
        if ($dr_id->num_rows() >= 1) {
            foreach ($dr_id->result_array() as $row) {
                $dr_id = $row['dr_id'];
                return $dr_id;
            }
        }
    }

    /*
     * Function Name : edit_diagnois_record()
     * Purpose : Fetch information of specific diagnois record and redirect to diagnois edit page.
     */

    function edit_diagnois_record($id) {
        $this->db->where("pdr_id", $id);
        $q = $this->db->get($this->diagnosis_table);
        if ($q->num_rows() >= 1) {
            return $q->result_array();
        }
    }

    /*
     * Function Name : update_diagnois_record()
     * Purpose : Update specific diagnois record and redirect to patient view page
     */

    function update_diagnois_record($id) {
        $data = array("pdr_detail" => trim($this->input->post('description')));
        $this->db->where('pdr_id', $id);
        $this->db->update($this->diagnosis_table, $data);
        if ($this->uri->segment(4)) {
            redirect(base_url() . 'patient/view_diagnois_record/' . $this->uri->segment(4));
        } else {
            redirect(base_url() . 'patient/view_diagnois_record');
        }
    }

}

?>