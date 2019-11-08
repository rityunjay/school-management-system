<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('teacher');
        $this->load->model('student'); 
        $this->load->model('principal'); 
         
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

    /* teachert-profile */
    public function teacherProfile($id){
        /*$data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['teachs'] = $this->teacher->teacherProfile(array('id' => $id));;
            $data['title']  = 'User Profile';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['teacher'] = $this->teacher->getRows($con); 
                $this->load->view('teachers/header', $data);
                $this->load->view('teachers/teacherProfile', $data);
                $this->load->view('teachers/footer');
            }
        }else{
            redirect('teachers');
        }*/

        $data = $memData = array();
       // $conditions['returnType'] = '';
        
        // Get member data
        $data['teachs'] = $this->teacher->getRows(array('id' => $id));
        //$data['query'] = $this->principal->getParent(array('pid' => $id));
        $data['title']  = 'User Profile';


        // If update request is submitted
        if($this->input->post('updateProfile')){
            // Form field validation rules
            $this->form_validation->set_rules('first_name', 'first name', 'required');
            $this->form_validation->set_rules('last_name', 'last name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            
            
        if($_FILES['userfile']['name']!=""){
            $config['upload_path'] = './assets/images/faces/teacher';
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
                    'first_name'    => strip_tags($this->input->post('first_name')),
                    'last_name'     => strip_tags($this->input->post('last_name')),
                    'email'         => strip_tags($this->input->post('email')),
                    'mobile'        => strip_tags($this->input->post('mobile')),
                    'gender'        => strip_tags($this->input->post('gender')),
                    'mStatus'       => strip_tags($this->input->post('mStatus')),
                    'profilePic'    => strip_tags($post_image)
                );
            }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
                //$post_image = $data['userfile'];
                // Prepare member data
                $memData = array(
                    'first_name'  => strip_tags($this->input->post('first_name')),
                    'last_name'   => strip_tags($this->input->post('last_name')),
                    'email'       => strip_tags($this->input->post('email')),
                    'mobile'      => strip_tags($this->input->post('mobile')),
                    'gender'      => strip_tags($this->input->post('gender')),
                    'mStatus'     => strip_tags($this->input->post('mStatus')),
                    'profilePic'  => strip_tags($post_image)
                );
            }
        }else{
            $memData = array(
                'first_name'  => strip_tags($this->input->post('first_name')),
                'last_name'   => strip_tags($this->input->post('last_name')),
                'email'       => strip_tags($this->input->post('email')),
                'mobile'      => strip_tags($this->input->post('mobile')),
                'gender'      => strip_tags($this->input->post('gender')),
                'mStatus'     => strip_tags($this->input->post('mStatus')),
                'profilePic'  => strip_tags($this->input->post('old'))
            );
        }
            


            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->teacher->updateProfile($memData, $id);
                //$qry = $this->principal->insertParent($perData);

                if($update){
                    $this->session->set_userdata('update_msg', 'Member has been updated successfully.');
                    redirect('/teachers/teacherProfile/'.$id);
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
                $update = $this->teacher->updateProfile($perData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Member has been updated successfully.');
                    redirect('/teachers/teacherProfile/'.$id);
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
            $data['teacher'] = $this->teacher->getRows($con);  
            $this->load->view('teachers/header', $data);
            $this->load->view('teachers/teacherProfile', $data);
            $this->load->view('teachers/footer');
        }
    }

    // teachers details
    public function leaveCard(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['teacher'] = $this->teacher->getRows($con); 
            $data['title']  = 'Leave Card'; 
            // Pass the user data and load view 
            $this->load->view('teachers/header', $data); 
            $this->load->view('teachers/leaveCard', $data); 
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

    public function registration(){ 
        $data = $userData = array(); 

         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[password]'); 
           // $this->form_validation->set_rules('terms', 'Terms & conditions', 'required');
 
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                //'terms' => strip_tags($this->input->post('terms')),
                //'gender' => $this->input->post('gender'), 
                //'phone' => strip_tags($this->input->post('phone')) 
            ); 
 
            if($this->form_validation->run() == true){ 
                $teacher = $this->teacher->insertTeacher($userData);
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
        $data['teacher'] = $userData; 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('teachers/registration', $data); 
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
        $checkEmail = $this->teacher->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
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

    // teachers details
    public function sectionClass(){ 
        $data = $userData = array();
        $conditions['returnType'] = '';
        $data['title']  = 'Class & Section';

        $data['clst'] = $this->teacher->getRows($conditions);
        $data['cls'] = $this->principal->getClass($conditions);
        $data['sec'] = $this->principal->getSection($conditions);
        $data['sub'] = $this->principal->getSubject($conditions);


        // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['teacher'] = $this->teacher->getRows($con); 
                $this->load->view('teachers/header', $data);
                $this->load->view('teachers/sectionClass', $data);
                $this->load->view('teachers/footer');
            }
    }


    /******** Contact ******/
    public function contact(){
        $data = $formData = array();
        $data['title']  = 'Contact';
        
        // If contact request is submitted
        if($this->input->post('contactSubmit')){
            
            // Get the form data
            $formData = $this->input->post();
            
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                
                // Define email data
                $mailData = array(
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'subject' => $formData['subject'],
                    'message' => $formData['message']
                );
                
                // Send an email to the site admin
                $send = $this->sendEmail($mailData);
                
                // Check email sending status
                if($send){
                    // Unset form data
                    $formData = array();
                    
                    $data['status'] = array(
                        'type' => 'success',
                        'msg' => 'Your contact request has been submitted successfully.'
                    );
                }else{
                    $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Some problems occured, please try again.'
                    );
                }
            }
        }
        
        // Pass POST data to view
        $data['postData'] = $formData;
        
        // Pass the data to view
        
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['teacher'] = $this->teacher->getRows($con); 
            $this->load->view('teachers/header', $data);
            $this->load->view('teachers/contact/index', $data);
            $this->load->view('teachers/footer');
            }
    }
    
    private function sendEmail($mailData){
        // Load the email library
        $this->load->library('email');
        
        // Mail config
        $to = 'rityunjay@gmail.com';
        $from = 'noreply@bangaloredelight.com';
        $fromName = 'CodexWorld';
        $mailSubject = 'Contact Request Submitted by '.$mailData['name'];
        
        // Mail content
        $mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Subject: </b>'.$mailData['subject'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>
        ';
            
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        
        // Send email & return status
        return $this->email->send()?true:false;
    }

}