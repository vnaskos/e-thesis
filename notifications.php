<?php require_once('configuration.php'); ?>
<?php require_once('user/session.php'); ?>
<?php require_once('classes/include.php'); ?>
<?php require_once('functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Notifications | e-Thesis</title>
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
					$role = $authenticated ? $user['role'] : 0;
					echo SideMenu::getSideBarMenu(5, $role); ?>
				</div>
			</div>
			<div class="col-md-10">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">Notifications</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php
							if(!$authenticated) {
								include('views/unauthorized.php');
							} else {
								include('views/notifications_user.php');
							}?>
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
