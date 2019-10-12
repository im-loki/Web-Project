<html>
<head>
    <title>
        html
    </title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var labs=0,teachers=0,others=0,classes=0;

        function control_graph() {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        }
        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Class', classes],
            ['Labs', labs],
            ['Teacher', teachers],
            ['Others', others]
            ]);
            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Types of Complaints', 'width':550, 'height':400};
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById("graph"));
            chart.draw(data, options);
        }
        control_graph();
    </script>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wtproject";
        $tot = $_GET['q'];
        echo "$tot";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT COUNT(*) as val, tos as p FROM $tot GROUP BY tos ORDER BY tos";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            // get dynamic header of the from course table. Refer the forms of teacher for reference.
            echo "<script>";
            while($row = $result->fetch_assoc()) {
                echo "$row[p]=$row[val]";
            }
            echo "</script>";
        } else {
            echo "0 results";
        }
    ?>
</head>
<body>
        <div id="graph"></div>
</body>
</html>