<?php
class Branch extends MX_Controller {

    public function view() {
        $data = array();
        $data['branch'] = $this->branch_model->getBranch();
        $this->load->view('view', $data); // the view file name and data to pass
    }

    public function addBranch() {
        $this->load->view('add'); // the view file name and data to pass
    }

    public function save() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $data['date'] = date('Y-m-d');
        $this->branch_model->save($data);
//        $this->toastr->info('New branch is added');
    }
    public function delete() {
        $id = $this->input->post('branch_id');
        $this->branch_model->delete($id);
    }
    
    public function activate() {
        $id = $this->input->post('branch_id');
        $this->branch_model->activate($id);
    }
    public function editView() {
        $data = array();
        $id = $this->input->post('id');
        $data['branch'] = $this->branch_model->getBranchById($id);
        $this->load->view('edit', $data); // the view file name and data to pass
    }
    
    public function edit() {
        $data = array();
        $data['branch_id'] = $this->input->post('branch_id');
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $this->branch_model->edit($data);
    }
    public function display() {
        $data = array();
        $id = $this->input->post('id');
        $data['branch'] = $this->branch_model->getBranchById($id);
        $this->load->view('display', $data); // the view file name and data to pass
    }
}