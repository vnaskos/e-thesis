<?php require_once('configuration.php'); ?>
<?php require_once('user/session.php'); ?>
<?php require_once('classes/include.php'); ?>
<?php require_once('functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>e-Thesis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="css/styles.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<!-- Logo -->
					<div class="logo">
						<h1>
							<a href="index.php">e-Thesis</a>
						</h1>
					</div>
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-lg-12">
							<div class="input-group form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button">Search</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="navbar navbar-inverse" role="banner">
						<nav
							class="collapse navbar-collapse bs-navbar-collapse navbar-right"
							role="navigation">
							<ul class="nav navbar-nav">
								<li class="dropdown"><a href="#" class="dropdown-toggle"
									data-toggle="dropdown">My Account <b class="caret"></b></a>
									<ul class="dropdown-menu animated fadeInUp">
										<?php getNavBarMenu($authenticated); ?>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-md-2">
				<div class="sidebar content-box" style="display: block;">
					<?php
					$role = $authenticated ? $user ['role'] : 0;
					echo SideMenu::getSideBarMenu ( 0, $role );
					?>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12 panel-warning">
						<div class="content-box-header panel-heading">
							<div class="panel-title ">Under Construction</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i
									class="glyphicon glyphicon-refresh"></i></a> <a href="#"
									data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
						<div class="content-box-large box-with-header">
							<p>Our service is currently unavailable to the public!</p>
							<h3>Demo users:</h3>
							<p>username: <b>prof</b> password: <b>prof</b><br/>
							username: <b>student</b> password: <b>student</b></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="content-box-large">
							<div class="panel-heading">
								<div class="panel-title">About Our Service</div>

								<div class="panel-options">
									<a href="#" data-rel="collapse"><i
										class="glyphicon glyphicon-refresh"></i></a> <a href="#"
										data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
							</div>
							<div class="panel-body">
								<p>E-thesis is an open source service, developed under the
									(Programmatistikes Efarmoges sto Diadiktuo) course of
									Technological Education Institute of Central Macedonia Greece
									winter semester 2016-17.</p>
								<p>The problem we were dealing with, was miscommunication
									between the teachers and the students for the assignment of the
									final project (thesis). The solution we came up with, is
									simple, easy and fast, you don't even have to register. By
									logging in, using your egram credentials, for the first time,
									you authorize the cross-examination of your information with
									the egram platform.</p>
								<p>Teachers can upload and manage their projects. Students can
									upload information about themselves (eg. transcript of records)
									and apply to the projects. The teacher can either confirm or
									reject the applications after reviewing, students information.</p>
								<p>A notification system helps the user keep track of the
									changes in the projects and applications.</p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="content-box-header">
									<div class="panel-title">About Us</div>

									<div class="panel-options">
										<a href="#" data-rel="collapse"><i
											class="glyphicon glyphicon-refresh"></i></a> <a href="#"
											data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
									</div>
								</div>
								<div class="content-box-large box-with-header">
									<p>We are a team of independent developers, currently studing
										computer engineering on Technological Educational Institute of
										Central Macedonia Greece.</p>
									<p>
										Vasilis Naskos (3859)<br />Giorgos Emertzis (3773)<br />Despoina
										Taskoudi (3829)<br />Karen Nersesian (3839)
									</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="content-box-header">
									<div class="panel-title">Community</div>
									<div class="panel-options">
										<a href="#" data-rel="collapse"><i
											class="glyphicon glyphicon-refresh"></i></a> <a href="#"
											data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
									</div>
								</div>
								<div class="content-box-large box-with-header">
									<p>As we mentioned this project is open source, you can help us expand to your department or even better to your institute. Find our project on <a href="#">Github</a></p>
									<br />
									<br />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="copy text-center">
				<?php getCopyrightText(); ?>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>
