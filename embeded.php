<?php
$db = mysqli_connect('localhost','root', '', 'todo') or die ('Unable to connection');

$sel= "SELECT * FROM task ORDER BY id";
$dis=$db->query($sel);

if (isset($_POST['add'])){
	$task_name = $_POST['ntask'];
	$Deadline= $_POST['ndeadline'];
	$level = $_POST['level'];
	
$que= "SELECT * FROM task WHERE task_name='$task_name'";
if ($task_name==="" or $Deadline===""){
	echo '<script>alert("Please enter a Task and a Deadline")</script>';
} else {
	if (mysqli_num_rows($db->query($que))>0){
	 echo '<script>alert("Task already exist")</script>';
 }
 $addtask="INSERT INTO task
			VALUES('0','$task_name','$Deadline','$level')";
	if ($db->query($addtask) === TRUE){
		echo '<script>alert("NEW TASK CREATED")</script>';
		 header("Location: " . $_SERVER['REQUEST_URI']);
	} 
}
}
 
if (isset($_POST['del'])){
	$id= $_POST['del'];
	$del = "DELETE FROM task WHERE id='$id'";
	if ($db->query($del) === TRUE) {
		echo '<script>alert("TASK DELETED")</script>';
		header("Location: " . $_SERVER['REQUEST_URI']);
	} else {
		echo '<script>alert("TASK NOT DELETED")</script>'.$db->error;
		header("Location: " . $_SERVER['REQUEST_URI']);
	}
}
 
 if (isset($_POST['addup'])){
	
	$task_name = $_POST['utask'];
	$Deadline= $_POST['udeadline'];
	$level = $_POST['ulevel'];
	
	$up = "UPDATE task SET task_name='$task_name' , Deadline='$Deadline', Level='$level' WHERE task_name='$task_name' ";
	$quer= "SELECT * FROM task WHERE task_name='$task_name'";
	
	if ($task_name===""){
	echo '<script>alert("Please enter a Task and a Deadline to be editted")</script>';
} else {
	if (mysqli_num_rows($db->query($quer))<1){
	 echo '<script>alert("No Such Task exist")</script>';
	 
 } else {
 if ($db->query($up) === TRUE) {
		echo '<script>alert("TASK UPDATED")</script>';
		header("Location: " . $_SERVER['REQUEST_URI']);
	} else {
		echo '<script>alert("TASK NOT UPDATED")</script>'.$db->error;
		header("Location: " . $_SERVER['REQUEST_URI']);
	}
 }
}
 }
?>