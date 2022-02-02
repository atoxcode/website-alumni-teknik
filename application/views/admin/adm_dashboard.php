<h3>Dashboard</h3>
<small>Dahsboard</small>
<div class="clearfix"></div>

<div class="panel panel-success">
	<div class="panel-heading">
		<header>Dashboard</header>
	</div>			
	<div class="panel-body">						
		<br/>	
		<h3>Selamat Datang di Sistem Informasi Alumni Fakultas Teknik</h3>
		<br/>				
		<table>
			<tr>
				<th class="col-md-2">Nama</th>
				<td class="col-md-1"> : </td>
				<td><?php echo $this->session->userdata('name'); ?></td>
			</tr>
			<tr>
				<th class="col-md-2">Level</th>
				<td class="col-md-1"> : </td>
				<td><?php echo $this->session->userdata('level'); ?></td>
			</tr>
			<tr>
				<th class="col-md-2">Status</th>
				<td class="col-md-1"> : </td>
				<td><div class="online"></div> Online</td>
			</tr>
		</table>
		<br/>			
	</div>	
</div>
<div class="clearfix"></div>

<div class="col-md-3"> 
	<div class="panel panel-success">
		<div class="panel-heading">
			<header align="center">Jumlah Alumni FT</header>
		</div>			
		<div class="panel-body row">
			<table class="table">
				<tr> 
					<td>Sipil</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Mesin</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Elektro</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Industri</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Kimia</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Arsitektur</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Informatika</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Sistem Informasi</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Material</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td>Energi Terbarukan</td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
				<tr> 
					<td><b>Total Alumni</b></td>
					<td>
						<b>
						<?php
							$this->load->database();
							$alumni = mysql_query("SELECT COUNT(alumni_jurusan = 'sipil') FROM tbl_alumni");
							$u = mysql_fetch_array($alumni);
							  		echo $u[0];
						 ?>
						 <?php  ?>
						</b>
					</td>
				</tr>
			</table>				
		</div>	
	</div>
</div>

<div class="row"> 
	<div class="col-md-3"> 
		<div class="panel panel-success">
			<div class="panel-heading">
				<header align="center">Posting Berita</header>
			</div>			
			<div class="panel-body row"><br/>				
				<table class="table"> 
					<tr> 
						<td>Published</td>
						<td><b><?php echo $this->m_dah->get_posts('publish')->num_rows()?></b></td>
					</tr>
					<tr> 
					<td>Draft</td>
						<td><b><?php echo $this->m_dah->get_posts('draft')->num_rows()?></b></td>
					</tr>
					<tr> 
						<td>Trash</td>
						<td><b><?php echo $this->m_dah->get_posts('trash')->num_rows()?></b></td>
					</tr>
				</table>
			</div>	
		</div>
	</div>
	
	<!-- <div class="col-md-3"> 
		<div class="box">
			<div class="box-heading">
				<header>Jlh Laporan KP yg belum ACC</header>
			</div>			
			<div class="box-body row">				
				<center>
					<h1>
						<span class="glyphicon glyphicon-tag"></span><br/><br/>
						<?php
							$this->load->database();
							$daftar = mysql_query("SELECT COUNT(mhs_id) FROM tbl_daftar");
							$d = mysql_fetch_array($daftar);
							  		echo $j[0];
						 ?>
						 <?php  ?>
					</h1>
				</center>
			</div>	
		</div>
	</div> -->
	<div class="col-md-3"> 
		<div class="panel panel-success">
			<div class="panel-heading">
				<header align="center">Admin</header>
			</div>			
			<div class="panel-body row">				
				<center>
					<h1>
						<span class="glyphicon glyphicon-user"></span><br/><br/>
						<?php
							$this->load->database();
							$user = mysql_query("SELECT COUNT(user_name) FROM tbl_user");
							$u = mysql_fetch_array($user);
							  		echo $u[0];
						 ?>
						 <?php  ?>
					</h1>
				</center>
			</div>	
		</div>
	</div>
</div>