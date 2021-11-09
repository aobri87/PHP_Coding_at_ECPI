<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Midterm Part 2 CIS224</title>

<style>
body {
	background-color: #ffbf80;
	text-align: center;
	font-family: arial;
}
table {
	margin-left: auto;
	margin-right: auto;
	background-color: #7575a3;
}

</style>


</head>

<body>

<h1>FUTURE VALUE CALCULATOR</h1>

<table border="1px">
<form action="Final.php" method="POST">
<tr>
<td>Investment Amount</td><td><input type="number" name="investment"></td>
</tr>
<tr>
<td>Yearly Interest Rate</td><td><input type="number" name="interestRate"></td>
</tr>
<tr>
<td>Number of Years</td><td><input type="number" name="periodLength"></td>
</tr>
<tr>
<td>
	<label for="monthly">Calculate Compound interest monthly</label>
	<input type="checkbox" name="monthly">
</td>
<td><input type="submit" name="calculate" value="Calculate"></td>
</tr>
</form>
</table>

<?php
if(isset($_POST['calculate']))
{

	$monthlyCalc = $_POST["monthly"];
	$investment = $_POST["investment"];
	$interestRate = $_POST["interestRate"];
	$periodLength = $_POST["periodLength"];

	$date = date("M/d/Y");


	$_SESSION["investment"] = $_POST["investment"];
	$_SESSION["monthly"] = $_POST["monthly"];
	$_SESSION["interestRate"] = $_POST["interestRate"];
	$_SESSION["periodLength"] = $_POST["periodLength"];


	echo "<br /> <br />";
	echo "This calculation was done on " . $date;


}

?>
<br />
<a href="FinalPage2.php">See results</a>
</body>
<html>
