<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class doctor extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function doctor() {
        parent :: __construct();
        $this->load->model('doctor_model');
    }

    /*
     * Function Name : index()
     * Purpose : Fetch doctor from doctor master table and display it on doctor view page    
     */

    public function index() {
        $data['dr'] = $this->doctor_model->fetch_doctor();
        $data['dr_count'] = count($data['dr']);
        $data['title'] = "Doctor View";
        $data['content'] = $this->load->view("doctor/view_doctor", $data, true);
        $this->load->view("default_layout", $data);
    }

    /*
     * Function Name : add_doctor()
     * Purpose : Add new doctor to doctor master table and redirect to doctor view page
     */

    function add_doctor() {
        if ($this->session->userdata('user_name')) {
            $data['title'] = "Add Doctor";
            $data['js'] = array("doctor");
            $data['content'] = $this->load->view("doctor/add_doctor", $data, true);
            $this->load->view("default_layout", $data);

            if ($this->input->post('add_dr')) {
                $this->doctor_model->add_doctor();
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
        $this->db->where('dr_user_name', $user_name);
        $q = $this->db->get('doctor_master');
        if ($q->num_rows() >= 1) {
            echo "UserName already exist";
        } else {
            echo "valid";
        }
    }

    /*
     * Function Name : del_doctor()
     * Purpose : Soft delete doctor and redirect to doctor view page
     */

    function del_doctor() {
        $id = $this->uri->segment(3);
        $this->doctor_model->del_doctor($id);
    }

    /*
     * Function Name : edit_doctor()
     * Purpose : Edit specific doctor and redirect to doctor view page
     */

    function edit_doctor() {
        if ($this->session->userdata('user_name')) {
            $id = $this->uri->segment(3);
            $data['title'] = "Edit Doctor";
            $data['js'] = array("doctor");
            $data['dr'] = $this->doctor_model->edit_doctor($id);
            $data['content'] = $this->load->view("doctor/edit_doctor", $data, true);
            $this->load->view("default_layout", $data);
            if ($this->input->post('update_dr')) {
                $this->doctor_model->update_doctor($id);
            }
        } else {
            redirect(base_url());
        }
    }

}
