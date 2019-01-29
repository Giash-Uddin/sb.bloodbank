<?php
class Upozila extends MX_Controller {

    public function view() {
        $data = array();
        $data['upozila'] = $this->upozila_model->getUpozila();
        $this->load->view('view', $data); // the view file name and data to pass
    }

    public function addUpozila() {
        $data = array();
        $data['district'] = $this->donor_model->getDistrict();
        $this->load->view('add', $data); // the view file name and data to pass
    }

    public function save() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['district_id'] = $this->input->post('district_id');
        $data['status'] = $this->input->post('status');
        $this->upozila_model->save($data);
    }
    public function delete() {
        $id = $this->input->post('upozila_id');
        $this->upozila_model->delete($id);
    }
    
    public function activate() {
        $id = $this->input->post('upozila_id');
        $this->upozila_model->activate($id);
    }
    public function editView() {
        $data = array();
        $id = $this->input->post('id');
        $data['upozila'] = $this->upozila_model->getUpozilaById($id);
        $this->load->view('edit', $data); // the view file name and data to pass
    }
    
    public function edit() {
        $data = array();
        $data['upozila_id'] = $this->input->post('upozila_id');
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $this->upozila_model->edit($data);
    }
    public function display() {
        $data = array();
        $id = $this->input->post('id');
        $data['upozila'] = $this->upozila_model->getUpozilaById($id);
        $this->load->view('display', $data); // the view file name and data to pass
    }
}