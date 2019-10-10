<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}
table, td, th {
    border: 1px solid black;
    padding: 5px;
}
th {text-align: left;}
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wtproject";
$q=$_GET['q'];
$r=$_GET['r'];
$i = 1;
$inVal = array("Not Seen", "Acknowledged", "Resolved");

echo "$q".", details are:"."<br>"."<hr>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT sub, descp, ver, sug
    from suggestions where tos ='$q' and ver='$r' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    // get dynamic header of the from course table. Refer the forms of teacher for reference.
    echo "<table style=\"background-color: bisque;\">
    <tr style=\"background-color: black; color: white;\">
    <th>Si_no</th>
    <th>Subject</th>
    <th>Descp</th>
    <th>Status</th>
    </tr>";
    while($row = $result->fetch_assoc() and $i<=10) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . "<a href=\"action_sug.php?q='$row[sug]'\">".$row['sub'] ."</a>" . "</td>";
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