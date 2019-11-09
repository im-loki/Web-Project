<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./stylesheets/bootstrap.min.css">
<link rel="stylesheet" href="./stylesheets/action.css">
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
    document.getElementsByTagName("textarea")[0].style.color="black";
    document.body.style.backgroundColor = "black";
    document.body.style.color="#d9d5d6";
  }
  else{ //white mode
    document.getElementsByTagName("textarea")[0].style.color="black";
    document.body.style.backgroundColor = "white";
    document.body.style.color="black";
  }
}
</script>
</head>
<body onload="script:color_check();">

<div class="container">
<!-- <div class="row"> <br><br> </div> -->
<div class="row headerbig">Suggestion Reply Panel<hr></div>
<div class="row">
<div class="col-md-12 header">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wtproject";
$q=$_GET['q'];
$i = 1;
$inVal = array("Not Seen", "Acknowledged", "Resolved");

echo "<strong>$q".", details are:"."</strong><br>"."<hr>";
?>
</div>
</div>

<div class="row">
<div class="col-md-12 tat">
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT sub, descp, ver, tos 
    from suggestions where sug = $q ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    // get dynamic header of the from course table. Refer the forms of teacher for reference.
    echo "<table style=\"background-color: bisque;\">
    <tr style=\"background-color: black; color: white;\">
    <th>Si_no</th>
    <th>Subject</th>
    <th>Descp</th>
    <th>Tos</th>
    <th>Status</th>
    </tr>";
    while($row = $result->fetch_assoc() and $i<=10) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" .$row['sub'] ."</a>" . "</td>";
        echo "<td>" . $row['descp'] . "</td>";
        echo "<td>" . $row['tos'] . "</td>";
        echo "<td>" . $inVal[$row['ver']] . "</td>";
        echo "</tr>";
        $i = $i+1;
    }
    echo "</table>";    
} else {
    echo "0 results";
}
$conn->close();
?> 
</div>
</div>
<br><hr><br>
<div class="row">
<div class="col-md-12 myform">
<form method="POST" action="act_sug.php">
<label for="service" class="header">Change Status of the Suggestion </label>
<input id="sug" name="sug" type="hidden" value=<?php echo $q ?>>
<br>
<br>
<select id="service" name="service">
    <option value="1">Read</option>
    <option value="2">Solved</option>
    <option value="0">Unread</option>
</select>
<br>
<hr>
<textarea id="reply" name="reply" placeholder="Optional reply"  rows="4" cols="50"></textarea>
<input type="submit" value="Submit"  class="button">
</div>
</div>
</div>
</form>
</body>
</html> 