<?php

class Reward_m extends CI_Model {
    
    function get_all_data() {
        $this->db->select('*');
        $this->db->from('reward');
        $query = $this->db->get();
        $data =  $query->result_array();
        
        if($data){
        return $data;
        }else{
            return FALSE;
        }
    }
    
     public function get_data_by_id($id) {
        if($id != FALSE) {
          $query = $this->db->get_where('reward', array('id' => $id));
          return $query->row_array();
        }
        else {
          return FALSE;
        }
    }
    
    public function create($data) {

        $this->db->insert('reward', $data);
        return TRUE;
    }
    
    public function update($data) {

        $this->db->where('id', $data['id']);
        $this->db->update('reward', array(
                'title' => $data['title'],
                'detail' => $data['detail'],
                'image' => $data['status'],
                'point' => $data['point'],
                'condition' => $data['condition'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'status' => $data['status'],
            ));
        return TRUE;
    } 
    
    function delete($id)
    {
        $this->db->delete('reward', array('id' => $id));
        return TRUE;
    }
}
