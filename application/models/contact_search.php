<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Contact_search extends CI_Model
{
    function search($value){
        $query = $this->db->query("SELECT * FROM contacts WHERE first_name='$value' or last_name='$value'");
        $result = $query->result_array();
        return $result;
    }

}