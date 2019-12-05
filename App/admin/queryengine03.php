<!DOCTYPE html>
<html>
<head>
  <title>Foul Complaint Admin</title>
<link rel="icon" href="stylesheets/bitlogo.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}

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
  var name='';

  function displayDate1(sug , q) {
    alert("Allowing--> Sug:"+sug +" Admin: " +q);
    window.location.href = 'updateallow.php?a='+sug+'&q='+ q;

  }
  function displayDate2(sug , q) {
    alert("Disallowing--> Sug:"+sug +" Admin: " +q);
    window.location.href = 'updatedisallow.php?a='+sug+'&q='+ q;

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
    document.body.style.backgroundColor = "black";
    document.body.style.color="#d9d5d6";
    document.getElementById('demo3').style.color="black";
  }
  else{ //white mode
    document.body.style.backgroundColor = "white";
    document.body.style.color="black";
    document.getElementById('demo3').style.color="black";
  }
}
</script>
</head>
<body onload="script:color_check();">
<?php
    if(isset($_GET['q'])){
      $servername = "localhost";
      $username = "root";
      $password = '';
      $dbname = "wtproject";
      $q=$_GET['q'];
      echo "<br>$q".", Complaints requiring attention:"."<br>"."<hr>";
    }
?> 
<h3></h3>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT sub, descp, tos, sug 
            from complaints where ver = 5 ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            // get dynamic header of the from course table. Refer the forms of teacher for reference.
            echo "<table style=\"background-color: bisque;\">
            <tr style=\"background-color: black; color: white;\">
            <th>Si_no</th>
            <th>Subject</th>
            <th>Descp</th>
            <th>Type</th>
            </tr>";
            $i=1;
            while($row = $result->fetch_assoc() and $i<=10) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . "<a href=\"queryengine03.php?q=$q&p=$row[sug]\">".$row['sub'] ."</a>" . "</td>";
                echo "<td>" . substr($row['descp'],0,10).  "......</td>";
                echo "<td>" . $row['tos'] . "</td>";
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
  <div class="row" style="display: grid">
  <br><hr><br>
    <div class="col-md-6">
      <p id="demo3" >
      
      <br>
        <?php
          if(isset($_GET['p'])){
            $sug = $_GET['p'];
            $q=$_GET['q'];
            
            // echo $q;
            echo "<strong>Details</strong>";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT sub, descp, tos, sug from complaints where sug=$sug ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              if($row = $result->fetch_assoc()){
                echo "<br>Subject: $row[sub]";
                echo "<br>Description: $row[descp] ";
              }
            } else {
                echo "0 results";
            }
            $conn->close();
          }
        ?>
      </p>
    </div>
    <div class="col-md-6">
      <?php 
      if(isset($sug)){
        echo "<button onclick=\"displayDate1('$sug',  '$q')\">Allow</button>";
        echo "<button onclick=\"displayDate2('$sug', '$q')\">Disallow</button>";
      }
        // echo "$sug";
        
      ?>
      <!-- <button onclick="displayDate1('<?php echo $sug; ?>', '<?php echo $q; ?>')">Allow</button>
      <button onclick="displayDate2('<?php echo $sug; ?>', '<?php echo $q; ?>')">Disallow</button> -->
    </div>
  </div>
</div>
</body>
</html>

