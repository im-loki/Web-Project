<?php
echo  htmlspecialchars($_POST["usnid"]);
echo "data will be uploaded to datbase";
echo "mail sent to your email id. Click on the link for verification.";
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
    $sql = "INSERT INTO suggestions (usn, sub, descp, tos, sug, ver)
    VALUES ('$db_usn', '$db_sub', '$db_desc','$db_tos','$db_rd','0')";

    if ($conn->query($sql) === TRUE && $email_flag==1 ) {
        echo "New record created successfully."; 
        echo " Check your email to verify this complaint for further proceeding";
        

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
            echo "mail sent";
            echo '<script>'; 
            echo 'var rd = '.json_encode($db_rd).';';
            echo 'var usn = '.json_encode($db_usn).';';
            echo '</script>';
        }
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "mail sent";
            echo '<script>'; 
            echo 'var rd = '.json_encode($db_rd).';';
            echo 'var usn = '.json_encode($db_usn).';';
            echo '</script>';
    $conn->close();
?>


<html>
<head>
    <title>Admin</title>
<link rel="icon" href="stylesheets/bitlogo.png" type="image/x-icon">
    <script>
        function checkOTP() {
            var otp = parseInt(document.getElementById("otp").value);
            var p_id = document.getElementById("demo");
            p_id.innerHTML = usn + " " + otp + " "+rd + typeof(otp) + typeof(rd);

            if(otp == rd){
                alert("Your Suggestion is verified. We'll notify you the knowledgement via mail");
                window.open ('/Build/App/student','_self',false)
            }
            else{
                p_id.innerHTML = "Invalid OTP";
                p_id.setAttribute('style',"color:red;");
            }
        }
    </script>
</head>
<body>
    <form>
        <label for="otp"> OTP verification code:</label>
        <input type="text" id="otp"> 
        <input type="button" onclick="checkOTP()" value = "submit">
    </form>
    <p id="demo">  </p>
</body> 
</html>
 

