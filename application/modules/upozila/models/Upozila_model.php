<?php

class Upozila_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getUpozila() {
        $sql = "SELECT D.name as district_name, U.upozila_id AS upozila_id,  U.name AS name, U.status as status FROM TBL_UPOZILA U LEFT JOIN TBL_DISTRICT D ON (D.district_id = U.`district_id`) ORDER BY D.name, U.name ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function save($data) {
        $this->db->insert('tbl_upozila', $data);
    }

    public function delete($id) {
        $this->db->where('upozila_id', $id);
        $this->db->delete("tbl_upozila");
    }

    public function activate($id) {
        $update = "UPDATE TBL_UPOZILA SET STATUS = IF(STATUS = 1, 0, 1) WHERE UPOZILA_ID=" . $id;
        $this->db->query($update);
    }

    public function getUpozilaById($id) {
        $sql = "SELECT D.name AS district_name, U.upozila_id AS upozila_id,  U.name AS name, U.status AS status FROM TBL_UPOZILA U LEFT JOIN TBL_DISTRICT D ON (D.district_id = U.`district_id`) WHERE upozila_id=" . $id. "ORDER BY U.name";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getUpozilaByDistrict($district) {
        $sql = "SELECT U.upozila_id AS upozila_id,  U.name AS name FROM TBL_UPOZILA U
                LEFT JOIN TBL_DISTRICT D ON (D.district_id = U.district_id) 
                WHERE D.name='" . $district . "' AND U.status=1 ORDER BY U.name";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function edit($data) {
        $this->db->where('upozila_id', $data['upozila_id']);
        $this->db->update("tbl_upozila", $data);
    }

}
