<!DOCTYPE html>
<?php include('restaurantStatistics.php'); ?>
<html>
	<head>
		<title>Restaurant Survey</title>
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
		<h1>Restaurant Survey</h1>
		<?php
			
		// statments to display best sports bar	
			echo "<h3>The best sports bar is: </h3>";
			if ($sportsBest == $boldCount)
			{
				echo $boldName;
				echo "<br/>";
				echo $boldStreet . " " . $boldCity . " " . $boldState . " " . $boldZip;
				echo "<br/>";
				echo $boldPhone;
				echo "<br/>";
				if ($boldCount == $basilCount || $boldCount == $andrewCount)
				{
					echo "<br/>tied with<br/><br/>";
				}
			}
			if ($sportsBest == $basilCount)
			{
				echo $basilName;
				echo "<br/>";
				echo $basilStreet . " " . $basilCity . " " . $basilState . " " . $basilZip;
				echo "<br/>";
				echo $basilPhone;
				echo "<br/>";
			}
			if ($sportsBest == $andrewCount)
			{
				echo $andrewName;
				echo "<br/>";
				echo $andrewStreet . " " . $andrewCity . " " . $andrewState . " " . $andrewZip;
				echo "<br/>";
				echo $andrewPhone;
				echo "<br/>";
			}
		// statments to display best buffet	
			echo "<br/>";
			echo "<h3>The best buffet is: </h3>";
			if ($buffetBest == $kingCount)
			{
				echo $kingName;
				echo "<br/>";
				echo $kingStreet . " " . $kingCity . " " . $kingState . " " . $kingZip;
				echo "<br/>";
				echo $kingPhone;
				echo "<br/>";
			}
			if ($buffetBest == $jamilCount)
			{
				echo $jamilName;
				echo "<br/>";
				echo $jamilStreet . " " . $jamilCity . " " . $jamilState . " " . $jamilZip;
				echo "<br/>";
				echo $jamilPhone;
				echo "<br/>";
			}
			if ($buffetBest == $superCount)
			{
				echo $superName;
				echo "<br/>";
				echo $superStreet . " " . $superCity . " " . $superState . " " . $superZip;
				echo "<br/>";
				echo $superPhone;
				echo "<br/>";
			}
		// statments to display best comedy bar	
			echo "<br/>";
			echo "<h3>The best comedy bar is: </h3>";
			if ($comedyBest == $jumpingCount)
			{
				echo $jumpingName;
				echo "<br/>";
				echo $jumpingStreet . " " . $jumpingCity . " " . $jumpingState . " " . $jumpingZip;
				echo "<br/>";
				echo $jumpingPhone;
				echo "<br/>";
			}
			if ($comedyBest == $primeCount)
			{
				echo $primeName;
				echo "<br/>";
				echo $primeStreet . " " . $primeCity . " " . $primeState . " " . $primeZip;
				echo "<br/>";
				echo $primePhone;
				echo "<br/>";
			}
			if ($comedyBest == $moonshineCount)
			{
				echo $moonshineName;
				echo "<br/>";
				echo $moonshineStreet . " " . $moonshineCity . " " . $moonshineState . " " . $moonshineZip;
				echo "<br/>";
				echo $moonshinePhone;
				echo "<br/>";
			}
		// statments to display best Traditional Restaurant
			echo "<br/>";
			echo "<h3>The best traditional restaurant is: </h3>";
			if ($traditionalBest == $tumblerCount)
			{
				echo $tumblerName;
				echo "<br/>";
				echo $tumblerStreet . " " . $tumblerCity . " " . $tumblerState . " " . $tumblerZip;
				echo "<br/>";
				echo $tumblerPhone;
				echo "<br/>";
			}
			if ($sportsBest == $smallCount)
			{
				echo $smallName;
				echo "<br/>";
				echo $smallStreet . " " . $smallCity . " " . $smallState . " " . $smallZip;
				echo "<br/>";
				echo $smallPhone;
				echo "<br/>";
			}
			if ($traditionalBest == $michaelCount)
			{
				echo $michaelName;
				echo "<br/>";
				echo $michaelStreet . " " . $michaelCity . " " . $michaelState . " " . $michaelZip;
				echo "<br/>";
				echo $michaelPhone;
				echo "<br/>";
			}
			echo "<br/>";
			echo "If more than one is listed in a category then the results were a tie";
		?>
	</body>
</html>