<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang=en><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="./stylesheets/bootstrap.min.css">
<link rel="stylesheet" href="./stylesheets/main.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.bootcss.com/tether/1.3.2/css/tether.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./stylesheets/main.css">
<link rel="stylesheet" type="text/css" href="./color_schemes">
<link rel='icon' href='./stylesheets/Bangalore_Institute_of_Technology_logo' type='image/x-icon'/ >
<script>
var blol = '<button onclick="cl()" style="float: right">Close Drop</button>';
  function cl() {
    document.getElementById("demo1").innerHTML = " ";
    // alert("HIII");
  }
  function displayDate1() {
    var h=name+", "+Date();
    var hello = document.getElementById("complaint").value;
    var temp2 = document.getElementById("complaint_ver").value;
    document.getElementById("demo1").innerHTML = h;//redundancy used for understanding 
    //use this variable name to query the database.
    //see codes of (php-ajax) ajax php and database.
    if (name.length == 0) {
      document.getElementById("demo1").innerHTML = "";
      return;
      } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo1").innerHTML =  blol + this.responseText;
        }
      };
    xmlhttp.open("GET", "queryengine01.php?q=" + hello + "&r=" + temp2, true);
    //sends query to gethint.php
    //update gethint.php build
    xmlhttp.send();
    
    }
  }
  function displayDate2() {
    var h=name+", "+Date();
    var hello = document.getElementById("suggest").value;
    var temp2 = document.getElementById("suggest_ver").value;
    document.getElementById("demo1").innerHTML = h;//redundancy used for understanding 
    //use this variable name to query the database.
    //see codes of (php-ajax) ajax php and database.
    if (name.length == 0) {
      document.getElementById("demo1").innerHTML = "";
      return;
      } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo1").innerHTML =  blol + this.responseText;
        }
      };
    xmlhttp.open("GET", "queryengine02.php?q=" + hello + "&r=" + temp2, true);
    //sends query to gethint.php
    //update gethint.php build
    xmlhttp.send();
    }
  }
  function displayDate3() {
    window.open("queryengine03.php?q=" + name);
  }
  function displayDate4() {
    window.open("queryengine04.php?q=" + name);
  }
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
var date = new Date();

