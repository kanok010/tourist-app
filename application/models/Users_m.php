<?php
class Users_m extends CI_Model{    
    function get_data() {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        $data =  $query->result_array();
        return $data;
    }
    
    public function get_users_by_id($id) {
        if($id != FALSE) {
          $query = $this->db->get_where('users', array('id' => $id));
          return $query->row_array();
        }
        else {
          return FALSE;
        }
    }
    
    function get_item_by_id($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
      
    }
    

    
}