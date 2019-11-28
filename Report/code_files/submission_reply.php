<?php
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