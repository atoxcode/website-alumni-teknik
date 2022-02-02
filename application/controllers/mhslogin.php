<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mhslogin extends CI_Controller {	

	function __construct(){
		parent::__construct();
		$this->load->model('m_dah');
		$this->load->helper('dah_helper');
		$this->load->library(array('session','form_validation'));
	}

	function index(){
		$this->load->database();
		$this->load->model('m_dah');
		$this->load->helper('dah_helper');
		$this->load->view('cms/login_mhs');
	}

	function login_act(){
		$this->load->database();
		$this->form_validation->set_rules('username','Username','required'); //input form, nama validasi jika tidak diinput
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() != true){
			$this->load->view('cms/signin_alumni');
		}else{
			$username = $this->input->post('username');
			$password= md5($this->input->post('password'));
			$where = array(
				'alumni_username' => $username,
				'alumni_password' => $password
				);
			$data = $this->m_dah->edit_data($where,'tbl_alumni');
			if($data->num_rows() > 0){
				$mydata = $data->row();
				$session = array(
					'id' => $mydata->alumni_id,
					'username' => $mydata->alumni_username,
					'name' => $mydata->alumni_nama,
					'nim' => $mydata->alumni_nim,
					//'level' => $mydata->user_level,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				redirect('index');
			}else{
				redirect(base_url().'mhslogin/?alert=login-failed');
			}
		}
	}
}