<?php 

class Donation_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    public function getDonation($user_id) {
        $this->db->order_by("donation_date", "desc");
        $this->db->where('donor_sl_no', $user_id);
        $query = $this->db->get('tbl_donation');
        return $query->result();
    }
    public function save($data){
        $this->db->insert('tbl_donation',$data);
    }
    
    public function delete($id){
        $this->db->where('donation_id', $id);
        $this->db->delete("tbl_donation");
    }
    public function getDonationById($id) {
        $this->db->where('donation_id', $id);
        $query = $this->db->get('tbl_donation');
        return $query->result();
    }
    public function edit($data){
        $this->db->where('donation_id', $data['donation_id']);
        $this->db->update("tbl_donation", $data);
    }
    public function getDonationCount($user_id) {
        $sql="SELECT 
                IF((SUM(WHOLE_BLOOD)+SUM(RED_CELL)+SUM(WHITE_CELL)+SUM(PLATELETE)+SUM(PLASMA))>0,(SUM(WHOLE_BLOOD)+SUM(RED_CELL)+SUM(WHITE_CELL)+SUM(PLATELETE)+SUM(PLASMA)), 0) AS TOTAL
                ,IF(SUM(WHOLE_BLOOD)>0,SUM(WHOLE_BLOOD), 0) AS WHOLE_BLOOD
                , IF(SUM(RED_CELL)>0,SUM(RED_CELL), 0) AS RED_CELL
                , IF(SUM(WHITE_CELL)>0,SUM(WHITE_CELL), 0) AS WHITE_CELL
                , IF(SUM(PLATELETE)>0,SUM(PLATELETE), 0) AS PLATELETE
                , IF(SUM(PLASMA)>0,SUM(PLASMA), 0) AS PLASMA FROM(
                        SELECT 
                        IF(COMPONENT= 'Whole Blood', 1,0) AS WHOLE_BLOOD,
                        IF(COMPONENT= 'Red Cell', 1,0) AS RED_CELL,
                        IF(COMPONENT= 'White Cell', 1,0) AS WHITE_CELL,
                        IF(COMPONENT= 'Platelet', 1,0) AS PLATELETE,
                        IF(COMPONENT= 'Plasma', 1,0) AS PLASMA
                        FROM INFOR I
                        LEFT JOIN TBL_DONATION D ON(D.DONOR_SL_NO=I.SL)
                        WHERE DONOR_SL_NO='".$user_id."'
                ) AS DONATING_COUNT";
        $result=$this->db->query($sql)->row();
        return $result;
    }
}    