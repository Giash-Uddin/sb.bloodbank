<?php
class Donation extends MX_Controller {

    public function view() {
        $data = array();
        $user_id=$this->input->post('user_id');
        $data['donation'] = $this->donation_model->getDonation($user_id);
        $data['donation_count'] = $this->donation_model->getDonationCount($user_id);
        $this->load->view('view', $data); // the view file name and data to pass
    }

    public function addDonation() {
        $data = array();
        $user_id=$this->input->post('user_id');
        $data['donation_count'] = $this->donation_model->getDonationCount($user_id);
        $this->load->view('add',$data); // the view file name and data to pass
    }

    public function save() {
        $data = array();
        $data['donor_sl_no'] = date($this->input->post('donor_sl_no'));
        $data['donation_date'] = date($this->input->post('donation_date'));
        $data['hospital'] = $this->input->post('hospital');
        $data['component'] = $this->input->post('component');
        $this->donation_model->save($data);
    }
    public function delete() {
        $id = $this->input->post('donation_id');
        $this->donation_model->delete($id);
    }
    
    public function activate() {
        $id = $this->input->post('donation_id');
        $this->donation_model->activate($id);
    }
    public function editView() {
        $data = array();
        $id = $this->input->post('id');
        $user_id=$this->input->post('user_id');
        $data['donation_count'] = $this->donation_model->getDonationCount($user_id);
        $data['donation'] = $this->donation_model->getDonationById($id);
        $this->load->view('edit', $data); // the view file name and data to pass
    }
    
    public function edit() {
        $data = array();
        $data['donation_id'] = $this->input->post('donation_id');
        $data['donation_date'] = date($this->input->post('donation_date'));
        $data['hospital'] = $this->input->post('hospital');
        $data['component'] = $this->input->post('component');
        $this->donation_model->edit($data);
    }
    public function display() {
        $data = array();
        $id = $this->input->post('id');
        $user_id=$this->input->post('user_id');
        $data['donation_count'] = $this->donation_model->getDonationCount($user_id);
        $data['donation'] = $this->donation_model->getDonationById($id);
        $this->load->view('display', $data); // the view file name and data to pass
    }
}