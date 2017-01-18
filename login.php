<!DOCTYPE html>
<html>
<head>
	<title>Login | e-Thesis</title>
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
<body class="login-bg">
		<div class="header">
		 <div class="container">
			<div class="row">
				 <div class="col-md-12">
					<!-- Logo -->
					<div class="logo">
						<h1><a href="index.php">e-Thesis</a></h1>
					</div>
				 </div>
			</div>
		 </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 panel-warning">
				<div class="content-box-header panel-heading">
					<div class="panel-title ">Under Construction</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i
							class="glyphicon glyphicon-refresh"></i></a> <a href="#"
							data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
				<div class="content-box-large box-with-header">
					<h3>Demo users:</h3>
					<p>username: <b>prof</b> password: <b>prof</b><br/>
					username: <b>student</b> password: <b>student</b></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
					<div class="box">
						<div class="content-wrap">
							<h6>Sign In</h6>
							<form method="POST" action="user/login.php">
								<input class="form-control" name="username" type="text" placeholder="Username">
								<input class="form-control" name="password" type="password" placeholder="Password">
								<input type="hidden" name="action">
								<i>Please use your egram credentials</i>
								<div class="action">
									<input class="btn btn-primary signup" type="submit" value="Login">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>
