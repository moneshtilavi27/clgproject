<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Operation extends CI_Model
{
    // Dashboard
    function Count($table)
    {
        $num_rows = $this->db->count_all_results($table);
        return $num_rows;
    }

    // fetch route
    public function getData($table,$table1="")
    {
        //data is retrive from this query  
        $this->db->distinct();
        $query = $this->db->get($table,$table1);
        return $query;
    }

    // fetch route
    public function getDistinctData($atr,$table)
    {
        //data is retrive from this query  
        $this->db->distinct($atr);
        $this->db->select($atr);
        $query = $this->db->get($table);
        return $query;
    }

    // fetch last row from database
    public function getLastrow($table,$condition)
    {
        $this->db->order_by($condition,"DESC");
        $this->db->limit(1);
        $query = $this->db->get($table);
        $data = $query->result();
        return $data;
    }

    //  get data by id 
    public function getDataId($table, $attr, $id)
    {
        $this->db->where($attr, $id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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
     public function getSortedData($dept,$year,$modeOfExam,$role)
     {
        if($dept=="Select" && $modeOfExam="Select" && $role="Select")
        {
            $this->db->select('*');
            $this->db->from('facultywork f');
            $this->db->join('subject s', 's.sub_id = f.sub_id');
            $query = $this->db->get();
            
        }else{
            $this->db->select('*');
            $this->db->from('facultywork f');
            $this->db->join('subject s', 's.sub_id = f.sub_id');
            $this->db->where('department',$dept);
            $this->db->where('modeOfExam',$modeOfExam);
            $this->db->where('year',$year);
            $this->db->where('roleid',$role);
            $query = $this->db->get();
        }
        return $query;
     }

    public function getRemuData($fid,$department,$year,$roleid)
    {
        if($fid!="" and $department!="" and $year!="" and $roleid!=""){
            $this->db->select('f.fid,f.faculty_id,f.name,f.department,w.year,w.modeOfExam,r.rolename,w.scriptDate,w.evaluvated_script,p.rate,s.subject,s.sub_code');
            $this->db->from('faculty f');
            $this->db->join('facultywork w', 'f.fid = w.fid');
            $this->db->join('subject s', 's.sub_id = w.sub_id');
            $this->db->join('pricerate p', 'w.roleid = p.roleid');
            $this->db->join('role r', 'r.roleid = w.roleid AND r.roleid = p.roleid');
            $this->db->where('f.fid', $fid);
            $this->db->where('f.department', $department);
            $this->db->where('w.year', $year);
            for($i=0;$i<count($roleid)-1; $i++)
            {
                $this->db->where('w.roleid', $roleid[$i]);
            }
            $query = $this->db->get();
            return $query;
        }else{
            $this->db->select('f.fid,f.faculty_id,f.name,f.department,w.year,w.modeOfExam,r.rolename,w.scriptDate,w.evaluvated_script,p.rate,s.subject,s.sub_code');
            $this->db->from('faculty f');
            $this->db->join('facultywork w', 'f.fid = w.fid');
            $this->db->join('subject s', 's.sub_id = w.sub_id');
            $this->db->join('pricerate p', 'w.roleid = p.roleid');
            $this->db->join('role r', 'r.roleid = w.roleid AND r.roleid = p.roleid');
            $query = $this->db->get();
            return $query;
        }
       
    }




     public function getFaculty($depart)
     {
         $this->db->select('name');
         $this->db->where("department",$depart);
         $query = $this->db->get('faculty');
         return $query;
     }

// fetch ME
public function profile($id)
{
    $this->db->select('*');
    $this->db->from('faculty f');
    $this->db->join('document d', 'f.fid = d.fid');
    $this->db->where('f.fid', $id);
    $query = $this->db->get();
    return $query;
}
  
  

    // insert data insertion
    function data_Insertion($table, $data)
    {
        $this->db->insert($table, $data);
    }



    // Update Data
    function data_Update($table, $attr, $id, $data)
    {
        $this->db->where($attr, $id);
        $this->db->update($table, $data);
    }

 
    
    public function getItemMaster()
    {
        //data is retrive from this query  
        $this->db->select('company.cmp_name,item_master.*');
        $this->db->from('company');
        $this->db->join('item_master', 'item_master.cmp_id = company.cmp_id');
        $query = $this->db->get();
        return $query;
    }

    // Delete Data
    public function delete_Data($table, $column, $id)
    {
        $this->db->where($column, $id);
        return $this->db->delete($table);
    }


    // Delete Image From Folder
    public function delete_Image($table, $image, $attr, $id)
    {
        $this->db->select($image);
        $this->db->where($attr, $id);
        $query = $this->db->get($table);
        $row = $query->result();
        if ($row[0]->$image != "") {
            $path = explode("/", $row[0]->$image);
            $num = count($path) - 1;
            unlink('content/' . $path[$num]);
        }
    }

    public function tranket($table,$bill_no)
    {
        $this->db->where('bill_number', $bill_no);
        $this->db->delete($table);
    }


 
    // report
    public function getSum($table,$attr,$attr1,$id)
    {
        $this->db->select_sum($attr);
        $this->db->where($attr1,$id);
        $query = $this->db->get($table);
        return $query;
    }

     public function getDataId1($table,$attr,$id)  
    {  
        $this->db->where($attr,$id); 
        $query = $this->db->get($table);  
        return $query;
    }
    
 
    // Payment Collection
    public function paymentcollection($date1,$date2){
        $this->db->distinct();
        $this->db->select("m.me_id,m.me_f_name,m.me_f_name,m.mob,p.date");
        $this->db->select_sum("p.remain");
        $this->db->select_sum("p.paid");
        $this->db->from('me m');
        $this->db->join('payment p', 'p.me_id = m.me_id');
        $this->db->where('p.date >=',$date1);
        $this->db->where('p.date <=',$date2);
        $query=$this->db->get();
        return $query;
    }

}