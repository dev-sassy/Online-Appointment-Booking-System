<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<?php
$data[''] = '';
$this->load->view('head',$data);
?>
<body class="sticky-header">
<section>
	<!-- left side start-->
	<?php
		$this->load->view('nav');
	?>
	<!-- left side end-->
	
	<!-- main content start-->
	<div class="main-content" >
		<!-- header section start-->
			<?php
				$this->load->view('header');
			?>	
		<!-- header section end-->	
		
			 <!-- page heading start-->
			 <div class="page-heading">
				<h3>
					Dashboard
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Dashboard</a>
					</li>
					<li class="active"> My Dashboard </li>
				</ul>
			 </div>
			 <!-- page heading end-->
			 <!--body wrapper start-->
			 <div class="wrapper">
				<?= $content;?>
			 </div>
			 <!--body wrapper end-->
			 <!--footer section start-->
			 <footer>
				<?php echo date('Y')." &copy; Sassy infotech"; ?>
			 </footer>
			<!--footer section end-->
		
	</div>
	<!-- main content end-->
</section>
<?php 
$this->load->view('footer');
?>
</body>
</html>

