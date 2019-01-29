<?php 

class Designation_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    public function getDesignation() {
        $this->db->order_by("designation", "asc");
        $query = $this->db->get('tbl_designation');
        return $query->result();
    }
    public function save($data){
        $this->db->insert('tbl_designation',$data);
    }
    
    public function delete($id){
        $this->db->where('designation_id', $id);
        $this->db->delete("tbl_designation");
    }
    public function activate($id) {
        $update="UPDATE TBL_DESIGNATION SET STATUS = IF(STATUS = 1, 0, 1) WHERE DESIGNATION_ID=".$id;
        $this->db->query($update);
    }
    public function getDesignationById($id) {
        $this->db->where('designation_id', $id);
        $query = $this->db->get('tbl_designation');
        return $query->result();
    }
    public function edit($data){
        $this->db->where('designation_id', $data['designation_id']);
        $this->db->update("tbl_designation", $data);
    }
}    