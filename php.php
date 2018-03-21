<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "midterm");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$course = mysqli_real_escape_string($link, $_GET['course']);
$assignment = mysqli_real_escape_string($link, $_GET['assignment']);
$duedate = mysqli_real_escape_string($link, $_GET['due_date']);
// attempt insert query execution
$sql = "INSERT INTO assignments (course, assignment, due_date) VALUES ('$course', '$assignment', '$duedate')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
