<?php
session_start();
if(isset($_POST['loginButton'])){
	require 'connection.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$invalid ="Invalid ID or Password";
	
	$result = mysqli_query($conn, 'Select *from users where username="'.$username.'" and password="'.$password.'"');
	if(mysqli_num_rows($result)==1){
		$_SESSION['username']=$username;
		header('Location: toDoList.php');	
}
else{echo "Invalid ID or Password";}
if(isset($_GET['logout']))
 {session_unregister('username');}
}
?>


<form method="post">
	<table>
		<tr>
			<td> UserName</td>
			<td><input type="text" name="username"></td>
			
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password"></td>
		</tr>
		<tr>
			<td>&nbsp; </td>
			<td><input type="submit" name="loginButton" value="Login"></td>
			
		</tr>
	</table>
</form>
