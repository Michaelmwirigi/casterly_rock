<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	var $cart;
	var $cart2;
	function __construct()
	{
		parent:: __construct();
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$data['cart'] = $this->create_cart();
		$data['cart2'] = $this->create_full_cart();
		//echo "<pre>";print_r($user_id);die();
		$this->load->view('home', $data);
		$this->load->model('user_model');

	}

	function create_cart()
	{
		$user = $this->session->userdata('user_id');
		if ($user != NULL) {
			$data = $this->user_model->show_from_cart($user);
			foreach ($data as $key => $value) {
				$this->cart .= '<form class="item" action="welcome/remove_from_cart" method="post" enctype="multipart/form-data">
				<div class="header">'.$value["quantity"].' '.$value["ProdName"].
				'<input type="hidden" name="cartid" value="'.$value["cartid"].'">'
				.'<div class="ui right floated tiny buttons">
				  <a class="ui orange button edit_cart">Change</a>
				  <div class="or"></div>
				  <button type="submit" class="ui red button">Remove</button>
				</div></div></form>';
			}
		} else {
			$this->cart = '<div class="item"><p class="left floated header">No item in the Cart</p></div>';
		}
		// echo "<pre>";print_r($this->cart);die();
		return $this->cart;
	}

	function create_full_cart()
	{
		$user = $this->session->userdata('user_id');
		if ($user != NULL) {
			$data = $this->user_model->show_from_cart($user);
			foreach ($data as $key => $value) {
				$cart_id=$value["cartid"];

				$this->cart2 .= '<form class="ui horizontal list cart_list" action="welcome/edit_cart" method="post" enctype="multipart/form-data">

      <span class="item c_name">
        <select class="ui dropdown" name="product" >
          <option value="">What would yu like to eat</option>
          <option value="1">Chicken Wings</option>
          <option value="2">Drum sticks</option>
          <option value="3">Pork Chops</option>
        </select>
      </span>
      <span class="item c_location">
        <select class="ui dropdown" name="location">
          <option value="">Choose Your Location</option>
          <option value="madaraka">Madaraka</option>
          <option value="cbd">CBD</option>
          <option value="westlands">Westlands</option>
        </select>
      </span>
      
      <span class="item c_quantitiy">
      <select class="ui admin dropdown" name="quantity">
        <option value="">No of pieces</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>
      </span>
      <input type="hidden" name="cartid" value="'.$cart_id.'">
      <a class="item c_save">
        <button class="ui labeled icon orange button" type="submit">Save<i class="save icon"></i></button>
      </a>
    </form>';
			}
		} else {
			$this->cart2 = '<div class="item"><p class="left floated header">No item to change in the Cart</p></div>';
		}
		// echo "<pre>";print_r($this->cart);die();
		return $this->cart2;
	}
	
	public function login()
	{
	  $email=$this->input->post('email');
	  $password=md5($this->input->post('pass'));

	  $result=$this->user_model->login($email,$password);
	  if($result){
	  	redirect('welcome');
	  }
	  else{
	  	redirect('welcome');
	  }
	}

	public function welcome()
	{
	  // $data['title']= 'Welcome';
	  // $this->load->view('header_view',$data);
	  // $this->load->view('welcome_view.php', $data);
	  // $this->load->view('footer_view',$data);
	}

	 public function registration()
	{
	  //$this->load->library('form_validation');
	  // field name, error message, validation rules
		$insert = $this->user_model->add_user();

		if ($insert) {
			$id = mysql_insert_id();
			//$this->login();
			redirect('welcome');
		} else {
		print "Sign Up Failed";
		}
		
	  // $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[4]|xss_clean');
	  // $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	  // $this->form_validation->set_rules('tel', 'tel', 'trim|required');
	  // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
	  // $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

	  // if($this->form_validation->run() == FALSE)
	  // {
	  // 	$this->index2();
	  // 	$this->load->view('index');
	  	
	  // }
	  // else
	  // {
	  //  $this->user_model->add_user();
	  //  //$this->load->view('index');
	  //  //$this->index();
	   
	  // }
	}

	public function logout()
	{
	  $newdata = array(
	  'user_id'   => NULL,
	  'logged_in' => FALSE
	  );
	  $this->session->unset_userdata($newdata );
	  $this->session->sess_destroy();
	  //$this->index();
	  redirect('welcome');
	}

	public function add_to_cart()
	{
		$insert = $this->user_model->add_product_to_cart();

		if ($insert) {
			redirect('welcome');
		} else {
		print "Failed to add product";
		}
	}

	public function edit_cart()
	{
		$cartid=$this->input->post('cartid');
		$update = $this->user_model->edit_product_in_cart($cartid);

		if ($update) {
			redirect('welcome');
		} else {
		print "Failed to edit product";
		}
		return $cartid;
	}


	function remove_from_cart() {
		$cartid=$this->input->post('cartid');
		$customerid=$this->session->userdata('user_id');
		$this->user_model->delete_cart_entry($cartid,$customerid);
		redirect('welcome');
	}



	// public function remove_from_cart()
	// {
	//   $=$this->input->post('email');

	//   $result=$this->user_model->login($email,$password);
	//   if($result){
	//   	$this->index();
	//   }
	//   else{
	//   	$this->index();
	//   }
	// }


}	



