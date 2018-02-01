<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2/1/2018
 * Time: 12:43 PM
 */

class AutoComplete extends CI_Model
{


    public function getname_query(){
        $query=$this->db->get('user');
        return $query->result();

    }
}