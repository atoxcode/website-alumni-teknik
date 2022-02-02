<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Alumni Fakultas Teknik</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Work Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<!-- css files -->
    <link href="<?php echo base_url().'assets/css/bootstrap.css' ?>" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="<?php echo base_url().'assets/css/style.css' ?>" rel='stylesheet' type='text/css' />
    <!-- custom css -->
    <link href="<?php echo base_url().'assets/css/fontawesome-all.css' ?>" rel="stylesheet">
    <!-- fontawesome css -->
	<!-- //css files -->
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800&amp;subset=devanagari,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Niramit:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
	<!-- //google fonts -->


	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/plugin/datatable/datatables.css' ?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/jquery.js' ?>"></script>	
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/plugin/datatable/jquery.dataTables.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/admin/plugin/datatable/datatables.js' ?>"></script>


	
</head>
<body>
<!-- header -->
<header class="bg-white py-1">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<h1>
				<a class="navbar-brand" href="<?php echo base_url().'index.php' ?>">
					<!-- <i class="fab fa-python"></i> --><img src="<?php echo base_url().'image/system/unimal.png' ?>"> Alumni Teknik
				</a>
			</h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php if($this->session->userdata('status') == "login"){ ?>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-lg-4 mr-auto">
					   <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Data Alumni
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_sipil' ?>">Teknik Sipil</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_mesin' ?>">Teknik Mesin</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_elektro' ?>">Teknik Elektro</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_industri' ?>">Teknik Industri</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_kimia' ?>">Teknik Kimia</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_arsitektur' ?>">Teknik Arsitektur</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_informatika' ?>">Teknik Informatika</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_sisteminformasi' ?>">Sistem Informasi</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_material' ?>">Teknik Material</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_energi' ?>">Teknik Energi Terbarukan</a>
						</div>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'index.php/index/download' ?>">Download</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'index.php/index/aduan' ?>">Hubungi Kami</a>
					  </li>
					  <li class="nav-item">

						<a class="nav-link" style="color: #30C39E" href="<?php echo base_url().'index.php/index/register_edit/'.$this->session->userdata('nim'); ?> "><b>Perbaharui Data</b></a>
					  </li>
					</ul>
					<div class="header-right">
						<a href="<?php echo base_url().'index.php/index/signout_alumni' ?>" class="signin mr-4"> Sign out <i class="fas fa-sign-out-alt"></i></a>	
					</div>
				</div>
			<?php }else{ ?>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-lg-4 mr-auto">
					   <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Data Alumni
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_sipil' ?>">Teknik Sipil</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_mesin' ?>">Teknik Mesin</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_elektro' ?>">Teknik Elektro</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_industri' ?>">Teknik Industri</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_kimia' ?>">Teknik Kimia</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_arsitektur' ?>">Teknik Arsitektur</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_informatika' ?>">Teknik Informatika</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_sisteminformasi' ?>">Sistem Informasi</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_material' ?>">Teknik Material</a>
						  <a class="dropdown-item" href="<?php echo base_url().'index.php/index/alumni_energi' ?>">Teknik Energi Terbarukan</a>
						</div>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'index.php/index/download' ?>">Download</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'index.php/index/aduan' ?>">Hubungi Kami</a>
					  </li>
					</ul>
					<div class="header-right">
						<a href="<?php echo base_url().'index.php/index/signin_alumni' ?>" class="signin mr-4"> Sign in <i class="fas fa-sign-in-alt"></i></a>
						<a href="<?php echo base_url().'index.php/index/register' ?>" class="contact">Register</a>
					</div>
				</div>
			<?php } ?>
		</nav>
	</div>
</header>
<!-- //header -->