<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Login Teacher</title>
<link rel="icon" href="stylesheets/bitlogo.png" type="image/x-icon">
<link rel="stylesheet" href="./stylesheets/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="script:color_check();">
<div class="container">
<div class="row">
<div class="col-md-6 fill">
	<div class="header">
		<h2>Login</h2>
		<h4>Teacher</h4>
	</div>
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
		<button id="color_mode" type="button" onclick="toggle(); return false;" style="background-color: inherit; border: none;"> 
     <img src="https://content.invisioncic.com/r229491/monthly_2018_10/icon.png.6ea8a7a7fbcf4c57df7b28ba4e996bb2.png"height="20" width="20"> <p id="color_m" style="margin-bottom: 0;">Dark Mode</p></button>
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php" class="ref">Sign up</a>
		</p>
		<p>
		Cancel and return to home page.<a href="http://localhost/Build" class="ref">Portal</a>
		</p>
	</form>
</div>
<div class="col-md-6 fill-image">
	<img src="pic1.jpg" width="100%" height="550px">
</div>
  </div>
</div>
</body>
</html>