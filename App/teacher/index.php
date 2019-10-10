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
 <script>
 
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
        document.getElementById("demo1").innerHTML = this.responseText;
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
    document.getElementById("demo2").innerHTML = h;//redundancy used for understanding 
    //use this variable name to query the database.
    //see codes of (php-ajax) ajax php and database.
    if (name.length == 0) {
      document.getElementById("demo2").innerHTML = "";
      return;
      } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo2").innerHTML = this.responseText;
        }
      };
    xmlhttp.open("GET", "queryengine02.php?q=" + hello + "&r=" + temp2, true);
    //sends query to gethint.php
    //update gethint.php build
    xmlhttp.send();
    }
  }
  function displayDate3() {
    // var h=name+", "+Date();
    // document.getElementById("demo3").innerHTML = h;//redundancy used for understanding 
    // //use this variable name to query the database.
    // //see codes of (php-ajax) ajax php and database.
    // if (name.length == 0) {
    //   document.getElementById("demo3").innerHTML = "";
    //   return;
    //   } else {
    //   var xmlhttp = new XMLHttpRequest();
    //   xmlhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("demo3").innerHTML = this.responseText;
    //     }
    //   };
    // xmlhttp.open("GET", "queryengine03.php?q=" + name, true);
    // //sends query to gethint.php
    // //update gethint.php build
    // xmlhttp.send();
    // }
    window.open("queryengine03.php?q=" + name);
  }
  function displayDate4() {
    // var h=name+", "+Date();
    // document.getElementById("demo4").innerHTML = h;//redundancy used for understanding 
    // //use this variable name to query the database.
    // //see codes of (php-ajax) ajax php and database.
    // if (name.length == 0) {
    // document.getElementById("demo4").innerHTML = "";
    // return;
    // } else {
    // var xmlhttp = new XMLHttpRequest();
    // xmlhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //   document.getElementById("demo4").innerHTML = this.responseText;
    //   }
    // };
    // xmlhttp.open("GET", "queryengine04.php?q=" + name, true);
    // //sends query to gethint.php
    // //update gethint.php build
    // xmlhttp.send();
    // }

    window.open("queryengine04.php?q=" + name);
  }
</script>
</head>
  <body>
     <nav class="navbar navbar-fixed-top navbar-dark ">
            <ul>
              <li><a href="http://localhost/Build">Home</a></li>
              <li style="background-color:red;"><a href="http://localhost/Build/App/teacher">Teacher</li>
            </ul>
      </nav>
    <div class="container">
      <hr>
      <br><br><br><br>
        <div class="row" style="display: flex;">
          <div class="col-md-5 title-logo"><img src="./stylesheets/student.png" class="img-responsive"></div>
          <div class="col-md-7 text-right">
            <h3 class="title-super text-uppercase text-thin">Student Portal</h3>
            <h4 class="text-uppercase">Information you need.</h4>
          </div>
        </div>
        <div>
          <hr>
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
        <div class="row text-center">
          <div class="col-md-6">
            <img src="./stylesheets/attend.png" class="img-responsive">
            <h3>Complaints</h3>
            <p>
              <form action="javascript:void(0);">
                <select id="complaint">
                  <option value="class">Class</option>
                  <option value="labs">Labs</option>
                  <option value="teachers">Teachers</option>
                  <option value="others">Others</option>
                </select>
                <select id="complaint_ver">
                  <option value="0">UnSeen</option>
                  <option value="1">Read</option>
                  <option value="2">Resolved</option>
                </select>
                <button onclick="displayDate1()">Click me?</button>
                <p id="demo1"></p>
              </form>
            </p>
          </div>
          <div class="col-md-6">
            <img src="./stylesheets/marks1.jpg" class="img-responsive">
            <h3>Suggestions</h3>
            <p>
            <form action="javascript:void(0);">
              <select id="suggest">
                <option value="class">Class</option>
                <option value="labs">Labs</option>
                <option value="teachers">Teachers</option>
                <option value="others">Others</option>
              </select>
              <select id="suggest_ver">
                <option value="0">UnSeen</option>
                <option value="1">Read</option>
                <option value="2">Resolved</option>
              </select> 
              <button onclick="displayDate2()">Click me?</button>
              <p id="demo2"></p>
            </form>
            </p>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-6">
            <img src="./stylesheets/mentor.jpg" class="img-responsive">
            <h3>New Complaint</h3>
            <p>
              <button onclick="displayDate3()">Click me?</button>
              <p id="demo3"></p>
            </p>
          </div>
          <div class="col-md-6">
            <img src="./stylesheets/events.jpg" class="img-responsive">
            <h3>New Suggestions</h3>
            <p>
              <button onclick="displayDate4()">Click me?</button>
              <p id="demo4"></p>
            </p>
          </div>
        </div>
        <br>
        <hr>
        <div class="row text-center">
          <div class="col-md-12">
          <p>This is beta site under development. Policies and features are prone to abruptly change during this stage.
          User discretion is advised.The developers of this website do not hold any liablities. Images used in this website are not owned by us.
          </p>
          <hr>
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