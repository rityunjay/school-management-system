<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('teacher');
        $this->load->model('student'); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
        
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Load pagination library
        $this->load->library('pagination');
        
        // Per page limit
        $this->perPage = 12;
    }

    // teachers details
    public function dashboard(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['teacher'] = $this->teacher->getRows($con); 
            $data['title']  = 'Dashboard'; 
            // Pass the user data and load view 
            $this->load->view('teachers/header', $data); 
            $this->load->view('teachers/dashboard', $data); 
            $this->load->view('teachers/footer'); 
        }else{ 
            redirect('teachers/login'); 
        } 
    }

    //teachers details
    public function allteachers(){
        $data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        // If search request submitted
        if($this->input->post('submitSearch')){
            $inputKeywords = $this->input->post('searchKeyword');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }elseif($this->input->post('submitSearchReset')){
            $this->session->unset_userdata('searchKeyword');
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        
        // Get rows count
        $conditions['searchKeyword'] = $data['searchKeyword'];
        $conditions['returnType']    = 'count';
        $rowsCount = $this->teacher->getRows($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'teachers/index/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $rowsCount;
        $config['per_page']    = $this->perPage;
        $config['attributes'] = array('class' => 'page-link');

        $config['num_tag_open'] = '<li class="page-item">'; 
        $config['num_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0);" class="page-link">'; 
        $config['cur_tag_close'] = '</a></li>'; 
        $config['next_link'] = '<i class="icon-arrow-right"></i>'; 
        $config['prev_link'] = '<i class="icon-arrow-left"></i>'; 
        $config['next_tag_open'] = '<li class="page-item">'; 
        $config['next_tag_close'] = '</li>'; 
        $config['prev_tag_open'] = '<li class="page-item">'; 
        $config['prev_tag_close'] = '</li>'; 
        $config['first_tag_open'] = '<li class="page-item">'; 
        $config['first_tag_close'] = '</li>'; 
        $config['last_tag_open'] = '<li class="page-item">'; 
        $config['last_tag_close'] = '</li>';
        
        // Initialize pagination library
        $this->pagination->initialize($config);
        
        // Define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        
        // Get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //$data["links"] = explode('&nbsp;',$str_links );
        $data['teacher'] = $this->teacher->getRows($conditions);
        $data['title'] = 'Teacher List';
        
        // Load the list page view 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['teacher'] = $this->teacher->getRows($con); 
            $this->load->view('teachers/header', $data);
            $this->load->view('teachers/allteachers', $data);
            $this->load->view('teachers/footer');
        }
    }

    //add teacher
    public function addteacher(){
        $data = array();
        $memData = array();
        
        // If add request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('first_name', 'first name', 'required');
            $this->form_validation->set_rules('last_name', 'last name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');
            //$this->form_validation->set_rules('gender', 'gender', 'required');
            //$this->form_validation->set_rules('country', 'country', 'required');
            
            // Prepare member data
            $memData = array(
                'first_name'=> $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'role' => 2,
                'status' => 1
                //'gender'    => $this->input->post('gender'),
                //'country'   => $this->input->post('country')
            );

            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert member data
                $teacher = $this->teacher->insertTeacher($memData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Member has been added successfully.');
                    redirect('members');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                    redirect('members/add');
                }
            }
        }
        
        $data['teacher'] = $memData;
        $data['title'] = 'Add Teacher';
        
        // Load the add page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['teacher'] = $this->teacher->getTeachersRows($con); 
            $this->load->view('teachers/header', $data);
            $this->load->view('teachers/add-edit', $data);
            $this->load->view('teachers/footer');
        }
    }

    //login for all teachers role
    public function login(){ 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required');
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')),
                        'status' => 1 
                    ) 
                ); 
                $checkLogin = $this->teacher->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect('teachers/dashboard/'); 
                }else{ 
                    $data['error_msg'] = 'Wrong Email or Password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('teachers/login', $data); 
        //$this->load->view('elements/footer'); 
    }
    
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('teachers/login/'); 
    } 


    /* students list */
    public function allstudents(){
        $data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        // If search request submitted
        if($this->input->post('submitSearch')){
            $inputKeywords = $this->input->post('searchKeyword');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }elseif($this->input->post('submitSearchReset')){
            $this->session->unset_userdata('searchKeyword');
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        
        // Get rows count
        $conditions['searchKeyword'] = $data['searchKeyword'];
        $conditions['returnType']    = 'count';
        $rowsCount = $this->student->getRows($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'teachers/allstudents/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $rowsCount;
        $config['per_page']    = $this->perPage;
        $config['attributes'] = array('class' => 'page-link');

        $config['num_tag_open'] = '<li class="page-item">'; 
        $config['num_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0);" class="page-link">'; 
        $config['cur_tag_close'] = '</a></li>'; 
        $config['next_link'] = '<i class="icon-arrow-right"></i>'; 
        $config['prev_link'] = '<i class="icon-arrow-left"></i>'; 
        $config['next_tag_open'] = '<li class="page-item">'; 
        $config['next_tag_close'] = '</li>'; 
        $config['prev_tag_open'] = '<li class="page-item">'; 
        $config['prev_tag_close'] = '</li>'; 
        $config['first_tag_open'] = '<li class="page-item">'; 
        $config['first_tag_close'] = '</li>'; 
        $config['last_tag_open'] = '<li class="page-item">'; 
        $config['last_tag_close'] = '</li>';
        
        // Initialize pagination library
        $this->pagination->initialize($config);
        
        // Define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        
        // Get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //$data["links"] = explode('&nbsp;',$str_links );
        $data['stds'] = $this->student->getRows($conditions);
        $data['title'] = 'Students List';
        
        // Load the list page view 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['teacher'] = $this->teacher->getRows($con); 
            $this->load->view('teachers/header', $data);
            $this->load->view('teachers/allStudents', $data);
            $this->load->view('teachers/footer');
        }
    }

    /* student-profile */
    public function studentProfile($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['stds'] = $this->student->getRows(array('id' => $id));;
            $data['title']  = 'User Profile';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['teacher'] = $this->teacher->getRows($con); 
                $this->load->view('teachers/header', $data);
                $this->load->view('teachers/studentProfile', $data);
                $this->load->view('teachers/footer');
            }
        }else{
            redirect('teachers');
        }
    }

}