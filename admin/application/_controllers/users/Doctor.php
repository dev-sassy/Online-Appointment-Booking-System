<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
        $this->load->model('users/doctor_login_model');
        $this->load->model('appointment_model');
    }

    public function index() {
        $check_login["status"] = '';
        $this->route_path = $_SERVER['PATH_INFO'];
        $this->route_path = ltrim($this->route_path, '/');
        $this->session->set_userdata('route_path', $this->route_path);

        if ($this->input->post('chk_login')) {
            $check_login["status"] = $this->doctor_login_model->chk_login();
        }

        $this->load->view($this->route_path, $check_login);
    }

    function dashboard() {
        if ($this->session->userdata('user_name')) {
            $data['title'] = "Dashboard Page";
            $data['js'] = array('fullcalendar/new/fullcalendar.min', 'external-dragging-calendar');
            $data['content'] = $this->load->view("dashboard", $data, TRUE);
            $this->load->view("default_layout", $data);
        } else {
            redirect(base_url() . $this->session->userdata('route_path'));
        }
    }

    function edit_profile() {
        $this->load->helper('form');
        $dr_name = '';
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $data['dr'] = $this->doctor_login_model->edit_doc_profile();
                $data['title'] = "Edit Profile";
                $data['js'] = array("doctor");
                $data['content'] = $this->load->view("users/edit_doctor_profile", $data, true);
                if ($this->input->post('update_dr')) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z]+$/]');
                    if ($this->form_validation->run() === TRUE) {
                        if (!empty($_FILES['userfile']['name'])) {
                            $dr_name = $this->dr_pic_upload();
                        } else {
                            $dr_name = $this->input->post('dr_pic_old');
                        }
                        $this->load->model('doctor_model');
                        $this->doctor_model->update_doctor($this->input->post('dr_id'), $dr_name);
                    } else {
                        $this->session->set_flashdata('error_message', validation_errors());
                        redirect(base_url() . 'users/edit_doctor_profile', 'refresh');
                    }
                }
                $this->load->view("default_layout", $data);
            } else {
                redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
            }
        } else {
            redirect(base_url() . 'users/doctor');
        }
    }

    function dr_pic_upload() {
        $dr_name = '';
        $config['upload_path'] = './assets/images/doctor_pic/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            die;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $dr_name = $data['upload_data']['file_name'];
        }

        return $dr_name;
    }

    function logout() {
        $this->session->unset_userdata('user_name');
        //$this->session->unset_userdata('route_path');
        redirect(base_url() . 'users/doctor');
    }

    function forgot_password() {
        $check_email["status"] = '';

        if ($this->input->post('forget_email')) {
            $check_email["status"] = $this->doctor_login_model->check_email_exists();
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
            $query = $this->doctor_login_model->reset_user_password($reset_email);
            $reset_status["status"] = $query['status'];
            $reset_status["isSuccess"] = $query['isSuccess'];
        }

        $this->load->view("reset_password", $reset_status);
    }

}
