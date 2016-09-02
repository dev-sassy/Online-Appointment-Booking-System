<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function Appointment() {
        parent :: __construct();
        $this->load->model('appointment_model');
    }

    /*
     * Function Name : index()
     * Purpose : Fetch doctor from doctor master table and display it on doctor view page    
     */
    
    public function index($id = null) {
        if ($this->session->userdata('user_name')) {
            $data['a_list'] = $this->appointment_model->fetch_all_appointment();
            $data['a_count'] = count($data['a_list']);
            $data['title'] = "View Appointment";
            $data['id'] = $id;
            $data['content'] = $this->load->view("appointment/view_appointment", $data, true);
            $this->load->view("default_layout", $data);
        } else {
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
                redirect(base_url() . 'users/staff');
        }
    }

    function book_appointment($pid = null) {
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/staff') {
                $data['status'] = '';
                $data['title'] = "Book Appointment";
                $data['dr_list'] = $this->appointment_model->fetch_all_dr();
                $data['p_list'] = $this->appointment_model->fetch_all_patient();
                $data['dr_count'] = count($data['dr_list']);
                $data['p_count'] = count($data['p_list']);
                $data['js'] = array('appointment');
                $data['content'] = $this->load->view("appointment/book_appointment", $data, true);
                if ($this->input->post('book_app')) {
                    $data['status'] = $this->appointment_model->book_appointment();
                    if ($data['status']) {
                        if ($pid) {
                            redirect(base_url() . 'patient/view_appointment_record/' . $pid);
                        } else {
                            redirect(base_url() . 'appointment');
                        }
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
                redirect(base_url() . 'users/staff');
        }
    }

    function chk_available_appointment() {
        // echo $this->input->post('id') .' - ' . $this->input->post('app_date') ;
        $dr_id = $this->input->post('id');
        $app_date = $this->input->post('app_date');
        $data['disabled_ap_time_list'] = $this->appointment_model->chk_available_appointment($dr_id, $app_date);
        echo json_encode($data);
    }

    function cancel_appointment($ap_id = null, $pid = null) {
        if ($this->session->userdata('route_path') == 'users/staff') {
            //$ap_id = $this->uri->segment(3);
            $this->appointment_model->cancel_appointment($ap_id, $pid);
        } else {
            redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
        }
    }

}
