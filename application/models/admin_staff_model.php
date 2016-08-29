<?php

class admin_staff_model extends CI_Model {

    function admin_staff_model() {
        parent :: __construct();
        $this->table = "admin_staff";
    }

    /*
     * Function Name : add_admin_staff()
     * Purpose : Add new admin staff to admin_staff table and redirect to admin_staff view page
     */

    function add_admin_staff() {
        $data = array("as_fname" => trim($this->input->post('firstname')),
            "as_lname" => trim($this->input->post('lastname')),
            "as_username" => trim($this->input->post('username')),
            "as_password" => md5($this->input->post('password')),
            "is_deleted" => (int) 0,
            "created_on" => date('Y-m-d'),
            "updated_on" => date('Y-m-d')
        );

        $this->db->insert($this->table, $data);
        redirect(base_url() . 'admin_staff');
    }

    /*
     * Function Name : fetch_last_asd_id()
     * Purpose : Fetch Maximum admin staff id for autonaming of username field in admin_staff table
     */

    function fetch_last_asd_id() {
        $this->db->select_max("as_id");
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            foreach ($q->result_array() as $row) {
                return $row['as_id'];
                //echo $row['dr_id'];die;
            }
        }
    }

    /*
     * Function Name : fetch_admin_staff()
     * Purpose : Fetch admin staff from admin_staff table and return result to index page of admin_staff controller    
     */

    function fetch_admin_staff() {
        $this->db->select('*');
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            return $q->result();
        }
    }

    /*
     * Function Name : del_staff()
     * Purpose : Soft delete admin staff and redirect to admin staff view page
     */

    function del_staff($id) {
        $data = array('is_deleted' => (int) 1);
        $this->db->where("as_id", $id);
        $this->db->update($this->table, $data);
        redirect(base_url() . 'admin_staff');
    }

    /*
     * Function Name : edit_admin_staff()
     * Purpose : Fetch information of specific admin staff and redirect to admin staff view page
     */

    function edit_admin_staff($id) {
        $this->db->where("as_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() >= 1) {
            return $q->result_array();
        }
    }

    /*
     * Function Name : update_admin_staffr()
     * Purpose : Update specific admin staff and redirect to admin staff view page
     */

    function update_admin_staff($id) {
        $firstname = trim($this->input->post('firstname'));
        $lastname = trim($this->input->post('lastname'));
        $data = array("as_fname" => $firstname,
            "as_lname" => $lastname,
            "updated_on" => date('Y-m-d'));
        $this->db->where('as_id', $id);
        $this->db->update($this->table, $data);
        redirect(base_url() . 'admin_staff');
    }

}

?>