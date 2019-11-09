<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;

?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wtproject";
    $dbname1 = "registration";

    $db_desc = $_POST["desc"];
    $db_sub = $_POST["sub"];
    $db_usn = $_POST["usnid"];
    $db_tos = $_POST["tos"];
    $email = "";
    $email_flag = 0;

    mt_srand(mktime());
    $db_rd = mt_rand();

    $conn = new mysqli($servername, $username, $password, $dbname1);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT EMAIL as Email from users where USERNAME='$db_usn'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $email = $row["Email"];
            $email_flag = 1;
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO complaints (usn, sub, descp, tos, sug, ver)
    VALUES ('$db_usn', '$db_sub', '$db_desc','$db_tos','$db_rd','0')";

    if ($conn->query($sql) === TRUE && $email_flag==1 ) {
        

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'projectbit2020@gmail.com';
        $mail->Password = '041198@bit';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('projectbit2020@gmail.com', 'ccwt');
        $mail->addAddress($email);
        $mail->Subject = 'Sent Test Email';
        $mail->isHTML(true);
        $mailContent = "<h2>Email from test server</h2>
                        <p>bye</p> '$db_rd'";
        $mail->Body = $mailContent;

        if(!$mail->send()){
            echo "message not sent";
            echo "mail server error:" . $mail->ErrorInfo;
        }else{
            echo '<script>'; 
            echo 'var rd = '.json_encode($db_rd).';';
            echo 'var usn = '.json_encode($db_usn).';';
            echo '</script>';
        }
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
            echo '<script>'; 
            echo 'var rd = '.json_encode($db_rd).';';
            echo 'var usn = '.json_encode($db_usn).';';
            echo '</script>';
    $conn->close();
?>


<html>
<head>
	<title>New Complaint</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    #row{
    	height: 700px;
    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    #button {
      background:green;
      border: none;
      height: 35px;
      border-radius: 5px;
      color: white;
    }

    #button:hover {
      background: lightgreen;
      color: black;
    }
  </style>
  <script>
  function checkOTP() {
      var otp = parseInt(document.getElementById("otp").value);
      var p_id = document.getElementById("demo");
      // p_id.innerHTML = usn + " " + otp + " "+rd + typeof(otp) + typeof(rd);
      p_error = document.getElementById("error");
      

      if(otp == rd){
          alert("Your complaint has been verified.");
          window.open('/Build/App/student','_self',false);
          p_id.innerHTML="You have been verified your suggestion is noted we will inform you shortly of the development"
          document.getElementById("home").innerHTML='You can further browse by going back home'
          
      }
      else{
          p_error.innerHTML = "* Invalid OTP";
          p_error.setAttribute('style',"color:red;");
      }
      function myFunction() {
        window.open("/Web-Project-master/App");
      }
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
      document.getElementsByClassName("container-fluid")[0].style.backgroundColor="#282828d1";
      document.getElementsByClassName("sidenav")[0].style.backgroundColor="#282828d1";
      document.getElementsByClassName("sidenav")[1].style.backgroundColor="#282828d1";
    }
    else{ //white mode
      // document.getElementById("color_m").innerHTML = "Dark Mode";
      document.body.style.backgroundColor = "white";
      document.body.style.color="black";
      // document.getElementById("form_fill").style.backgroundColor = "#f2f2f2";
      document.getElementsByClassName("container-fluid")[0].style.backgroundColor="#f2f2f2";
      document.getElementsByClassName("sidenav")[0].style.backgroundColor="rgba(185, 182, 182, 0.16)";
      document.getElementsByClassName("sidenav")[1].style.backgroundColor="rgba(185, 182, 182, 0.16)";

    }
  }

  </script>
</head>
<body onload="script:color_check();">
<div class="container-fluid text-center">    
  <div class="row content" id="row">
    <div class="col-lg-2 sidenav">

    </div>
    <div class="col-lg-8 text-center"> 
    	<hr>
      <h1>Enter the OTP sent to your mail</h1>
      <form  action="javascript:myFunction(); return false;">
        <label for="otp"> OTP verification code:</label>
        <input type="text" id="otp"> 
        <input type="button" onclick="checkOTP()" value = "submit" id="button">
        <p id="error"></p>
    </form>
    
      <hr>
      <h3></h3>
     <p id="demo"></p>
     <p id="home"></p>
    </div>
    <div class="col-lg-2 sidenav">
      
    </div>
  </div>
</div>
</body> 
</html>
 

