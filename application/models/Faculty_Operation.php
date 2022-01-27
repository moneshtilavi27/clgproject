<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty_Operation extends CI_Model
{
     // fetch all data
     public function getData($table,$table1="")
     {
         //data is retrive from this query  
         $query = $this->db->get($table,$table1);
         return $query;
     }
     public function profile($id)
{
    $this->db->select('*');
    $this->db->from('faculty f');
    $this->db->join('document d', 'f.fid = d.fid');
    $this->db->where('f.fid', $id);
    $query = $this->db->get();
    return $query;
}
 
     //  get data by attribute value
     public function getDataAttribute($table, $attr, $value)
     {
         $this->db->where($attr, $value);
         $query = $this->db->get($table);
         if ($query->num_rows() > 0) {
            //  foreach ($query->result() as $row) {
            //      $data[] = $row;
            //  }
             return $query;
         }
         return false;
     }

     // fetch ME
     public function fetchWork($id)
     {
         $this->db->select('*');
         $this->db->from('faculty f');
         $this->db->join('evaluvation e', 'f.fid = e.fid');
         $this->db->where('m.me_id', $id);
         $query = $this->db->get();
         return $query;
     }

      // insert data insertion
    function data_Insertion($table, $data)
    {
        $this->db->insert($table, $data);
    }
}
?>