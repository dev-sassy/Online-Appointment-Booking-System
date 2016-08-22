<?php

class doctor_model extends CI_Model {
    /*
     * Function Name : add_doctor()
     * Purpose : Add new doctor to doctor master table and redirect to doctor view page
     */

    function add_doctor() {
        $firstname = trim($this->input->post('firstname'));
        $user_name = trim($this->input->post('username'));
        $pass = md5($this->input->post('password'));
        $email = trim($this->input->post('dr_email'));
        $data = array("dr_name" => $firstname,
            "dr_user_name" => $user_name,
            "dr_password" => $pass,
            "dr_email" => $email,
            "is_deleted" => (int) 0,
            "created_on" => date('Y-m-d'),
            "updated_on" => date('Y-m-d')
        );

        $this->db->insert('doctor_master', $data);
        redirect(base_url() . 'doctor');
    }

    /*
     * Function Name : fetch_doctor()
     * Purpose : Fetch doctor from doctor master table and return result to index page of doctor controller    
     */

    function fetch_doctor() {
        $this->db->select('*');
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get('doctor_master');
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    /*
     * Function Name : del_doctor()
     * Purpose : Soft delete doctor and redirect to doctor view page
     */

    function del_doctor($id) {
        $data = array('is_deleted' => (int) 1);
        $this->db->where("dr_id", $id);
        $this->db->update("doctor_master", $data);
        redirect(base_url() . 'doctor');
    }

    /*
     * Function Name : edit_doctor()
     * Purpose : Fetch information of specific doctor and redirect to doctor view page
     */

    function edit_doctor($id) {
        $this->db->where("dr_id", $id);
        $q = $this->db->get("doctor_master");
        if ($q->num_rows() >= 1) {
            return $q->result_array();
        }
    }

    /*
     * Function Name : update_doctor()
     * Purpose : Update specific doctor and redirect to doctor view page
     */

    function update_doctor($id) {
        $firstname = trim($this->input->post('firstname'));
        $email = trim($this->input->post('dr_email'));
        $data = array("dr_name" => $firstname,
            "dr_email" => $email,
            "updated_on" => date('Y-m-d'));
        $this->db->where('dr_id', $id);
        $this->db->update('doctor_master', $data);
        redirect(base_url() . 'doctor');
    }

}

?>