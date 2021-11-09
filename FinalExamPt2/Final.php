<!--
Andrew O'Brien
05 Nov 2020

-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			html
			{
				font-family: arial;
			}
			body
			{
				border: 2px solid #000099;
				width: 500px;
				padding: 20px;
			}
			h1
			{
				color: #000099;
			}
		</style>
		<title>Future Value Calculator</title>
	</head>
	<body>
		<h1>Future Value Calculator</h1>
		<form action="Final2.php" method="POST">
			<table>
				<tr>
					<td>Investment Amount:</td>
					<td>&nbsp&nbsp&nbsp&nbsp&nbsp </td>
					<td><input type="text" name="x"></td>
				</tr>
				<tr>
					<td>Yearly Interest Rate:</td><td></td>
					<td><input type="text" name="i"></td>
				</tr>
				<tr>
					<td>Number of Years: </td><td></td>
					<td><input type="text" name="n"></td>
				</tr>
				<tr>
					<td></td><td></td>
					<td><input type="checkbox" name="monthly">Compound Interest Monthly</td>
				</tr>
				<tr>
					<td></td><td></td>
					<td><input type="submit" name="calc" value="Calculate"></td>
				</tr>
				
			</table>	
		</form>
	</body>
</html>