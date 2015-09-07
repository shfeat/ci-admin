<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Sign in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
	      <?php 
	      echo form_open('admin/login/do');
	      echo '<div class="form-group has-feedback">';
	      echo form_input('email', '', array('placeholder'=>'Email', 'class'=>'form-control'));
	      echo '<span class="glyphicon glyphicon-envelope form-control-feedback"></span>';
	      echo '</div>';
	      echo '<div class="form-group has-feedback">';
	      echo form_password('password', '',  array('placeholder'=>'Password', 'class'=>'form-control'));
	      echo '<span class="glyphicon glyphicon-lock form-control-feedback"></span>';
	      echo '</div>';
	      if(isset($error) && $error){
	          echo '<div class="alert alert-error">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Email / Password mismatch.</strong>';
	          echo '</div>';             
	      }
	      echo '<div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">';
    	  //echo anchor('admin/signup', 'Sign up');
    	  echo '
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">';
    	  if(isset($back) && $back) {
    	  	echo '<input type="hidden" name="back" value="'.$back.'" />';
    	  }
          echo form_submit('submit', 'Sign in', 'class="btn btn-primary btn-block btn-flat"');    
		  echo '
            </div><!-- /.col -->
          </div>';
	      echo form_close();
	      ?>      
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
