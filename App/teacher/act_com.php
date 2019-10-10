<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



    function mail_service($sug, $serv, $usn, $email) {
        $mail = new PHPMailer;
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
                        <p>Hi '$usn'</p>
                        <br>
                        <p>Your feedback with id '$sug' </p>
                        <p>As been updated to status <strong>'$serv'</strong></p><hr>";
        $mail->Body = $mailContent;

        if(!$mail->send()){
            echo "message not sent";
            echo "mail server error:" . $mail->ErrorInfo;
        }else{
            echo "mail sent";
        }
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wtproject";
    $sug=$_POST['sug'];
    $serv = $_POST['service'];
    $reply = $_POST['reply'];
    $i = 1;
    $inVal = array("Not Seen", "Acknowledged", "Resolved");
    $usn="";
    $email="";

    echo "$sug".", details are:"."<br>"."<hr>";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    #for fetching usn and email id.
    $sql = "SELECT usn from complaints where sug='$sug' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usn = $row['usn'];
        }   
    }

    $conn_email = new mysqli($servername, $username, $password, 'registration');
    // Check connection
    if ($conn_email->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT email from users where username='$usn' ";
    $result = $conn_email->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row['email'];
        }   
    }

    $conn_email->close();


    #for update and calling mailserver
    $sql = "Update complaints SET ver='$serv' WHERE sug='$sug' ";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Record updated successfully";
        mail_service($sug, $inVal[$serv], $usn, $email);
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $sql = "Update suggestions SET reply='$reply' WHERE sug='$sug' ";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
    
    $conn->close();
?>