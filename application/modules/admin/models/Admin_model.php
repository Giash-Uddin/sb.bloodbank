<?php 

class Admin_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
//    public function save($tblName, $data){
//        $this->db->insert($tblName,$data);
//    }
//    public function update($tblname, $data){
//        $this->db->where('id', $data['id']);
//        $this->db->update($tblname, $data);
//    }
//    public function delete($tblname,$id){
//        $this->db->where('id', $id);
//        $this->db->delete($tblname);
//    }
//    public function partyDropdown() {
//        $this->db->order_by("id", "asc");
//        $query = $this->db->get('tbl_party');
//        return $query->result();
//    }
//    public function categoryDropdown($type) {
//        $this->db->order_by("id", "asc");
//        $this->db->where("type", $type);
//        $query = $this->db->get('tbl_category');
//        return $query->result();
//    }
//    public function show($tblname){
//       $query=$this->db->get($tblname);
//        return $query->result();
//    }
//    public function updatView($tblname, $id){
//        $this->db->where('id', $id);
//        $query=$this->db->get($tblname);
//        return $query->row();
//    }
//    public function getBalance($fromdate,$todate){
//        $sqlquery="";
//        if($fromdate == "" && $todate == ""){
//            $sqlquery="SELECT CATEGORY_NAME, PARTY_NAME, NAME, DATE, UNIT, RATE, AMOUNT AS CREDIT, NULL AS DEBIT, NULL AS BALANCE FROM tbl_income
//            UNION ALL
//            SELECT CATEGORY_NAME, NULL AS PARTY_NAME, NAME, DATE, UNIT, RATE, NULL AS CREDIT, AMOUNT AS DEBIT, NULL AS BALANCE FROM tbl_expense";
//        }else if($fromdate == "" && $todate != ""){
//            $sqlquery="SELECT CATEGORY_NAME, PARTY_NAME, NAME, DATE, UNIT, RATE, AMOUNT AS CREDIT, NULL AS DEBIT, NULL AS BALANCE FROM tbl_income WHERE DATE < '".$todate."' OR DATE = '".$todate."'
//            UNION ALL
//            SELECT CATEGORY_NAME, NULL AS PARTY_NAME, NAME, DATE, UNIT, RATE, NULL AS CREDIT, AMOUNT AS DEBIT, NULL AS BALANCE FROM tbl_expense WHERE DATE < '".$todate."' OR DATE = '".$todate."'";
//        }else if($fromdate != "" && $todate == ""){
//            $sqlquery="SELECT CATEGORY_NAME, PARTY_NAME, NAME, DATE, UNIT, RATE, AMOUNT AS CREDIT, NULL AS DEBIT, NULL AS BALANCE FROM tbl_income WHERE DATE = '".$fromdate."' OR DATE > '".$fromdate."'
//            UNION ALL
//            SELECT CATEGORY_NAME, NULL AS PARTY_NAME, NAME, DATE, UNIT, RATE, NULL AS CREDIT, AMOUNT AS DEBIT, NULL AS BALANCE FROM tbl_expense WHERE DATE = '".$fromdate."' OR DATE > '".$fromdate."'";
//        }else if($fromdate != "" && $todate != ""){
//            $sqlquery="SELECT CATEGORY_NAME, PARTY_NAME, NAME, DATE, UNIT, RATE, AMOUNT AS CREDIT, NULL AS DEBIT, NULL AS BALANCE FROM tbl_income WHERE DATE BETWEEN '".$fromdate."' AND '".$todate."'
//            UNION ALL
//            SELECT CATEGORY_NAME, NULL AS PARTY_NAME, NAME, DATE, UNIT, RATE, NULL AS CREDIT, AMOUNT AS DEBIT, NULL AS BALANCE FROM tbl_expense WHERE DATE BETWEEN '".$fromdate."' AND '".$todate."'";
//        }
//        
//        $query=$this->db->query($sqlquery);
//        return $query->result();
//    }
//    public function getIncome($category,$party,$fromdate,$todate){
//        $sqlquery="";
//        if($category == "" && $party == "" && $fromdate == "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income ORDER BY DATE";
//        }else if($category != "" && $party == "" && $fromdate == "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE CATEGORY_NAME ='".$category."' ORDER BY DATE";
//        }else if($category == "" && $party != "" && $fromdate == "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE PARTY_NAME ='".$party."' ORDER BY DATE";
//        }else if($category == "" && $party == "" && $fromdate != "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE DATE = '".$fromdate."' OR DATE > '".$fromdate."' ORDER BY DATE";
//        }else if($category == "" && $party == "" && $fromdate == "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE DATE < '".$todate."' OR DATE = '".$todate."' ORDER BY DATE";
//        }else if($category != "" && $party != "" && $fromdate == "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE CATEGORY_NAME = '".$category."' AND PARTY_NAME = '".$party."' ORDER BY DATE";
//        }else if($category != "" && $party == "" && $fromdate != "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE CATEGORY_NAME = '".$category."' AND (DATE = '".$fromdate."' OR DATE > '".$fromdate."') ORDER BY DATE";
//        }else if($category != "" && $party == "" && $fromdate == "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE CATEGORY_NAME = '".$category."' AND (DATE < '".$todate."' OR DATE = '".$todate."') ORDER BY DATE";
//        }else if($category != "" && $party == "" && $fromdate != "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE CATEGORY_NAME = '".$category."' AND DATE BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY DATE";
//        }else if($category == "" && $party != "" && $fromdate != "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE PARTY_NAME = '".$party."' AND (DATE = '".$fromdate."' OR DATE > '".$fromdate."') ORDER BY DATE";
//        }else if($category == "" && $party != "" && $fromdate == "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE PARTY_NAME = '".$party."' AND DATE (DATE < '".$todate."' OR DATE = '".$todate."') ORDER BY DATE";
//        }else if($category == "" && $party != "" && $fromdate != "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE PARTY_NAME = '".$party."' AND DATE BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY DATE";
//        }else if($category == "" && $party == "" && $fromdate != "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE DATE BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY DATE";
//        }else if($category != "" && $party != "" && $fromdate != "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_income WHERE CATEGORY_NAME = '".$category."' AND PARTY_NAME = '".$party."' AND DATE BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY DATE";
//        }
//        $query=$this->db->query($sqlquery);
//        return $query->result();
//    }
//    public function getExpense($fromdate,$todate){
//        $sqlquery="";
//        if($fromdate == "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_expense ORDER BY DATE";
//        }else if($fromdate == "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_expense WHERE DATE < '".$todate."' OR DATE = '".$todate."' ORDER BY DATE";
//        }else if($fromdate != "" && $todate == ""){
//            $sqlquery="SELECT * FROM tbl_expense WHERE DATE = '".$fromdate."' OR DATE > '".$fromdate."' ORDER BY DATE";
//        }else if($fromdate != "" && $todate != ""){
//            $sqlquery="SELECT * FROM tbl_expense WHERE DATE BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY DATE";
//        }
//        
//        $query=$this->db->query($sqlquery);
//        return $query->result();
//    }
}

