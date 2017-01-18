<?php require_once('configuration.php'); ?>
<?php require_once('user/session.php'); ?>
<?php require_once('classes/include.php'); ?>
<?php require_once('functions.php'); ?>

<?php
$project = null;

if(isset($_GET['pid'])) {
	$id = $_GET['pid'];
	$project = Project::getProject($id);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Project Managment | e-Thesis</title>
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
					echo SideMenu::getSideBarMenu(4, $role); ?>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
							<div class="panel-heading">
								<div class="panel-title">Manage Thesis Project</div>
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
							</div>
							<div class="panel-body">
								<form action="manage_project_actions.php" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="input-project-title" class="col-sm-2 control-label">Title</label>
										<div class="col-sm-10">
											<input type="text" name="title" class="form-control" id="input-project-title" placeholder="Title" value="<?php if($project != null) echo $project->getTitle(); ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Description</label>
										<div class="col-sm-10">
											<textarea name="description" class="form-control ckeditor" placeholder="Description" rows="10"><?php if($project != null) echo $project->getDescription(); ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label" for="select-1">Status</label>
										<div class="col-md-10">
											
											<?php
											$selected_status = Project::STATUS_ACTIVE;
											if($project != null) {
												$selected_status = $project->getStatus();
											}?>
											<select name="status" class="form-control" id="select-1">
												<option value="1" <?php if($selected_status == Project::STATUS_ACTIVE) echo 'selected'; ?>selected>Active</option>
												<option value="2" <?php if($selected_status == Project::STATUS_CLOSED) echo 'selected'; ?>>Closed</option>
												<option value="3" <?php if($selected_status == Project::STATUS_ASSIGNED) echo 'selected'; ?>>Assigned</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Professor</label>
										<div class="col-sm-10">
											<span class="form-control"><?php echo $user['firstname'] . ' ' . $user['lastname'] ?></span>
										</div>
									</div>
									<?php if($project != null) { ?>
										<input type="hidden" name="pid" value="<?php echo $project->getId(); ?>">
									<?php } ?>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
										</div>
									</div>
								</form>
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
	<script src="ckeditor/ckeditor.js"></script>
</body>
</html>
