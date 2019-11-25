<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organisations extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('organisation');
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
            $data['orgs'] = $this->organisation->getRows($con); 
            $data['title']  = 'Dashboard'; 
            // Pass the user data and load view 
            $this->load->view('organisation/header', $data); 
            $this->load->view('organisation/dashboard', $data); 
            $this->load->view('organisation/footer'); 
        }else{ 
            redirect('organisations/login'); 
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
                $checkLogin = $this->organisation->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect('organisations/dashboard/');
                }else{ 
                    $data['error_msg'] = 'Wrong Email or Password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('organisation/login', $data); 
        //$this->load->view('elements/footer'); 
    }
    
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('organisations/login/'); 
    } 

    public function registration(){ 
        $data = $userData = array(); 
         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('orgName', 'Organisation Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[password]');

            $userData = array( 
                'orgName' => strip_tags($this->input->post('orgName')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')),
                'status' => 1
                
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->organisation->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.');
                    redirect('organisations/login'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['org'] = $userData; 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('organisation/registration', $data); 
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
        $checkEmail = $this->organisation->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 

    /* teachert-profile */
    public function profile($id){
        $data = array();
       // $conditions['returnType'] = '';
        
        // Get member data
        $memData = $this->organisation->getRows(array('id' => $id));
        //$data['query'] = $this->principal->getParent(array('pid' => $id));
        $data['title']  = 'User Profile';


        // If update request is submitted
        if($this->input->post('updateProfile')){
            // Form field validation rules
            $this->form_validation->set_rules('orgName', 'Organisation Name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            
            
        if($_FILES['userfile']['name']!=""){
            $config['upload_path'] = './assets/images/faces/organisation';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
                // Prepare member data
                $memData = array(
                    'orgName'    => strip_tags($this->input->post('orgName')),
                    'nickName'   => strip_tags($this->input->post('nickName')),
                    'email'      => strip_tags($this->input->post('email')),
                    'mobile'     => strip_tags($this->input->post('mobile')),
                    'address'    => strip_tags($this->input->post('address')),
                    'profilePic' => strip_tags($post_image)
                );
            }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
                //$post_image = $data['userfile'];
                // Prepare member data
                $memData = array(
                    'orgName'    => strip_tags($this->input->post('orgName')),
                    'nickName'   => strip_tags($this->input->post('nickName')),
                    'email'      => strip_tags($this->input->post('email')),
                    'mobile'     => strip_tags($this->input->post('mobile')),
                    'address'    => strip_tags($this->input->post('address')),
                    'profilePic' => strip_tags($post_image)
                );
            }
        }else{
            $post_image = strip_tags($this->input->post('old'));
            $memData = array(
                'orgName'    => strip_tags($this->input->post('orgName')),
                'nickName'   => strip_tags($this->input->post('nickName')),
                'email'      => strip_tags($this->input->post('email')),
                'mobile'     => strip_tags($this->input->post('mobile')),
                'address'    => strip_tags($this->input->post('address')),
                'profilePic' => strip_tags($post_image)
            );
        }

            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->organisation->updateProfile($memData, $id);
                //$qry = $this->principal->insertParent($perData);

                if($update){
                    $this->session->set_userdata('update_msg', 'Member has been updated successfully.');
                    redirect('/organisations/profile/'.$id);
                }else{
                    $data['update_error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        // parent detail update
        // If update request is submitted
        if($this->input->post('submit')){
            // Form field validation rules
            $this->form_validation->set_rules('fatherName', 'Father Name', 'required');
            $this->form_validation->set_rules('motherName', 'Mother Name', 'required');
            $this->form_validation->set_rules('fatherEmail', 'Father Email', 'required|valid_email');
            $perData = array(
                'fatherName'  => strip_tags($this->input->post('fatherName')),
                'motherName'  => strip_tags($this->input->post('motherName')),
                'fatherEmail'  => strip_tags($this->input->post('fatherEmail')),
                'fatherOccupation'  => strip_tags($this->input->post('fatherOccupation')),
                'fatherMobile'  => strip_tags($this->input->post('fatherMobile')),
                'motherOccupation'  => strip_tags($this->input->post('motherOccupation')),
                'address'  => strip_tags($this->input->post('address'))
            );
        }   
        // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                //$update = $this->principal->updateProfile($memData, $id);
                $update = $this->organisation->updateProfile($perData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Member has been updated successfully.');
                    //redirect('/principals/profile/'.$pid);
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }

        $data['member'] = $memData;
        $data['title'] = 'Update Member';
        
        // Load the edit page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['orgs'] = $this->organisation->getRows($con); 
            $this->load->view('organisation/header', $data);
            $this->load->view('organisation/profile', $data);
            $this->load->view('organisation/footer');
        }




    }
    

}