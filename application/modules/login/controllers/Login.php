<?php

class login extends MX_Controller {
   
    public function index() {
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function checkLogin() {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('username', 'User name', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $data_arr=array();
        $data_arr['district']=$this->donor_model->getDistrict();
        $data_arr['branch'] = $this->donor_model->getBranch();
        $data_arr['designation'] = $this->donor_model->getDesignation();
        $data_arr['total_donor'] = $this->login_model->getTotalDonor();
        $data_arr['ready_donor'] = $this->login_model->getReadyDonor();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/home', $data_arr);
        } else {
            $user_name = $this->input->post('username');
            $user_pass = $this->input->post('password');
            $this->load->model('login_model');
            $result = $this->login_model->checkLogin($user_name, $user_pass);
            
            if ($result) {
                $sess_array = array();
                $sess_array['user_id'] = $result->sl;
                $sess_array['user_name'] = $result->username;
                $sess_array['user_pass'] = $result->passwd;
                $sess_array['user_type'] = $result->usertype;
                $sess_array['status'] = ($result->status == 1)? "ACTIVE": "INACTIVE";
                $this->session->set_userdata($sess_array);
                if ($this->session->userdata('status') == "ACTIVE") {
                    date_default_timezone_set("Asia/Dacca");
                    $data = array();
                    $data['user_id'] = $this->session->userdata('user_id');
                    $data['user_name'] = $this->session->userdata('user_name');
                    $data['user_type'] = $this->session->userdata('user_type');
//                    redirect('dashboard');
                    $this->load->view('dashboard/view');
                } else {
                    $data_arr['message'] = "Your account is Inactive";
                    $this->load->view('login/home', $data_arr);
                }
            } else {
                $data_arr['message'] = "Invalid User name Or Password";
                $this->load->view('login/home', $data_arr);
            }
        }
    }
    public function bloodSearch(){
        $data=array();
        $data["blood_group_search"]=$this->input->post('blood_group_search');
        $data["district_search"]=$this->input->post('district_search');
        $data["upozila_search"]=$this->input->post('upozila_search');
        $data["branch_name_search"]=$this->input->post('branch_name_search');
        $data["blood_search_content"]=$this->login_model->bloodSearch($data);
        echo json_encode($data["blood_search_content"]);
    }

    public function logOut() {
        date_default_timezone_set("Asia/Dacca");
        $data = array();
        $this->session->unset_userdata('user_id', 'user_name', 'user_type');
        $data['district']=$this->donor_model->getDistrict();
        $data['branch'] = $this->donor_model->getBranch();
        $data['designation'] = $this->donor_model->getDesignation();
        $data['total_donor'] = $this->login_model->getTotalDonor();
        $data['ready_donor'] = $this->login_model->getReadyDonor();
        $this->load->view('login/home', $data);
    }
}

?>
