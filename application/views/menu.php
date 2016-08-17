<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
<div class="main_content">
<nav id="primary_nav_wrap">
		<ul>
		  <li class="current-menu-item"><a href="<?php echo base_url().'admin/success_login' ?>">Home</a></li>
		  <li><a href="#">Doctor</a> 
		    <ul>
		      <li><a href="<?php echo base_url().'doctor' ?>">View Doctor</a></li>
		      <li><a href="<?php echo base_url().'doctor/add_doctor' ?>">Add Doctor</a></li>
		    </ul>
		  </li>
		  <li><a>Patient</a>
		    <ul>
		      <li><a href="#">View Patient</a></li>
		      <li><a href="<?php echo base_url().'patient/add_patient' ?>">Add Patient</a></li>
		    </ul>
		  </li>
		  <li><a href="#">Appointment</a>
		  	<ul>
		  		<ul>
			      <li><a href="#">View Appointment</a></li>
			      <li><a href="#">Add Appointment</a></li>
			    </ul>
		  	</ul>
		  </li>
		  <li><a href="<?php echo base_url().'admin/logout' ?>">Logout</a></li>
		</ul>
	</nav>
</div>


