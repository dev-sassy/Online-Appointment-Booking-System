<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin v1.0.0 - View Doctor</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>
<body>
	<?php $this->load->view("menu"); ?>
    <br>
    <div class="main_content">
    	<h3 align="center">Welcome : <?php echo $this->session->userdata('user_name'); ?></h3><br>
    	<h3 align="center">Doctor List</h3>
    	<?php 
    	if($dr_count >= 1)
    	{ ?>
	    	<table align="center" cellpadding="5" cellspacing="5" border="6">
	    		<tr>
	    			<td>
	    				User Name
	    			</td>
	    			<td>
	    				Doctor Name
	    			</td>
	    			<td>
	    				Doctor Email
	    			</td>
	    		</tr>
	    		<?php 
	    			foreach($dr as $dr_list)
	    			{?>
						<tr>
							<td>
								<?php echo $dr_list->dr_user_name; ?>
							</td>
							<td>
								<?php echo $dr_list->dr_name; ?>
							</td>
							<td>
								<?php echo $dr_list->dr_email; ?>
							</td>
							<td>
								<a href="<?php echo base_url().'index.php/doctor/edit_doctor/'.$dr_list->dr_id; ?>">Edit</a>
							</td>
							<td>
								<a href="<?php echo base_url().'index.php/doctor/del_doctor/'.$dr_list->dr_id; ?>" onclick="return confirm('are you sure?')">Delete</a>
							</td>
						</tr>
					<?php }	
	    		?>
	    	</table>
		<?php } else { ?>
			<h4 align="center">No Record Found</h4>
		<?php } ?>
    </div>
    
	
</body>
</html>

