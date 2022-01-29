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
            $this->form_validation->set_rules("scriptdate", "scriptdate", "required");
            // $this->form_validation->set_rules("givenscript", "givenscript", "required");
            // $this->form_validation->set_rules("evaluvatedscript", "evaluvatedscript", "required");
            $this->form_validation->set_rules("comment", "comment", "required");
            //$this->form_validation->set_rules("qp", "qp", "required");
            // $this->form_validation->set_rules("scheme", "scheme", "required");
        if ($this->form_validation->run()) {
            $qp = $this->uploadDoc("assets/images/questionpaper/",'qp');
            $scheme = $this->uploadDoc("assets/images/document/schema/",'scheme');
            $data = array(
                "wid" => "",
                "fid" => $userid,
                "department" => $this->input->post("department"),
                "year" => $this->input->post("year"),
                "modeOfExam" => $this->input->post("modeOfExam"),
                "roleid" => $this->input->post("role"),
                "sub_id" => $this->input->post("subject"),
                "scriptDate" => $this->input->post("scriptdate"),
                "given_script" => $this->input->post("givenscript"),    
                "rate" => "30",
                "add_comment" => $this->input->post("comment"),
                "evaluvated_script" => $this->input->post("evaluvatedscript"),
                "status" => 0
            );
             // setting target path to image
             if($qp['raw_name']!="")
             {
                $image_path = $qp;
             }else{
                $image_path="-";
             }
             $data['question_paper'] = $image_path;
             if($scheme['raw_name']!="")
             {
                $image_path1 = $scheme;
             }else{
                $image_path1="-";
             }
             $data['scheme'] = $image_path1;

              $this->faculty->data_Insertion("facultywork",$data);
                echo "<script>alert('Item Successfully Updated');</script>";
               $this->load->view('Faculty/addEvaluvation',$prof);
            }
        }else {
            // $this->marketing_executing_list();
            $this->load->view('Faculty/addEvaluvation',$prof);
         }
    }

    public function viewPaperEvaluvation()
    {
        $userid = $this->session->userdata('user_id');
        $data['profile'] = $this->admin->profile($userid);
        $data['notification'] = $this->admin->getData("notification");
        $data['evaluvation'] = $this->faculty->getWorkData($userid);
        $this->load->view('Faculty/viewEvaluation',$data);
    }

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
    
    public function uploadDoc($path,$name)
    {
        $config = [
            'upload_path' =>'./assets/images/',
            'allowed_types' => 'gif|jpg|jpeg|png|pdf|doc',
        ];
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_Upload($name);
        $image = $this->upload->data();
        return base_url($path.$image['raw_name'].$image['file_ext']);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Locker/');
    }


}