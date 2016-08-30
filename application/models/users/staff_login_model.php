<?php

class staff_login_model extends CI_Model {

    function chk_login() {
        $user_name = trim($this->input->post('username'));
        $pass = md5($this->input->post('password'));

        $this->db->where('as_username', $user_name);
        $this->db->where('as_password', $pass);
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get('admin_staff');

        if ($q->num_rows() == 1) {
            $this->session->set_userdata('user_name', $user_name);
            redirect(base_url() . $this->session->userdata('route_path') . '/dashboard');
        } else {
            return "Invalid User Name Or Password. Please check your login details.";
        }
    }

    function fetch_all_appointment() {
        if ($this->session->userdata('route_path') == 'users/doctor' && $this->session->userdata('user_name')) {
             $this->load->model('patient_model');
              $dr_id = $this->patient_model->fetch_dr_id(); 
        }
        $this->db->select('a.ap_id,a.ap_date,a.ap_time,a.dr_id,p.p_fname,p.p_lname');
        $this->db->from('appointment_master a');
        $this->db->join('patient_master p', 'p.p_id = a.p_id');
        $this->db->where('a.is_cancel', (int) 0);
        $this->db->where('p.is_deleted', (int) 0);
        if ($this->session->userdata('route_path') == 'users/doctor' && $this->session->userdata('user_name')) {
            /* $this->load->model('patient_model');
              $dr_id = $this->patient_model->fetch_dr_id(); */
            $this->db->where('a.dr_id', $dr_id);
        }
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            $fromatted_data = [];
            foreach ($q->result_array() as $row) {
                /* $format = 'Y-m-d H:i:s';
                  $date = DateTime::createFromFormat($format, $row['ap_date'] . ' ' . $row['ap_time']); */
                $data = array("id" => $row['ap_id'],
                    "title" => $row['p_fname'] . ' ' . $row['p_lname'],
                    "start" => $row['ap_date'] . 'T' . $row['ap_time'],
                    "end" => $row['ap_date'] . 'T' . $row['ap_time'],
                    "allDay" => false);
                array_push($fromatted_data, $data);
            }
            echo json_encode($fromatted_data);
        }
    }
    

    function check_email_exists() {
        $forget_email = trim($_POST["forget_email"]);

        $this->db->where('as_email', $forget_email);
        $q = $this->db->get('admin_staff');

        if ($q->num_rows() == 1) {
            $enc_email = $this->encrypt->encode($forget_email);
            $enc_email = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_email);
            $status = "Please check your mail for reset link. <br/>" .
                    base_url() . $this->session->userdata('route_path') . "/reset_password/" . urlencode($enc_email);
            return $status;
        } else {
            return "Email-id does not exist in our system. Please try again.";
        }
    }

    function reset_user_password($email_id) {
        $this->$email_id = trim($email_id);
        $password = array('as_password' => md5(trim($_POST['new_password'])));

        $this->db->where('as_email', $this->$email_id);
        $this->db->update('admin_staff', $password);

        $flag = false;
        if ($this->db->affected_rows() >= 0) {
            $status = "Password has been reset successfully.";
            $flag = true;
        } else {
            $status = "Something bad happen. Please try later.";
        }

        return array(
            'status' => $status,
            'isSuccess' => $flag
        );
    }

}

?>