<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_staff extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function admin_staff() {
        parent :: __construct();
        $this->load->model('admin_staff_model');
    }
    
    /*
     * Function Name : index()
     * Purpose : Fetch admin staff from admin_staff table and display it on admin_staff view page    
     */

    public function index() {
        if ($this->session->userdata('user_name')) {
            $data['ads'] = $this->admin_staff_model->fetch_admin_staff();
            $data['ads_count'] = count($data['ads']);
            $data['title'] = "Admin Staff View";
            $data['content'] = $this->load->view("admin_staff/view_admin_staff", $data, true);
            $this->load->view("default_layout", $data);
        } else {
            redirect(base_url());
        }
    }

    /*
     * Function Name : add_doctor()
     * Purpose : Add new doctor to doctor master table and redirect to doctor view page
     */

    function add_admin_staff() {
        if ($this->session->userdata('user_name')) {
            $next_user_id = (int) 1;
            $data['last_asd_id'] = $this->admin_staff_model->fetch_last_asd_id();
            if ($data['last_asd_id']) {
                $next_user_id = (int) $data['last_asd_id'] + 1;
            }
            $data['next_user_id'] = str_pad($next_user_id, 3, '0', STR_PAD_LEFT);
            $data['title'] = "Add Admin Staff";
            $data['js'] = array("admin_staff");
            $data['content'] = $this->load->view("admin_staff/add_admin_staff", $data, true);
            $this->load->view("default_layout", $data);

            if ($this->input->post('add_ads')) {
                $this->admin_staff_model->add_admin_staff();
            }
        } else {
            redirect(base_url());
        }
    }

    /*
     * Function Name : del_staff()
     * Purpose : Soft delete admin staff and redirect to admin staff view page
     */

    function del_staff() {
        $id = $this->uri->segment(3);
        $this->admin_staff_model->del_staff($id);
    }

    /*
     * Function Name : edit_staff()
     * Purpose : Edit specific doctor and redirect to doctor view page
     */

    function edit_staff() {
        if ($this->session->userdata('user_name')) {
            $id = $this->uri->segment(3);
            $data['title'] = "Edit Admin Staff";
            $data['js'] = array("admin_staff");
            $data['asd'] = $this->admin_staff_model->edit_admin_staff($id);
            $data['content'] = $this->load->view("admin_staff/edit_admin_staff", $data, true);
            $this->load->view("default_layout", $data);
            if ($this->input->post('update_asd')) {
                $this->admin_staff_model->update_admin_staffr($id);
            }
        } else {
            redirect(base_url());
        }
    }

}
