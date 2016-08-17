<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin v1.0.0 - Edit Doctor</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>
<body>
	<?php $this->load->view("menu"); ?>
    <br>
    <div class="main_content">
    	<h3 align="center">Welcome : <?php echo $this->session->userdata('user_name'); ?></h3><br>
    	<h3 align="center">Edit Doctor</h3>
	    <form method="post" id="add_dr_form">
    		<div align="center">
    			<div class="login_form">
    				<label for="login_username">First Name</label>
                    <input type="text" id="firstname" name="firstname" maxlength="25" value="<?php echo $dr[0]['dr_name'] ?>"  />
    			</div>
    			<div class="login_form">
    				<label for="login_username">User Name</label>
                    <input type="text" id="username" name="username" maxlength="10" value="<?php echo $dr[0]['dr_user_name'] ?>" readonly />
                    <label id="mail_err"></label>
    			</div>
    			<div class="login_form">
    				<label for="login_username">Doctor Email  </label>
                    <input type="text" id="dr_email" name="dr_email" maxlength="50" value="<?php echo $dr[0]['dr_email'] ?>" />
    			</div>
    			<div class="login_form">
    				<input type="submit" name="update_dr" id="update_dr" value="Update"/>
    				<input type="submit" name="cancel" id="cancel" value="Cancel"/>
    			</div>
    			
    		</div>    		
    	</form>
		
    </div>
    
	
</body>
</html>

