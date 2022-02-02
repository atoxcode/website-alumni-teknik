<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/css/login.css' ?>"> -->
</head>
<body>
  <div class="wrap"><br><br><br><br>
    <center><img class="logo" src="<?php echo base_url().'image/system/logo_unimal.png' ?>"></center>
    <center><h3>SISTEM INFORMASI ALUMNI FAKULTAS TEKNIK</h3></center>
    <center><h2>UNIVERSITAS MALIKUSSALEH</h2></center><br>
    
    <div class="contact-form mt-5">
      <div class="col-lg-5 col-md-6 mx-auto">
        <?php show_alert(); ?> 
        <form action="<?php echo base_url().'alumnilogin/login_act' ?>" method="post">
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="uname" autocomplete="off">
            <?php echo form_error('uname','<div class="form-error">','</div>'); ?>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="pass">
            <?php echo form_error('pass','<div class="form-error">','</div>'); ?>
          </div>
          <div class="form-group" align="center">
            <input type="submit" name="submit" value="Sign In" class="btn btn-success col-lg-5 col-md-6 mx-auto" >
          </div>
          <div>
            <a clas="link pull-right" href="<?php echo base_url(); ?>">Kembali ke blog</a>
          </div>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>     
  </div>
</body>
</html>