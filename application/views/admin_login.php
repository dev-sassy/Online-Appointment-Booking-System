<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin v1.0.0 - Login Page</title>
    <style>
    	.login_form{
			padding: 10px;
		}
		.main_content{
			width: 100%;
			margin: 10px;
		}
    </style>
</head>
<body>
    <div class="main_content">
    	<h3 align="center">Admin Login Page</h3>
    	<form method="post" id="login_form">
    		<div align="center">
    			<div class="login_form">
    				<label for="login_username">Username</label>
                    <input type="text" id="username" name="username" maxlength="10"  />
    			</div>
    			<div class="login_form">
    				<label for="login_username">Password  </label>
                    <input type="password" id="password" name="password" maxlength="14"  />
    			</div>
    			<div class="login_form">
    				<input type="submit" name="chk_login" value="Login"/>
    			</div>
    			<div>
	    			<a href="#">Forgot Password</a>
	    		</div>
    		</div>    		
    	</form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery_validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
	
</body>
</html>

