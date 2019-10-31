<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('student');
        //$this->load->model('member'); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
        
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Load pagination library
        $this->load->library('pagination');
        
        // Per page limit
        $this->perPage = 5;
    }

    // teachers details
    public function dashboard(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->student->getRows($con); 
            $data['title']  = 'Dashboard'; 
            // Pass the user data and load view 
            $this->load->view('student/header', $data); 
            $this->load->view('student/dashboard', $data); 
            $this->load->view('student/footer'); 
        }else{ 
            redirect('studend/login'); 
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
                $checkLogin = $this->student->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect('students/dashboard/'); 
                }else{ 
                    $data['error_msg'] = 'Wrong Email or Password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('student/login', $data); 
        //$this->load->view('elements/footer'); 
    }
    
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('student/login/'); 
    } 

    public function registration(){ 
        $data = $userData = array(); 
         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[password]'); 
            $this->form_validation->set_rules('terms', 'Terms & conditions', 'required');
 
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'terms' => strip_tags($this->input->post('terms'))
                //'gender' => $this->input->post('gender'), 
                //'phone' => strip_tags($this->input->post('phone')) 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->student->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('users/login'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['student'] = $userData; 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('student/registration', $data); 
        //$this->load->view('elements/footer'); 
    } 
     
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->student->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 

    public function block($id){ 
        // Check whether gallery id is not empty 
        if($id){ 
            // Update gallery status 
            $data = array('status' => 0); 
            $update = $this->student->updateStudent($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'User has been blocked successfully.'); 
                redirect('/principals/allstudents/');
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
                redirect('/principals/allstudents/');
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function unblock($id){ 
        // Check whether gallery id is not empty 
        if($id){ 
            // Update gallery status 
            $data = array('status' => 1); 
            $update = $this->student->updateStudent($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'User has been activated successfully.');
                redirect('/principals/allstudents/'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                redirect('/principals/allstudents/'); 
            } 
        } 
 
        redirect($this->controller); 
    } 

    /* delete Subject record */
    public function deleteStudentRecord($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->student->deleteStudent($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Student data has been removed successfully.');
                redirect('/principals/allstudents/'); 
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
                redirect('/principals/allstudents/'); 
            }
        }
        
        // Redirect to the list page
        redirect('principals/manageSection');
    }

}