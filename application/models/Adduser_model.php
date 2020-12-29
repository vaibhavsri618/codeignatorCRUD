<?php

class Adduser_model extends CI_model
{
    function insert($data)
    {
        $this->db->insert('adduser',$data);
        
    }

    function show()
    {
        return $users=$this->db->get('adduser')->result_array();
        
    }
    function editdata($userid)

    {
        $this->db->where('user_id',$userid);
        $row=$this->db->get('adduser')->result_array();
        return $row;
    }

    function updatedata($userid,$userdata)

    {
        $this->db->where('user_id',$userid);
        $this->db->update('adduser',$userdata);
       
        
    }

    function delete($userid)

    {
        $this->db->where('user_id',$userid);
        $this->db->delete('adduser');
        
    }


    function login ($email)
    {
        $this->db->where('email',$email);
        return $arr=$this->db->get('adduser')->result_array();
    }
}

?>