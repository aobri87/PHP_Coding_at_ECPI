<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<style>
			body {color: #4D5D6D; margin-left: auto; margin-right: auto; text-align: center; text-align: center; font-family: arial; color: white;}
			html {height: 100%; background: rbg(2,0,36);background: -webkit-linear-gradient(50deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,215,255,1) 100%);}
			h1{font-family: arial; color: white;}
			h2{font-family: arial; color: white;}
			h3{border: 1px solid; font-family: arial; color: white; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;}
			table{background-color: #EFEFEF;}
		</style>
	</head>
	<body>
		<form action="surveyRegistration.php" method="POST">
			<label>User Name:</label>
				<input type="text" name="userName"/>
			<br/>
			<label>User Password:</label>
				<input type="password" name="userPassword"/>
			<br/>
			<label>User Area:</label>
				<input type="text" name="userArea" value="11111"/>
			<br/>
			<input type="submit" value="LOG IN"/>
		</form>
	</body>
</html>