<!DOCTYPE html>
<html lang="en-us" style="background-image: url(../assets/admin/img/login-background.jpg);
      height: 20px; ">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SIMS | Atlas Honda </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/demo.min.css">

		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/admin/css/custom/mycss.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/admin/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url()?>assets/admin/img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>

	<body class="" style="background-image: url(../assets/admin/img/login-background.jpg);
   background-position: 1070px;">

			<div id="content" class="container">

				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<div class="well no-padding customlogin">
							<form  id="login-form" class="smart-form client-form" novalidate="novalidate">
								 
									<span id="msg"></span>
								  
								<header>
									Login 
								</header>

								<fieldset>
									<img src="<?php echo base_url()?>assets/admin/img/logo.png" style="width: 203px; margin: 0px 91px;">
									<section>
										<label class="label">User Name</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="user_name" class="form-control" placeholder="Enter User Name">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter username</b></label>
									</section>

									<section>
										<label class="label">Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="password" class="form-control" placeholder="Enter Password">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
									</section>
									<section>
										<p>
											<?php 
												$randVal = rand();
												$_SESSION['ramdomval'] = $randVal;
												
												 ?>
										<?php echo $image;?>
										</p><br>
										<input type="text"  placeholder="Verify Robot" name="captcha" id="captcha" >
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										Sign in
									</button>
								</footer>
							</form>

						</div>
						
						
					</div>
				</div>
			</div>

		<!-- END MAIN PANEL -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url()?>assets/admin/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url()?>assets/admin/js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url()?>assets/admin/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url()?>assets/admin/js/app.config.js"></script>
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url()?>assets/admin/js/bootstrap/bootstrap.min.js"></script>
		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<script src="<?php echo base_url()?>assets/admin/js/notification/SmartNotification.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url()?>assets/admin/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url()?>assets/admin/js/app.min.js"></script>
		<script>
			var baseurl= "<?php echo base_url()?>";
		</script>
		<script src="<?php echo base_url()?>assets/admin/js/custom/script.js"></script>

		<!-- PAGE RELATED PLUGIN(S) 
		<script src="..."></script>-->
		<script>
			function CheckLoginEnter(evt)
		{
			if(evt.keyCode==13)
			SubmitLoginForm();
		}


		</script>


	</body>

</html>