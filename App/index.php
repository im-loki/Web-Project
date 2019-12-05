<?php session_start(); ?>
<!DOCTYPE html>
<html lang=en>
<head>
	<title>Home Page</title>
	<link rel="icon" href="stylesheets/bitlogo.png" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="./stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="./stylesheets/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.bootcss.com/tether/1.3.2/css/tether.min.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./stylesheets/main.css">
	<script>
		// Warning before leaving the page (back button, or outgoinglink)
		window.onbeforeunload = function() {
		  <?php session_destroy() ?>
		  return;//if we return nothing here (just calling return;) then there will be no pop-up question at all
		};

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
		    // document.cookie = "color" + "=" + "1" + ";" + "path=/";
		    document.cookie="color=1;path=/";
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
		  if(i==0){ //dark mode
		    document.getElementById("color_m").innerHTML = "Light Mode";
		    document.body.style.backgroundColor = "black";
		    document.body.style.color = "#9d9d9d";
		  }
		  else{ //white mode
		    document.getElementById("color_m").innerHTML = "Dark Mode";
		    document.body.style.backgroundColor = "white";
		    document.body.style.color="#353535";
		  }
		}
	</script>
</head>
<body onload="script:color_check();">
    <nav class="navbar navbar-fixed-top navbar-dark ">
            <ul>
              <li style="background-color:red;"><a href="http://localhost/Build">Home</a></li>
              <li><a href="./teacher">Teacher</a></li>
              <li><a href="./student">Student</a></li>
              <li><a href="./admin">Admin</a></li>
              <li style="float: right;background-color: aquamarine; border: none; padding: 2px;">
                <button id="color_mode" onclick="toggle()" style="background-color: inherit; border: none;"> 
                <img src="https://content.invisioncic.com/r229491/monthly_2018_10/icon.png.6ea8a7a7fbcf4c57df7b28ba4e996bb2.png"
                height="20" width="20"> <p id="color_m" style="margin-bottom: 0;">Dark Mode</p></button>
              </li>
            </ul>
    </nav>
    <div class="container">
      	<hr>
      	<br><br><br>
	    <div class="row" style="display: flex;">
	      <div class="col-md-2 title-logo"><img src="./stylesheets/bitlogo.png" class="img-responsive"></div>
	      <div class="col-md-10 text-right">
	      	<br>
	        <h3 class="title-super text-thin">Online BIT Complaints,Suggestions and Compliances</h3>
	        <h4 class="text-thin">Feel free. We do not reveal your usn in any manner.</h4>
	      </div>
	    </div>
	    <div>
	      <hr style="background-color:gray;">
	      <br>
	    </div>
	    <div class="row text-center">
	      <div class="col-md-12">
	      <img src="./stylesheets/college.jpg" class="img-responsive">
	    </div>
	    </div>
	    <div class="row text-center from_this">
	      <h2 class="text-muted">Services</h2>
	    </div>
	    <div class="row text-center" style="display: inline-flex; ">
	      <div class="col-md-6">
	        <img src="./stylesheets/complaint.jpg" class="img-responsive" data-toggle="modal" data-target="#project1">
	        <h3>Complaints</h3>
	        <p><a href="http://localhost/Build/App/student">Link to Register</a></p>
	      </div>
	      <div class="col-md-6">
	        <img src="./stylesheets/suggestion.jpg" class="img-responsive">
	        <h3>Suggestions</h3>
	        <p><a href= "http://localhost/Build/App/student">Link to Register</a></p>
	      </div>
	    </div>
	    <br>
	    <hr style="background-color:gray;">
	    <div class="row text-center">
	      <div class="col-md-12">
	      <p>Remember to keep the complaints/suggestions respectful</p>
	      <hr style="background-color:gray;">
	      </div>
	  	</div>
	  	<div class="row">
	      <div class="col-md-12" style="text-align: left">
	      	<p><strong>Developers:<strong></p>
	      	<p>Lokeshwar S (1BI16CS187)</p>
	      	<p>Vishveshwara Guthal (1BI16CS181) </p>
	      	<p>Semester: 7 Section: C</p>
	      	<p>2019-2020</p>
	        <p>GITHUB link:<a class="btn btn-social-icon btn-github" href="https://github.com/im-loki/Web-Project">
	        <span class="fa fa-github"></span></a></p>
	        <hr>
	   	 </div>
		</div>
	</div>
	<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/tether/1.3.2/js/tether.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
</body>
</html>
