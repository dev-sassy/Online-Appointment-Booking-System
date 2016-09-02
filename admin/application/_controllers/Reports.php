<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function Reports() {
        parent :: __construct();
        $this->load->model('reports_model');
        $this->load->model('appointment_model');
    }

    /*
     * Function Name : patient_summary()
     * Purpose : Add new doctor to doctor master table and redirect to doctor view page
     */

    function patient_summary() {
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $data['js'] = array("reports");
                $data['dr_list'] = $this->appointment_model->fetch_all_dr();
                $data['dr_count'] = count($data['dr_list']);
                $data['title'] = "Patient Summary";
                $data['txt_value'] = array('from_date' => '',
                    'to_date' => '',
                    'doc' => '');
                if ($this->input->post('gen_report')) {
                    $data['txt_value'] = array('from_date' => $this->input->post('from_date'),
                        'to_date' => $this->input->post('to_date'),
                        'doc' => $this->input->post('dr_list'));
                }
                $data['p_list'] = $this->reports_model->fetch_patient();
                $data['p_count'] = count($data['p_list']);
                $data['content'] = $this->load->view("reports/patient_summary", $data, true);

                $this->load->view("default_layout", $data);
            } else {
                redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
            }
        } else {
            redirect(base_url() . $this->session->userdata('route_path'));
        }
    }

    function appointment_summary() {
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $data['dr_list'] = $this->appointment_model->fetch_all_dr();
                $data['dr_count'] = count($data['dr_list']);
                $data['js'] = array("reports");
                $data['title'] = "Appointment Summary";
                $data['txt_value'] = array('from_date' => '',
                    'to_date' => '',
                    'doc' => '');
                if ($this->input->post('gen_report')) {
                    $data['txt_value'] = array('from_date' => $this->input->post('from_date'),
                        'to_date' => $this->input->post('to_date'),
                        'doc' => $this->input->post('dr_list'));
                }
                $data['a_list'] = $this->reports_model->fetch_appointment();
                $data['a_count'] = count($data['a_list']);
                $data['content'] = $this->load->view("reports/appointment_summary", $data, true);
                $this->load->view("default_layout", $data);
            } else {
                redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
            }
        } else {
            redirect(base_url() . $this->session->userdata('route_path'));
        }
    }

}
