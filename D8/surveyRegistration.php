<!DOCTYPE html>
<html>
	<style>
			body {color: #4D5D6D; margin-left: auto; margin-right: auto; text-align: center; text-align: center; font-family: arial; color: white;}
			html {height: 100%; background: rbg(2,0,36);background: -webkit-linear-gradient(50deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,215,255,1) 100%);}
			h1{font-family: arial; color: white;}
			h2{font-family: arial; color: white;}
			h3{border: 1px solid; font-family: arial; color: white; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;}
			table{background-color: #EFEFEF;}
		</style>
	<?php 
		$con = mysqli_connect("localhost", "root", "", "restaurant_survey");
		if(!$con)
			{
				// stop the program and display error message
				die("Connection unsuccessful: " . mysql_error());
			}	
		
		$name = $_POST["userName"];
		$area = $_POST["userArea"];
		$password = md5($_POST['userPassword']);
		// inserts form information into surveys	
			$sql = "INSERT INTO users (user_name, user_password, user_area) 
				VALUES ('$name', '$password', '$area')";
		
		//function that runs the query. needs those two arguments
			if (mysqli_query($con, $sql))
			{
				echo "Updated!";					
			}
			else
			{
				echo "ERROR! " . mysqli_error($con);
			}	
	
		mysqli_close($con);
	?>
</html>