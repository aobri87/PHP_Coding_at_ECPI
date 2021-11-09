<!--
Andrew O'Brien
05 Nov 2020

-->
<?php
session_start();
// declarations
		$investmentAmount = $_POST["x"];
		$interestRate = $_POST["i"];
		$numYears = $_POST["n"];
		$_SESSION["investmentAmount"] = $investmentAmount;
		$_SESSION["interestRate"] = $interestRate;
		$_SESSION["numYears"] = $numYears;
		// declares and calculates the yearly futureValue 
		$futureValue = round($investmentAmount*pow(1+($interestRate/100), $numYears), 2);
		$_SESSION["futureValue"] = $futureValue;
		// declares and calculates the monthly futureValue2
		$interest = $interestRate/100;
		$a = $interest / 12;
		$b = 1+$a;
		$c = 12*$numYears;
		$d = pow($b, $c);
		
		$futureValue2 = round($investmentAmount*$d, 2);
		$_SESSION["futureValue2"] = $futureValue2;
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
		<table>	
			<tr>
				<td>Investment Amount:</td><td></td>
				<td><?php if(isset($_POST["calc"])){echo "$" . number_format($_SESSION["investmentAmount"],2);} ?></td>
			</tr>
			<tr>
				<td>Yearly Interest Rate:</td><td></td>
				<td><?php if(isset($_POST["calc"])){echo $_SESSION["interestRate"] . "%";} ?></td>
			</tr>
			<tr>
				<td>Number of Years:</td><td></td>
				<td><?php if(isset($_POST["calc"])){echo $_SESSION["numYears"];} ?></td>
			</tr>
			<tr>
				<td>Future Value:</td><td></td>
				<td><?php if(isset($_POST["monthly"])){echo "$" . number_format($_SESSION["futureValue2"],2);}
						   else if(isset($_POST["calc"])){echo "$" . number_format($_SESSION["futureValue"],2);} ?></td>
			</tr>
			<tr>
				<td><?php if(isset($_POST["monthly"])){echo "(Compounded Monthly)";}
						else if(isset($_POST["calc"])){echo "(Compounded Yearly)";} ?> </td>
			</tr>
		</table>
		<p><?php echo "This calculation was done on ". date("m/d/Y"); ?></p>
	</body>
</html>