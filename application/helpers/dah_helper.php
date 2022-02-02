<?php 

function show_alert(){
	if(isset($_GET['alert'])){
		$alert = $_GET['alert'];
		if($alert == "add"){
			echo "<div class='alert alert-success alert-dah'>Data Berhasil Di Tambah. <span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "delete"){
			echo "<div class='alert alert-success alert-dah'>Data Berhasil Di Hapus. <span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "update"){
			echo "<div class='alert alert-success alert-dah'>Data Berhasil Di Update. <span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "login-failed"){
			echo "<div class='alert alert-danger alert-dah'>Login Gagal !</div>";
		}else if($alert == "setting-update"){
			echo "<div class='alert alert-success alert-dah'>Pengaturan Berhasil Di Ubah.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "page-saved"){
			echo "<div class='alert alert-success alert-dah'>Halaman Berhasil Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "page-delete"){
			echo "<div class='alert alert-success alert-dah'>Halaman Berhasil Di Hapus.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "post-saved"){
			echo "<div class='alert alert-success alert-dah'>Post Berhasil Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "post-delete"){
			echo "<div class='alert alert-success alert-dah'>Post Berhasil Di Hapus Permanen.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "post-trash"){
			echo "<div class='alert alert-success alert-dah'>Post Berhasil Di Pindahkan Ke Tong Sampah.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "menu-saved"){
			echo "<div class='alert alert-success alert-dah'>Menu Berhasil Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "menu-delete"){
			echo "<div class='alert alert-success alert-dah'>Menu Berhasil Di Hapus.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "widget-delete"){
			echo "<div class='alert alert-success alert-dah'>Widget Berhasil Di Hapus.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "user-add"){
			echo "<div class='alert alert-success alert-dah'>User Berhasil Di Tambah.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "user-update"){
			echo "<div class='alert alert-success alert-dah'>Data User Berhasil Di Update.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "cancel"){
			echo "<div class='alert alert-success alert-dah'>Data Batal Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}

	}
}

function create_slug($string){
	// $a = trim($string);
	// $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $a);
	return strtolower(url_title($string));
}

function display_sub($parent,$mother){
	$query = mysql_query("select * from dah_menu where menu_parent='$parent' and menu_mother='$mother'");
	echo "<ul parent='".$parent."' id='".$mother."'>";
	// echo "<li class='list-menu-kosong'></li>";
	while($row=mysql_fetch_assoc($query)){
		if(count($query) > 0){
			echo "<li id='menu_".$row['menu_id']."' ini='".$row['menu_id']."'><div>".$row['menu_name']."<small>  ".$row['menu_url']."  </small> <a class='pull-right' href=".base_url().'admin/menu_item_delete/'.$row['menu_id']."> Delete </a><a class='pull-right' href=".base_url().'admin/menu_item_edit/'.$row['menu_id']."> Edit </a></div>";
			display_sub($row['menu_id'],$row['menu_mother']);
			echo "</li>";
		}else{
			echo "<li id='menu_".$row['menu_id']."' ini='".$row['menu_id']."'>".$row['menu_name']."<small>  ".$row['menu_url']."  </small> <a class='pull-right' href=".base_url().'admin/menu_item_delete/'.$row['menu_id']."> Delete</a> <a class='pull-right' href=".base_url().'admin/menu_item_edit/'.$row['menu_id']."> Edit </a></li>";
		}
	}
	echo "</ul>";
}

function display_sub_navigation($parent,$mother){
	$query = mysql_query("select * from dah_menu where menu_parent='$parent' and menu_mother='$mother'");
	$cek = mysql_num_rows($query);
	if($cek > 0){
	echo "<ul>";
	while($row=mysql_fetch_assoc($query)){

		if($row['menu_tab']=="1"){
			$tab = "target='_blank'";
		}else{
			$tab = "";
		}


		if(count($query) > 0){
			echo '<li><a '.$tab.' href='.$row['menu_url'].'>'.$row['menu_name'].'</a>';
			display_sub_navigation($row['menu_id'],$row['menu_mother']);
			echo "</li>";
		}else if(count($query) == 0){
			echo '<li><a '.$tab.' href='.$row['menu_url'].'>'.$row['menu_name'].'</a></li>';			
		}
	}
	echo "</ul>";
	}
}


function menu_navigation($menu_name){
	echo '<div class="menu-responsif"><span class="glyphicon glyphicon-list"></span> MENU</div>';
	echo '<div class='.$menu_name.'>';
	echo '<ul classs=main-'.$menu_name.'>';

	$CI=&get_instance();
	$data = $CI->m_dah->get_menu_item($menu_name);
	$item = $data->result();
	$jumlah = $data->num_rows();
	foreach($item as $i){
		$query = mysql_query("select * from dah_menu where menu_parent='$i->menu_id' and menu_mother='$i->menu_mother'");
		$q=mysql_num_rows($query);	
		if($i->menu_tab=="1"){
			$tab = "target='_blank'";
		}else{
			$tab = "";
		}
		if($q > 0){
			echo '<li><a '.$tab.' href='.$i->menu_url.'>'.$i->menu_name.' <span class="caret"></span> </a>';
			display_sub_navigation($i->menu_id,$i->menu_mother);
			echo "</li>";
		}else if($q == 0){
			echo '<li><a '.$tab.' href='.$i->menu_url.'>'.$i->menu_name.'</a></li>';
		}
	}

	echo '</ul>';
	echo '</div>';
}

// DAHCODE WIDGET

function widget($widget){
	switch ($widget) {		
		case 'alamat_kampus':
			echo "
			<p class='small'>
			Universitas Malikussaleh ACEH<br/>
			Kampus Utama Cot Tengku Nie Reuleut<br/>
			Muara Batu, Aceh Utara, Provinsi Aceh, Indonesia<br/><br/>
			Telp : +62.645.41373, Fax : +62.645.44450<br/>
			- informatika@unimal.ac.id<br/>
			- defryhamdhana@unimal.ac.id<br/>
			</p>
			";
			break;
		case 'berita_terbaru':
			$CI=&get_instance();
			$article = $CI->m_dah->get_post_limit('publish','3')->result();
			echo "<ul>";
			foreach($article as $a){
				echo "<li><a href='".base_url()."index/single/".$a->post_id."/".create_slug($a->post_tittle)."'>".$a->post_tittle."</a></li>";
			}
			echo "</ul>";
			break;
		case 'kategori':
			$CI=&get_instance();
			$category = $CI->m_dah->get_data('dah_category')->result();
			echo "<ul>";
			foreach($category as $c){
				echo "<li><a href='".base_url()."index/category/".$c->category_id."/".create_slug($c->category_name)."'>".$c->category_name."</a></li>";
			}
			echo "</ul>";
			break;
		case 'halaman':
			$CI=&get_instance();
			$pages = $CI->m_dah->get_data('dah_pages')->result();
			echo "<ul>";
			foreach($pages as $p){
				echo "<li><a href='".base_url()."index/page/".$p->page_id."/".create_slug($p->page_tittle)."'>".$p->page_tittle."</a></li>";
			}
			echo "</ul>";
			break;
		case 'slider':
		echo '
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">';
			$CI=&get_instance();
			$jumlah_slide = $CI->m_dah->get_data('dah_slider')->num_rows();
			for($js=0;$js<$jumlah_slide;$js++){				
				if($js==0){$ca='active';}else{$ca='';}
				echo '<li data-target="#carousel-example-generic" data-slide-to="'.$js.'" class="'.$ca.'"></li>';				
			}							
			echo '</ol>';
			
			echo '<div class="carousel-inner" role="listbox">

			';
			$CI=&get_instance();
			$slider = $CI->m_dah->get_data_order('asc','slider_sort','dah_slider')->result();
			foreach($slider as $s){
				if($s->slider_sort == 0){
					$class_aktif = 'active';
				}else{
					$class_aktif ='';
				}
				echo '<div class="item '.$class_aktif.'">';
				echo '<img src="'.base_url().'/dah_image/system/slider/'.$s->slider_image.'" alt="...">';
				echo '<div class="carousel-caption">';
				echo $s->slider_desc;
				echo '</div>';
				echo '</div>';
			}
			echo '
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		';
			break;		
		case 'social':			
			echo "<ul class='widget-social'>";
			if(get_option('widget_social_facebook') != ""){
				echo "<li><a target='_blank' href=".get_option('widget_social_facebook')."><i class='fa fa-facebook'></i></a></li>";
			}
			if(get_option('widget_social_twitter') != ""){
				echo "<li><a target='_blank' href='".get_option('widget_social_twitter')."'><i class='fa fa-twitter'></i></a></li>";
			}
			if(get_option('widget_social_google_plus') != ""){
				echo "<li><a target='_blank' href='".get_option('widget_social_google_plus')."'><i class='fa fa-google-plus'></i></a></li>";
			}
			if(get_option('widget_social_instagram') != ""){
				echo "<li><a target='_blank' href='".get_option('widget_social_instagram')."'><i class='fa fa-instagram'></i></a></li>";
			}
			if(get_option('widget_social_youtube') != ""){
				echo "<li><a target='_blank' href='".get_option('widget_social_youtube')."'><i class='fa fa-youtube'></i></a></li>";
			}
			echo "</ul>";
			// break;
		default:
			# code...
			break;
	}		
}

function post_content($text,$numb) {
	if (strlen($text) > $numb) { 
		$text = str_replace("  ", "", $text);
		$text = substr($text, 0, $numb); 
		$text = substr($text,0,strrpos($text," ")); 
		$etc = " ...";  
		$text = $text.$etc; 
	}
	return $text;
}


function get_option($option_name){
	$CI=$CI=&get_instance();
	return $CI->m_dah->get_option($option_name);
}



// function save_visitor_data(){
// 	$CI=&get_instance();
// 	if ($CI->agent->is_mobile()){
// 		$device = $CI->agent->mobile();
// 	}else{
// 		$device = 'Unidentified';
// 	}

// 	// referrer
// 	if ($CI->agent->is_referral()){
// 		$referrer = $CI->agent->referrer();
// 	}else{
// 		$referrer = "";
// 	}

// 	$data = array(
// 		'time_visit' => date('Y-m-d H:i:s'),
// 		'user_ip' => $_SERVER['REMOTE_ADDR'],
// 		'user_browser' => $CI->agent->browser(),
// 		'user_os' => $CI->agent->platform(),
// 		'user_device' => $device,
// 		'page' => base_url(),
// 		'user_referrer' => $referrer
// 		);

// 	$CI->m_dah->insert_data($data,'dah_visitor');

// }




?>