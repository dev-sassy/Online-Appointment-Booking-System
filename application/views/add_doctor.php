<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin v1.0.0 - Add New Doctor</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>
<body>
	<?php $this->load->view("menu"); ?>
    <br>
    <div class="main_content">
    	<h3 align="center">Welcome : <?php echo $this->session->userdata('user_name'); ?></h3><br>
    	<h3 align="center">Add New Doctor</h3>
    	<form method="post" id="add_dr_form">
    		<div align="center">
    			<div class="login_form">
    				<label for="login_username">First Name</label>
                    <input type="text" id="firstname" name="firstname" maxlength="25"  />
    			</div>
    			<div class="login_form">
    				<label for="login_username">User Name</label>
                    <input type="text" id="username" name="username" maxlength="10"  />
                    <label id="mail_err"></label>
    			</div>
    			<div class="login_form">
    				<label for="login_username">Password  </label>
                    <input type="password" id="password" name="password" maxlength="14"  />
    			</div>
    			<div class="login_form">
    				<label for="login_username">Verify Password </label>
                    <input type="password" id="verify_password" name="verify_password" maxlength="14"  />
    			</div>
    			<div class="login_form">
    				<label for="login_username">Doctor Email  </label>
                    <input type="text" id="dr_email" name="dr_email" maxlength="50"  />
    			</div>
    			<div class="login_form">
    				<input type="submit" name="add_dr" id="add_dr" value="Add Doctor"/>
    			</div>
    			
    		</div>    		
    	</form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery_validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/doctor.js"></script>
	
</body>
</html>

