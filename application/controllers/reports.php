<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class reports extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function reports() {
        parent :: __construct();
        $this->load->model('reports_model');
    }

    /*
     * Function Name : index()
     * Purpose : 
     */

    public function index() {
        
    }

    /*
     * Function Name : patient_summary()
     * Purpose : Add new doctor to doctor master table and redirect to doctor view page
     */

    function patient_summary() {
        if ($this->session->userdata('user_name')) {
            $data['p_list'] = $this->reports_model->fetch_patient();
            $data['p_count'] = count($data['p_list']);
            $data['js'] = array("reports");
            $data['title'] = "Patient Summary";
            $data['txt_value'] = array('from_date' => '',
                'to_date' => '');
            if ($this->input->post('gen_report')) {
                $data['p_list'] = $this->reports_model->fetch_patient();
                $data['p_count'] = count($data['p_list']);
                $data['txt_value'] = array('from_date' => $this->input->post('from_date'),
                    'to_date' => $this->input->post('to_date'));
            }
            $data['content'] = $this->load->view("reports/patient_summary", $data, true);

            $this->load->view("default_layout", $data);
        } else {
            redirect(base_url() . $this->session->userdata('route_path'));
        }
    }

}
