<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class News_m extends CI_Model {

    function get_data() {
        $this->db->select('*');
        $this->db->from('member');
        $query = $this->db->get();
        $data =  $query->result_array();
        print_r($data);
    }

}

?>