<?php
// Create connection
$myys = mysqli_connect('localhost', 'root', '', 'todo');

// Check connection
if ($myys != TRUE) {
    die("Connection failed: " . mysqli_connect_error()).'<br>';
}
echo "Connected successfully".'<br>';

//Create Database
$dat = "CREATE DATABASE todo";
$seldb= $myys->select_db("todo");

//check selection
/*if ($myys->query($dat) === TRUE ){
	echo"Database Created";
} echo "NO".$myys->error.'<br>';
*/
if ($seldb  === TRUE){
	echo "database selected";
} else{echo "No database selected".$myys->error;
} 

// Create Table
$tabl = "CREATE TABLE IF NOT EXISTS task(
							id int(5) AUTO_INCREMENT PRIMARY KEY,
							task_name VARCHAR(255) UNIQUE NOT NULL,
							Deadline DATETIME,
							Level VARCHAR(255))";

if ($myys->query($tabl)===TRUE){
	echo "Table Created Successfully";
} else {
	echo "Error".$myys->error;
}
?>