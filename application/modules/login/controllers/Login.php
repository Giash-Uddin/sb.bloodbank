<?php

class login extends MX_Controller {

    public function index() {
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function checkLogin() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'User name', 'required|alpha_numeric');
        $this->form_validation->set_rules('user_pass', 'Password', 'required');


//        if ($this->form_validation->run() == FALSE) {
//            $this->load->view('login/home');
//        } else {
//            $data = array();
//            $user_name = $this->input->post('username');
//            $user_pass = $this->input->post('password');
//            $this->load->model('login_model');
//            $result = $this->login_model->checkLogin($user_name, $user_pass);
//
//            if ($result) {
//                $sess_array = array();
//                $sess_array['user_id'] = $result->indx;
//                $sess_array['user_name'] = $result->username;
//                $sess_array['user_pass'] = $result->passwd;
//                $sess_array['user_type'] = $result->usertype;
//                $sess_array['status'] = ($result->status == 1)? "ACTIVE": "INACTIVE";
//                $this->session->set_userdata($sess_array);
//                if ($this->session->userdata('status') == "ACTIVE") {
//                    date_default_timezone_set("Asia/Dacca");
//                    $data = array();
//                    $data['user_id'] = $this->session->userdata('user_id');
//                    $data['user_name'] = $this->session->userdata('user_name');
//                    $data['user_type'] = $this->session->userdata('user_type');
                    redirect('dashboard');
//                } else {
//                    $sata = array();
//                    $sata['message'] = "Your account is Inactive";
//                    $this->load->view('login/home', $sata);
//                }
//            } else {
//                $sata = array();
//                $sata['message'] = "Invalid User name Or Password";
//                $this->load->view('login/home', $sata);
//            }
//        }
    }

    public function logOut() {

        date_default_timezone_set("Asia/Dacca");

        $data = array();
        $this->session->unset_userdata('user_id', 'user_name', 'user_type');
        $this->load->view('login/login_view', $data);
    }

}

?>
