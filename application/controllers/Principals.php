<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principals extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('principal');
        $this->load->model('teacher'); 
        $this->load->model('student');
        //$this->load->model('attendance');
         
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

    //login for principal
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
                $checkLogin = $this->principal->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect('principals/dashboard/'); 
                }else{ 
                    $data['error_msg'] = 'Wrong Email or Password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('principal/login', $data); 
        //$this->load->view('elements/footer'); 
    }
    
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('principals/login/'); 
    } 
    
    // principal details
    public function dashboard(){ 
        $data = array(); 
        //$data['eventCalendar'] = $this->eventCalendar();

        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['principal'] = $this->principal->getRows($con); 
            $data['title']  = 'Dashboard'; 
            // Pass the user data and load view 
            $this->load->view('principal/header', $data); 
            $this->load->view('principal/dashboard', $data); 
            $this->load->view('principal/footer'); 
        }else{ 
            redirect('principal/login'); 
        } 
    }

    /*public function profile($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['principals'] = $this->principal->getRows(array('id' => $id));
            $data['title']  = 'User Profile';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['principal'] = $this->principal->getRows($con); 
                $this->load->view('principal/header', $data);
                $this->load->view('principal/profile', $data);
                $this->load->view('principal/footer');
            }
        }else{
            redirect('principals');
        }
    }*/

    /* teachert-profile */
    public function profile($id){
        $data = array();
       // $conditions['returnType'] = '';
        
        // Get member data
        $memData = $this->principal->getRows(array('id' => $id));
        $data['title']  = 'User Profile';
        
        
        // If update request is submitted
        if($this->input->post('updateProfile')){
            // Form field validation rules
            $this->form_validation->set_rules('first_name', 'first name', 'required');
            $this->form_validation->set_rules('last_name', 'last name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            //$this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
            //$this->form_validation->set_rules('gender', 'Gender', 'required');

            // Prepare member data
            $memData = array(
                'first_name'=> $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email'     => $this->input->post('email'),
                'mobile' => strip_tags($this->input->post('mobile')),
                'gender' => strip_tags($this->input->post('gender')),
                'mStatus' => strip_tags($this->input->post('mStatus'))

            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->principal->updateProfile($memData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Profile has been updated successfully.');
                    redirect('/principals/profile/'.$id);
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['member'] = $memData;
        $data['title'] = 'Update Teacher';
        
        // Load the edit page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/profile', $data);
            $this->load->view('principal/footer');
        }
    }

    public function block($id){ 
        // Check whether gallery id is not empty 
        if($id){ 
            // Update gallery status 
            $data = array('status' => 0); 
            $update = $this->principal->update($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'User has been blocked successfully.'); 
                redirect('/principals/');
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
                redirect('/principals/');
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function unblock($id){ 
        // Check whether gallery id is not empty 
        if($id){ 
            // Update gallery status 
            $data = array('status' => 1); 
            $update = $this->principal->update($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'User has been activated successfully.');
                redirect('/principals/'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                redirect('/principals/'); 
            } 
        } 
 
        redirect($this->controller); 
    } 

    /* display all teacher */
    public function index(){
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
        $config['base_url']    = base_url().'principals/index/';
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
        $data['principals'] = $this->teacher->getRows($conditions);
        $data['title'] = 'Teacher&#39;s List';
        
        // Load the list page view 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/index', $data);
            $this->load->view('principal/footer');
        }
    }

    /* delete teacher record */
    public function deleteTeacherRecord($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->principal->deleteTeacher($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Member has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('principals');
    }

    /* add teacher Subject */
    public function addSubject(){ 
        $data = $userData = array(); 
        
        // If registration request is submitted 
        if($this->input->post('add')){ 
            $this->form_validation->set_rules('subjectName', 'Subject Name', 'required|callback_Subject_check');
            $this->form_validation->set_rules('tid', 'Teacher Name', 'required');
            //$this->form_validation->set_rules('subjectName', 'Subject Name', 'required'); 
 
            $userData = array( 
                'subjectName' => strip_tags($this->input->post('subjectName')),
                'user_id' => $this->session->userdata('userId'),
                'tid' => strip_tags($this->input->post('tid'))
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->principal->insertSubject($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('principals/addSubject'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                    //redirect('principals/addSubject'); 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
                //redirect('principals/addSubject'); 
            } 
        } 
         
        // Posted data 
        $data['principal'] = $userData;
        $data['title'] = 'Add Subject';


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
        $rowsCount = $this->principal->getSubject($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'principals/addSubject/';
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

        $data['clst'] = $this->teacher->getRows($conditions);
        $data['principals'] = $this->principal->getSubject($conditions);
         
        // Load the add page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/addSubject', $data);
            $this->load->view('principal/footer');
        }
    } 
  
     
     
    // Existing Subject check during validation 
    public function Subject_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'subjectName' => $str 
            ) 
        ); 
        $checkSubject = $this->principal->getSubject($con); 
        if($checkSubject > 0){ 
            $this->form_validation->set_message('Subject_check', 'The given Subject already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 

    /* delete Subject record */
    public function deleteSubjectRecord($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->principal->deleteSubject($id);

            // Get member data
            $memData = $this->teacher->getRows(array('id' => $id));
            $memData = array(
                    'subjectID'=> 0
                );
            $data['principal'] = $memData;
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Subject Data has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('principals/addSubject');
    }

   
    // attendance calender
    /* 
     * Generate calendar with events 
     */ 
    public function eventCalendar($year = '', $month = ''){ 
        $data = array(); 
         
        $dateYear = ($year != '')?$year:date("Y"); 
        $dateMonth = ($month != '')?$month:date("m"); 
        $date = $dateYear.'-'.$dateMonth.'-01'; 
        $currentMonthFirstDay = date("N", strtotime($date)); 
        $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear); 
        $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay); 
        $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42; 
         
        $con = array( 
            'where' => array( 
                'status' => 1 
            ), 
            'where_year' => $dateYear, 
            'where_month' => $dateMonth 
        ); 
        $data['events'] = $this->attendance->getGroupCount($con); 
         
        $data['calendar'] = array( 
            'dateYear' => $dateYear, 
            'dateMonth' => $dateMonth, 
            'date' => $date, 
            'currentMonthFirstDay' => $currentMonthFirstDay, 
            'totalDaysOfMonthDisplay' => $totalDaysOfMonthDisplay, 
            'boxDisplay' => $boxDisplay 
        ); 
         
        $data['monthOptions'] = $this->getMonths($dateMonth); 
        $data['yearOptions'] = $this->getYears($dateYear); 
 
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){ 
            $this->load->view('principal/studentAttendance', $data); 
        }else{ 
            return $this->load->view('principal/studentAttendance', $data, true); 
        } 
    } 
     
    /* 
     * Generate months options list for select box 
     */ 
    function getMonths($selected = ''){ 
        $options = ''; 
        for($i=1;$i<=12;$i++) 
        { 
            $value = ($i < 10)?'0'.$i:$i; 
            $selectedOpt = ($value == $selected)?'selected':''; 
            $options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>'; 
        } 
        return $options; 
    } 
    
    /* 
     * Generate years options list for select box 
     */ 
    function getYears($selected = ''){ 
        $options = ''; 
        for($i=2019;$i<=2025;$i++) 
        { 
            $selectedOpt = ($i == $selected)?'selected':''; 
            $options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>'; 
        } 
        return $options; 
    } 
    
    /* 
     * Generate events list in HTML format 
     */ 
    function getEvents($date = ''){ 
        $eventListHTML = ''; 
        $date = $date?$date:date("Y-m-d"); 
         
        // Fetch events based on the specific date 
        $con = array( 
            'where' => array( 
                'date' => $date, 
                'status' => 1 
            ) 
        ); 
        $events = $this->event->getRows($con); 
 
        if(!empty($events)){ 
            $eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>'; 
            $eventListHTML .= '<ul>'; 
            foreach($events as $row){  
                $eventListHTML .= '<li>'.$row['title'].'</li>'; 
            } 
            $eventListHTML .= '</ul>'; 
        } 
        echo $eventListHTML; 
    } 

    
    // students records
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
        $config['base_url']    = base_url().'principals/allstudents/';
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
        $data['principals'] = $this->student->getRows($conditions);
        $data['title'] = 'Student&#39;s List';
        
        // Load the list page view 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/allstudents', $data);
            $this->load->view('principal/footer');
        }
    }

    //add teacher
    /*public function addteacher(){
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
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/add-edit', $data);
            $this->load->view('principal/footer');
        }
    }*/

    public function addTeacher(){ 
        $data = $userData = array(); 
        $conditions['returnType'] = '';
        $data['principals'] = $this->principal->getSubject($conditions);

        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('subjectName', 'Subject Name', 'required');  
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[password]');
 
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'subjectName' => strip_tags($this->input->post('subjectName')),
                'password' => md5($this->input->post('password')),
                'status' => 1,
                'role' => 2
                //'gender' => $this->input->post('gender'), 
                //'phone' => strip_tags($this->input->post('phone')) 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->principal->insertTeacher($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('principals/index'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['principal'] = $userData;
        $data['title'] = 'Add Teacher'; 
         
        // Load the add page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/addTeacher', $data);
            $this->load->view('principal/footer');
        }
    } 
  
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->principal->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 


    public function editTeacher($id){
        $data = array();
        $conditions['returnType'] = '';
        $data['principals'] = $this->principal->getSubject($conditions);
        
        // Get member data
        $memData = $this->teacher->getRows(array('id' => $id));

        
        
        // If update request is submitted
        if($this->input->post('teacherUpdate')){
            // Form field validation rules
            $this->form_validation->set_rules('first_name', 'first name', 'required');
            $this->form_validation->set_rules('last_name', 'last name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('subjectName', 'subjectntion name', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            // Prepare member data
            $memData = array(
                'first_name'=> $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email'     => $this->input->post('email'),
                'subjectName' => strip_tags($this->input->post('subjectName')),
                'status' => strip_tags($this->input->post('status'))

            );
            $email =$this->input->post('email');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->principal->update($memData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Teacher '.$email.'  has been updated successfully.');
                    redirect('/principals/');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                    redirect('/principals/');
                }
            }
        }

        $data['member'] = $memData;
        $data['title'] = 'Update Teacher';
        
        // Load the edit page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['principal'] = $this->principal->getRows($con); 
            $this->load->view('principal/header', $data);
            $this->load->view('principal/editTeacher', $data);
            $this->load->view('principal/footer');
        }
    }

    /* teachert-profile */
    public function teacherProfile($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['teachs'] = $this->teacher->teacherProfile(array('id' => $id));
            $data['title']  = 'Teacher Profile';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['principal'] = $this->principal->getRows($con); 
                $this->load->view('principal/header', $data);
                $this->load->view('principal/teacherProfile', $data);
                $this->load->view('principal/footer');
            }
        }else{
            redirect('principals');
        }
    }

    /* manage-class */
    public function manageClass(){
        $data = $userData = array();
        $conditions['returnType'] = '';
        $data['title']  = 'Manage Class';

        $data['clst'] = $this->teacher->getRows($conditions);
        $data['cls'] = $this->principal->getClass($conditions);

        // If registration request is submitted 
        if($this->input->post('addClass')){ 
            $this->form_validation->set_rules('className', 'Class Name', 'required'); 
            $this->form_validation->set_rules('numericName', 'Numeric Name', 'required'); 
            $this->form_validation->set_rules('tid', 'Teacher Name', 'required');
 
            $userData = array( 
                'className' => strip_tags($this->input->post('className')), 
                'numericName' => strip_tags($this->input->post('numericName')), 
                'tid' => strip_tags($this->input->post('tid'))
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->principal->addClass($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('principals/manageClass'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['principal'] = $userData;

        // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['principal'] = $this->principal->getRows($con); 
                $this->load->view('principal/header', $data);
                $this->load->view('principal/manageClass', $data);
                $this->load->view('principal/footer');
            }
    }

    /* add-class */
    /*public function addClass(){
        $data = array();
        $conditions['returnType'] = '';
        $data['title']  = 'Manage Class';

        
        // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['principal'] = $this->principal->getRows($con); 
                $this->load->view('principal/header', $data);
                $this->load->view('principal/manageClass', $data);
                $this->load->view('principal/footer');
            }
    }*/

     /* delete Subject record */
    public function deleteClass($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->principal->deleteClass($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Class data has been removed successfully.');
                redirect('principals/manageClass'); 
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
                redirect('principals/manageClass'); 
            }
        }
        
        // Redirect to the list page
        redirect('principals/manageClass');
    }

    /* manage-class */
    public function manageSection(){
        $data = $userData = array();
        $conditions['returnType'] = '';
        $data['title']  = 'Manage Section';

        $data['clst'] = $this->teacher->getRows($conditions);
        $data['cls'] = $this->principal->getClass($conditions);
        $data['sec'] = $this->principal->getSection($conditions);
        $data['sub'] = $this->principal->getSubject($conditions);

        // If registration request is submitted 
        if($this->input->post('addSection')){ 
            $this->form_validation->set_rules('sectionName', 'Section Name', 'required'); 
            $this->form_validation->set_rules('nickName', 'Nick Name', 'required'); 
            $this->form_validation->set_rules('tid', 'Teacher Name', 'required');
            $this->form_validation->set_rules('cid', 'Class Name', 'required');
            $this->form_validation->set_rules('sid', 'Class Name', 'required');
 
            $userData = array( 
                'sectionName' => strip_tags($this->input->post('sectionName')), 
                'nickName' => strip_tags($this->input->post('nickName')), 
                'tid' => strip_tags($this->input->post('tid')),
                'cid' => strip_tags($this->input->post('cid')),
                'sid' => strip_tags($this->input->post('sid'))
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->principal->addSection($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('principals/manageSection'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['principal'] = $userData;

        // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['principal'] = $this->principal->getRows($con); 
                $this->load->view('principal/header', $data);
                $this->load->view('principal/manageSection', $data);
                $this->load->view('principal/footer');
            }
    }

    /* delete Subject record */
    public function deleteSection($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->principal->deleteSection($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Class data has been removed successfully.');
                redirect('principals/manageSection'); 
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
                redirect('principals/manageSection'); 
            }
        }
        
        // Redirect to the list page
        redirect('principals/addSubject');
    }

}