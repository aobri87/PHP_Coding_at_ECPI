<?php
// section for getting information into the database
			$con = mysqli_connect("localhost", "root", "", "restaurant_survey");
			$sports = $_POST["sb"];
			$buffet = $_POST["buffet"]; 
			$comedy = $_POST["comedy"];
			$traditional = $_POST["traditional"];

		// checks if connection is possible	
			if(!$con)
			{
				// stop the program and display error message
				die("Connection unsuccessful: " . mysql_error());
			}	
				
		// inserts form information into surveys	
			$sql = "INSERT INTO surveys (sportsbar_id, buffet_id, comedy_id, traditional_id) 
				VALUES ('$sports', '$buffet', '$comedy', '$traditional')";
		
		//function that runs the query. needs those two arguments
			if (mysqli_query($con, $sql))
			{
				//echo "Updated!";					
			}
			else
			{
				echo "ERROR! " . mysqli_error($con);
			}	
		
		// section for getting statistics 
			$bold = mysqli_query($con, "SELECT COUNT(sportsbar_id) FROM surveys where sportsbar_id='1' ");
				while($row = mysqli_fetch_assoc($bold)) {$boldCount = $row["COUNT(sportsbar_id)"];}
			$basil = mysqli_query($con, "SELECT COUNT(sportsbar_id) FROM surveys where sportsbar_id='2' ");
				while($row = mysqli_fetch_assoc($basil)) {$basilCount = $row["COUNT(sportsbar_id)"];}
			$andrew = mysqli_query($con, "SELECT COUNT(sportsbar_id) FROM surveys where sportsbar_id='3' ");
				while($row = mysqli_fetch_assoc($andrew)) {$andrewCount = $row["COUNT(sportsbar_id)"];}
			$king = mysqli_query($con, "SELECT COUNT(buffet_id) FROM surveys where buffet_id='4' ");
				while($row = mysqli_fetch_assoc($king)) {$kingCount = $row["COUNT(buffet_id)"];}
			$jamil = mysqli_query($con, "SELECT COUNT(buffet_id) FROM surveys where buffet_id='5' ");
				while($row = mysqli_fetch_assoc($jamil)) {$jamilCount = $row["COUNT(buffet_id)"];}
			$super = mysqli_query($con, "SELECT COUNT(buffet_id) FROM surveys where buffet_id='6' ");
				while($row = mysqli_fetch_assoc($super)) {$superCount = $row["COUNT(buffet_id)"];}
			$jumping = mysqli_query($con, "SELECT COUNT(comedy_id) FROM surveys where comedy_id='7' ");
				while($row = mysqli_fetch_assoc($jumping)) {$jumpingCount = $row["COUNT(comedy_id)"];}
			$prime = mysqli_query($con, "SELECT COUNT(comedy_id) FROM surveys where comedy_id='8' ");
				while($row = mysqli_fetch_assoc($prime)) {$primeCount = $row["COUNT(comedy_id)"];}
			$moonshine = mysqli_query($con, "SELECT COUNT(comedy_id) FROM surveys where comedy_id='9' ");
				while($row = mysqli_fetch_assoc($moonshine)) {$moonshineCount = $row["COUNT(comedy_id)"];}
			$tumbler = mysqli_query($con, "SELECT COUNT(traditional_id) FROM surveys where traditional_id='10' ");
				while($row = mysqli_fetch_assoc($tumbler)) {$tumblerCount = $row["COUNT(traditional_id)"];}
			$small = mysqli_query($con, "SELECT COUNT(traditional_id) FROM surveys where traditional_id='11' ");
				while($row = mysqli_fetch_assoc($small)) {$smallCount = $row["COUNT(traditional_id)"];}
			$michael = mysqli_query($con, "SELECT COUNT(traditional_id) FROM surveys where traditional_id='12' ");
				while($row = mysqli_fetch_assoc($michael)) {$michaelCount = $row["COUNT(traditional_id)"];}
			
		// section for getting address and phone number for each restaurant_survey
			$bold1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants
										WHERE restaurant_id = 1");
				while($row = mysqli_fetch_array($bold1)) 
				{$boldName = $row[0]; $boldStreet = $row[1]; $boldCity = $row[2]; $boldState = $row[3]; 
				$boldZip = $row[4]; $boldPhone = $row[5]; $boldInfo = null; 
				for ($i = 0; $i <6; $i++) {$boldInfo .= ($row[$i] . " ");}
				}
				//foreach ($row as $value)
				//{$boldInfo .= $value;}}
				
			$basil1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants
										WHERE restaurant_id = 2");
				while($row = mysqli_fetch_array($basil1)) 
				{$basilName = $row[0]; $basilStreet = $row[1]; $basilCity = $row[2]; $basilState = $row[3]; 
				$basilZip = $row[4]; $basilPhone = $row[5]; $basilInfo = null;
				for ($i = 0; $i <6; $i++) {$basilInfo .= ($row[$i] . " ");}
				}
			
			$andrew1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 3");
				while($row = mysqli_fetch_array($andrew1)) 
				{$andrewName = $row[0]; $andrewStreet = $row[1]; $andrewCity = $row[2]; $andrewState = $row[3]; 
				$andrewZip = $row[4]; $andrewPhone = $row[5]; $andrewInfo = null;
				for ($i = 0; $i <6; $i++) {$andrewInfo .= ($row[$i] . " ");}
				}
			
			$king1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 4");
				while($row = mysqli_fetch_array($king1)) 
				{$kingName = $row[0]; $kingStreet = $row[1]; $kingCity = $row[2]; $kingState = $row[3]; 
				$kingZip = $row[4]; $kingPhone = $row[5]; $kingInfo = null;
				for ($i = 0; $i <6; $i++) {$kingInfo .= ($row[$i] . " ");}
				}
			
			$jamil1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 5");
				while($row = mysqli_fetch_array($jamil1)) 
				{$jamilName = $row[0]; $jamilStreet = $row[1]; $jamilCity = $row[2]; $jamilState = $row[3]; 
				$jamilZip = $row[4]; $jamilPhone = $row[5]; $jamilInfo = null;
				for ($i = 0; $i <6; $i++) {$jamilInfo .= ($row[$i] . " ");}
				}
			
			$super1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 6");
				while($row = mysqli_fetch_array($super1)) 
				{$superName = $row[0]; $superStreet = $row[1]; $superCity = $row[2]; $superState = $row[3]; 
				$superZip = $row[4]; $superPhone = $row[5]; $superInfo = null;
				for ($i = 0; $i <6; $i++) {$superInfo .= ($row[$i] . " ");}
				}
			
			$jumping1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 7");
				while($row = mysqli_fetch_array($jumping1)) 
				{$jumpingName = $row[0]; $jumpingStreet = $row[1]; $jumpingCity = $row[2]; $jumpingState = $row[3]; 
				$jumpingZip = $row[4]; $jumpingPhone = $row[5]; $jumpingInfo = null;
				for ($i = 0; $i <6; $i++) {$jumpingInfo .= ($row[$i] . " ");}
				}
			
			$prime1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 8");
				while($row = mysqli_fetch_array($prime1)) 
				{$primeName = $row[0]; $primeStreet = $row[1]; $primeCity = $row[2]; $primeState = $row[3]; 
				$primeZip = $row[4]; $primePhone = $row[5]; $primeInfo = null;
				for ($i = 0; $i <6; $i++) {$primeInfo .= ($row[$i] . " ");}
				}
			
			$moonshine1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 9");
				while($row = mysqli_fetch_array($moonshine1)) 
				{$moonshineName = $row[0]; $moonshineStreet = $row[1]; $moonshineCity = $row[2]; $moonshineState = $row[3]; 
				$moonshineZip = $row[4]; $moonshinePhone = $row[5]; $moonshineInfo = null;
				for ($i = 0; $i <6; $i++) {$moonshineInfo .= ($row[$i] . " ");}
				}
			
			$tumbler1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 10");
				while($row = mysqli_fetch_array($tumbler1)) 
				{$tumblerName = $row[0]; $tumblerStreet = $row[1]; $tumblerCity = $row[2]; $tumblerState = $row[3]; 
				$tumblerZip = $row[4]; $tumblerPhone = $row[5]; $tumblerInfo = null;
				for ($i = 0; $i <6; $i++) {$tumblerInfo .= ($row[$i] . " ");}
				}
			
			$small1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 11");
				while($row = mysqli_fetch_array($small1)) 
				{$smallName = $row[0]; $smallStreet = $row[1]; $smallCity = $row[2]; $smallState = $row[3]; 
				$smallZip = $row[4]; $smallPhone = $row[5]; $smallInfo = null;
				for ($i = 0; $i <6; $i++) {$smallInfo .= ($row[$i] . " ");}
				}
			
			$michael1 = mysqli_query($con, "Select name, street, city, state, zip, phone FROM restaurants 
										WHERE restaurant_id = 12");
				while($row = mysqli_fetch_array($michael1)) 
				{$michaelName = $row[0]; $michaelStreet = $row[1]; $michaelCity = $row[2]; $michaelState = $row[3]; 
				$michaelZip = $row[4]; $michaelPhone = $row[5]; $michaelInfo = null;
				for ($i = 0; $i <6; $i++) {$michaelInfo .= ($row[$i] . " ");}
				}
			
		// statements for figuring out the best of each category	
			$sportsBest = max($boldCount, $basilCount, $andrewCount);
			$buffetBest = max($kingCount, $jamilCount, $superCount);
			$comedyBest = max($jumpingCount, $primeCount, $moonshineCount);
			$traditionalBest = max($tumblerCount, $smallCount, $michaelCount);
			
			mysqli_close($con);
		?>