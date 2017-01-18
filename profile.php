<?php require_once('configuration.php'); ?>
<?php require_once('user/session.php'); ?>
<?php require_once('classes/include.php'); ?>
<?php require_once('functions.php'); ?>

<?php
$uid = isset($_GET['uid']) ? $_GET['uid'] : $user['id'];

if(isset($_GET['uid']) && $user['role'] != User::ROLE_PROFESSOR ) {
	redirect('index.php');
}

$user_obj;

if(isset($_GET['uid'])) {
	$user_obj = User::getUser($uid);
} else {
	$user_obj = new User($user['id'], $user['aem'], $user['username'],
			$user['email'], $user['firstname'],
			$user['lastname'], $user['role']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile | e-Thesis</title>
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
						<h1><a href="index.php">e-Thesis</a></h1>
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
						<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
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
					echo SideMenu::getSideBarMenu(0, $role); ?>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6">
						<div class="content-box-large">
							<div class="panel-heading">
								<div class="panel-title">Account Details</div>
							
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
							</div>
							<div class="panel-body">
								<p><?php echo $user_obj->getFullName(); ?></p>
								<p><?php echo $user_obj->getAem(); ?></p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<?php if(!isset($_GET['uid']) || ((isset($_GET['uid']) && ($user['id'] == $_GET['uid']) ))): ?>
						<div class="row">
							<div class="col-md-12">
								<div class="content-box-header">
									<div class="panel-title">Upload Files</div>
									<div class="panel-options">
										<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
										<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
									</div>
								</div>
								<div class="content-box-large box-with-header">
									<form enctype='multipart/form-data' action="manage_upload_actions.php" method="POST" class="form-horizontal" role="form">
										<div class="form-group">
											<label for="input-file" class="col-sm-2 control-label">Title</label>
											<div class="col-sm-10">
												<input type="file" name="file" class="form-control" id="input-file" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">Upload</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-header">
							<div class="panel-title">Uploads</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
						<div class="content-box-large box-with-header">
				  			<?php
				  			$uploads = Upload::getUploadsByUser($user_obj->getId());
				  			
				  			foreach($uploads as $upload) {
				  				echo '<a href="'.$upload->getFilepath().'" target="_blank">';
				  					if(strtolower(substr($upload->getFilepath(), -3)) == 'pdf') {
				  						echo '<img height="150" class="upload-img" src="images/PDF.jpg" />';
				  					} else {
				  						echo '<img height="150" class="upload-img" src="'.$upload->getFilepath().'" />';
				  					}
				  				echo '</a> ';
				  			}
				  			?>
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
