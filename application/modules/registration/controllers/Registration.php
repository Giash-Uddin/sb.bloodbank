<?php

class Registration extends MX_Controller {

    public function vieww() {
        $data = array();
        $data['partydropdown'] = $this->account_model->partyDropdown();
        $data['categorydropdown'] = $this->account_model->categoryDropdown("INCOME");
        $this->load->view('vieww', $data); // the view file name and data to pass
    }
    public function user_view() {
        $data=array();
        $this->load->view('user_view',$data); // the view file name and data to pass
    }
    public function category_view() {
        $data = array();
        $this->load->view('category_view', $data); // the view file name and data to pass
    }

    public function party_view() {
        $data = array();
        $this->load->view('party_view', $data); // the view file name and data to pass
    }

    public function expense_view() {
        $data = array();
        $data['categorydropdown'] = $this->account_model->categoryDropdown("EXPENSE");
        $this->load->view('expense_view', $data); // the view file name and data to pass
    }

    public function income_view() {
        $data = array();
        $data['partydropdown'] = $this->account_model->partyDropdown();
        $data['categorydropdown'] = $this->account_model->categoryDropdown("INCOME");
        $this->load->view('income_view', $data); // the view file name and data to pass
    }

    public function report_view() {
        $fromdate = $this->input->post('fromdate');
        $todate = $this->input->post('todate');
        $data = array();
        $data['query'] = $this->account_model->getBalance($fromdate, $todate);
        $this->load->view('balance_table', $data); // the view file name and data to pass
    }

    public function income_report_view() {
        $category = $this->input->post('category');
        $party = $this->input->post('party');
        $fromdate = $this->input->post('fromdate');
        $todate = $this->input->post('todate');
        $data = array();
        $data['query'] = $this->account_model->getIncome($category, $party, $fromdate, $todate);
        $this->load->view('income_table', $data); // the view file name and data to pass
    }

    public function expense_report_view() {
        $fromdate = $this->input->post('fromdate');
        $todate = $this->input->post('todate');
        $data = array();
        $data['query'] = $this->account_model->getExpense($fromdate, $todate);
        $this->load->view('expense_table', $data); // the view file name and data to pass
    }
    public function user_show() {
        $data=array();
        $data['query']=$this->account_model->show("tbl_user");
        $this->load->view('user_show',$data); // the view file name and data to pass
    }
    public function category_show() {
        $data = array();
        $data['query'] = $this->account_model->show("tbl_category");
        $this->load->view('category_show', $data); // the view file name and data to pass
    }

    public function party_show() {
        $data = array();
        $data['query'] = $this->account_model->show("tbl_party");
        $this->load->view('party_show', $data); // the view file name and data to pass
    }

    public function income_show() {
        $data = array();
        $data['query'] = $this->account_model->show("tbl_income");
        $this->load->view('income_show', $data); // the view file name and data to pass
    }

    public function expense_show() {
        $data = array();
        $data['query'] = $this->account_model->show("tbl_expense");
        $this->load->view('expense_show', $data); // the view file name and data to pass
    }

    public function updat_view() {
        $id = $this->input->post('id');
        $tblname = $this->input->post('tblname');
        $page = $this->input->post('page');
        if ($page == "income_updat") {
            $data['partydropdown'] = $this->account_model->partyDropdown();
            $data['categorydropdown'] = $this->account_model->categoryDropdown("INCOME");
        }else{
            $data['categorydropdown'] = $this->account_model->categoryDropdown("EXPENSE");
        }
        $data['query'] = $this->account_model->updatView($tblname, $id);
        $this->load->view($page, $data);
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
        $data['usertype'] = "DONOR";
        $data['status'] = 1;        
        $this->registration_model->save($data);
        $this->load->view('login/home');
    }
    public function userSave() {
        $data = array();
        $data['user_name'] = $this->input->post('name');
        $data['password'] = $this->input->post('password');
        $data['user_type'] = $this->input->post('user_type');
        $data['status'] = $this->input->post('status');
        $this->account_model->save("tbl_user", $data);
    }
    public function incomeSave() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name');
        $data['party_name'] = $this->input->post('party_name');
        $data['name'] = $this->input->post('name');
        $data['date'] = $this->input->post('date');
        $data['unit'] = $this->input->post('unit');
        $data['rate'] = $this->input->post('rate');
        $data['amount'] = $this->input->post('amount');
        $this->account_model->save("tbl_income", $data);
    }

    public function expenseSave() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name');
        $data['name'] = $this->input->post('name');
        $data['date'] = $this->input->post('date');
        $data['unit'] = $this->input->post('unit');
        $data['rate'] = $this->input->post('rate');
        $data['amount'] = $this->input->post('amount');
        $this->account_model->save("tbl_expense", $data);
    }

    public function subgroup_dropdown() {
        $id = $this->input->post('id');
        $data = array();
        $data['party'] = $this->account_model->subgroupDropdown($id);
    }
    public function user_update(){
        $data=array();
        $data['id']=$this->input->post('id');
        $data['user_name']=$this->input->post('user_name');
        $data['password']=$this->input->post('password');
        $data['user_type']=$this->input->post('user_type');
        $data['status']=$this->input->post('status');
        $this->account_model->update("tbl_user",$data);
    }
    public function category_update() {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['type'] = $this->input->post('category_type');
        $this->account_model->update("tbl_category", $data);
    }

    public function party_update() {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $this->account_model->update("tbl_party", $data);
    }

    public function income_update() {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['category_name'] = $this->input->post('category_name');
        $data['party_name'] = $this->input->post('party_name');
        $data['name'] = $this->input->post('name');
        $data['date'] = $this->input->post('date');
        $data['unit'] = $this->input->post('unit');
        $data['rate'] = $this->input->post('rate');
        $data['amount'] = $this->input->post('amount');
        $this->account_model->update("tbl_income", $data);
    }

    public function expense_update() {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['category_name'] = $this->input->post('category_name');
        $data['name'] = $this->input->post('name');
        $data['date'] = $this->input->post('date');
        $data['unit'] = $this->input->post('unit');
        $data['rate'] = $this->input->post('rate');
        $data['amount'] = $this->input->post('amount');
        $this->account_model->update("tbl_expense", $data);
    }

    public function delete() {
        $id = $this->input->post('id');
        $tblname = $this->input->post('tblname');
        $this->account_model->delete($tblname, $id);
    }

}
