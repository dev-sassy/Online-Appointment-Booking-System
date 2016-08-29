<?php

class reports_model extends CI_Model {

    function reports_model() {
        parent :: __construct();
    }
    function fetch_patient()
    {
        $this->db->select("*");
        if($this->input->post('from_date'))
        {
            $this->db->where('p_reg_date >=',$this->input->post('from_date'));
        }
        if($this->input->post('p_reg_date'))
        {
            $this->db->where('created_on <=',$this->input->post('to_date'));
        }
        $q = $this->db->get("patient_master");
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
    }

}

?>