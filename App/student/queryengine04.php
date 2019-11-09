<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
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
    // document.getElementById("color_m").innerHTML = "Light Mode";
    document.body.style.backgroundColor = "black";
    document.body.style.color="white";
    // document.getElementById("form_fill").style.backgroundColor = "#282828d1";
    document.getElementsByClassName("container")[0].style.backgroundColor="#282828d1";
  }
  else{ //white mode
    // document.getElementById("color_m").innerHTML = "Dark Mode";
    document.body.style.backgroundColor = "white";
    document.body.style.color="black";
    // document.getElementById("form_fill").style.backgroundColor = "#f2f2f2";
    document.getElementsByClassName("container")[0].style.backgroundColor="#f2f2f2";

  }
}
</script>
</head>
<body onload="script:color_check();">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student01";
    $q=$_GET['q'];
    echo "$q".", Fill details:"."<br>"."<hr>";
?> 
<h3>Suggestion Form</h3>

<div class="container">
  <form method="POST" action="action_page_suggestion.php" >

    <label for="sub">Subject</label>
    <input type="text" id="sub" name="sub" placeholder="Your name..">

    <input type="hidden" id="usnid" name="usnid" value=<?php print($q) ?>> 

    <label for="tos">Type of Suggestions</label>
    <select id="tos" name="tos">
      <option value="classes">Class</option>
      <option value="labs">Labs</option>
      <option value="teachers">Teachers</option>
      <option value="others">Others</option>
    </select>

    <label for="desc">description</label>
    <textarea id="desc" name="desc" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

