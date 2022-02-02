<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->helper('dah_helper');
		$this->load->library(array('session','form_validation'));	
		$this->load->model('m_dah');
		$this->load->library('pagination');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
	}

	public function index(){
		$this->load->database();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_dashboard');
		$this->load->view('admin/adm_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function headline(){
		$this->load->database();
		$data['headline']=$this->m_dah->get_data('tbl_headline')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_headline',$data);
		$this->load->view('admin/adm_footer');
	}

	function headline_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/headline');
		}else{
			$where = array(
				'headline_id' => $id
				);
			$data['edit'] = $this->m_dah->edit_data($where,'tbl_headline')->result();
			$data['headline'] = $this->m_dah->get_data('tbl_headline')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_headline_edit',$data);
			$this->load->view('admin/adm_footer');
		}
	}

	function headline_update(){
		$this->load->database();
		$headline_id = $this->input->post('id');
		$headline_title = $this->input->post('headline_tittle');
		$headline_content = $this->input->post('headline_content');
		$headline_status = $this->input->post('save');
		$where = array(
			'headline_id' => $headline_id
			);

			$data = array(
				'headline_tittle' => $headline_title,
				'headline_content' => $headline_content,
				'headline_status' => $headline_status
				);
			$this->m_dah->update_data($where,$data,'tbl_headline');
			//$this->m_pol->insert_data($data,'tbl_pages');

			// add cover image
			if($_FILES['headline_cover']['name'] == ""){
				redirect(base_url().'admin/headline/?alert=post-saved');
			}else{
				$config['upload_path'] = './image/headline/';
				$config['file_name'] = rand();
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->do_upload('headline_cover');
				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];
				$this->m_dah->update_data(array('headline_id' => $headline_id),array('headline_cover' => $file_name),'tbl_headline');
				//$this->m_pol->insert_data($data,'tbl_pages');
				redirect(base_url().'admin/headline/?alert=post-saved');
			}
			// end add cover image

	}

	function hapus_cover_headline(){
		$this->load->database();
		$id = $this->input->post('id');
		$where = array(
			'headline_id' => $id
			);
		$data = $this->m_dah->edit_data($where,'tbl_headline')->row();
		@chmod("./image/headline/" . $data->page_cover, 0777);
		@unlink('./image/headline/' . $data->page_cover);

		$update = array(
			'headline_cover' => ""
			);
		$this->m_dah->update_data($where,$update,'tbl_headline');
	}


	function category(){
		$this->load->database();
		$data['category'] = $this->m_dah->get_data('tbl_category')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_category',$data);
		$this->load->view('admin/adm_footer');
	}

	function category_act(){
		$this->load->database();
		$this->form_validation->set_rules('category','Category Name','required');
		if($this->form_validation->run() != true){
			$data['category'] = $this->m_dah->get_data('tbl_category')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_category',$data);
			$this->load->view('admin/adm_footer');
		}else{
			$cat_nama = $this->input->post('category');
			$slug_cat = create_slug($cat_nama);
			$data = array(
				'cat_nama' => $cat_nama,
				'cat_url' => $slug_cat,
				'cat_parent' => '0'
				);

			$this->m_dah->insert_data($data,'tbl_category');
			redirect(base_url().'admin/category/?alert=add');
		}
	}

	function category_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/category');
		}else{
			$where = array(
				'cat_id' => $id
				);
			$data['edit'] = $this->m_dah->edit_data($where,'tbl_category')->result();
			$data['category'] = $this->m_dah->get_data('tbl_category')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_category_edit',$data);
			$this->load->view('admin/adm_footer');
		}
	}

	function category_update(){
		$this->load->database();
		$id = $this->input->post('id');
		$this->form_validation->set_rules('category','Category Name','required');
		if($this->form_validation->run() != true){
			$where = array(
				'cat_id' => $id
				);
			$data['edit'] = $this->m_dah->edit_data($where,'tbl_category')->result();
			$data['category'] = $this->m_dah->get_data('tbl_category')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_category_edit',$data);
			$this->load->view('admin/adm_footer');
		}else{

			$cat_nama = $this->input->post('category');
			$slug_cat = create_slug($cat_nama);

			$data = array(
				'cat_nama' => $cat_nama,
				'cat_url' => $slug_cat,
				'cat_parent' => '0'
				);

			$w = array(
				'cat_id' => $id
				);
			$this->m_dah->update_data($w,$data,'tbl_category');
			redirect(base_url().'admin/category/?alert=update');
		}
	}

	function category_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/category');
		}else{
			$wt = array(
				'taxonomy_child' => $id
				);
			$this->m_dah->delete_data($wt,'tbl_taxonomy');

			$where = array(
				'cat_id' => $id
				);
			$this->m_dah->delete_data($where,'tbl_category');
			redirect('admin/category/?alert=delete');
		}
	}
	
	// post
	function posts(){
		$this->load->database();
		// $data['posts'] = $this->m_dah->get_data_order('desc','post_id','tbl_post')->result();
		$data['posts'] = $this->m_dah->get_posts('publish')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_post',$data);
		$this->load->view('admin/adm_footer');
	}

	function posts_draft(){
		$this->load->database();
		$data['posts'] = $this->m_dah->get_posts('draft')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_post_draft',$data);
		$this->load->view('admin/adm_footer');
	}

	function posts_trash(){
		$this->load->database();
		$data['posts'] = $this->m_dah->get_posts('trash')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_post_trash',$data);
		$this->load->view('admin/adm_footer');
	}

	function post_add(){
		$this->load->database();
		$data['category']=$this->m_dah->get_data('tbl_category')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_post_add',$data);
		$this->load->view('admin/adm_footer');
	}

	function post_add_act(){
		$this->load->database();
		$post_tittle = $this->input->post('post_tittle');
		$post_content = $this->input->post('post_content');
		$post_tanggal = $this->input->post('post_tanggal');
		$category = $this->input->post('category');
		$post_status = $this->input->post('save');
		$this->form_validation->set_rules('post_tittle','Post Tittle','required');

		if($this->form_validation->run() != true){
			$data['category']=$this->m_dah->get_data('tbl_category')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_post_add',$data);
			$this->load->view('admin/adm_footer');
		}else{
			$url = create_slug($post_tittle);
			$data = array(
				'post_author' => $this->session->userdata('id'),
				'post_date' => $post_tanggal.date_format('yyyy-mm-dd'),
				'post_tittle' => $post_tittle,
				'post_url' => $url,
				'post_content' => $post_content,
				'post_category' => $category,
				'post_status' => $post_status
				);
			$this->m_dah->insert_data($data,'tbl_post');
			$id_terakhir = $this->db->insert_id();

			// insert category
			if(isset($_POST['post_cat'])){
				$cat = $_POST['post_cat'];
				$jumlah_category = count($cat);
				for($c=0;$c<$jumlah_category;$c++){
					$taxonomy = array(
						'taxonomy_parent' => $id_terakhir,
						'taxonomy_child' => $cat[$c],
						'taxonomy' => 'post_category'
						);
					$this->m_dah->insert_data($taxonomy,'tbl_taxonomy');
				}
			}else{
				$taxonomy = array(
					'taxonomy_parent' => $id_terakhir,
					'taxonomy_child' => '1',
					'taxonomy' => 'post_category'
					);
				$this->m_dah->insert_data($taxonomy,'tbl_taxonomy');
			}
			// end insert_category

			// add cover image
			if($_FILES['post_cover']['name'] == ""){
				redirect(base_url().'admin/posts/?alert=post-saved');
			}else{
				$config['upload_path'] = './image/post/';
				$config['file_name'] = rand();
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->do_upload('post_cover');
				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];
				$this->m_dah->update_data(array('post_id' => $id_terakhir),array('post_cover' => $file_name),'tbl_post');
				redirect(base_url().'admin/posts/?alert=post-saved');
			}
			// end add cover image
		}
	}

	function post_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/posts');
		}else{
			$where = array(
				'post_id' => $id
				);
			$data['category']=$this->m_dah->get_data('tbl_category')->result();
			$data['posts'] = $this->m_dah->edit_data($where,'tbl_post')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_post_edit',$data);
			$this->load->view('admin/adm_footer');
		}
	}

	function hapus_cover_post(){
		$this->load->database();
		$id = $this->input->post('id');
		$where = array(
			'post_id' => $id
			);
		$data = $this->m_dah->edit_data($where,'tbl_post')->row();
		@chmod("./image/post/" . $data->post_cover, 0777);
		@unlink('./image/post/' . $data->post_cover);

		$update = array(
			'post_cover' => ""
			);
		$this->m_dah->update_data($where,$update,'tbl_post');
	}

	function post_to_trash($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/posts');
		}else{
			$where = array(
				'post_id' => $id
				);
			$data = array(
				'post_status' => "trash"
				);

			$this->m_dah->update_data($where,$data,'tbl_post');
			redirect('admin/posts/?alert=post-trash');
		}
	}

	function post_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/posts');
		}else{
			$where = array(
				'post_id' => $id
				);

			$data = $this->m_dah->edit_data($where,'tbl_post')->row();
			@chmod("./image/post/" . $data->post_cover, 0777);
			@unlink('./image/post/' . $data->post_cover);

			// hapus di taxonomy
			$w = array(
				'taxonomy_parent' => $id,
				'taxonomy' => 'post_category'
				);
			$this->m_dah->delete_data($w,'tbl_taxonomy');
			// end hapus di taxonomy

			$this->m_dah->delete_data($where,'tbl_post');
			redirect('admin/posts_trash/?alert=post-delete');
		}
	}

	function post_update(){
		$this->load->database();
		$post_id = $this->input->post('id');
		$post_tittle = $this->input->post('post_tittle');
		$post_content = $this->input->post('post_content');
		$post_tanggal = $this->input->post('post_tanggal');
		$category = $this->input->post('category');
		$post_status = $this->input->post('save');
		$where = array(
			'post_id' => $post_id
			);
		$this->form_validation->set_rules('post_tittle','Post Tittle','required');
		if($this->form_validation->run() != true){
			$data['posts'] = $this->m_dah->edit_data($where,'tbl_post')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_post_edit',$data);
			$this->load->view('admin/adm_footer');
		}else{
			$url = create_slug($post_tittle);
			$data = array(
				'post_date' => $post_tanggal.date_format('yyyy-mm-dd'),
				'post_tittle' => $post_tittle,
				'post_url' => $url,
				'post_content' => $post_content,
				'post_category' => $category,
				'post_status' => $post_status
				);
			$this->m_dah->update_data($where,$data,'tbl_post');

			// insert category
			if(isset($_POST['post_cat'])){
				$cat = $_POST['post_cat'];

				// hapus di taxonomy
				$w = array(
					'taxonomy_parent' => $post_id,
					'taxonomy' => 'post_category'
					);
				$this->m_dah->delete_data($w,'tbl_taxonomy');
				// end hapus di taxonomy

				$jumlah_category = count($cat);
				for($c=0;$c<$jumlah_category;$c++){
					$taxonomy = array(
						'taxonomy_parent' => $post_id,
						'taxonomy_child' => $cat[$c],
						'taxonomy' => 'post_category'
						);
					$this->m_dah->insert_data($taxonomy,'tbl_taxonomy');
				}
			}else{

				// hapus di taxonomy
				$w = array(
					'taxonomy_parent' => $post_id,
					'taxonomy' => 'post_category'
					);
				$this->m_dah->delete_data($w,'tbl_taxonomy');
				// end hapus di taxonomy

				$taxonomy = array(
					'taxonomy_parent' => $post_id,
					'taxonomy_child' => '1',
					'taxonomy' => 'post_category'
					);
				$this->m_dah->insert_data($taxonomy,'tbl_taxonomy');
			}
			// end insert_category

			// add cover image
			if($_FILES['post_cover']['name'] == ""){
				redirect(base_url().'admin/posts/?alert=post-saved');
			}else{
				$config['upload_path'] = './image/post/';
				$config['file_name'] = rand();
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->do_upload('post_cover');
				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];
				$this->m_dah->update_data(array('post_id' => $post_id),array('post_cover' => $file_name),'tbl_post');
				redirect(base_url().'admin/posts/?alert=post-saved');
			}
			// end add cover image
		}
	}
	// end post

	public function alumni(){
		$this->load->database();
		$thn = $this->input->post('thn');
		$jurusan = $this->input->post('jurusan');
		$data['thn'] = $thn;
		$data['jurusan'] = $jurusan;
		$data['alumni'] = $this->db->query("SELECT * FROM tbl_alumni WHERE alumni_masuk = '$thn' AND alumni_jurusan = '$jurusan' ORDER BY alumni_nim ASC" )->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_alumni', $data);
		$this->load->view('admin/adm_footer');
	}

	public function alumni_add(){
		$this->load->database();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_alumni_add');
		$this->load->view('admin/adm_footer');
	}

	function alumni_add_act(){
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
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_alumni_add');
			$this->load->view('admin/adm_footer');
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
					'alumni_password' => $password 
				);
				$this->m_dah->insert_data($data,'tbl_alumni');
				redirect(base_url().'admin/alumni/?alert=add');
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
					'alumni_password' => $password 
				);
				$this->m_dah->insert_data($data,'tbl_alumni');
				redirect(base_url().'admin/alumni/?alert=add');
				}	
			}
		}	
	}


	function alumni_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/alumni');
		}else{			
			$where = array(
				'alumni_id' => $id
				);	
		$data['alumni'] = $this->m_dah->edit_data($where,'tbl_alumni')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_alumni_edit', $data);
		$this->load->view('admin/adm_footer');
		}
	}

	function alumni_status1($id){
		$this->load->database();
		$thn = substr($id, 0, 4);//4 adalah digit yang harus disediakan
		$nim = substr($id, 4, 9);
		$jurusan = substr($id, 13);
		if ($id == ''){
			redirect('admin/alumni/0');
			$thn = date('Y');
			$nim = '';
			$jurusan = '';
		}
		//echo $jurusan;

		$where = array(
			'alumni_nim' => $nim
		);

		$data = array(
			'alumni_status' => 'nonaktif'
		);

		$this->m_dah->update_data($where, $data,'tbl_alumni');		
		redirect(base_url().'admin/alumni/'.$thn.$jurusan.'/?alert=update'); //digunakan untuk mengembalikan link ke function family
	}

	function alumni_status2($id){
		$this->load->database();
		$thn = substr($id, 0, 4);//4 adalah digit yang harus disediakan
		$nim = substr($id, 4, 9);
		$jurusan = substr($id, 13);
		if ($id == ''){
			redirect('admin/alumni/0');
			$thn = date('Y');
			$nim = '';
			$jurusan = '';
		}
		//echo $jurusan;

		$where = array(
			'alumni_nim' => $nim
		);

		$data = array(
			'alumni_status' => 'aktif'
		);

		$this->m_dah->update_data($where, $data,'tbl_alumni');
		redirect(base_url().'admin/alumni/'.$thn.$jurusan.'/?alert=update');
	}

	function alumni_update(){
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

		$where = array(
				'alumni_id' => $alumni_id
				);

		$this->form_validation->set_rules('alumni_nama','Nama','required');
		if($this->form_validation->run() != true){
			$data['alumni'] = $this->m_dah->edit_data($where,'tbl_alumni')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_alumni_edit',$data);
			$this->load->view('admin/adm_footer');
		}else{
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
				'alumni_password' => $password 
				);

			$this->m_dah->update_data($where,$data,'tbl_alumni');

			if($_FILES['alumni_foto']['name'] == ""){
				redirect(base_url().'admin/alumni/?alert=update');
			}else{
				$config['upload_path'] = './image/alumni/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = rand();
				$this->load->library('upload', $config);
				if($this->upload->do_upload('alumni_foto')){
					$edit = $this->m_dah->edit_data($where,'tbl_alumni')->result();

					@chmod("./image/alumni/" . $edit[0]->alumni_foto, 0777);
					@unlink('./image/alumni/' . $edit[0]->alumni_foto);

					$data = array('upload_data' => $this->upload->data());
					$file_name = $data['upload_data']['file_name'];
					$this->m_dah->update_data(array('alumni_id' => $alumni_id),array('alumni_foto' => $file_name),'tbl_alumni');
				}
				redirect(base_url().'admin/alumni/?alert=update');
			}
		}
	}

	function alumni_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/alumni');
		}else{
			$where = array(
				'alumni_id' => $id
			);
		$this->m_dah->delete_data($where, 'tbl_alumni');
		redirect('admin/alumni/?alert=delete');
		}
	}

	function pengaduan(){
		$this->load->database();
		$data['pengaduan'] = $this->m_dah->get_data_order('desc', 'pengaduan_id', 'tbl_pengaduan')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_pengaduan', $data);
		$this->load->view('admin/adm_footer');
	}

	function pengaduan_hapus($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/pengaduan');
		}else{
			$where = array(
				'pengaduan_id' => $id
				);
			$this->m_dah->delete_data($where,'tbl_pengaduan');
			redirect('admin/pengaduan/?alert=delete');
		}
	}

		// user
	function user(){
		$this->load->database();
		$data['user'] = $this->m_dah->get_data('tbl_user')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_user',$data);
		$this->load->view('admin/adm_footer');
	}

	function user_add(){
		$this->load->database();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_user_add');
		$this->load->view('admin/adm_footer');
	}

	function user_add_act(){
		$this->load->database();
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() == false){
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_user_add');
			$this->load->view('admin/adm_footer');
		}else{
			$data = array(
				'user_name' => $this->input->post('name'),
				'user_email' => $this->input->post('email'),
				'user_login' => $this->input->post('username'),
				'user_pass' => md5($this->input->post('password')),
				'user_level' => $this->input->post('level'),
				'user_status' => $this->input->post('status')
				);
			$this->m_dah->insert_data($data,'tbl_user');
			redirect('admin/user/?alert=user-add');
		}
	}

	function cek_username_ajax(){
		$this->load->database();
		$val = $this->input->post('val');
		echo $this->m_dah->edit_data(array('user_login' => $val),'tbl_user')->num_rows();
	}

	function user_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/user');
		}else{
			$where = array(
				'user_id' => $id
				);
			$data['user'] = $this->m_dah->edit_data($where,'tbl_user')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_user_edit',$data);
			$this->load->view('admin/adm_footer');
		}
	}

	function user_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/user');
		}else{
			$where = array(
				'user_id' => $id
				);
			$this->m_dah->delete_data($where,'tbl_user');
			redirect('admin/user?alert=delete');
		}
	}

	function user_update(){
		$this->load->database();
		$id = $this->input->post('id');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','email','required');
		if($this->form_validation->run() == false){
			$where = array(
				'user_id' => $id
				);
			$data['user'] = $this->m_dah->edit_data($where,'tbl_user')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_user_edit',$data);
			$this->load->view('admin/adm_footer');
		}else{
			$password = $this->input->post('password');
			$where = array(
				'user_id' => $id
				);
			if($password != ""){
				$data = array(
					'user_name' => $this->input->post('name'),
					'user_email' => $this->input->post('email'),
					// 'user_login' => $this->input->post('username'),
					'user_pass' => md5($password),
					'user_level' => $this->input->post('level'),
					'user_status' => $this->input->post('status')
					);
			}else{
				$data = array(
					'user_name' => $this->input->post('name'),
					'user_email' => $this->input->post('email'),
					// 'user_login' => $this->input->post('username'),
					'user_level' => $this->input->post('level'),
					'user_status' => $this->input->post('status')
					);
			}
			$this->m_dah->update_data($where,$data,'tbl_user');
			redirect('admin/user/?alert=user-update');
		}
	}

	// end user


	//menu download dokumen
	function dokumen(){
		$this->load->database();
		$data['dokumen'] = $this->m_dah->get_data('dokumen')->result();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_dokumen', $data);
		$this->load->view('admin/adm_footer');
	}

	public function dokumen_add(){
		$this->load->database();
		$this->load->view('admin/adm_header');
		$this->load->view('admin/adm_dokumen_add');
		$this->load->view('admin/adm_footer');
	}

	function dokumen_act(){
		$this->load->database();
		$dokumen_nama= $this->input->post('dokumen_nama');

		$this->form_validation->set_rules('dokumen_nama','Nama','required');

		if($this->form_validation->run() != true){
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_dokumen_add');
			$this->load->view('admin/adm_footer');
		}else{
			if($_FILES['dokumen_file']['name'] == ""){
				$data = array(
				'dokumen_nama' => $dokumen_nama,
				);
				$this->m_dah->insert_data($data,'dokumen');
				redirect(base_url().'admin/dokumen/?alert=add');
			}else{
				$rand = rand();
				$config['upload_path'] = './dokumen/';
				$config['allowed_types'] = 'pdf|zip|doc|docx|ppt|pptx';
				$config['file_name'] = rand();
				$this->load->library('upload', $config);


				if($this->upload->do_upload('dokumen_file')){
					$data = array('upload_data' => $this->upload->data());
					$file_name = $data['upload_data']['file_name'];

					$data = array(
						'dokumen_nama' => $dokumen_nama,
						'dokumen_file' => $file_name
						);
					$this->m_dah->insert_data($data,'dokumen');
					redirect(base_url().'admin/dokumen/?alert=add');
				}else{
					$data = array(
						'dokumen_nama' => $dokumen_nama,
						);
					$this->m_dah->insert_data($data,'dokumen');
					redirect(base_url().'admin/dokumen/?alert=add');
				}
			}
		}
	}

	function dokumen_edit($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/dokumen');
		}else{
			$where = array(
				'dokumen_id' => $id
			);
			$data['edit'] = $this->m_dah->edit_data($where,'dokumen')->result();
			$this->load->view('admin/adm_header');
			$this->load->view('admin/adm_dokumen_edit',$data);
			$this->load->view('admin/adm_footer');
		}
	}

	//untuk menghapus dokumen di menu edit dokumen
	function hapus_file_dokumen(){
		$this->load->database();
		$id = $this->input->post('id');
		$where = array(
			'dokumen_id' => $id
			);
		$data = $this->m_dah->edit_data($where,'dokumen')->row();
		@chmod("./dokumen/" . $data->dokumen_file, 0777);
		@unlink('./dokumen/' . $data->dokumen_file);

		$update = array(
			'dokumen_file' => ""
		);
		$this->m_dah->update_data($where, $update,'dokumen');
	}

	function dokumen_update(){
		$this->load->database();
		$dokumen_id = $this->input->post('id');
		$dokumen_nama = $this->input->post('dokumen_nama');
		$dokumen_kategori = $this->input->post('dokumen_kategori');

		$where = array(
			'dokumen_id' => $dokumen_id
		);

			$data = array(
				'dokumen_nama' => $dokumen_nama,
				'dokumen_kategori' => 'download'
			);

		$this->m_dah->update_data($where, $data,'dokumen');
		//redirect(base_url().'admin/dokumen/?alert=update');

		// add dokumen file
		if($_FILES['dokumen_file']['name'] == ""){
			redirect(base_url().'admin/dokumen/?alert=post-saved');
		}else{
			$config['upload_path'] = './dokumen/';
			$config['file_name'] = rand();
			$config['allowed_types'] = 'pdf|zip|doc|docx|ppt|pptx';
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen_file');
			$data = array('upload_data' => $this->upload->data());
			$file_name = $data['upload_data']['file_name'];
			$this->m_dah->update_data(array('dokumen_id' => $dokumen_id),array('dokumen_file' => $file_name),'dokumen');
			redirect(base_url().'admin/dokumen/?alert=post-saved');
		}
		// end dokumen file	

	}

	function dokumen_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/dokumen');
		}else{
			$where = array(
				'dokumen_id' => $id
				);
			$this->m_dah->delete_data($where,'dokumen');
			redirect('admin/dokumen/?alert=delete');
		}
	}

	//end dokumen download

	
}