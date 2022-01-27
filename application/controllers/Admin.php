<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    // custrocter to load 
    public function __construct()
    {
        parent::__construct();
        // load database
        $this->load->database();
        // load model 
        $this->load->model('Admin_Operation','ad');
        //load library          
        $this->load->library('form_validation');
         // load session
         $this->load->library('session');
    }

    public function index()
    {
       $userid = $this->session->userdata('user_id');
        if($userid==1 && $userid!="")
        {
            $this->load->view('Admin/dashboard');
        }else{
            $this->session->sess_destroy();
            redirect('Locker/');
        }
    }

    public function Dashboard()
    {
        $this->load->view('Admin/dashboard');
    }

    public function facultyView()
    {
        $data['faculty'] = $this->ad->getData("faculty");
        $this->load->view('Admin/facultyView',$data);
    }
    
    public function viewPaperEvaluvation()
    {
        $data['evaluvation'] = $this->ad->getData("facultyWork");
        $this->load->view('Admin/viewEvaluation',$data);
    }

    public function workData()
    {
        $depart = $this->input->post("depart");
        $year = $this->input->post("year");
        $modeOfExam = $this->input->post("modeOfExam");
        $role = $this->input->post("role");
        $data['evaluvation'] = $this->ad->getSortedData($depart,$year,$modeOfExam,$role);
       $this->load->view('Admin/workData',$data);
    }

    public function getFacultyList()
    {
        $depart = $this->input->post("depart");
        $data = $this->ad->getDataId("faculty","department", $depart);
        echo json_encode($data);
    }

    public function notification()
    {
        if(isset($_POST['notification']))
        {
            $this->form_validation->set_rules("notification", "Notification Message Require", "required");
            if ($this->form_validation->run()) {
                $data = array(
                    "notiId" => "",
                    "msg" => $this->input->post("notification"),
                    "mode" => ""
                );
                $this->ad->data_Insertion("notification", $data);
            }
            $data['faculty'] = $this->ad->getData("notification");
            echo '<script>alert("New Notification Added");</script>';
            $this->load->view('Admin/notification',$data);
        }else{
            $data['faculty'] = $this->ad->getData("notification");
            $this->load->view('Admin/notification',$data);
        }
    }

    public function renumaration()
    {
        if(isset($_POST['search']))
        {
        $this->form_validation->set_rules("department", "Department", "required");
        $this->form_validation->set_rules("facultylist", "Faculty Name", "required");
        $this->form_validation->set_rules("year", "Year", "required");
        $this->form_validation->set_rules("role[]", "Role", "required");
        if ($this->form_validation->run()) {
           $role[] = $this->input->post("role");
           $department = $this->input->post("department");
           $fid = $this->input->post("facultylist");
           $year = $this->input->post("year");
          // $data =  $this->ad->getRemuData($fid,$department,$year,$role);
        //     echo "<pre>";
        //    print_r($data->result());
           $data['remuneration'] = $this->ad->getRemuData($fid,$department,$year,$role);
           $this->load->view('Admin/renumaration',$data);
        }
        else{
            $data['remuneration'] = $this->ad->getRemuData("","","","");
            $this->load->view('Admin/renumaration',$data);
        }
        }else{
            $data['remuneration'] = $this->ad->getRemuData("","","","");
            $this->load->view('Admin/renumaration',$data);
        }
    }
    
    public function report()
    {
        // load the methods of model
        $this->load->view('Admin/report');
    }

    // insert faculty
    public function insertFaculty()
    {
        $config = [
            'upload_path' =>'./content/',
            'allowed_types' => 'gif|jpg|jpeg|png',
        ];
        $this->load->library('upload', $config);
        if(isset($_POST['facultysubmit']))
        {
        $this->form_validation->set_rules("facultyId", "FacultyID", "required");
        $this->form_validation->set_rules("fname", "First Name", "required");
        $this->form_validation->set_rules("lname", "Last Name", "required");
        $this->form_validation->set_rules("mob", "Mobile Number", "required");
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("department", "Department", "required");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules("worktime", "Work Time", "required");
        $this->form_validation->set_rules("bank", "bank", "required");
        $this->form_validation->set_rules("b_branch", "b_branch", "required");
        $this->form_validation->set_rules("acc", "Acount Number", "required");
        $this->form_validation->set_rules("ifsc", "ifsc", "required");
        if ($this->form_validation->run()) {
                $this->upload->do_Upload('profile');
                $profile = $this->upload->data();
                $this->upload->do_Upload('adhar');
                $adhar = $this->upload->data();
                $this->upload->do_Upload('bank_doc');
                $bank_doc = $this->upload->data();
                $this->upload->do_Upload('pan');
                $pan = $this->upload->data();

                $data = array(
                    "fid" => "",
                    "faculty_id" => $this->input->post("facultyId"),
                    "name" => $this->input->post("fname")." ".$this->input->post("lname"),
                    "mobile" => $this->input->post("mob"),
                    "email" => $this->input->post("email"),
                    "address" => $this->input->post("address"),
                    "workdur" => $this->input->post("worktime"),
                    "department" => $this->input->post("department"),
                    "bankname" => $this->input->post("bank"),
                    "bankbranch" => $this->input->post("b_branch"),
                    "bankacc" => $this->input->post("acc"),
                    "bankifsc" => $this->input->post("ifsc")
                );

                // setting target path to image
                $image_path = base_url("content/" . $profile['raw_name'] . $profile['file_ext']);
                $data['fimage'] = $image_path;
                $image_path = base_url("content/" . $adhar['raw_name'] . $adhar['file_ext']);
                $doc['adhar'] = $image_path;
                $image_path = base_url("content/" . $bank_doc['raw_name'] . $bank_doc['file_ext']);
                $doc['bank_doc'] = $image_path;
                $image_path = base_url("content/" . $pan['raw_name'] . $pan['file_ext']);
                $doc['pan'] = $image_path;

                // User Creadential
                $creadential = array(
                    'log_id'=>"",
                    'username'=>$this->input->post("username"),
                    'password'=>$this->input->post("password"),
                    'user' => 'Faculty'
                );
                
                // send all the data to model
                $this->ad->data_Insertion("faculty", $data);
                $upData = $this->ad->getLastrow("faculty","fid");
                $doc['fid']=$upData[0]->fid;
                $creadential['me_id']=$upData[0]->fid;
                $this->ad->data_Insertion("document", $doc);
                $this->ad->data_Insertion("login", $creadential);
                echo '<script>alert("New Faculty Added");</script>';
                $this->load->view('Admin/faculty_add');
            } else {
                // $this->marketing_executing_regster();
                $this->load->view('Admin/faculty_add');
             }
         } else {
            // $this->marketing_executing_list();
            $this->load->view('Admin/faculty_add');
         }
    }

    public function profile($id)
    {   
        $data['profile'] = $this->ad->profile($id);
        $this->load->view('Admin/profile', $data);
    }

    public function facultyUpdate($id)
    {
        $data['profile'] = $this->ad->profile($id);
        $this->load->view('Admin/facultyUpdate',$data);
    }
    
    public function approveWork($id)
    {
        $this->ad->approve($id);
        $data['evaluvation'] = $this->ad->getDataAttribute("evaluvation","status","0");
        $this->load->view('Admin/viewEvaluation',$data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Locker/');
    }
}