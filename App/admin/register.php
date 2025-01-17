<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Admin</title>
<link rel="icon" href="stylesheets/bitlogo.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="style_r.css">
<script>
	var i=0;
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var j = 0; j < ca.length; j++) {
    var c = ca[j];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function color_check() {
  var c = getCookie("color");
  if(c==""){
    document.cookie = "color=1;path=/";
    i = 1;
  }
  else {
    // alert(c);
    i=c;
  }
  color_set();
}
function toggle(){
  if (i==1){
    i = 0;
    document.cookie = "color=0;path=/";
  }
  else {
    i = 1;
    document.cookie = "color=1;path=/";
  }
  color_set();
}

	function color_set() {
    if(i==0){
      document.getElementById("color_m").innerHTML = "Light Mode";
			document.getElementsByClassName("header")[0].style.color="white";
			document.getElementsByClassName("header")[0].style.backgroundColor="black";
			document.getElementsByClassName("fill")[0].style.color="white";
			document.getElementsByClassName("fill")[0].style.backgroundColor="#263238";
			document.getElementsByClassName("ref")[0].style.color="pink";
      document.body.style.backgroundColor = "#000a12";
    }
    else{
      document.getElementById("color_m").innerHTML = "Dark Mode";
			document.getElementsByClassName("header")[0].style.color="black";
			document.getElementsByClassName("header")[0].style.backgroundColor="#FAFAFA";
			document.getElementsByClassName("fill")[0].style.color="black";
			document.getElementsByClassName("fill")[0].style.backgroundColor="#ECEFF1";
			document.getElementsByClassName("ref")[0].style.color="red";
      document.body.style.backgroundColor = "#FAFAFA";
    }
  }
</script>
</head>
<body onload="script:color_check();">
	<div class="con">
		<div class="fill">
			<div class="header">
				<h2>Register</h2>
				<h4>Admin</h4>
			</div>
			<form method="post" action="register.php">
				<?php include('errors.php'); ?>
				<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
				</div>
				<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>">
				</div>
				<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
				</div>
				<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
				</div>
				<div class="input-group">
				<button id="color_mode" type="button" onclick="toggle(); return false;" style="background-color: inherit; border: none;"> 
                <img src="https://content.invisioncic.com/r229491/monthly_2018_10/icon.png.6ea8a7a7fbcf4c57df7b28ba4e996bb2.png"
                height="20" width="20"> <p id="color_m" style="margin-bottom: 0;">Dark Mode</p></button>
				<button type="submit" class="btn" name="reg_user">Register</button>
				</div>
				<p>
					Already a member? <a href="login.php" class="ref">Sign in</a>
				</p>
			</form>
		</div>
		<div class="fill-image">
			<img src="pic1.jpg" width="100%" height="650px">
		</div>
	</div>
</body>
</html>