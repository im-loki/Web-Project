<?php
if(isset($_GET['a'])){
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "wtproject";
    $q=$_GET['a'];

    echo "$q".", Complaints requiring attention:"."<br>"."<hr>";

    $sug = $_GET['a'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE suggestions SET ver=0 where sug = $sug ";
    $result = $conn->query($sql);
    if($result){
        echo "Updated successfully";
        echo $_GET['q'];
        header("location: queryengine04.php?q=$_GET[q]");
    }
    else{
        echo "Not successful";
        header("location: queryengine04.php?q=$_GET[q]");
    }
}