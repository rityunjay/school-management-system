<?php
	class Posts extends CI_Controller{
		function __construct() { 
	        parent::__construct(); 
	         
	        // Load form validation ibrary & user model  
	        //$this->load->model('user_model'); 
	         $this->load->library('session');
	        // User login status 
	        $this->isUserLoggedIn = $this->session->userdata('logged_in'); 
	    } 
		public function index($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'admin/posts/index/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 12;
			$config['uri_segment'] = 12;
			$config['attributes'] = array('class' => '');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'All Posts';

			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

			$userData = array();
	        if($this->isUserLoggedIn){
				$con = array( 
	            'id' => $this->session->userdata('userId') 
	        ); 
	        $userData['user_model'] = $this->user_model->getRows($con);
			$this->load->view('admin/templates/header', $userData);
			$this->load->view('admin/posts/index', $data);
			$this->load->view('admin/templates/footer');
			}
		}

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$userData = array();
	        if($this->isUserLoggedIn){
				$con = array( 
	            'id' => $this->session->userdata('userId') 
	        ); 
	        $userData['user_model'] = $this->user_model->getRows($con);
			$this->load->view('admin/templates/header', $userData);
			$this->load->view('admin/posts/view', $data);
			$this->load->view('admin/templates/footer');
			}
		}

		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Create Post';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$userData = array();
		        if($this->isUserLoggedIn){
					$con = array( 
		            'id' => $this->session->userdata('userId') 
		        ); 
		        $userData['user_model'] = $this->user_model->getRows($con);
				$this->load->view('admin/templates/header', $userData);
				$this->load->view('admin/posts/create', $data);
				$this->load->view('admin/templates/footer');
				}
			} else {
				// Upload Image
				/*$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';*/

				$config = array(
					'upload_path' => "./assets/images/posts/",
					'allowed_types' => "gif|jpg|png|jpeg",
					'overwrite' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
					'max_height' => "2000",
					'max_width' => "2000"
				);

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);

				// Set message
				$this->session->set_flashdata('post_created', 'Your post has been created');

				redirect('admin/posts/');
			}
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('admin/users/login');
			}

			$this->post_model->delete_post($id);

			// Set message
			$this->session->set_flashdata('post_deleted', 'Your post has been deleted');

			redirect('admin/posts');
		}

		public function edit($slug){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('admin/users/login');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			// Check user
			if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
				redirect('posts');

			}

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Post';

			$userData = array();
	        if($this->isUserLoggedIn){
				$con = array( 
	            'id' => $this->session->userdata('userId') 
	        ); 
	        $userData['user_model'] = $this->user_model->getRows($con);
			$this->load->view('admin/templates/header', $userData);
			$this->load->view('admin/posts/edit', $data);
			$this->load->view('admin/templates/footer');
			}else{ 
	            redirect('admin/users/login'); 
	        }
		}

		public function deletePost($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$userData = array();
	        if($this->isUserLoggedIn){
				$con = array( 
	            'id' => $this->session->userdata('userId') 
	        ); 
	        $userData['user_model'] = $this->user_model->getRows($con);
			$this->load->view('admin/templates/header', $userData);
			$this->load->view('admin/posts/delete', $data);
			$this->load->view('admin/templates/footer');
			}
		}

		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('admin/users/login');
			}

			$this->post_model->update_post();

			// Set message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('admin/posts');
		}
	}