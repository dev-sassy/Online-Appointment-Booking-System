<?php

class cms_model extends CI_Model {

    function cms_model() {
        parent :: __construct();
        $this->table = "doctor_master";
    }

    function GetAllRecord($table_name = '', $condition = array(), $is_single = false, $select_fields = '*', $is_like = array(), $or_like = array(), $order_by = array()) {
        $CI = & get_instance();
        $CI->db->select($select_fields);
        if ($condition && count($condition))
            $CI->db->where($condition);
        if ($is_like && count($is_like)) {
            foreach ($is_like as $key => $val) {
//            $cur_filter = array();
//            $cur_filter = $val;
//            foreach ($cur_filter as $key1 => $val1) {
                $CI->db->like($key, $val);
//            }
            }
        }
        if ($or_like && count($or_like)) {
            foreach ($or_like as $key => $val) {
//            $cur_filter = array();
//            $cur_filter = $val;
//            foreach ($cur_filter as $key1 => $val1) {
                $CI->db->like($key, $val);
//            }
            }
        }
        if ($order_by && count($order_by)) {
            foreach ($order_by as $key => $val) {
//            $cur_filter = array();
//            $cur_filter = $val;
//            foreach ($cur_filter as $key1 => $val1) {
                $order = $val ? $val : 'asc';
                $CI->db->order_by($key, $order);
//            }
            }
        }
        $res = $CI->db->get($table_name);
        if ($res) {
            if ($is_single)
                return $res->row_array();
            else
                return $res->result_array();
        } else
            return false;
    }

    #create unique slug

    function create_unique_slug($string, $table, $field = 'slug', $id = 0, $unique_field = '', $key = NULL, $value = NULL) {
        $t = & get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key)
            $params["$key !="] = $value;
        if ($id)
            $t->db->where($unique_field . '<>', $id);
        while ($t->db->where($params)->get($table)->num_rows()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }

    function Insert_Update_Data($table_name = '', $condition = array(), $data = array(), $is_insert = false) {
        $resultArr = array();
        $CI = & get_instance();
        if ($condition && count($condition))
            $CI->db->where($condition);
        if ($is_insert) {
            $CI->db->insert($table_name, $data);
            $insertid = $CI->db->insert_id();
            return $insertid;
            #return 0;
        } else {
            return $CI->db->update($table_name, $data);
            //return 0;
        }
    }

}

?>