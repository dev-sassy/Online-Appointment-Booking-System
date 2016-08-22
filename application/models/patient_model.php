<?php

class patient_model extends CI_Model {
    /*
     * Function Name : add_patient()
     * Purpose : Add new patient to patient master table and redirect to patient view page
     */

    function add_paitent() {
        $firstname = trim($this->input->post('firstname'));
        $lastname = trim($this->input->post('lastname'));
        $user_name = trim($this->input->post('username'));
        $pass = md5($this->input->post('password'));
        $email = trim($this->input->post('p_email'));
        $p_addr = trim($this->input->post('p_addr'));
        $p_contact = trim($this->input->post('p_contact'));
        $p_eme_contact_name = trim($this->input->post('p_eme_contact_name'));
        $p_eme_contact_num = trim($this->input->post('p_eme_contact_num'));
        $p_eme_contact_rel = trim($this->input->post('p_eme_contact_rel'));

        $data = array("patient_fname" => $firstname,
            "patient_lname" => $lastname,
            "patient_username" => $user_name,
            "patient_password" => $pass,
            "patient_email" => $email,
            "patient_address" => $p_addr,
            "patient_contact" => $p_contact,
            "patient_emergency_c_name" => $p_eme_contact_name,
            "patient_emergency_c_number" => $p_eme_contact_num,
            "patient_emergency_c_relationship" => $p_eme_contact_rel,
            "is_deleted" => (int) 0,
            "is_verified" => (int) 0,
            "created_on" => date('Y-m-d'),
            "updated_on" => date('Y-m-d')
        );

        $this->db->insert('patient_master', $data);
        redirect(base_url() . 'patient');
    }

    /*
     * Function Name : index()
     * Purpose : Fetch patient from patient master table and return result to index page of patient controller  
     */

    function fetch_patient() {
        $this->db->select('*');
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get('patient_master');
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
        $this->db->update("patient_master", $data);
        redirect(base_url() . 'patient');
    }

    /*
     * Function Name : edit_patient()
     * Purpose : Fetch information of specific patient and redirect to patient view page
     */

    function edit_patient($id) {
        $this->db->where("patient_id", $id);
        $q = $this->db->get("patient_master");
        if ($q->num_rows() >= 1) {
            return $q->result_array();
        }
    }

    /*
     * Function Name : update_doctor()
     * Purpose : Update specific patient and redirect to patient view page
     */

    function update_patient($id) {
        $firstname = trim($this->input->post('firstname'));
        $lastname = trim($this->input->post('lastname'));
        $email = trim($this->input->post('p_email'));
        $p_addr = trim($this->input->post('p_addr'));
        $p_contact = trim($this->input->post('p_contact'));
        $p_eme_contact_name = trim($this->input->post('p_eme_contact_name'));
        $p_eme_contact_num = trim($this->input->post('p_eme_contact_num'));
        $p_eme_contact_rel = trim($this->input->post('p_eme_contact_rel'));

        $data = array("patient_fname" => $firstname,
            "patient_lname" => $lastname,
            "patient_email" => $email,
            "patient_address" => $p_addr,
            "patient_contact" => $p_contact,
            "patient_emergency_c_name" => $p_eme_contact_name,
            "patient_emergency_c_number" => $p_eme_contact_num,
            "patient_emergency_c_relationship" => $p_eme_contact_rel,
            "updated_on" => date('Y-m-d')
        );
        $this->db->where('patient_id', $id);
        $this->db->update('patient_master', $data);
        redirect(base_url() . 'patient');
    }

}

?>