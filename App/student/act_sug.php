<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wtproject";
    $sug=$_POST['sug'];
    $i = 1;
    $inVal = array("Not Seen", "Acknowledged", "Resolved");

    echo "$sug".", details are:"."<br>"."<hr>";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    #for update and calling mailserver
    $sql = "Update suggestions SET ver=0 WHERE sug='$sug' ";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>