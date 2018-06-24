<?php 
session_start();
require 'embeded.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi"/>
	<meta name="arthor" content="Adedayo Alao">
	<title> My To-Do List</title>
	<meta name="Description" content="A web app to help manage my Time, to-do list app,">
	<meta name="keywords" content="To-Do list, web app to do list">
	<link rel='stylesheet' href='todo.css'>
	<script src="todo.js" type="text/javascript"></script>
	<script src="jq.js" type="text/javascript"></script>
	<script src="bo.js" type="text/javascript"></script>
	<link rel='stylesheet' href='bo.css'>
</head>
<body>
<div class="tod" id="home">	

		<div class="dy"> <span> Task Manager</span></div>
		<div class="table-responsive">
			<table class="table" >
				<thead>
					<tr>
						<th>Task</th>
						<th>Deadline</th>
						<th>Level</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
					while ($row = $dis->fetch_assoc()){
					echo '<tr>
						<td >'.$row['task_name'].'</td>
						<td >'.$row['Deadline'].'</td>
						<td >'.$row['Level'].'</td>
						<td ><form method="POST" action="todo.php"><input type="hidden" value="'.$row['id'].'" name="del"> <input type="submit" value="Delete"></form></td>
					</tr>';
					}
					?>
				</tbody>
				</table>
			<div class="dy" > 
			
			<input type="button" class="btn-warning btn" value="Modify Task"  data-toggle="modal" data-target="#myModalup">
			<input type="button" value="Add Task " class="btn" data-toggle="modal" data-target="#myModal" >
			</div>
			<!-- Modal For task update -->
			<div class="modal fade" id="myModalup" role="dialog">
					<div class="modal-dialog">
    
						<!-- Modal content-->
						<div class="modal-content">
      
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Task</h4>
							</div>
							<div class="modal-body">
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
									<div class="form-group">
										<label >New Task:</label>
										<input type="text" class="form-control" name="utask">
									</div>
									<div class="form-group">
										<label >Task Deadline:</label>
										<input type="date" class="form-control" name="udeadline" >
									</div>
									<div class="form-group">
										<span> Task Level</span>
										<select name = "ulevel">
										<option value="Not Done" >Not Done</option>
										<option value="Done">Done</option>
										</select>
									</div>
        
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-success"  name="addup">Update Task</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<!-- Modal for New Task -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
	  <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Task</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-group">
				<label >New Task:</label>
				<input type="text" class="form-control" name="ntask">
			</div>
			<div class="form-group">
				<label >Task Deadline:</label>
				<input type="date" class="form-control" name="ndeadline" >
			</div>
			<div class="form-group">
            <span> Task Level</span>
            <select name = "level">
                 <option value="Not Done" >Not Done</option>
				 <option value="Done">Done</option>
            </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  <button type="submit" class="btn btn-success"  name="add">Save Task</button>
        </div>
		</form>
	  </div>
    </div>
</div>
  
</body>