function color_check() {
  var c = getCookie("color");
  if(c==""){
    document.cookie = "color=1;path=/" ;
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
    for(var j=0;j<4;j++){
      document.getElementsByTagName("select")[parseInt(j)].setAttribute("style","background: white; color:black; border: 1px solid white;");
    }
    document.getElementById("demo1").backgroundColor="#404040";
    document.getElementById("demo1").color="black";
    document.body.style.backgroundColor = "black";
    document.body.style.color="#d9d5d6";
  }
  else{ //white mode
    document.getElementById("color_m").innerHTML = "Dark Mode";
    for(var j=0;j<4;j++){
      document.getElementsByTagName("select")[parseInt(j)].setAttribute("style","background: #404040; color:white; border: 1px solid black;");
    }
    document.getElementById("demo1").backgroundColor="white";
    document.getElementById("demo1").color="black";
    document.body.style.backgroundColor = "white";
    document.body.style.color="black";
  }
}
</script>
</head>
<body onload="script:color_check();">
     <nav class="navbar navbar-fixed-top navbar-dark ">
            <ul>
              <li><a href="http://localhost/Build">Home</a></li>
              <li style="background-color:red;"><a href="http://localhost/Build/App/teacher">Teacher</a></li>
              <li style="float: right;background-color: aquamarine; border: none; padding: 2px;">
                <button id="color_mode" onclick="toggle()" style="background-color: inherit; border: none;"> 
                <img src="https://content.invisioncic.com/r229491/monthly_2018_10/icon.png.6ea8a7a7fbcf4c57df7b28ba4e996bb2.png"
                height="20" width="20"> <p id="color_m" style="margin-bottom: 0;">Dark Mode</p></button>
              </li>
            </ul>
      </nav>
    <div class="container">
      <hr style="background-color:red;">
      <br><br><br><br>
        <div class="row" style="display: flex;">
          <div class="col-md-5 title-logo"><img src="./stylesheets/student.png" class="img-responsive"></div>
          <div class="col-md-7 text-right">
            <h3 class="title-super text-uppercase text-thin" style="color: #686868c9;">Teacher Portal</h3>
            <h4 class="text-uppercase">Information you need.</h4>
          </div>
        </div>
        <div>
          <hr style="background-color:gray;">
        </div>
        <div class="row text-center">
          <div class="col-md-12">
              <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                  <h3>
                    <?php 
                      echo $_SESSION['success']; 
                      unset($_SESSION['success']);
                    ?>
                  </h3>
                </div>
              <?php endif ?>
              <!-- logged in user information -->
              <?php  if (isset($_SESSION['username'])) : ?>
                <p style="text-align: right">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <?php
                    $name = $_SESSION['username'];
                    echo '<script>'; 
                    echo 'var name = '.json_encode($name).';';
                    echo '</script>';
                   ?>
                <p style="text-align: right"> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
              <?php endif ?>
        </div>
        </div>
        <div class="row text-center">
          <h2 class="text-muted">Services</h2>
        </div>
        <div class="row text-center" style="padding-left: 10px;">
          <div class="col-md-6">
            <img src="./stylesheets/support.jpg" class="img-responsive im">
            <h3>Complaints</h3>
            <p>
              <form action="javascript:void(0);">
                <select id="complaint" >
                  <option value="classes">Class</option>
                  <option value="labs">Labs</option>
                  <option value="teachers">Teachers</option>
                  <option value="others">Others</option>
                </select>
                <select id="complaint_ver" >
                  <option value="0">UnSeen</option>
                  <option value="1">Read</option>
                  <option value="2">Resolved</option>
                </select>
                <button onclick="displayDate1()" >Search</button>
                <!-- <p id="demo1"></p> -->
              </form>
            </p>
          </div>
          <div class="col-md-6">
            <img src="./stylesheets/idea.jpg" class="img-responsive im">
            <h3>Suggestions</h3>
            <p>
            <form action="javascript:void(0);">
              <select id="suggest">
                <option value="classes">Class</option>
                <option value="labs">Labs</option>
                <option value="teachers">Teachers</option>
                <option value="others">Others</option>
              </select>
              <select id="suggest_ver">
                <option value="0">UnSeen</option>
                <option value="1">Read</option>
                <option value="2">Resolved</option>
              </select> 
              <button onclick="displayDate2()">Search</button>
              <!-- <p id="demo2"></p> -->
            </form>
            </p>
          </div>
        </div>
        <div class="row text-center">
        <p id="demo1"> </p>
        </div>
        <br>
        <hr>
        <div class="row text-center" style="padding-left:10px;">
          <div class="col-md-6">
            <iframe src="new.php?q=complaints" style="border:none; width:450px; height:500px;"></iframe>
          </div>
          <div class="col-md-6">
            <iframe src="new.php?q=suggestions" style="border:none; width:450px; height:500px;" ></iframe>
          </div>
        </div>
        <!-- <div class="row text-center" style="padding-left:10px;">
          <div class="col-md-6">
            <img src="./stylesheets/complaint.jpg" class="img-responsive im">
            <h3>New Complaint</h3>
            <p>
              <button onclick="displayDate3()">Click me?</button>
              <div id="demo3"></div>
            </p>
          </div>
          <div class="col-md-6">
            <img src="./stylesheets/suggestion.jpg" class="img-responsive im">
            <h3>New Suggestions</h3>
            <p>
              <button onclick="displayDate4()">Click me?</button>
              <p id="demo4"></p>
            </p>
          </div>
        </div> -->
        <br>
        <hr style="background-color:gray;">
        <div class="row text-center">
          <div class="col-md-12">
          <p>This is beta site under development. Policies and features are prone to abruptly change during this stage.
          User discretion is advised.The developers of this website do not hold any liablities. Images used in this website are not owned by us.
          </p>
          <hr style="background-color:gray;">
          <a style="text-align: center;">Copyright 2018</a>
          </div>
          <div class="col-md-12">
            <a class="btn btn-social-icon btn-github" href="https://www.github.com">
                  <span class="fa fa-github"></span>
            </a>
            <a class="btn btn-social-icon btn-twitter" href="https://www.twitter.com">
                  <span class="fa fa-twitter"></span>
            </a>
            <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com">
                  <span class="fa fa-facebook"></span>
            </a>
            <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com">
                  <span class="fa fa-linkedin"></span>
            </a>
            <br>
            <br>
            <hr>
        </div>
    </div>
  </div>
  <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/tether/1.3.2/js/tether.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
</body>
</html>