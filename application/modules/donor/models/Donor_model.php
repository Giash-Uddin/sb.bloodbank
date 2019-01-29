<?php 

class Donor_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    public function getDonor() {
        $this->db->order_by("name", "asc");
        $query = $this->db->get('infor');
        return $query->result();
    }
    public function save($data){
        $this->db->insert('infor',$data);
    }
    
    public function delete($id){
        $this->db->where('sl', $id);
        $this->db->delete("infor");
    }
    public function activate($id) {
        $update="UPDATE INFOR SET STATUS = IF(STATUS = 1, 0, 1) WHERE SL=".$id;
        $this->db->query($update);
    }
    public function getDonorById($id) {
        $this->db->where('sl', $id);
        $query = $this->db->get('infor');
        return $query->result();
    }
    public function edit($data){
        $this->db->where('sl', $data['sl']);
        $this->db->update("infor", $data);
    }
    public function getDistrict() {
        $this->db->order_by("name", "asc");
        $query = $this->db->get('tbl_district');
        return $query->result();
    }
    
    public function getBranch() {
        $sql = "SELECT branch_id,  name FROM TBL_BRANCH WHERE status=1 ORDER BY name";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function getDesignation() {
        $sql = "SELECT designation_id, designation, short_form FROM TBL_DESIGNATION where status=1 ORDER BY short_form";
        $query = $this->db->query($sql);
        return $query->result();
    }
}    