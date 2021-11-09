<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>	
	</head>
	<body>

		<h1>Please enter your First and last name</h1>
		<form action="d9Homepage2.php" method="POST">
			<input type='text' value='First Name' name='firstName'>
			<br/>
			<input type='text' value='Last Name' name='lastName'>
			<br/>
			<input type='submit' value='Submit' name='submit' >
		</form>	
	</body>
</html>