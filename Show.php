<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="UTF-8">
<title>Show records</title>
</head>
<body>
<?php
$link = mysqli_connect("localhost", "root", "root", "midterm");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// attempt insert query execution
$sql = "SELECT * FROM `assignments`";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Course Number: ". $row["course"]. ", Assignment: ". $row["assignment"] . ", Due Date: ". $row["due_date"]. "<br>";
    }
} else {
    echo "0 results";
}

// Check connection
if(mysqli_query($link, $sql)){
    echo "<br> Records pulled successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
<br><br>
<a href="http://localhost/Form.html"><button>Add Assignment</button></a>
</body>