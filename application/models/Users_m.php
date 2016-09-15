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
class Users_m extends CI_Model{
    function get_data() {
        $this->db->select('*');
        $this->db->from('member');
        $query = $this->db->get();
        $data =  $query->result_array();
        print_r($data);
    }
    
    function login($username, $password)
     {
       $this->db->select('id, username, password');
       $this->db->from('users');
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