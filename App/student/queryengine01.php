<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wtproject";
$usn=$_GET['u'];
$q=$_GET['q'];
$r=$_GET['r'];
$i = 1;
$inVal = array("Not Seen", "Acknowledged", "Resolved");

echo "$usn".", your Complaint details are:"."<br>"."<hr>";
// echo "$q"." $usn" ." $r <br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT sub, descp, ver, sug 
    from complaints where tos ='$q' and ver='$r' and usn='$usn'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    // get dynamic header of the from course table. Refer the forms of teacher for reference.
    echo "<table style=\"background-color: bisque;\">
    <tr style=\"background-color: black; color: white;\">
    <th>Si_no</th>
    <th>Subject</th>
    <th>Description</th>
    <th>Status</th>
    </tr>";
    while($row = $result->fetch_assoc() and $i<=10) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . "<a href=\"action_com.php?q='$row[sug]'\">".$row['sub'] ."</a>" . "</td>";
        echo "<td>" . $row['descp'] . "</td>";
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
</body>
</html> 