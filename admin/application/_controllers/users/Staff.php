<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    private $route_path;

    public function __construct() {
        parent:: __construct();
        $this->load->library('encrypt');
        $this->load->model('users/Staff_login_model');
        $this->load->model('Appointment_model');
    }

    public function index() {
        $check_login["status"] = '';
        $this->route_path = $_SERVER['PATH_INFO'];
        $this->route_path = ltrim($this->route_path, '/');
        $this->session->set_userdata('route_path', $this->route_path);

        if ($this->input->post('chk_login')) {
            $check_login["status"] = $this->Staff_login_model->chk_login();
        }

        $this->load->view($this->route_path, $check_login);
    }

    function dashboard() {
        if ($this->session->userdata('user_name')) {
            $data['title'] = "Dashboard Page";
            $data['js'] = array('fullcalendar/new/fullcalendar.min', 'external-dragging-calendar');
            $data['dr_list'] = $this->appointment_model->fetch_all_dr();
            $data['dr_count'] = count($data['dr_list']);
            $data['selected_doc'] = array('doc' => '');
            /* if($this->input->post('search'))
              $data['selected_doc'] = array('doc'=>$this->input->post('dr_list')); */

            $data['content'] = $this->load->view("dashboard", $data, TRUE);
            $this->load->view("default_layout", $data);
        } else {
            redirect(base_url() . $this->session->userdata('route_path'));
        }
    }

    function app_detail() {
        $data['app_detail'] = $this->Staff_login_model->day_wise_app_detail($this->input->post('date'), $this->input->post('doctor'));
        echo json_encode($data['app_detail']);
    }

    function fetch_all_appointment() {
        $dr_id = $this->input->post('dr_id');
        $this->Staff_login_model->fetch_all_appointment($dr_id);
        //echo json_encode($data["all_appointment"]);
    }

    function edit_profile() {
        $this->load->helper('form');
        $data['asd'] = $this->Staff_login_model->edit_p_profile();
        $data['title'] = "Edit Profile";
       
        if ($this->input->post('update_asd')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z]+$/]');
            $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z]+$/]');

            if ($this->form_validation->run() === TRUE) {
                $this->Staff_login_model->update_admin_staff();
            } else {
                $this->session->set_flashdata('error_message', validation_errors());
                redirect(base_url() . 'users/edit_staff_profile', 'refresh');
            }
        }
        $data['js'] = array("admin_staff");
        $data['content'] = $this->load->view("users/edit_staff_profile", $data, true);
        $this->load->view("default_layout", $data);
    }

    function logout() {
        $this->session->unset_userdata('user_name');
        //$this->session->unset_userdata('route_path');
        redirect(base_url() . 'users/staff');
    }

    function forgot_password() {
        $check_email["status"] = '';

        if ($this->input->post('forget_email')) {
            $check_email["status"] = $this->Staff_login_model->check_email_exists();
        }
        $this->load->view("forgot_password", $check_email);
    }

    function reset_password($email_id) {
        $dec_email = urldecode($email_id);
        $dec_email = str_replace(array('-', '_', '~'), array('+', '/', '='), $dec_email);
        $reset_email = $this->encrypt->decode($dec_email);

        $reset_status = array(
            'status' => '',
            'isSuccess' => false
        );

        if ($this->input->post('reset_password')) {
            $query = $this->Staff_login_model->reset_user_password($reset_email);
            $reset_status["status"] = $query['status'];
            $reset_status["isSuccess"] = $query['isSuccess'];
        }

        $this->load->view("reset_password", $reset_status);
    }

}
