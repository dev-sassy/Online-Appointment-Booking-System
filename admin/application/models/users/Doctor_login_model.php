<?php

class Doctor_login_model extends CI_Model {

    function chk_login() {
        $user_name = trim($this->input->post('username'));
        $pass = md5($this->input->post('password'));

        $this->db->where('dr_username', $user_name);
        $this->db->where('dr_password', $pass);
        $this->db->where('is_deleted', (int) 0);
        $q = $this->db->get('doctor_master');

        if ($q->num_rows() == 1) {
            $this->session->set_userdata('user_name', $user_name);
            $this->session->set_userdata('route_path', 'users/doctor');
            return 1;
        }
    }

    function edit_doc_profile() {
        $this->load->model('patient_model');
        $this->load->model('doctor_model');
        $dr_id = $this->patient_model->fetch_dr_id();
        return $this->doctor_model->edit_doctor($dr_id);
    }

    function check_email_exists() {
        $forget_email = trim($_POST["forget_email"]);

        $this->db->where('dr_email', $forget_email);
        $q = $this->db->get('doctor_master');

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
        $password = array('dr_password' => md5(trim($_POST['new_password'])));

        $this->db->where('dr_email', $this->$email_id);
        $this->db->update('doctor_master', $password);

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