<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin v1.0.0 - Add New Patient</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>
<body>
	<?php $this->load->view("menu"); ?>
    <br>
    <div class="main_content">
    	<h3 align="center">Welcome : <?php echo $this->session->userdata('user_name'); ?></h3><br>
    	<h3 align="center">Add New Patient</h3>
    	<form method="post" id="add_p_form">
    		<div align="center">
    			<div class="login_form">
    				<label>First Name</label>
                    <input type="text" id="firstname" name="firstname" maxlength="25"  />
    			</div>
    			<div class="login_form">
    				<label>Last Name</label>
                    <input type="text" id="lastname" name="lastname" maxlength="25"  />
    			</div>
    			<div class="login_form">
    				<label>User Name</label>
                    <input type="text" id="username" name="username" maxlength="10"  />
                    <label id="mail_err"></label>
    			</div>
    			<div class="login_form">
    				<label>Password  </label>
                    <input type="password" id="password" name="password" maxlength="14"  />
    			</div>
    			<div class="login_form">
    				<label>Verify Password </label>
                    <input type="password" id="verify_password" name="verify_password" maxlength="14"  />
    			</div>
    			<div class="login_form">
    				<label>Paitent Email  </label>
                    <input type="text" id="p_email" name="p_email" maxlength="50"  />
    			</div>
    			<div class="login_form">
    				<label>Paitent Address  </label>
                    <textarea name="p_addr" id="p_addr"></textarea>
    			</div>
    			<div class="login_form">
    				<label>Paitent Contact  </label>
                    <input type="text" name="p_contact" id="p_contact" maxlength="15" />
    			</div>
    			<div class="login_form">
    				<label>Paitent Emergency Contact Name </label>
                    <input type="text" name="p_eme_contact_name" id="p_eme_contact_name" maxlength="25" />
    			</div>
    			<div class="login_form">
    				<label>Paitent Emergency Contact Number  </label>
                    <input type="text" name="p_eme_contact_num" id="p_eme_contact_num" maxlength="15" />
    			</div>
    			<div class="login_form">
    				<label>Paitent Emergency Contact Relationship  </label>
                    <input type="text" name="p_eme_contact_rel" id="p_eme_contact_rel" maxlength="15" />
    			</div>
    			<div class="login_form">
    				<input type="submit" name="add_p" id="add_p" value="Add Paitent"/>
    				<input type="submit" name="cancel" id="cancel" value="Cancel"/>
    			</div>
    			
    		</div>    		
    	</form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery_validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/patient.js"></script>
	
</body>
</html>

