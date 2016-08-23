<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class staff extends CI_Controller {

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
        $this->load->model('users/staff_login_model');
    }

    public function index() {
        $check_login["status"] = '';
        $this->route_path = $_SERVER['PATH_INFO'];
        $this->route_path = ltrim($this->route_path, '/');
        $this->session->set_userdata('route_path', $this->route_path);

        if ($this->input->post('chk_login')) {
            $check_login["status"] = $this->staff_login_model->chk_login();
        }

        $this->load->view($this->route_path, $check_login);
    }

    function success_login() {
        //$this->load->view("menu");
        if ($this->session->userdata('user_name')) {
            $data['title'] = "Dashboard Page";
            $data['content'] = $this->load->view("dashboard", '', TRUE);
            $this->load->view("default_layout", $data);
        } else {
            redirect(base_url() . $this->session->userdata('route_path'));
        }
    }

    function logout() {
        $this->session->unset_userdata('user_name');
        redirect(base_url() . $this->session->userdata('route_path'));
    }

    function forgot_password() {
        $check_email["status"] = '';

        if ($this->input->post('forget_email')) {
            $check_email["status"] = $this->staff_login_model->check_email_exists();
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
            $query = $this->staff_login_model->reset_user_password($reset_email);
            $reset_status["status"] = $query['status'];
            $reset_status["isSuccess"] = $query['isSuccess'];
        }

        $this->load->view("reset_password", $reset_status);
    }

}
