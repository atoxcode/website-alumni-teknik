<?php 
class M_dah extends CI_Model{
	// general
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function get_data_order($order,$column,$table){
		$this->db->order_by($column, $order); 
		return $this->db->get($table);
	}

	function get_group($table,$group){
		return $this->db->query("select * from $table group by $group");
	}

	function get_group_visitor($table,$group,$date){
		return $this->db->query("select * from $table where date(time_visit)='$date' group by $group");
	}
	// end general

	// cms
	function get_posts($post_status){
		$this->db->order_by('post_id', 'desc');
		$this->db->where(array('post_status'=> $post_status));
		return $this->db->get('tbl_post');
	}

	function get_posts_paging($post_status,$sampai,$dari){
		$this->db->order_by('post_id', 'desc');
		$this->db->where(array('post_status'=> $post_status));
		return $this->db->get('tbl_post',$sampai,$dari);
	}

	function get_search_paging($search,$sampai,$dari){
		$this->db->order_by('post_id', 'desc');
		$this->db->like(array('post_tittle'=> $search,'post_content' => $search));
		return $this->db->get('tbl_post',$sampai,$dari);
	}

	function get_category_paging($category,$sampai,$dari){
		// $this->db->order_by('post_id', 'desc');
		// $this->db->where(array('post_category'=> $category));
		return $this->db->query("select * from tbl_post,tbl_category,tbl_taxonomy where tbl_taxonomy.taxonomy='post_category' and tbl_taxonomy.taxonomy_child=tbl_category.cat_id and tbl_category.cat_id=$category and tbl_post.post_id=tbl_taxonomy.taxonomy_parent order by tbl_post.post_id desc limit $dari,$sampai");
		// return $this->db->get('tbl_post',$sampai,$dari);
	}

	function get_post_limit($post_status,$limit){
		$this->db->limit($limit);
		$this->db->order_by('post_id', 'desc');
		$this->db->where(array('post_status'=> $post_status));
		return $this->db->get('tbl_post');
	}

	function get_post_category($id_post){
		return $this->db->query("select * from tbl_taxonomy,tbl_category where tbl_taxonomy.taxonomy_parent='$id_post' and tbl_taxonomy.taxonomy='post_category' and tbl_taxonomy.taxonomy_child=tbl_category.cat_id ");
	}

	function post_in_category($id_category){
		return $this->db->query("select * from tbl_taxonomy,tbl_category,tbl_post where tbl_taxonomy.taxonomy_child='$id_category' and tbl_taxonomy.taxonomy='post_category' and tbl_taxonomy.taxonomy_child=tbl_category.cat_id and tbl_taxonomy.taxonomy_parent=tbl_post.post_id");
	}

	function get_post_detail($id_post){
		return $this->db->query("select * from tbl_post,tbl_user where tbl_post.post_author=tbl_user.user_id and tbl_post.post_id='$id_post'");
	}
	// end cms


	// get options
	
	// end get option

	// menu
	function get_menu_mother(){
		return $this->db->query("select * from dah_menu where menu_mother != '0' and menu_name='0' and menu_url='0' and menu_parent='0' and menu_sort='0'");
	}

	function get_menu_item($mother){
		return $this->db->query("select * from dah_menu where menu_mother = '$mother' and menu_name!='0' and menu_parent='0' order by menu_sort asc");
	}

	function get_all_menu_item($mother){
		return $this->db->query("select * from dah_menu where menu_mother = '$mother' and menu_name!='0' order by menu_sort asc");
	}	
	// end menu

	function get_widget($where,$table){
		$this->db->order_by('widget_sort','asc');
		return $this->db->get_where($table,$where);
	}



	// visitor
	function get_pageview($date){
		return $this->db->query("select * from dah_visitor where date(time_visit)='$date'");
	}

	function get_visitor($date){
		return $this->db->query("select * from dah_visitor where date(time_visit)='$date' group by user_ip");
	}

	function get_ftvisitor($date){
		return $this->db->query("select * from dah_visitor where date(time_visit)='$date' and user_ip not in(select user_ip from dah_visitor)");
	}

	function page_view($date){
		return $this->db->query("select count(page) as page_view, page from dah_visitor where date(time_visit)='$date' group by page order by page_view desc");
	}

	function get_referrer($date){
		return $this->db->query("select distinct user_referrer from dah_visitor where date(time_visit)='$date' and user_referrer!=''");
	}	

	function search($keyword){
		$this->db->like('post_tittle',$keyword);		
		return $query  =   $this->db->get('tbl_post');	
	}

	function cari_dosen($cari){
		$c = array(
			'dosen_nama' => $cari,
			'dosen_nip' => $cari
			);
		$this->db->or_like($c);		
		$this->db->order_by('dosen_id', 'desc');	
		return $this->db->get('tbl_dosen',10);
	}

	function get_dosen_paging($sampai,$dari){		
		$this->db->order_by('dosen_id', 'desc');		
		return $this->db->get('tbl_dosen',$sampai,$dari);	
	}	

	function get_media_paging($sampai,$dari){		
		$this->db->order_by('media_id', 'desc');				
		return $this->db->get('dah_media',$sampai,$dari);	
	}

	//pagination alumni di frontend
	function get_alumni($post_tahun,$prodi){
		$this->db->order_by('alumni_nim', 'asc');
		$this->db->where(array('alumni_masuk'=> $post_tahun, 'alumni_jurusan'=> $prodi)); //tahun masuk alumni
		return $this->db->get('tbl_alumni');		
	}

	function get_alumniall_paging($prodi, $post_tahun,$sampai,$dari){
		$this->db->order_by('alumni_nim', 'asc');
		$this->db->where(array('alumni_masuk'=> $post_tahun, 'alumni_jurusan'=> $prodi));
		return $this->db->get('tbl_alumni',$sampai,$dari);
	}
}
?>