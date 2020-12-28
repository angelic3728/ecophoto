<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">
<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->lang->line('dashboard') ?></h2>
	</header>

	<!-- start: page -->
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">
					<h2 class="panel-title mt-md" style="display: inline; vertical-align: middle;"><?php echo $this->lang->line('students_by_school') ?></h2>
					<br /><br />
					<div class="col-lg-12">
						<div class="chart chart-md" id="chart1"></div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">
					<h2 class="panel-title mt-md" style="display: inline; vertical-align: middle;"><?php echo $this->lang->line('photos_taken_by_user') ?></h2>
					<br /><br />
					<div class="col-lg-12">
						<div class="chart chart-md" id="chart2"></div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- <div class="panel-body">
		<div class="widget-summary">
			<div class="widget-summary-col widget-summary-col-icon">
				<div class="summary-icon bg-primary">
					<i class="fa fa-life-ring"></i>
				</div>
			</div>
			<div class="widget-summary-col">
				<div class="summary">
					<h4 class="title">Support Questions</h4>
					<div class="info">
						<strong class="amount">1281</strong>
						<span class="text-primary">(14 unread)</span>
					</div>
				</div>
				<div class="summary-footer">
					<a class="text-muted text-uppercase">(view all)</a>
				</div>
			</div>
		</div>
	</div> -->
</section>
</div>
</section>

<!-- Specific Page Vendor -->

<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-appear/jquery-appear.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/flot.tooltip/flot.tooltip.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/flot/jquery.flot.categories.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/flot/jquery.flot.resize.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.init.js"></script>

<!-- Examples -->
<script>
	(function($) {
		var color1 = '#f1800b';
		var color2 = '#8CC9E8';

		var json_bar_graph1 = {
			colors: [color1],
			series: {
				bars: {
					show: true,
					barWidth: 0.8,
					align: 'center'
				}
			},
			xaxis: {
				mode: 'categories',
				tickLength: 0
			},
			grid: {
				hoverable: true,
				clickable: true,
				borderColor: 'rgba(0,0,0,0.1)',
				borderWidth: 1,
				labelMargin: 15,
				backgroundColor: '#eeeeee'
			},
			tooltip: true,
			tooltipOpts: {
				content: '%y',
				shifts: {
					x: -10,
					y: 20
				},
				defaultTheme: false
			}
		}
		var json_bar_graph2 = {
			colors: [color2],
			series: {
				bars: {
					show: true,
					barWidth: 0.8,
					align: 'center'
				}
			},
			xaxis: {
				mode: 'categories',
				tickLength: 0
			},
			grid: {
				hoverable: true,
				clickable: true,
				borderColor: 'rgba(0,0,0,0.1)',
				borderWidth: 1,
				labelMargin: 15,
				backgroundColor: '#eeeeee'
			},
			tooltip: true,
			tooltipOpts: {
				content: '%y',
				shifts: {
					x: -10,
					y: 20
				},
				defaultTheme: false
			}
		}
		// data1 array init
		var school_array = [];

		<?php
		for ($i = 0; $i < count($data_school['school']); $i++) { ?>
			var item = ['<?php echo $data_school['school'][$i]; ?>', <?php echo $data_school['student'][$i]; ?>];
			school_array.push(item);
		<?php } ?>
		$.plot('#chart1', [school_array], json_bar_graph1);

		var user_array = [];

		<?php
		for ($i = 0; $i < count($data_user['user']); $i++) { ?>
			var item = ['<?php echo $data_user['user'][$i]; ?>', <?php echo $data_user['student'][$i]; ?>];
			user_array.push(item);
		<?php } ?>
		$.plot('#chart2', [user_array], json_bar_graph2);
	}).apply(this, [jQuery]);
</script>
</body>

</html>