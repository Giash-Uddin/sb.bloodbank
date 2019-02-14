<?php
class DashBoard extends MX_Controller {
    
    public function view() {
        $data = array();
        $this->load->view('view', $data); // the view file name and data to pass
    }
    public function sidebar_view() {
        $data = array();
        $data['user_id'] = $this->input->post('user_id');
        $data['user_name'] = $this->input->post('user_name');
        $data['user_type'] = $this->input->post('user_type');
        $this->load->view('sidebar_view', $data); // the view file name and data to pass
    }
}
