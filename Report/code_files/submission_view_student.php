<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT sub, descp, ver, sug 
    from complaints where tos ='$q' and ver='$r' and usn='$usn'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
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