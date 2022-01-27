<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty extends CI_Controller
{
    // custrocter to load 
    public function __construct()
    {
        parent::__construct();
        // load database
        $this->load->database();
        // load model 
        $this->load->model('Faculty_Operation','faculty');
        $this->load->model('Admin_Operation','admin');
        //load library          
        $this->load->library('form_validation');
         // load session
         $this->load->library('session');
    }

    public function index()
    {
        $userid = $this->session->userdata('user_id');
        $prof['notification'] = $this->admin->getData("notification");
        $prof['profile'] = $this->admin->profile($userid);
        if($userid!="")
        {
            $this->load->view('Faculty/dashboard',$prof);
        }else{
            $this->session->sess_destroy();
            redirect('Locker/');
        }
    }

    // ajax fetch
    public function getSubjects()
    {
            $dt = $this->input->post("lid");
            $data = $this->admin->getDataId("subject","sem", $dt);
            echo json_encode($data);
    }

    public function getSubjectsCode()
    {
            $dt = $this->input->post("lid");
            $data = $this->admin->getDataId("subject","sub_id", $dt);
            echo json_encode($data);
    }

    // adding the form data in database
    public function addPaperEvaluvation()
    {
        $userid = $this->session->userdata('user_id');
        $prof['profile'] = $this->admin->profile($userid);
        $prof['notification'] = $this->admin->getData("notification");
        $prof['semister'] = $this->admin->getDistinctData("sem","subject");
        if(isset($_POST['workAdd']))
        {       
            $this->form_validation->set_rules("department", "department", "required");
            $this->form_validation->set_rules("year", "year", "required");
            $this->form_validation->set_rules("modeOfExam", "mode of exam", "required");
            $this->form_validation->set_rules("role", "Role", "required");
            $this->form_validation->set_rules("subject", "subject", "required");
            //$this->form_validation->set_rules("subjectcode", "subjectcode", "required");
            //$this->form_validation->set_rules("scriptdate", "scriptdate", "required");
            $this->form_validation->set_rules("givenscript", "givenscript", "required");
            $this->form_validation->set_rules("evaluvatedscript", "evaluvatedscript", "required");
            $this->form_validation->set_rules("comment", "comment", "required");
            //$this->form_validation->set_rules("qp", "qp", "required");
            // $this->form_validation->set_rules("scheme", "scheme", "required");
        if ($this->form_validation->run()) {
            $data = array(
                "wid" => "",
                "fid" => "1",
                "department" => $this->input->post("department"),
                "year" => $this->input->post("year"),
                "modeOfExam" => $this->input->post("modeOfExam"),
                "roleid" => $this->input->post("role"),
                "sub_id" => $this->input->post("subject"),
                "scriptDate" => $this->input->post("scriptdate"),
                "given_script" => $this->input->post("givenscript"),
                "scheme"=>"scheme",
                "question_paper"=>"question_paper",     
                "rate" => "30",
                "add_comment" => $this->input->post("comment"),
                "evaluvated_script" => $this->input->post("evaluvatedscript")
            );
              $this->faculty->data_Insertion("facultywork",$data);
                echo "<script>alert('Item Successfully Updated');</script>";
               $this->load->view('Faculty/addEvaluvation',$prof);
            }
        }else {
            // $this->marketing_executing_list();
            $this->load->view('Faculty/addEvaluvation',$prof);
         }
    }

    // public function viewPaperEvaluvation()
    // {
    //     $userid = $this->session->userdata('user_id');
    //     $data['profile'] = $this->admin->profile($userid);
    //     $data['notification'] = $this->admin->getData("notification");
    //     $data['evaluvation'] = $this->faculty->getData("evaluvation");
    //     $this->load->view('Faculty/viewEvaluation',$data);
    // }

    public function profile()
    {
        $userid = $this->session->userdata('user_id');
        $data['notification'] = $this->admin->getData("notification");
        $data['profile'] = $this->admin->profile($userid);
        $this->load->view('Faculty/profile', $data);
    }

    public function marketing_executing_list()
    {
        $data['notification'] = $this->admin->getData("notification");
        if (isset($_POST['search'])) {
            $select = $_POST['select'];
            $search = $this->input->post("src_data");
            $data['me'] = $this->Admin_Operation->getMe($select, $search);
            $this->load->view('Admin/marketing_executing_list', $data);
        } else {
            $data['me'] = $this->Admin_Operation->getMe("", "");
            $this->load->view('Admin/marketing_executing_list', $data);
        }
    }

    public function report()
    {
        $userid = $this->session->userdata('user_id');
        $prof['profile'] = $this->admin->profile($userid);
        $prof['notification'] = $this->admin->getData("notification");
        // load the methods of model
        $this->load->view('Faculty/report',$prof);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Locker/');
    }


}