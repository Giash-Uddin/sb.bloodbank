<?php 

class Login_model extends CI_Model{
    
    
    public function checkLogin($user_name,$user_pass){
        $this->db->select('*');
        $this->db->from('infor');
        $this->db->where('username',$user_name);
        $this->db->where('passwd',$user_pass);
        $qresult=$this->db->get();
        return $qresult->row();
   }
   public function addlog($data){
        $this->db->insert('activity_log',$data);
        
    }
    public function updateLog($data){
        
       $this->db->where('log_id',$data['log_id']);
     $query=$this->db->update('activity_log',$data);
       
    }
    
        
        public  function validaeDistrict(){
            $this->db->select('*');
            $this->db->from('varp_member_address');
            $this->db->where('district');
            $gresult=$this->db->get();
            return $gresult->row();
            
        }
        
           public function max_log_id() {
        $this->db->select_max('log_id');
        $query = $this->db->get('activity_log');
        $d=$query->row();
        return $d->log_id;
    }
    
    
}



?>