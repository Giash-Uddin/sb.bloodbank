<?php

class Login_model extends CI_Model {

    public function checkLogin($user_name, $user_pass) {
        $this->db->select('*');
        $this->db->from('infor');
        $this->db->where('username', $user_name);
        $this->db->where('passwd', $user_pass);
        $qresult = $this->db->get();
        return $qresult->row();
    }

    public function bloodSearch($data) {
        $data["blood_group_search"] = $this->input->post('blood_group_search');
        $data["district_search"] = $this->input->post('district_search');
        $data["upozila_search"] = $this->input->post('upozila_search');
        $data["branch_name_search"] = $this->input->post('branch_name_search');
        $sql = "";
        if ($data["blood_group_search"] == null && $data["district_search"] == null && $data["upozila_search"] == null && $data["branch_name_search"] == null) {
            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL";
        } else if ($data["blood_group_search"] != null && $data["district_search"] == null && $data["upozila_search"] == null && $data["branch_name_search"] == null) {
            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "'";
        } else if ($data["blood_group_search"] == null && $data["district_search"] != null && $data["upozila_search"] == null && $data["branch_name_search"] == null) {
            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.district = '" . $data["district_search"] . "'";
        } else if ($data["blood_group_search"] == null && $data["district_search"] == null && $data["upozila_search"] != null && $data["branch_name_search"] == null) {
            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.area = '" . $data["upozila_search"] . "'";
        } else if ($data["blood_group_search"] == null && $data["district_search"] == null && $data["upozila_search"] == null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.branch = '" . $data["branch_name_search"] . "'";
        } else if ($data["blood_group_search"] != null && $data["district_search"] != null && $data["upozila_search"] == null && $data["branch_name_search"] == null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.district = '" . $data["district_search"] . "'";
            
        } else if ($data["blood_group_search"] == null && $data["district_search"] != null && $data["upozila_search"] != null && $data["branch_name_search"] == null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.district = '" . $data["district_search"] . "' AND FINAL.area = '" . $data["upozila_search"] . "'";
            
        } else if ($data["blood_group_search"] == null && $data["district_search"] == null && $data["upozila_search"] != null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.area = '" . $data["upozila_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
            
        } else if ($data["blood_group_search"] != null && $data["district_search"] == null && $data["upozila_search"] == null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
            
        } else if ($data["blood_group_search"] != null && $data["district_search"] == null && $data["upozila_search"] != null && $data["branch_name_search"] == null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.area = '" . $data["upozila_search"] . "'";
            
        } else if ($data["blood_group_search"] == null && $data["district_search"] != null && $data["upozila_search"] == null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.district = '" . $data["district_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
            
        } else if ($data["blood_group_search"] != null && $data["district_search"] != null && $data["upozila_search"] != null && $data["branch_name_search"] == null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.district = '" . $data["district_search"] . "' AND FINAL.area = '" . $data["upozila_search"] . "'";
            
        } else if ($data["blood_group_search"] != null && $data["district_search"] == null && $data["upozila_search"] != null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.area = '" . $data["upozila_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
            
        } else if ($data["blood_group_search"] != null && $data["district_search"] != null && $data["upozila_search"] == null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.district = '" . $data["district_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
            
        } else if ($data["blood_group_search"] == null && $data["district_search"] != null && $data["upozila_search"] != null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.district = '" . $data["district_search"] . "' AND FINAL.area = '" . $data["upozila_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
            
        } else if ($data["blood_group_search"] != null && $data["district_search"] != null && $data["upozila_search"] != null && $data["branch_name_search"] != null) {

            $sql .= "SELECT * FROM (
                        SELECT TEMP.donor_sl_no, TEMP.donation_date, TEMP.component, TEMP.name, TEMP.designation, TEMP.branch, TEMP.blood_group, TEMP.contact_no, TEMP.email, TEMP.district, TEMP.area FROM(
                            SELECT D.donor_sl_no AS donor_sl_no, donation_date, D.component, I.name AS NAME, I.desig AS designation, I.branch AS branch, I.bloodlist AS blood_group, I.cont AS contact_no, I.email AS email, I.polist AS district, I.area AS AREA, I.dob
                            FROM TBL_DONATION D
                            LEFT JOIN INFOR I ON(D.donor_sl_no=I.SL)
                            WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.dob)/365)>18 AND
                        ((TEMP.component IS NULL AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Whole Blood' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='Red Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>120)
                        OR (TEMP.component='White Cell' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Platelet' AND DATEDIFF(NOW(),TEMP.donation_date)>7)
                        OR (TEMP.component='Plasma' AND DATEDIFF(NOW(),TEMP.donation_date)>2))
                ) AS FINAL
                WHERE FINAL.blood_group = '" . $data["blood_group_search"] . "' AND FINAL.district = '" . $data["district_search"] . "' AND FINAL.area = '" . $data["upozila_search"] . "' AND FINAL.branch = '" . $data["branch_name_search"] . "'";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    
     public function getTotalDonor() {
        $sql="SELECT 
                IF(SUM(A_POSITIVE)>0,SUM(A_POSITIVE),0) AS A_POSITIVE,
                IF(SUM(B_POSITIVE)>0,SUM(B_POSITIVE),0) AS B_POSITIVE,
                IF(SUM(O_POSITIVE)>0,SUM(O_POSITIVE),0) AS O_POSITIVE,
                IF(SUM(AB_POSITIVE)>0,SUM(AB_POSITIVE),0) AS AB_POSITIVE,
                IF(SUM(A_NEGATIVE)>0,SUM(A_NEGATIVE),0) AS A_NEGATIVE,
                IF(SUM(B_NEGATIVE)>0,SUM(B_NEGATIVE),0) AS B_NEGATIVE,
                IF(SUM(O_NEGATIVE)>0,SUM(O_NEGATIVE),0) AS O_NEGATIVE,
                IF(SUM(AB_NEGATIVE)>0,SUM(AB_NEGATIVE),0) AS AB_NEGATIVE
                FROM(
                        SELECT 
                        IF(bloodlist='A+', 1, 0) AS A_POSITIVE,
                        IF(bloodlist='B+', 1, 0) AS B_POSITIVE,
                        IF(bloodlist='O+', 1, 0) AS O_POSITIVE,
                        IF(bloodlist='AB+', 1, 0) AS AB_POSITIVE,
                        IF(bloodlist='A-', 1, 0) AS A_NEGATIVE,
                        IF(bloodlist='B-', 1, 0) AS B_NEGATIVE,
                        IF(bloodlist='O-', 1, 0) AS O_NEGATIVE,
                        IF(bloodlist='AB-', 1, 0) AS AB_NEGATIVE
                        FROM INFOR
                ) AS AVAILABLE_DONOR";
        $result=$this->db->query($sql)->row();
        return $result;
    }
    
    public function getReadyDonor() {
        $sql="SELECT 
                IF(SUM(A_POSITIVE)>0,SUM(A_POSITIVE),0) AS A_POSITIVE,
                IF(SUM(B_POSITIVE)>0,SUM(B_POSITIVE),0) AS B_POSITIVE,
                IF(SUM(O_POSITIVE)>0,SUM(O_POSITIVE),0) AS O_POSITIVE,
                IF(SUM(AB_POSITIVE)>0,SUM(AB_POSITIVE),0) AS AB_POSITIVE,
                IF(SUM(A_NEGATIVE)>0,SUM(A_NEGATIVE),0) AS A_NEGATIVE,
                IF(SUM(B_NEGATIVE)>0,SUM(B_NEGATIVE),0) AS B_NEGATIVE,
                IF(SUM(O_NEGATIVE)>0,SUM(O_NEGATIVE),0) AS O_NEGATIVE,
                IF(SUM(AB_NEGATIVE)>0,SUM(AB_NEGATIVE),0) AS AB_NEGATIVE
                FROM(
                        SELECT 
                        IF(bloodlist='A+', 1, 0) AS A_POSITIVE,
                        IF(bloodlist='B+', 1, 0) AS B_POSITIVE,
                        IF(bloodlist='O+', 1, 0) AS O_POSITIVE,
                        IF(bloodlist='AB+', 1, 0) AS AB_POSITIVE,
                        IF(bloodlist='A-', 1, 0) AS A_NEGATIVE,
                        IF(bloodlist='B-', 1, 0) AS B_NEGATIVE,
                        IF(bloodlist='O-', 1, 0) AS O_NEGATIVE,
                        IF(bloodlist='AB-', 1, 0) AS AB_NEGATIVE 
                        FROM(      
                                SELECT D.DONOR_SL_NO, D.DONATION_DATE, D.COMPONENT, I.DOB, I.bloodlist
                                FROM TBL_DONATION D
                                LEFT JOIN INFOR I ON (I.SL=D.DONOR_SL_NO)
                                WHERE D.DONATION_DATE =(SELECT MAX(DONATION_DATE) FROM TBL_DONATION WHERE DONOR_SL_NO=D.DONOR_SL_NO)
                        ) AS TEMP
                        WHERE (DATEDIFF(NOW(), TEMP.DOB)/365)>18 AND
                        ((TEMP.COMPONENT IS NULL AND DATEDIFF(NOW(),TEMP.DONATION_DATE)>120)
                        OR (TEMP.COMPONENT='Whole Blood' AND DATEDIFF(NOW(),TEMP.DONATION_DATE)>120)
                        OR (TEMP.COMPONENT='Red Cell' AND DATEDIFF(NOW(),TEMP.DONATION_DATE)>120)
                        OR (TEMP.COMPONENT='White Cell' AND DATEDIFF(NOW(),TEMP.DONATION_DATE)>7)
                        OR (TEMP.COMPONENT='Platelet' AND DATEDIFF(NOW(),TEMP.DONATION_DATE)>7)
                        OR (TEMP.COMPONENT='Plasma' AND DATEDIFF(NOW(),TEMP.DONATION_DATE)>2))
                ) AS READY_DONOR";
        $result=$this->db->query($sql)->row();
        return $result;
    }

}
