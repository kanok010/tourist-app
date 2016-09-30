<?php

class PricePlan_m extends CI_Model {
    function get_all_data() {
        $this->db->select('*');
        $this->db->from('price_plan');
        $query = $this->db->get();
        $data =  $query->result_array();
        return $data;
    }
    
     public function get_data_by_id($id) {
        if($id != FALSE) {
          $query = $this->db->get_where('price_plan', array('id' => $id));
          return $query->row_array();
        }
        else {
          return FALSE;
        }
    }
    
    public function check_price_plan($price_plan){
        if($price_plan) {
          $query = $this->db->get_where('price_plan', array('price_plan' => $price_plan));
          return $query->num_rows();
        }
        else {
          return FALSE;
        }
    }
    public function create($data) {

        $this->db->insert('price_plan', $data);
        return TRUE;
    }
    
    public function update_data($data)
    {
       //debuga($data);
       $this->db->set('package_name',$data['package_name'])
                ->set('price_plan',$data['price_plan'])
                ->set('status',$data['status'])
                ->where('id',$data['id'])
                ->update('price_plan');
         return TRUE;
    }
    
    public function update($data) {

        $this->db->where('id', $data['id']);
        $this->db->update('price_plan', array(
                'package_name' => $data['package_name'],
                'price_plan' => $data['price_plan'],
                'status' => $data['status'],
            ));
        return TRUE;
    }
    
    function delete($id)
    {
        $this->db->delete('price_plan', array('id' => $id));
        return TRUE;
    }
    
    
}
