<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    // Define Global Variable and Other Global/Common Things Of Controller Here
    function Patient() {
        parent :: __construct();
        $this->load->model('patient_model');
        $this->load->model('appointment_model');
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
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
                redirect(base_url() . 'users/staff');
        }
    }

    /*
     * Function Name : add_patient()
     * Purpose : Add new patient to patient master table and redirect to patient view page
     */

    function add_patient() {
        $this->load->helper('form');
        $add_p['status'] = '';
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
                $this->load->library('form_validation');
                $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z \']+$/]');
                $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z \']+$/]');
                $this->form_validation->set_rules('p_email', 'Patient email', 'trim|required|valid_email');
                $this->form_validation->set_rules('p_addr', 'Patient address', 'trim|required|min_length[10]|max_length[100]');
                $this->form_validation->set_rules('p_contact', 'Patient contact', 'trim|required|min_length[10]|max_length[10]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('p_eme_contact_name', 'Patient emergency contact name', 'trim|min_length[2]|max_length[30]|regex_match[/^[a-zA-Z ]+$/]');
                $this->form_validation->set_rules('p_eme_contact_num', 'Patient emergency contact number', 'trim|min_length[10]|max_length[10]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('p_eme_contact_rel', 'Patient emergency contact relationship', 'trim|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z ]+$/]');

                if ($this->form_validation->run() === TRUE) {
                    $add_p['status'] = $this->patient_model->add_patient($pass);
                    if ($add_p['status']) {
                        $this->session->set_flashdata('successMsg', 'Record Inserted Successfully');
                        redirect(base_url() . 'patient');
                    }
                } else {
                    $this->session->set_flashdata('error_message', validation_errors());
                    redirect(base_url() . 'patient/add_patient', 'refresh');
                }
            }
        } else {
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
                redirect(base_url() . 'users/staff');
        }
    }

    /*
     * Function Name : chk_p_email()
     * Purpose : Check for email weather its unique or not, on change event of username field
     */

    function chk_p_email() {
        $user_name = $this->input->post('id');
        $this->db->where('p_email', $user_name);
        $q = $this->db->get('patient_master');
        if ($q->num_rows() >= 1) {
            echo "Email already exist";
        } else {
            echo "valid";
        }
    }

    /*
     * Function Name : del_patient()
     * Purpose : Soft delete patient and redirect to patient view page
     */

    function del_patient($id = null) {
        //$id = $this->uri->segment(3);
        $data['status'] = '';
        $data['status'] = $this->patient_model->del_patient($id);
        if ($data['status']) {
            $this->session->set_flashdata('successMsg', 'Record Deleted Successfully');
            //redirect($this->agent->referrer(), 'refresh');
            redirect(base_url() . 'patient');
        }
    }

    /*
     * Function Name : edit_patient()
     * Purpose : Edit specific patient and redirect to patient view page
     */

    function edit_patient($id = null) {
        $this->load->helper('form');

        if ($this->session->userdata('user_name')) {
            //$id = $this->uri->segment(3);
            $data['status'] = '';
            $data['p_edit'] = $this->patient_model->edit_patient($id);
            $data['title'] = "Edit Patient";
            $data['js'] = array("patient");
            $data['content'] = $this->load->view("patient/edit_patient", $data, true);
            $this->load->view("default_layout", $data);

            if ($this->input->post('update_p')) {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z \']+$/]');
                $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z \']+$/]');
                $this->form_validation->set_rules('p_email', 'Patient email', 'trim|required|valid_email');
                $this->form_validation->set_rules('p_addr', 'Patient address', 'trim|required|min_length[10]|max_length[100]');
                $this->form_validation->set_rules('p_contact', 'Patient contact', 'trim|required|min_length[10]|max_length[10]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('p_eme_contact_name', 'Patient emergency contact name', 'trim|min_length[2]|max_length[30]|regex_match[/^[a-zA-Z ]+$/]');
                $this->form_validation->set_rules('p_eme_contact_num', 'Patient emergency contact number', 'trim|min_length[10]|max_length[10]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('p_eme_contact_rel', 'Patient emergency contact relationship', 'trim|min_length[2]|max_length[20]|regex_match[/^[a-zA-Z ]+$/]');

                if ($this->form_validation->run() === TRUE) {
                    $data['status'] = $this->patient_model->update_patient($this->input->post('patient_id'));
                    if ($data['status']) {
                        $this->session->set_flashdata('successMsg', 'Record Updated Successfully');
                        redirect(base_url() . 'patient');
                    }
                } else {
                    $this->session->set_flashdata('error_message', validation_errors());
                    redirect(base_url() . 'patient/edit_patient/' . $this->input->post('patient_id'), 'refresh');
                }
            }
        } else {
            if ($this->session->userdata('route_path'))
                redirect(base_url() . $this->session->userdata('route_path'));
            else
                redirect(base_url() . 'users/staff');
        }
    }

    /*
     * Function Name : add_diagnosis()
     * Purpose : Add patient wise diagnosis and redirect to patient view page
     */

    function add_diagnosis($id = null, $pid = null) {
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $data['status'] = '';
                $data['title'] = "Add Diagnosis";
                $data['js'] = array("diagnosis");
                //$a_id = $this->uri->segment(3);
                $data['id'] = $id;
                $data['pid'] = $pid;
                $data['a_detail'] = $this->patient_model->fetch_spec_appointment($id);
                $data['content'] = $this->load->view("diagnosis/add_diagnosis", $data, true);
                if ($this->input->post('add_pdr')) {
                    $data['status'] = $this->patient_model->add_diagnosis($id);
                    if ($data['status']) {
                        $this->session->set_flashdata('successMsg', 'Record Inserted Successfully');
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
                redirect(base_url() . 'users/doctor');
        }
    }

    /*
     * Function Name : view_diagnois_record()
     * Purpose : View patient wise diagnosis and redirect to diagnosis view page
     */

    function view_diagnois_record($id = null) {
        //echo $id;die;
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                $data['pdr_list'] = $this->patient_model->fetch_diagnois_record($id);
                $data['pdr_count'] = count($data['pdr_list']);
                $data['title'] = "Diagnosis Record";
                $data['id'] = $id;
                $data['content'] = $this->load->view("diagnosis/view_diagnosis_record", $data, true);
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

    function view_appointment_record($id = null) {
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

    /*
     * Function Name : edit_diagnois_record()
     * Purpose : Edit diagnosis and redirect to diagnosis view page
     */

    function edit_diagnois_record($id = null, $a_id = null) {
        if ($this->session->userdata('user_name')) {
            if ($this->session->userdata('route_path') == 'users/doctor') {
                //$id = $this->uri->segment(3);
                $data['status'] = '';
                $data['pdr_edit'] = $this->patient_model->edit_diagnois_record($id);
                $data['title'] = "Edit Diagnois";
                $data['js'] = array("diagnosis");
                $data['a_id'] = $a_id;
                $data['a_detail'] = $this->patient_model->fetch_spec_appointment($id);
                $data['content'] = $this->load->view("diagnosis/edit_diagnosis", $data, true);
                $this->load->view("default_layout", $data);
                if ($this->input->post('update_pdr')) {
                    $data['status'] = $this->patient_model->update_diagnois_record($id);
                    if ($data['status']) {
                        $this->session->set_flashdata('successMsg', 'Record Updated Successfully');
                        if ($a_id) {
                            redirect(base_url() . 'patient/view_diagnois_record/' . $a_id);
                        } else {
                            redirect(base_url() . 'patient/view_diagnois_record');
                        }
                    }
                }
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

}
