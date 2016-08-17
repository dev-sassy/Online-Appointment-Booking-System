<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin v1.0.0 - Home Page</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>
<body>
	<?php $this->load->view("menu"); ?>
    <br>
    <div class="main_content">
    	<h3 align="center">Welcome : <?php echo $this->session->userdata('user_name'); ?></h3>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery_validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
	
</body>
</html>

