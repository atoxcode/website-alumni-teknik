<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class alumnilogin extends CI_Controller {	

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
		$this->load->view('login');
	}

	function login_act(){
		$this->load->database();
		$this->form_validation->set_rules('uname','Username','required');
		$this->form_validation->set_rules('pass','Password','required');
		if($this->form_validation->run() != true){
			$this->load->view('login');
		}else{
			$uname = $this->input->post('uname');
			$pass = md5($this->input->post('pass'));
			$where = array(
				'user_login' => $uname,
				'user_pass' => $pass
				);
			$data = $this->m_dah->edit_data($where,'tbl_user');
			if($data->num_rows() > 0){
				$mydata = $data->row();
				$session = array(
					'id' => $mydata->user_id,
					'username' => $mydata->user_login,
					'name' => $mydata->user_name,
					'level' => $mydata->user_level,
					'status' => 'login',
					);
				$this->session->set_userdata($session);
				redirect('admin');
			}else{
				redirect(base_url().'alumnilogin/?alert=login-failed');
			}
		}
	}
}