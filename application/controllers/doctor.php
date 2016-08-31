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
        if ($this->session->userdata('user_name')) {
            $data['dr'] = $this->doctor_model->fetch_doctor();
            $data['dr_count'] = count($data['dr']);
            $data['title'] = "Doctor View";
            $data['content'] = $this->load->view("doctor/view_doctor", $data, true);
            $this->load->view("default_layout", $data);
        } else {
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
                redirect(base_url() . 'users/staff');
        }
    }

    /*
     * Function Name : add_doctor()
     * Purpose : Add new doctor to doctor master table and redirect to doctor view page
     */

    function add_doctor() {
        $this->load->helper('form');

        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $dr_name = '';
                $next_user_id = (int) 1;
                $data['last_dr_id'] = $this->doctor_model->fetch_last_dr_id();
                if ($data['last_dr_id']) {
                    $next_user_id = (int) $data['last_dr_id'] + 1;
                }
                $data['next_user_id'] = str_pad($next_user_id, 3, '0', STR_PAD_LEFT);
                $data['title'] = "Add Doctor";
                $data['js'] = array("doctor");
                $data['content'] = $this->load->view("doctor/add_doctor", $data, true);
                if ($this->input->post('add_dr')) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z]+$/]');
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
                    $this->form_validation->set_rules('verify_password', 'Confirm Password', 'required|matches[password]');
                    //$this->form_validation->set_rules('dr_email', 'Doctor Email', 'trim|required|valid_email');

                    if ($this->form_validation->run() === TRUE) {
                        if (!empty($_FILES['userfile']['name'])) {
                            $dr_name = $this->dr_pic_upload();
                        }
                        $this->doctor_model->add_doctor($dr_name);
                    } else {
                        $this->session->set_flashdata('error_message', validation_errors());
                        redirect(base_url() . 'doctor/add_doctor', 'refresh');
                    }
                }
                $this->load->view("default_layout", $data);
            } else {
                redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
            }
        } else {
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
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

    /*
     * Function Name : chk_username()
     * Purpose : Check for user name weather its unique or not, on change event of username field
     */

    function chk_username() {
        $user_name = $this->input->post('id');
        $this->db->where('dr_username', $user_name);
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
        if ($this->session->userdata('route_path') == 'users/doctor') {
            $id = $this->uri->segment(3);
            $this->doctor_model->del_doctor($id);
        } else {
            redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
        }
    }

    /*
     * Function Name : edit_doctor()
     * Purpose : Edit specific doctor and redirect to doctor view page
     */

    function edit_doctor() {
        $this->load->helper('form');
        $dr_name = '';
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $id = $this->uri->segment(3);
                $data['title'] = "Edit Doctor";
                $data['js'] = array("doctor");
                $data['dr'] = $this->doctor_model->edit_doctor($id);
                $data['content'] = $this->load->view("doctor/edit_doctor", $data, true);
                $this->load->view("default_layout", $data);
                if ($this->input->post('update_dr')) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z]+$/]');
                    //$this->form_validation->set_rules('dr_email', 'Doctor Email', 'trim|required|valid_email');
                    if ($this->form_validation->run() === TRUE) {
                        if (!empty($_FILES['userfile']['name'])) {
                            $dr_name = $this->dr_pic_upload();
                        } else {
                            $dr_name = $this->input->post('dr_pic_old');
                        }
                        $this->doctor_model->update_doctor($this->input->post('dr_id'), $dr_name);
                    } else {
                        $this->session->set_flashdata('error_message', validation_errors());
                        redirect(base_url() . 'doctor/edit_doctor/' . $this->input->post('dr_id'), 'refresh');
                    }
                }
            } else {
                redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
            }
        } else {
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
                redirect(base_url() . 'users/staff');
        }
    }

}
