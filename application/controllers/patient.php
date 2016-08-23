<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class patient extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function patient() {
        parent :: __construct();
        $this->load->model('patient_model');
        $this->load->helper('string');
    }

    /*
     * Function Name : index()
     * Purpose : Fetch patient from patient master table and display it on patient view page    
     */

    public function index() {
        if ($this->session->userdata('user_name')) {
            $data['p_list'] = $this->patient_model->fetch_patient();
            $data['p_count'] = count($data['p_list']);
            $data['title'] = "Patient View";
            $data['content'] = $this->load->view("patient/view_patient", $data, true);
            $this->load->view("default_layout", $data);
        } else {
            redirect(base_url());
        }
    }

    /*
     * Function Name : add_patient()
     * Purpose : Add new patient to patient master table and redirect to patient view page
     */

    function add_patient() {
        if ($this->session->userdata('user_name')) {
            $pass = random_string('alnum', 6);
            $next_user_id = (int) 1;
            $data['last_p_id'] = $this->patient_model->fetch_last_p_id();
            if ($data['last_p_id']) {
                $next_user_id = (int) $data['last_p_id'] + 1;
            }
            $data['next_user_id'] = str_pad($next_user_id, 4, '0', STR_PAD_LEFT);
            $data['title'] = "Add Patient";
            $data['js'] = array("patient");
            $data['content'] = $this->load->view("patient/add_patient", $data, true);
            $this->load->view("default_layout", $data);
            if ($this->input->post('add_p')) {
                $this->patient_model->add_paitent($pass);
            }
        } else {
            redirect(base_url());
        }
    }

    /*
     * Function Name : chk_username()
     * Purpose : Check for user name weather its unique or not, on change event of username field
     */

    function chk_username() {
        $user_name = $this->input->post('id');
        $this->db->where('patient_username', $user_name);
        $q = $this->db->get('patient_master');
        if ($q->num_rows() >= 1) {
            echo "UserName already exist";
        } else {
            echo "valid";
        }
    }

    /*
     * Function Name : del_patient()
     * Purpose : Soft delete patient and redirect to patient view page
     */

    function del_patient() {
        $id = $this->uri->segment(3);
        $this->patient_model->del_patient($id);
    }

    /*
     * Function Name : edit_patient()
     * Purpose : Edit specific patient and redirect to patient view page
     */

    function edit_patient() {
        if ($this->session->userdata('user_name')) {
            $id = $this->uri->segment(3);
            $data['p_edit'] = $this->patient_model->edit_patient($id);
            $data['title'] = "Edit Patient";
            $data['js'] = array("patient");
            $data['content'] = $this->load->view("patient/edit_patient", $data, true);
            $this->load->view("default_layout", $data);
            if ($this->input->post('update_p')) {
                $this->patient_model->update_patient($id);
            }
        } else {
            redirect(base_url());
        }
    }

    function add_diagnosis() {
        if ($this->session->userdata('user_name')) {
            $data['title'] = "Add Diagnosis";
            $data['js'] = array("diagnosis");
            $data['content'] = $this->load->view("diagnosis/add_diagnosis", $data, true);
            $this->load->view("default_layout", $data);
            if ($this->input->post('add_pdr')) {
                $p_id = $this->uri->segment(3);
                $this->patient_model->add_diagnosis($p_id);
            }
        } else {
            redirect(base_url());
        }
    }

}
