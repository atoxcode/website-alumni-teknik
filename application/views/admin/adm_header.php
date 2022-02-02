<!DOCTYPE html>
<html>
<head>
	<title><?php //echo $this->m_dah->get_option('blog_name'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/css/style.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/font-awesome/css/font-awesome.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/plugin/datatable/datatables.css' ?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/jquery.js' ?>"></script>	
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/jquery-ui/jquery-ui.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/plugin/datatable/jquery.dataTables.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/plugin/datatable/datatables.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/plugin/ckeditor/ckeditor.js' ?>"></script>	
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
</head>
<body>
	<div class="col-md-2 admin-sidebar">
		<div class="admin-panel row">
			<div class="admin-image col-md-4">
				<img src="<?php echo base_url().'image/system/logo_unimal.png'; ?>">
			</div>
			<div class="admin-info col-md-8">
				<a href="" class="admin-name"><?php echo $this->session->userdata('name') ?></a>
				<p class=""> Online</p>
			</div>
		</div>

		<!-- admin menu -->		
		<div class="row">			
			<ul class="admin-sidebar-menu">
				<li class="batas">Menu Navigasi</li>
				<li><a href="<?php echo base_url().'admin' ?>"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
				<li>
					<a href="<?php echo base_url().'admin/headline' ?>"><span class="glyphicon glyphicon-comment"></span>Headline</a>
				</li>
				<li><a class="tutup" href="#"><span class="glyphicon glyphicon-pencil"></span> Posts</a>
					<ul class="sub">
						<li><a href="<?php echo base_url().'admin/posts' ?>"> All Posts</a></li>
						<li><a href="<?php echo base_url().'admin/post_add' ?>"> New Post</a></li>
						<li><a href="<?php echo base_url().'admin/category' ?>"> New Category</a></li>
					</ul>
				</li>
				<li>
					<a class="tutup" href="#"><span class="glyphicon glyphicon-user">
					</span>Alumni FT</a>
					<ul class="sub">
						<li><a href="<?php echo base_url().'admin/alumni' ?>">Daftar Alumni</a></li>
						<li><a href="<?php echo base_url().'admin/alumni_add' ?>"> Tambah Alumni</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url().'admin/dokumen' ?>"><span class="glyphicon glyphicon-picture"></span>Download</a></li>				
				<!-- <li><a href="<?php echo base_url()?>admin/slider""><span class="glyphicon glyphicon-leaf"></span> Slider</a>
				</li> -->
				<li><a href="<?php echo base_url().'admin/user' ?>"><span class="glyphicon glyphicon-user"></span> User</a></li>				
				<li><a href="<?php echo base_url().'admin/pengaduan' ?>"><span class="glyphicon glyphicon-list"></span> Pengaduan</a></li>			
			</ul>			
		</div>
		<!-- end admin menu -->		
	</div>
	<div class="col-md-10 admin-content pull-right">
		<nav class="col-md-10 col-md-offset-2 navbar navbar-default navbar-fixed-top navbar-top-admin" role="navigation">
			<div class="container-fluid">				
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand sidebar-toggle" href="#"><span class="glyphicon glyphicon-align-justify"></span></a>
					<a class="navbar-brand" target="_blank" href="<?php echo base_url(); ?>"><?phpphp echo base_url().'cms/index' ?>SISTEM INFORMASI ALUMNI FAKULTAS TEKNIK </a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">						
						<!-- <li><a href="#">Link</a></li>						 -->
					</ul>					
					<ul class="nav navbar-nav navbar-right">
						<!-- <li><a href="#">Link</a></li> -->
						<li class="dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $this->session->userdata('name') ?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">								
								<li><a href="<?php echo base_url().'admin/logout' ?>">Log Out</a></li>								
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>							
		<div class="main">