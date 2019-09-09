<!DOCTYPE html>
<html lang="en-us" >
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SIMS - Atlas Honda </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-production-plugins.min.css">
		<!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-production.min.css"> -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-rtl.min.css">


			<!-- Custom CSS  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/custom/mycss.css">

		<!-- Custom CSS  -->

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/admin/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url()?>assets/admin/img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"> -->
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url()?>assets/admin/js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>



	</head>

	<body>

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group" >

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img style="margin-top: -29px;" src="<?php echo base_url()?>assets/admin/img/logo.png" alt="Atlas Honda"> </span>
				<!-- END LOGO PLACEHOLDER -->

			</div>

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php echo base_url()?>admin/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

				<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="<?php echo base_url()?>admin/dashboard" id="show-shortcut" >

						<span>
							<?php echo $loginuser->USER_NAME?>
						</span>
					</a>

				</span>
			</div>
			<!-- end user info -->
			<nav>
				<ul>
						<li>
								<a href="<?php echo base_url()?>admin/dashboard" title="Staff"> <i class="fa  fa-lg fa-home"></i>  <span class="menu-item-parent">Dashboard</span></a>
							</li>
							<?php  if($this->session->userdata('USER_ROLE')=='Admin'){ ?>
							<li class="open">
						<a href="javascript:void(0);" title="Dashboard"><i class="fa fa-users"></i> <span class="menu-item-parent">Users </span></a>
						<ul style="display: none;"><!--
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('user_role','view_user_role')" title="User Role"><span class="menu-item-parent">User Role</span></a>
							</li> -->
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('dealer','view_dealer')" title="Dealers"><span class="menu-item-parent">Dealers</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('staff','view_staff')" title="Staff"><span class="menu-item-parent">Staff</span></a>
							</li>
						</ul>
					</li>

					<li class="top-menu-invisible open">
						<a href="javascript:void(0);"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">LOVs</span></a>
						<ul style="display: none;">
							<li class="">
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('region','view_region')" title="Region"><span class="menu-item-parent">Region</span></a>
							</li>
							<li class="">
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('territory','view_territory')" title="Territory"><span class="menu-item-parent">Territory</span></a>
							</li>
							<li class="">
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('city','view_city')" title="City"><span class="menu-item-parent">City</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('education','view_education')" title="Education" >Education</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('dealership_group','view_dealership_group')" title="Dealership Group" >Dealership Group</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('training','view_training')" title="Training" >Training</a>
							</li>
							<li>
								<a href="javascript:void(0);" title="Devices and Machines" onclick="LoadAjaxScreen('devices','view_devices')" > Devices and Machines</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('specialtools','view_specialtools')" title="Special Tools" >Special Tools</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('miscellaneoustools','view_miscellaneoustools')" title="Miscellaneous Tools">Miscellaneous Tools</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('services','view_services')" title="Services" >Services</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('accessories','view_accessories')" title="Parts & Accessories">Parts & Accessories</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('visit_type','view_visit_type')" title="Visit Type">Visit Type</a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('model','view_model')" title="Models">Models </a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('color','view_color')" title="Colors">Colors </a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('skills','view_skills')" title="Colors">Skills </a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('workshop','view_workshop')" title="Colors">Workshop Facilities </a>
							</li>
						</ul>
					</li>
					<li class="open">
						<a href="javascript:void(0);" title="Dashboard"><i class="fa fa-users"></i> <span class="menu-item-parent">Reports </span></a>
						<ul style="display: none;">
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_job_card')" title="Job Card"><span class="menu-item-parent">Job Card</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_job_card_summary')" title="Job Card Summary"><span class="menu-item-parent">Job Card Summary</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_free_service_summary')" title="Free Service Summary"><span class="menu-item-parent">Free Service Summary</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_free_service_detail')" title="Free Service Detail"><span class="menu-item-parent">Free Service Detail</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_network_summary')" title="Network Summary"><span class="menu-item-parent">Network Summary</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_dealer_business_summary')" title="Dealer Business Summary"><span class="menu-item-parent">Dealer Business Summary</span></a>
							</li>
						</ul>
					</li>
						<?php } else{ ?>
							<li>
								<a href="javascript:void(0);" title="Job Card"><i class="fa fa-anchor"></i> <span class="menu-item-parent">Job Card </span></a>
								<ul>
									<li>
										<a href="javascript:void(0);" onclick="LoadAjaxScreen('job_card','add_job_card')" title="Create Job Card"><span class="menu-item-parent">Create</span></a>
									</li>
									<li>
										<a href="javascript:void(0);" onclick="LoadAjaxScreen('job_card','view_job_card')" title="View & Edit Job Card"><span class="menu-item-parent">View & Edit</span></a>
									</li>
								</ul>
							</li>
							<!-- <li>
								<a href="javascript:void(0);" title="Job Card"><i class="fa fa-users"></i> <span class="menu-item-parent">Users </span></a>
								<ul>

								</ul>
							</li> -->
							<li>
								<a href="javascript:void(0);" title="Customers"  onclick="LoadAjaxScreen('customer_details','view_customer_details')" > <i class="fa fa-lg fa-users"></i>  <span class="menu-item-parent">Customers</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" title="Staffs"  onclick="LoadAjaxScreen('staff','view_staff')" > <i class="fa fa-lg fa-users"></i>  <span class="menu-item-parent">Staffs</span></a>
							</li>
							<li>
								<a href="javascript:void(0);" title="Reports"><i class="fa fa-list-alt"></i> <span class="menu-item-parent">Reports</span></a>
								<ul>
									<li>
										<a href="javascript:void(0);" onclick="LoadAjaxScreen('dealer_reports','view_business_monthly_1')" title="Monthly Business I"><span class="menu-item-parent">Monthly Business I</span></a>
									</li>
									<li>
										<a href="javascript:void(0);" onclick="LoadAjaxScreen('dealer_reports','view_business_monthly_2')" title="Monthly Business I"><span class="menu-item-parent">Monthly Business II</span></a>
									</li>
									</li>
									<li>
										<a href="javascript:void(0);" onclick="LoadAjaxScreen('reports','view_free_service_detail')" title="Free Service Details"><span class="menu-item-parent">Free Service Details</span></a>
									</li>
								</ul>
							</li>

						<?php } ?>


				</ul>
			</nav>


			<span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<div id="showloadscreen">
				<div class="se-pre-con"></div>
				<?php  $this->load->view($view,$viewData); ?>
			</div>

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<!-- <span class="txt-color-white">Atlas Honda<span class="hidden-xs"> - Sims</span> © 2019-2020</span> -->
				</div>

			</div>
		</div>
		<!-- END PAGE FOOTER -->



		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url()?>assets/admin/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->


		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url()?>assets/admin/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>


		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url()?>assets/admin/js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url()?>assets/admin/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo base_url()?>assets/admin/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo base_url()?>assets/admin/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->



		<!-- <script src="<?php echo base_url()?>assets/admin/js/demo.min.js"></script> -->
		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url()?>assets/admin/js/app.min.js"></script>

			<!-- PAGE RELATED PLUGIN(S) -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script src="<?php echo base_url()?>assets/admin/js/plugin/moment/moment.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script>
			var baseurl= "<?php echo base_url()?>";
		</script>
		<script src="<?php echo base_url()?>assets/admin/js/jquery.mask.js"></script>
			<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.cust.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.fillbetween.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.orderBar.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.time.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

		<script src="<?php echo base_url()?>assets/admin/js/plugin/moment/moment.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/plugin/chartjs/chart.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/custom/script.js"></script>




	</body>

</html>
