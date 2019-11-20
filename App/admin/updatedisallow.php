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
    $sql = "UPDATE complaints SET ver=7 where sug = $sug ";
    $result = $conn->query($sql);
    if($result){
        echo "Updated successfully";
        echo $_GET['q'];
        header("location: queryengine03.php?q=$_GET[q]");
    }
    else{
        echo "Not successful";
        header("location: queryengine03.php?q=$_GET[q]");
    }
}