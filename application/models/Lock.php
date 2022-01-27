<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lock extends CI_Model
{
     // insert company
     function Login($username, $password)
     {
         $this->db->select("*");
         $this->db->where("username",$username);
         $this->db->where("password",$password);
         $this->db->limit(1);
         $query =  $this->db->get("login");
         if( $query->num_rows() > 0 )
         {
            $me_id = $query->result();
            return $me_id;
         }else{
             return -1;
         }
     }

     function verify($username, $userid)
     {
        $this->db->select("*");
        $this->db->where("username",$username);
        $this->db->where("me_id",$userid);
        $this->db->limit(1);
        $query =  $this->db->get("login");
        if( $query->num_rows() > 0 )
        {
           return "true";
        }else{
            return "false";
        }
     }

     function smsCount()
     {
        $num_rows = $this->db->count_all_results('sms');
        return $num_rows;
     }

     function data_Insertion($table, $data)
     {
         $this->db->insert($table, $data);
     }

     public function getDataId1($table,$attr,$id)  
     {  
         $this->db->where($attr,$id); 
         $query = $this->db->get($table);  
         return $query;
     }

     public function logUpdate($user_id, $pass)
     {
       $this->db->set('password',$pass);
       $this->db->where('me_id', $user_id);
       $this->db->update('login');
     }
}

?>