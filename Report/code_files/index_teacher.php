<!DOCTYPE html>
<html lang=en><head>
<title>Teacher Page</title>
<link rel="icon" href="stylesheets/bitlogo.png" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./stylesheets/main.css">
<script>
  function fetch_table1() {
    var h=name;
    var h1 = document.getElementById("complaint").value;
    var temp2 = document.getElementById("complaint_ver").value;
    document.getElementById("demo1").innerHTML = h;
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
    xmlhttp.open("GET", "queryengine01.php?q=" + h1 + "&r=" + temp2, true);
    xmlhttp.send();
    
    }
  }
  function fetch_table2() {
    var h=name;
    var h1 = document.getElementById("suggest").value;
    var temp2 = document.getElementById("suggest_ver").value;
    document.getElementById("demo1").innerHTML = h;
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
    xmlhttp.open("GET", "queryengine02.php?q=" + h1 + "&r=" + temp2, true);
    xmlhttp.send();
    }
  }
  function next_query1() {
    window.open("queryengine03.php?q=" + name);
  }
  function next_query2() {
    window.open("queryengine04.php?q=" + name);
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
                <button onclick="fetch_table1()" >Search</button>
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
              <button onclick="fetch_table2()">Search</button>
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
        <br>
        <hr style="background-color:gray;">
        <div class="row text-center">
          <div class="col-md-12">
          <p>Images used in this website are not owned by us.<br> Remember to keep the complaints/suggestions respectful
          </p>
          <hr style="background-color:gray;">
          <a style="text-align: center;">Copyright 2019</a>
          </div>
          <div class="col-md-12">
            <a class="btn btn-social-icon btn-github" href="https://github.com/im-loki/Web-Project">
                  <span class="fa fa-github"></span>
            </a>
        </div>
    </div>
  </div>
</body>
</html>