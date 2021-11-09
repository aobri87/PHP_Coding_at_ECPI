<?php
session_start();
$_SESSION["firstName"] = $_POST["firstName"];
$_SESSION["lastName"] = $_POST["lastName"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>	
	</head>
	<body>
		<?php
			class Person{
				//properties
				private $firstName;
				private $lastName;
								
				// Methods
				function set_firstName($firstName)
				{
					$this->firstName = $firstName; // refers to THIS class/object	
				}
				function get_firstName()
				{
					return $this->firstName;
				}
				function set_lastName($lastName)
				{
					$this->lastName = $lastName; // refers to THIS class/object	
				}
				function get_lastName()
				{
					return $this->lastName;
				}
			}// end class PERSON
			
			$personOne = new Person();
			
			$personOne->set_firstName($_SESSION["firstName"]);
			$personOne->set_lastName($_SESSION["lastName"]);
			
			echo "Your Name is ". $personOne->get_lastName() . ", " . $personOne->get_firstName();
			echo "<br/>";
		?>		
		<?php
			session_unset(); // gets rid of all the session variables
			session_destroy(); // destroys the session
		?>
	</body>
</html>