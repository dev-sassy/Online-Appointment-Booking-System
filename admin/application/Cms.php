<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Cms extends CI_Controller {    function __construct() {        parent::__construct();//        if ($this->aauth->is_loggedin() == FALSE) {//            redirect('account');//        }        $this->load->model('cms_model');        $this->user_id = $this->session->userdata('user_name');    }    public function index() {        $data['Module'] = "CMS";//        if ($this->session->userdata('admin_group_id') == 1)//            $data['dataList'] = GetAllRecord('cms_master');//        else        $data['title'] = "CMS Page";        $data['dataList'] = $this->cms_model->GetAllRecord('cms_master', array('page_created_by' => $this->user_id));        $data['content'] = $this->load->view("cms/view", $data, true);        $this->load->view("default_layout", $data);    }    function addEdit($id = 0) {        $data = array();        if ($id) {            $cmsData = $this->cms_model->GetAllRecord('cms_master', array('page_id' => $id), true);            if (!empty($cmsData))                $data = $cmsData;            else                redirect('cms');            $data['action'] = "edit";        } else            $data['action'] = "add";        $data['Module'] = "CMS";        if ($this->input->post()) {            $cmsID = $this->input->post('page_id');            $data = array(                'page_title' => $this->input->post('page_title'),                'page_content' => $this->input->post('page_content'),                'page_metakeyword' => $this->input->post('page_metakeyword'),                'page_metadesc' => $this->input->post('page_metadesc'),                'page_created_by' => $this->user_id,            );            if ($cmsID) {                $data['page_modified_date'] = date('Y-m-d H:i:s');                $optresult = $this->cms_model->Insert_Update_Data('cms_master', array('page_id' => $cmsID), $data);                $action = "updated";            } else {                $data['page_sef_url'] = $this->cms_model->create_unique_slug($this->input->post('page_title'), 'cms_master', 'page_sef_url', $cmsID, 'page_id');                $data['page_created_date'] = date('Y-m-d H:i:s');                $optresult = $this->cms_model->Insert_Update_Data('cms_master', array(), $data, true);                $action = "added";            }            if ($optresult)                $this->session->set_flashdata('addUpdMsg', "CMS Page is " . $action . " successfully");            else                $this->session->set_flashdata('addUpdMsg', "CMS Page is not " . $action . " successfully");            redirect('cms');        }        $data['title'] = "Add CMS Page";        $data['content'] = $this->load->view("cms/addedit", $data, true);        $this->load->view("default_layout", $data);    }    }?>