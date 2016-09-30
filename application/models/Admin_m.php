<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users_m
 *
 * @author Kanok76
 */
class Admin_m extends CI_Model{    
    function get_data() {
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        $data =  $query->result_array();
        return $data;
    }
    
    public function get_users_by_id($id) {
        if($id != FALSE) {
          $query = $this->db->get_where('admin', array('id' => $id));
          return $query->row_array();
        }
        else {
          return FALSE;
        }
    }
    
    function get_item_by_id($id) {
        $this->db->select('*');
        $this->db->from('admin');
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
    
    function login($username, $password)
     {
       $this->db->select('id, username, password');
       $this->db->from('admin');
       $this->db->where('username', $username);
       $this->db->where('password', MD5($password));
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