<?php

class reports_model extends CI_Model {

    function reports_model() {
        parent :: __construct();
    }
    function fetch_patient()
    {
        $this->db->select("*");
        if($this->inpit->post('form_date'))
        {
            
        }   
        $q = $this->db->get("patient_master");
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
    }

}

?>