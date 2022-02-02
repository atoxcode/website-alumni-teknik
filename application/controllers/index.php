<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'user_agent'));
		$this->load->helper(array('url','dah_helper'));
		$this->load->model('m_dah');
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url());
		// }
	}

	public function index(){
		$this->load->database();
		// $data['slider'] = $this->m_dah->get_data_order('asc','slider_sort','tbl_slider')->result();
		$data['posts'] = $this->db->query("SELECT * FROM tbl_post WHERE post_status='Publish' ORDER BY post_id DESC LIMIT 6" )->result();
		$data['headline1']=$this->db->query("SELECT * FROM tbl_headline WHERE headline_id = '1' ")->result();
		$data['headline2']=$this->db->query("SELECT * FROM tbl_headline WHERE headline_id = '2' ")->result();
		$this->load->view('cms/header');
		$this->load->view('cms/index', $data);
		$this->load->view('cms/footer');
	}

	public function register(){
		//$this->load->database();
		$this->load->view('cms/header');
		$this->load->view('cms/register');
		$this->load->view('cms/footer');
	}

	public function signin_alumni(){
		//$this->load->database();
		$this->load->view('cms/header');
		$this->load->view('cms/signin_alumni');
		$this->load->view('cms/footer');
	}

	public function signout_alumni(){
		$this->load->view('cms/header');
		$this->load->view('cms/signout_alumni');
		$this->load->view('cms/footer');
	}

	function signout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	function register_act(){
		$this->load->database();
		$jurusan = $this->input->post('alumni_jurusan');
		$nama = $this->input->post('alumni_nama');
		$nim = $this->input->post('alumni_nim');
		$jk = $this->input->post('alumni_jk');
		$masuk = $this->input->post('alumni_masuk_tahun');
		$lulus = $this->input->post('alumni_lulus_tahun');
		$alamat = $this->input->post('alumni_alamat');
		$email = $this->input->post('alumni_email');
		$sosmed = $this->input->post('alumni_sosmed');
		$hp = $this->input->post('alumni_ponsel');
		$kerja = $this->input->post('alumni_kerja');
		$instansi = $this->input->post('alumni_instansi');
		$alamatkantor = $this->input->post('alumni_alamatkantor');
		$telpkantor = $this->input->post('alumni_telpkantor');
		$skill = $this->input->post('alumni_skill');
		$tga = $this->input->post('alumni_tga');
		$website = $this->input->post('alumni_web');
		$username = $this->input->post('alumni_username');
		$password = md5($this->input->post('alumni_password'));

		$this->form_validation->set_rules('alumni_nama','Nama','required');

		if($this->form_validation->run() != true){
			$this->load->view('cms/header');
			$this->load->view('cms/register');
			$this->load->view('cms/footer');
		}else{

			if($_FILES['alumni_foto']['name'] == ""){
				$data = array(
					'alumni_jurusan' => $jurusan,
					'alumni_nama' => $nama,
					'alumni_nim' => $nim,
					'alumni_jk' => $jk,
					'alumni_masuk' => $masuk,
					'alumni_lulus' => $lulus,
					'alumni_alamat' => $alamat,
					'alumni_email' => $email,
					'alumni_sosmed' => $sosmed,
					'alumni_hp' => $hp,
					'alumni_kerja' => $kerja,
					'alumni_instansi' => $instansi,
					'alumni_alamatkantor' => $alamatkantor,
					'alumni_telpkantor' => $telpkantor,
					'alumni_skill' => $skill,
					'alumni_tga' => $tga,
					'alumni_website' => $website,
					'alumni_username' => $username,
					'alumni_password' => $password,
					'alumni_status' => 'nonaktif'  
				);
				$this->m_dah->insert_data($data,'tbl_alumni');
				redirect(base_url().'index/register_berhasil');
			}else{
				$rand = rand();
				$config['upload_path'] = './image/alumni/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = rand();
				$this->load->library('upload', $config);

				if($this->upload->do_upload('alumni_foto')){
				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];

				$data = array(
					'alumni_jurusan' => $jurusan,
					'alumni_nama' => $nama,
					'alumni_nim' => $nim,
					'alumni_foto' => $file_name,
					'alumni_jk' => $jk,
					'alumni_masuk' => $masuk,
					'alumni_lulus' => $lulus,
					'alumni_alamat' => $alamat,
					'alumni_email' => $email,
					'alumni_sosmed' => $sosmed,
					'alumni_hp' => $hp,
					'alumni_kerja' => $kerja,
					'alumni_instansi' => $instansi,
					'alumni_alamatkantor' => $alamatkantor,
					'alumni_telpkantor' => $telpkantor,
					'alumni_skill' => $skill,
					'alumni_tga' => $tga,
					'alumni_website' => $website,
					'alumni_username' => $username,
					'alumni_password' => $password,
					'alumni_status' => 'nonaktif' 
				);
				$this->m_dah->insert_data($data,'tbl_alumni');
				redirect(base_url().'index/register_berhasil');
				}
			}
		}
	}

	public function register_berhasil(){
		$this->load->view('cms/header');
		$this->load->view('cms/register_berhasil');
		$this->load->view('cms/footer');
	}

	function register_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('index/register_edit');
		}else{			
			$where = array(
				'alumni_nim' => $id
				);	
		$data['register_edit'] = $this->m_dah->edit_data($where,'tbl_alumni')->result();
		$this->load->view('cms/header');
		$this->load->view('cms/register_edit', $data);
		$this->load->view('cms/footer');
		}
	}


	public function aduan(){
		$this->load->view('cms/header');
		$this->load->view('cms/aduan');
		$this->load->view('cms/footer');
	}

	function pengaduan_act(){
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules('pengaduan', 'Pengaduan', 'required');

		$pengaduan = $this->input->post('pengaduan');
		$nama = $this->input->post('nama');
		if ($this->form_validation->run() == false){
			$this->load->view('cms/header');
			$this->load->view('cms/aduan');
			$this->load->view('cms/footer');
		}else{
			if($nama == ""){
				$nama = "Anonymous";
			}

			$data = array(
				'pengaduan_nama' => $nama,
				'pengaduan' => $pengaduan,
				'pengaduan_tgl' => date('Y-m-d')
				);
			$this->m_dah->insert_data($data,'tbl_pengaduan');
			redirect(base_url().'index/berhasil_adu');
		}
	}

	public function berhasil_adu(){
		$this->load->view('cms/header');
		$this->load->view('cms/berhasil_adu');
		$this->load->view('cms/footer');
	}

	public function login_mhs(){
		$this->load->view('cms/header');
		$this->load->view('cms/login_mhs');
		$this->load->view('cms/footer');
	}

	public function logout_mhs(){
		$this->load->view('cms/header');
		$this->load->view('cms/logout_mhs');
		$this->load->view('cms/footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function single($post){
		$this->load->database();
		if($post == ""){
			redirect(base_url());
		}else{
			$where = array(
				'post_status' => 'publish',
				'post_id' => $post
				);
			$data['single'] = $this->m_dah->edit_data($where,'tbl_post')->result();
			$this->load->view('cms/header');
			$this->load->view('cms/single',$data);
			$this->load->view('cms/footer');
		}
	}

	public function headline1($post){
		$this->load->database();
		if($post == ""){
			redirect(base_url());
		}else{
			$where = array(
				'headline_status' => 'Simpan',
				'headline_id' => $post
				);
			$data['headline1'] = $this->m_dah->edit_data($where,'tbl_headline')->result();
			$this->load->view('cms/header');
			$this->load->view('cms/headline1',$data);
			$this->load->view('cms/footer');
		}
	}

	public function pengumuman(){
		$this->load->database();
		$this->load->library('pagination');
		$posts = $this->m_dah->get_posts('publish');
		$config['base_url'] = base_url().'/index/pengumuman/page/';
		$config['total_rows'] = $posts->num_rows();
		$config['per_page'] = 6;
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$dari = $this->uri->segment('4');
		$data['posts'] = $this->m_dah->get_posts_paging('publish',$config['per_page'],$dari)->result();
		$this->load->view('cms/header');
		$this->load->view('cms/pengumuman', $data);
		$this->load->view('cms/footer');
	}

	public function alumni_sipil(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'sipil');
        $config['base_url'] = base_url().'/index/alumni_sipil/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'sipil')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_sipil'] = $this->m_dah->get_alumniall_paging('sipil',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_sipil',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	public function alumni_mesin(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'mesin');
        $config['base_url'] = base_url().'/index/alumni_mesin/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'mesin')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_mesin'] = $this->m_dah->get_alumniall_paging('mesin',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_mesin',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_elektro(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'elektro');
        $config['base_url'] = base_url().'/index/alumni_elektro/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'elektro')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_elektro'] = $this->m_dah->get_alumniall_paging('elektro',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_elektro',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_industri(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'industri');
        $config['base_url'] = base_url().'/index/alumni_industri/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'industri')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_industri'] = $this->m_dah->get_alumniall_paging('industri',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_industri',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_kimia(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'kimia');
        $config['base_url'] = base_url().'/index/alumni_kimia/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'kimia')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_kimia'] = $this->m_dah->get_alumniall_paging('kimia',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_kimia',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_arsitektur(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'arsitektur');
        $config['base_url'] = base_url().'/index/alumni_arsitektur/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'arsitektur')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_arsitektur'] = $this->m_dah->get_alumniall_paging('arsitektur',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_arsitektur',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_informatika(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'informatika');
        $config['base_url'] = base_url().'/index/alumni_informatika/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'informatika')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_informatika'] = $this->m_dah->get_alumniall_paging('informatika',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_informatika',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_sisteminformasi(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'sisteminformasi');
        $config['base_url'] = base_url().'/index/alumni_sisteminformasi/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'sisteminformasi')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_sisteminformasi'] = $this->m_dah->get_alumniall_paging('sisteminformasi',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_sisteminformasi',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_material(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'material');
        $config['base_url'] = base_url().'/index/alumni_material/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'material')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_material'] = $this->m_dah->get_alumniall_paging('material',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_material',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function alumni_energi(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$data['thn'] = $thn;


		//Mulai pagination
		$this->load->library('session');
        $thn = strip_tags($this->input->post('thn'));
        if($this->uri->segment(3) != "page"){
            $this->session->set_userdata(array('thn' => $thn));
        }
        $this->load->library('pagination');
        $posts = $this->m_dah->get_alumni($thn, 'energi');
        $config['base_url'] = base_url().'/index/alumni_energi/page/';
		if($this->session->userdata('thn') != ""){
            $config['total_rows'] = $this->m_dah->get_alumni($this->session->userdata('thn'), 'energi')->num_rows();
        }else{
            $config['total_rows'] = $posts->num_rows();
        }

		//membuat style pagination
		$config['per_page'] = 10;
        $config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $dari = $this->uri->segment('4');


		$data['tgl'] = $thn;
            $data['pencarian'] = $this->session->userdata('thn');
            $data['alumni_energi'] = $this->m_dah->get_alumniall_paging('energi',$data['pencarian'],$config['per_page'],$dari)->result();

            $this->load->view('cms/header');
			$this->load->view('cms/alumni_energi',$data);
			$this->load->view('cms/footer');
		
		//tutup pagination
	}

	function download(){
		$this->load->database();
		$data['download'] = $this->m_dah->get_data('dokumen')->result();
		$data['dokumen'] = $this->db->query("SELECT * FROM dokumen")->result();
		$this->load->view('cms/header');
		$this->load->view('cms/download', $data);
		$this->load->view('cms/footer');
	}

	function file_kosong(){
		$this->load->view('cms/header');
		$this->load->view('cms/file_kosong');
		$this->load->view('cms/footer');
	}



}