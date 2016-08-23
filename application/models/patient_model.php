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

    function add_paitent($pass) {
        $data = array("patient_fname" => trim($this->input->post('firstname')),
            "patient_lname" => trim($this->input->post('lastname')),
            "patient_username" => trim($this->input->post('username')),
            "patient_password" => md5($pass),
            "patient_email" => trim($this->input->post('p_email')),
            "patient_address" => trim($this->input->post('p_addr')),
            "patient_contact" => trim($this->input->post('p_contact')),
            "patient_emergency_c_name" => trim($this->input->post('p_eme_contact_name')),
            "patient_emergency_c_number" => trim($this->input->post('p_eme_contact_num')),
            "patient_emergency_c_relationship" => trim($this->input->post('p_eme_contact_rel')),
            "is_deleted" => (int) 0,
            "is_verified" => (int) 0,
            "created_on" => date('Y-m-d'),
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
        $this->db->select_max("patient_id");
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            foreach ($q->result_array() as $row) {
                return $row['patient_id'];
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
        $this->db->where("patient_id", $id);
        $this->db->update($this->table, $data);
        redirect(base_url() . 'patient');
    }

    /*
     * Function Name : edit_patient()
     * Purpose : Fetch information of specific patient and redirect to patient view page
     */

    function edit_patient($id) {
        $this->db->where("patient_id", $id);
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
        $data = array("patient_fname" => trim($this->input->post('firstname')),
            "patient_lname" => trim($this->input->post('lastname')),
            "patient_email" => trim($this->input->post('p_email')),
            "patient_address" => trim($this->input->post('p_addr')),
            "patient_contact" => trim($this->input->post('p_contact')),
            "patient_emergency_c_name" => trim($this->input->post('p_eme_contact_name')),
            "patient_emergency_c_number" => trim($this->input->post('p_eme_contact_num')),
            "patient_emergency_c_relationship" => trim($this->input->post('p_eme_contact_rel')),
            "updated_on" => date('Y-m-d')
        );
        $this->db->where('patient_id', $id);
        $this->db->update($this->table, $data);
        redirect(base_url() . 'patient');
    }

    /*
     * Function Name : add_diagnosis()
     * Purpose : Add Diagnosis Record to diagnosis_record table
     */

    function add_diagnosis($p_id) {
        /*$username = $this->session->userdata('user_name');
        $this->db->select('dr_id');
        $this->db->where('dr_user_name',$username);
        $dr_id = $this->db->get('doctor_master');
        if ($dr_id->num_rows() >= 1) {
            foreach ($dr_id->result_array() as $row) {
                $dr_id = $row['dr_id'];
            }
        }*/
        $data = array("pdr_date"=>date('Y-m-d'),
            "pdr_detail"=>trim($this->input->post('description')),
            "patient_id"=>$p_id,
            //"dr_id"=>$dr_id,
            "updated_on"=>date('Y-m-d'));
        $this->db->insert($this->diagnosis_table, $data);
        redirect(base_url() . 'patient');
    }

}

?>