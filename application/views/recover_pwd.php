<!doctype html>
<html class="fixed">
	<head>
		<title><?php echo S_SITE; ?></title>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<!--link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/backend/images/shortcut.png">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>/assets/backend/vendor/modernizr/modernizr.js"></script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
				<img src="<?php echo base_url();?>assets/backend/images/logo.png" style="margin-top: -30px; margin-left: 110px; height:90px;" alt="Porto Admin" />
					<!-- <p style="font-size: 35px; font-family: fantasy; font-weight: bold;">ECOPHOTO</p> -->
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h2>
					</div>
					<div class="panel-body">
						<?php if ($error!='') { 
							if (strpos($error, 'password') !== false) {?>
								<div class="alert alert-info">
									<p class="m-none text-semibold h6"><?php echo $error; ?></p>
								</div>
							<?php } else {?>
								<div class="alert alert-danger">
									<p class="m-none text-semibold h6"><?php echo $error;?></p>
								</div>
							<?php }
						} else { ?>
							<div class="alert alert-info">
								<p class="m-none text-semibold h6">Enter your user email below and we will send you reset instructions!</p>
							</div>
						<?php }?>
						<form action="<?php echo base_url();?>signin/reset_password" method="post">
							<div class="form-group mb-none">
								<div class="input-group">
									<input name="email" type="email" value="<?php echo $email;?>" placeholder="eg.: email@email.com" class="form-control input-lg" required aria-required="true"/>
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg" type="submit">Reset!</button>
									</span>
								</div>
							</div>

							<p class="text-center mt-lg">Remembered? <a href="<?php echo base_url();?>signin">Sign In!</a>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo base_url();?>/assets/backend/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>/assets/backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url();?>/assets/backend/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>/assets/backend/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url();?>/assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>/assets/backend/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url();?>/assets/backend/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>/assets/backend/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>/assets/backend/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>/assets/backend/javascripts/theme.init.js"></script>

	</body>
</html>