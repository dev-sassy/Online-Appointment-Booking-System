<?php

class User_login_model extends CI_Model {

    function chk_login() {
        $user_name = trim($this->input->post('username'));
        $pass = md5($this->input->post('password'));

        $this->db->where('p_email', $user_name);
        $this->db->where('p_password', $pass);
        $q = $this->db->get('patient_master');

        if ($q->num_rows() == 1) {
            $this->session->set_userdata('user_name', $user_name);
            redirect(base_url() . $this->session->userdata('route_path') . '/success_login');
        } else {
            return "Invalid User Name Or Password. Please check your login details.";
        }
    }

    function check_email_exists() {
        $forget_email = trim($_POST["forget_email"]);

        $this->db->where('p_email', $forget_email);
        $q = $this->db->get('patient_master');

        if ($q->num_rows() == 1) {
            $enc_email = $this->encrypt->encode($forget_email);
            $enc_email = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_email);
            $status = "<h4>Please check your mail for reset link.</h4> <br/>" .
                    base_url() . $this->session->userdata('route_path') . "/reset_password/" . urlencode($enc_email);
            return $status;
        } else {
            return "Email-id does not exist in our system. Please try again.";
        }
    }

    function reset_user_password($email_id) {
        $this->$email_id = trim($email_id);
        $password = array('p_password' => md5(trim($_POST['new_password'])));

        $this->db->where('p_email', $this->$email_id);
        $this->db->update('patient_master', $password);

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