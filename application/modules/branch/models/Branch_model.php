<?php 

class Branch_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    public function getBranch() {
        $this->db->order_by("name", "asc");
        $query = $this->db->get('tbl_branch');
        return $query->result();
    }
    public function save($data){
        $this->db->insert('tbl_branch',$data);
    }
    
    public function delete($id){
        $this->db->where('branch_id', $id);
        $this->db->delete("tbl_branch");
    }
    public function activate($id) {
        $update="UPDATE TBL_BRANCH SET STATUS = IF(STATUS = 1, 0, 1) WHERE BRANCH_ID=".$id;
        $this->db->query($update);
    }
    public function getBranchById($id) {
        $this->db->where('branch_id', $id);
        $query = $this->db->get('tbl_branch');
        return $query->result();
    }
    public function edit($data){
        $this->db->where('branch_id', $data['branch_id']);
        $this->db->update("tbl_branch", $data);
    }
}    