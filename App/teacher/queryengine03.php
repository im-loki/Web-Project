<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student01";
    $q=$_GET['q'];
    echo "$q".", your enrolled events are:"."<br>"."<hr>";
?> 
<h3>Contact Form</h3>

<div class="container">
  <form method="POST" action="action_page_complaint.php" >

    <label for="sub">Subject</label>
    <input type="text" id="sub" name="sub" placeholder="Your name..">

    <input type="hidden" id="usnid" name="usnid" value=<?php print($q) ?>> 

    <label for="tos">Type of Suggestions</label>
    <select id="tos" name="tos">
      <option value="class">Class</option>
      <option value="lab">Labs</option>
      <option value="teachers">Teachers</option>
      <option value="others">Others</option>
    </select>

    <label for="desc">description</label>
    <textarea id="desc" name="desc" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

