<?php
class Donor extends MX_Controller {

    public function view() {
        $data = array();
        $data['donor'] = $this->donor_model->getDonor();
        $this->load->view('view', $data); // the view file name and data to pass
    }

    public function addDonor() {
        $data = array();
        $data['district'] = $this->donor_model->getDistrict();
        $data['branch'] = $this->donor_model->getBranch();
        $data['designation'] = $this->donor_model->getDesignation();
        $this->load->view('add', $data); // the view file name and data to pass
    }
    
    public function save() {
        $data = array();
        $data['name']= $this->input->post('name');
        $data['cont'] = $this->input->post('contact_no');
        $data['email'] = $this->input->post('email');
        $data['bloodlist'] = $this->input->post('blood_group');
        $data['desig'] = $this->input->post('designation');
        $data['joindate'] = date($this->input->post('joining_date'));
        $data['branch'] = $this->input->post('branch_name');
        $data['gmo'] = $this->input->post('controlling_office');
        $data['area'] = $this->input->post('area');
        $data['polist'] = $this->input->post('district');
        $data['dob'] = date($this->input->post('dob'));
        $data['username'] = $this->input->post('username');
        $data['indx'] = $this->input->post('index');
        $data['passwd'] = $this->input->post('password');
        $data['usertype'] = $this->input->post('usertype');  
        $data['status'] = $this->input->post('status');       
        $this->donor_model->save($data);
    }
    
    public function registration() {
        $data = array();
        $data['name']= $this->input->post('name');
        $data['cont'] = $this->input->post('contact_no');
        $data['email'] = $this->input->post('email');
        $data['bloodlist'] = $this->input->post('blood_group');
        $data['desig'] = $this->input->post('designation');
        $data['joindate'] = date($this->input->post('joining_date'));
        $data['branch'] = $this->input->post('branch_name');
        $data['gmo'] = $this->input->post('controlling_office');
        $data['area'] = $this->input->post('area');
        $data['polist'] = $this->input->post('district');
        $data['dob'] = date($this->input->post('dob'));
        $data['username'] = $this->input->post('username');
        $data['indx'] = $this->input->post('index');
        $data['passwd'] = $this->input->post('password');
        $data['usertype'] = "DONOR";
        $data['status'] = 1;       
        $this->donor_model->save($data);
    }
    public function delete() {
        $id = $this->input->post('sl');
        $this->donor_model->delete($id);
    }
    
    public function activate() {
        $id = $this->input->post('sl');
        $this->donor_model->activate($id);
    }
    public function editView() {
        $data = array();
        $id = $this->input->post('id');
        $data['donor'] = $this->donor_model->getDonorById($id);
        $data['distrct'] = $this->donor_model->getDistrict();
        $data['branch'] = $this->donor_model->getBranch();
        $data['desig'] = $this->donor_model->getDesignation();
        $this->load->view('edit', $data); // the view file name and data to pass
    }
    
    public function edit() {
        $data = array();
        $data['sl'] = $this->input->post('sl');
        $data['name']= $this->input->post('name');
        $data['cont'] = $this->input->post('contact_no');
        $data['email'] = $this->input->post('email');
        $data['bloodlist'] = $this->input->post('blood_group');
        $data['desig'] = $this->input->post('designation');
        $data['joindate'] = date($this->input->post('joining_date'));
        $data['branch'] = $this->input->post('branch_name');
        $data['gmo'] = $this->input->post('controlling_office');
        $data['area'] = $this->input->post('area');
        $data['polist'] = $this->input->post('district');
        $data['dob'] = date($this->input->post('dob'));
        $data['username'] = $this->input->post('username');
        $data['indx'] = $this->input->post('index');
        $data['passwd'] = $this->input->post('password');
        $data['usertype'] = $this->input->post('usertype');  
        $data['status'] = $this->input->post('status');  
        $this->donor_model->edit($data);
    }
    public function display() {
        $data = array();
        $id = $this->input->post('id');
        $data['donor'] = $this->donor_model->getDonorById($id);
        $this->load->view('display', $data); // the view file name and data to pass
    }
    public function getUpozilaByDistrict() {
        $data = array();
        $district = $this->input->post('district');
        $data['district'] = $this->upozila_model->getUpozilaByDistrict($district);
        echo json_encode($data);
    }
}