<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('member');
        $this->load->model('user'); 
         
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
        $rowsCount = $this->member->getRows($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'members/index/';
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
        $data['members'] = $this->member->getRows($conditions);
        $data['title'] = 'Members List';
        
        // Load the list page view 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['user'] = $this->user->getRows($con); 
            $this->load->view('elements/header', $data);
            $this->load->view('members/index', $data);
            $this->load->view('elements/footer');
        }
    }

    public function view($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['member'] = $this->member->getRows(array('id' => $id));;
            $data['title']  = 'Member Details';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['user'] = $this->user->getRows($con); 
                $this->load->view('elements/header', $data);
                $this->load->view('members/view', $data);
                $this->load->view('elements/footer');
            }
        }else{
            redirect('members');
        }
    }

    
    /*public function add(){
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
                'password' => md5($this->input->post('password'))
                //'gender'    => $this->input->post('gender'),
                //'country'   => $this->input->post('country')
            );

            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert member data
                $insert = $this->member->insert($memData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Member has been added successfully.');
                    redirect('members');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                    redirect('members/add');
                }
            }
        }
        
        $data['member'] = $memData;
        $data['title'] = 'Add Member';
        
        // Load the add page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['user'] = $this->user->getRows($con); 
            $this->load->view('elements/header', $data);
            $this->load->view('members/add-edit', $data);
            $this->load->view('elements/footer');
        }
    }*/
    
    // Existing email check during validation 
    /*public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->user->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } */

    public function edit($id){
        $data = array();
        
        // Get member data
        $memData = $this->member->getRows(array('id' => $id));

        
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('first_name', 'first name', 'required');
            $this->form_validation->set_rules('last_name', 'last name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('country', 'country', 'required');

            $config['upload_path'] = './assets/images/faces';
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
                    'first_name'=> $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email'     => $this->input->post('email'),
                    'country'   => $this->input->post('country'),
                    'memberPic' => $post_image

                );
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
                //$post_image = $data['userfile'];
                // Prepare member data
                $memData = array(
                    'first_name'=> $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email'     => $this->input->post('email'),
                    'country'   => $this->input->post('country'),
                    'memberPic' => $this->input->post('post_image')

                );
            }


            // Prepare member data
            /*$memData = array(
                'first_name'=> $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email'     => $this->input->post('email'),
                'country'   => $this->input->post('country'),
                'memberPic' => $post_image

            );*/
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->member->update($memData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Member has been updated successfully.');
                    redirect('/members/profile/'.$id);
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['member'] = $memData;
        $data['title'] = 'Update Member';
        
        // Load the edit page view
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
                ); 
            $data['member'] = $this->member->getMember($con); 
            $this->load->view('members/header', $data);
            $this->load->view('members/profile', $data);
            $this->load->view('members/footer');
        }
    }
    
    public function delete($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->member->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Member has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('members');
    }


    public function dashboard(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['member'] = $this->member->getMember($con); 
            $data['title']  = 'Dashboard'; 
            // Pass the user data and load view 
            $this->load->view('members/header', $data); 
            $this->load->view('members/dashboard', $data); 
            $this->load->view('members/footer'); 
        }else{ 
            redirect('members/login'); 
        } 
    }
    public function principaldashboard(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['member'] = $this->member->getMember($con); 
            $data['title']  = 'Dashboard'; 
            // Pass the user data and load view 
            $this->load->view('principal/header', $data); 
            $this->load->view('principal/dashboard', $data); 
            $this->load->view('principal/footer'); 
        }else{ 
            redirect('members/login'); 
        } 
    }

    public function profile($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['member'] = $this->member->getRows(array('id' => $id));;
            $data['title']  = 'User Profile';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['user'] = $this->user->getRows($con); 
                $this->load->view('members/header', $data);
                $this->load->view('members/profile', $data);
                $this->load->view('members/footer');
            }
        }else{
            redirect('members');
        }
    }

    public function editProfile($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['member'] = $this->member->getRows(array('id' => $id));;
            $data['title']  = 'Edit Profile';
            
            // Load the details page view
            if($this->isUserLoggedIn){ 
                $con = array( 
                    'id' => $this->session->userdata('userId') 
                    ); 
                $data['user'] = $this->user->getRows($con); 
                $this->load->view('members/header', $data);
                $this->load->view('members/edit-profile', $data);
                $this->load->view('members/footer');
            }
        }else{
            redirect('members');
        }
    }

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
            $this->form_validation->set_rules('role', 'role', 'required');
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')), 
                        'role' => $this->input->post('role'),
                        'status' => 1 
                    ) 
                ); 
                $checkLogin = $this->member->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    if ($this->input->post('role') == 1) {
                        redirect('members/principaldashboard/'); 
                    }elseif ($this->input->post('role') == 2) {
                        redirect('members/dashboard/'); 
                    }else{
                        redirect('members/dashboard/');
                    }
                    //redirect('members/dashboard/'); 
                }else{ 
                    $data['error_msg'] = 'Wrong Email or Password and Role, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
        //$this->load->view('elements/header', $data); 
        $this->load->view('members/login', $data); 
        //$this->load->view('elements/footer'); 
    }
    
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('members/login/'); 
    } 



public function picupdate($id)
{
    $data = array();
        
        // Get member data
        $user = $this->member->getRows(array('id' => $id));

    $this->load->model('member','userdata');
    $res = $this->userdata->update_user_detail();
    if($res>0){
        $this->session->set_flashdata('msg',"successfully");
        $this->session->set_flashdata('msg_class','alert-success');
    }else{
        $this->session->set_flashdata('msg',"error");
        $this->session->set_flashdata('msg_class','alert-danger');
    }
    return redirect('/members/profile/'. $member['id']);
}


}