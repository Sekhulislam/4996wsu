<?php 
    session_start();
    include('connection.php');
    if(isset($_POST['submit'])){
	$addlist = $_POST['addlist'];
	$sql_insert = "INSERT INTO todotable (DO_List) VALUES ('$addlist')";
	
	//check for sucessful connection or throw error message
	if (!mysqli_query($conn, $sql_insert)) {
		die('Error adding new Task');
	}
}#delete tasks
	if(isset($_GET['Delete_Task'])){
		$List_ID = $_GET['Delete_Task'];
		mysqli_query($conn, "DELETE FROM todotable where List_ID=$List_ID");
	}

#select data from do list
 $select_task = mysqli_query($conn, "SELECT * FROM todotable");
?>

<html>
<body>
	<h1>Welcome to Do List</h1>

	<form method = "post" action = "toDoList.php">
	<fieldset>
		<legend>Add a new list to Your Do List</legend>
		<label>New List: <input type="text" name="addlist" required /></label>
		<input type =   "submit"  value="Add"  name="submit"/>
	</fieldset>
	</form>	
	<table>
		<thead>
			<tr>
				<th>Task No. </th>
				<th>Tasks </th>
				<th>Delete </th>
			</tr>
		</thead>
		
		
		<tbody>
		<?php 
		//loop through the database table for do list
		while ($row = mysqli_fetch_array($select_task)) {?>
			<tr>
				<td> <?php echo $row['List_ID']; ?></td>
				<td> <?php echo $row['Do_List']; ?></td>
				<td> 
					 <a href = "toDoList.php?Delete_Task=<?php echo $row['List_ID']; ?>">X</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		
	</table>

</body>

<br></br>
</html>

<?php
echo '<a href ="login.php?action=logout">Logout</a>';
?>