<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title><?php echo S_SITE; ?></title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Created in 2018/03/30">
	<meta name="author" content="ujs">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<!--link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/backend/images/shortcut.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/select2/css/select2.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/stylesheets/theme-custom.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/pnotify/pnotify.custom.css" />

	<!-- Head Libs -->
	<script src="<?php echo base_url(); ?>/assets/backend/vendor/modernizr/modernizr.js"></script>
</head>

<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="<?php base_url(); ?>" class="logo">
					<img src="<?php echo base_url(); ?>assets/backend/images/logo.png" height="40" alt="Porto Admin" />
					<!-- <p style="font-size: 35px; font-family: fantasy; font-weight: bold;"><?php echo S_SITE; ?></p> -->
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">
				<select class="lang_select">
					<option value="1" <?php if ($lang_val == "en") echo "selected"; ?>><?php echo $this->lang->line('english') ?></option>
					<option value="2" <?php if ($lang_val == "fr") echo "selected"; ?>><?php echo $this->lang->line('french') ?></option>
				</select>
				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="<?php echo base_url(); ?>/assets/backend/images/!happy-face.png" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo base_url(); ?>/assets/backend/images/!logged-user.jpg" />
						</figure>
						<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
							<span class="name"><?php echo $_SESSION[S_SITE][S_DATA]['userid']; ?></span>
							<span class="role"><?php echo $_SESSION[S_SITE][S_DATA]['type']; ?></span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="<?php echo base_url() . $_SESSION[S_SITE][S_DATA]['type'] . '/go_profile'; ?>"><i class="fa fa-user"></i> <?php echo $this->lang->line('my_profile') ?></a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> <?php echo $this->lang->line('look_screen') ?></a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>signin"><i class="fa fa-power-off"></i> <?php echo $this->lang->line('log_out') ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">
						<?php echo $this->lang->line('menu') ?>
					</div>
					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li <?php if ($page == 'dashboard') echo 'class="nav-active"'; ?>>
									<a href="<?php echo base_url(); ?>admin/dashboard">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span><?php echo $this->lang->line('dashboard') ?></span>
									</a>
								</li>
								<?php if ($_SESSION[S_SITE][S_DATA]['type'] == ADMIN) { ?>
									<li <?php if ($page == 'users') echo 'class="nav-active"'; ?>>
										<a href="<?php echo base_url(); ?>admin/go_users">
											<i class="fa fa-user" aria-hidden="true"></i>
											<span><?php echo $this->lang->line('users') ?></span>
										</a>
									</li>
									<li <?php if ($page == 'schools') echo 'class="nav-active"'; ?>>
										<a href="<?php echo base_url(); ?>admin/go_schools">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span><?php echo $this->lang->line('schools') ?></span>
										</a>
									</li>
									<li <?php if ($page == 'students') echo 'class="nav-active"'; ?>>
										<a href="<?php echo base_url() . $_SESSION[S_SITE][S_DATA]['type']; ?>/go_students">
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span><?php echo $this->lang->line('uploaded_photos') ?></span>
										</a>
									</li>
									<li <?php if ($page == 'unimatched_photos') echo 'class="nav-active"'; ?>>
										<a href="<?php echo base_url() . $_SESSION[S_SITE][S_DATA]['type']; ?>/go_unimatched_photos">
											<i class="fa fa-frown-o" aria-hidden="true"></i>
											<span><?php echo $this->lang->line('unimatched_photos') ?></span>
										</a>
									</li>
								<?php } ?>
								<li <?php if ($page == 'api') echo 'class="nav-active"'; ?>>
									<a href="<?php echo base_url() . $_SESSION[S_SITE][S_DATA]['type']; ?>/go_api">
										<i class="fa fa-share" aria-hidden="true"></i>
										<span><?php echo $this->lang->line('api') ?></span>
									</a>
								</li>

							</ul>
						</nav>

					</div>

				</div>

			</aside>
			<!-- end: sidebar -->

			<!-- Vendor -->
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery/jquery.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap/js/bootstrap.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/nanoscroller/nanoscroller.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/magnific-popup.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/select2/js/select2.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-placeholder/jquery-placeholder.js"></script>
			<script>
				$('.lang_select').change(function() {
					var lang_val = $(this).val();
					var data = {
						'lang_val': lang_val
					}
					$.ajax({
						url: "<?php echo base_url(); ?>admin/set_lang",
						data: data,
						type: 'POST',
						success: function(result) {
							if (result == 200) {
								// window.history.go(0);
								location.reload();
							} else {
								alert('Add Error');
							}
						}
					});
				});
			</script>