<?php
class Designation extends MX_Controller {

    public function view() {
        $data = array();
        $data['designation'] = $this->designation_model->getDesignation();
        $this->load->view('view', $data); // the view file name and data to pass
    }

    public function addDesignation() {
        $this->load->view('add'); // the view file name and data to pass
    }

    public function save() {
        $data = array();
        $data['designation'] = $this->input->post('designation');
        $data['short_form'] = $this->input->post('short_form');
        $data['status'] = $this->input->post('status');
        $data['date'] = date('Y-m-d');
        $this->designation_model->save($data);
//        $this->toastr->info('New designation is added');
    }
    public function delete() {
        $id = $this->input->post('designation_id');
        $this->designation_model->delete($id);
    }
    
    public function activate() {
        $id = $this->input->post('designation_id');
        $this->designation_model->activate($id);
    }
    public function editView() {
        $data = array();
        $id = $this->input->post('id');
        $data['designation'] = $this->designation_model->getDesignationById($id);
        $this->load->view('edit', $data); // the view file name and data to pass
    }
    
    public function edit() {
        $data = array();
        $data['designation_id'] = $this->input->post('designation_id');
        $data['designation'] = $this->input->post('designation');
        $data['short_form'] = $this->input->post('short_form');
        $data['status'] = $this->input->post('status');
        $this->designation_model->edit($data);
    }
    public function display() {
        $data = array();
        $id = $this->input->post('id');
        $data['designation'] = $this->designation_model->getDesignationById($id);
        $this->load->view('display', $data); // the view file name and data to pass
    }
}