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
	<title>complaint registery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
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
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
    <script>
        function checkOTP() {
            var otp = parseInt(document.getElementById("otp").value);
            var p_id = document.getElementById("demo");
            p_id.innerHTML = usn + " " + otp + " "+rd + typeof(otp) + typeof(rd);

            

            if(otp == rd){
                p_id.innerHTML="you have been verified your suggestion is noted we will inform you shortly of the development"
                document.getElementById("home").innerHTML='you can further browse by going back home'
                
            }
            else{
                p_id.innerHTML = "Invalid OTP";
                p_id.setAttribute('style',"color:red;");
            }
            function myFunction() {
  				window.open("/Web-Project-master/App");
			}
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/Web-Project-master/App">Home</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content" id="row">
    <div class="col-lg-2 sidenav">

    </div>
    <div class="col-lg-8 text-center"> 
    	<hr>
      <h1>enter the OTP sent to your mail</h1>
      <form  action="javascript:myFunction(); return false;">
        <label for="otp"> OTP verification code:</label>
        <input type="text" id="otp"> 
        <input type="button" onclick="checkOTP()" value = "submit">
    </form>
    
      <hr>
      <h3></h3>
     <p id="demo">  </p>
     <p id="home"></p>
    </div>
    <div class="col-lg-2 sidenav">
      
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
</body> 
</html>
 

