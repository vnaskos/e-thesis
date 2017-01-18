<?php require_once('configuration.php'); ?>
<?php require_once('user/session.php'); ?>
<?php require_once('classes/include.php'); ?>
<?php require_once('functions.php'); ?>

<?php $project = Project::getProject($_GET['id']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Project | e-Thesis</title>
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
					echo SideMenu::getSideBarMenu(1, $role); ?>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-8">
						<div class="content-box-large">
							<div class="panel-heading">
								<div class="panel-title"><?php echo $project->getTitle(); ?></div>

								<div class="panel-options">
									<a href="#" data-rel="collapse"><i
										class="glyphicon glyphicon-refresh"></i></a> <a href="#"
										data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
							</div>
							<div class="panel-body">
								<?php echo $project->getDescription(); ?>
								<br />
								<br />
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12">
								<div class="content-box-header">
									<div class="panel-title">Details</div>
									<div class="panel-options">
										<a href="#" data-rel="collapse"><i
											class="glyphicon glyphicon-refresh"></i></a> <a href="#"
											data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
									</div>
								</div>
								<div class="content-box-large box-with-header">
									<h4>Project:</h4>
									<ul>
										<li>Created At: <?php echo $project->getCreatedDate(); ?></li>
										<li>Last Modified: <?php echo $project->getModifiedDate(); ?></li>
										<li>Status: <?php echo $project->getHumanReadableStatus(); ?></li>
									</ul>
									<h4>Professor:</h4>
									<ul>
										<li>Name: <?php echo $project->getProfName(); ?></li>
										<li>Email: <?php echo $project->getProfEmail(); ?></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="content-box-header">
									<div class="panel-title">Requirements</div>

									<div class="panel-options">
										<a href="#" data-rel="collapse"><i
											class="glyphicon glyphicon-refresh"></i></a> <a href="#"
											data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
									</div>
								</div>
								<div class="content-box-large box-with-header">
									This is a placeholder for the project requirements...<br /><br />
									<?php if($authenticated && $user['role'] == User::ROLE_STUDENT) {
										echo '<p>If you have what it needs apply now!</p>';
										echo '<a href="#" class="btn btn-success">APPLY</a>';
									} else if($authenticated && $user['role'] == User::ROLE_PROFESSOR) {
										echo '<a href="manage_project.php?action=edit&pid='.$project->getId().'" class="btn btn-primary">EDIT</a>';
										echo ' <a href="manage_project.php?action=delete&pid='.$project->getId().'" class="btn btn-danger">DELETE</a>';
									}?>
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
