<html>
	<head>
		<title>Airline Admin Homepage</title>
	</head>
	<body>
		<?php
			session_start();

			if(!isset($_SESSION[ 'username'])) {
				$msg = "Please <a href = 'http://localhost/Airline/login.php'>log in </a> to view this page";
				echo $msg;
			}else{
				if($_SESSION['role']==0){
					die("Insufficient rights");
					$msg = "Please <a href = 'http://localhost/Airline/login.php'>log in </a> to view this page";
				    echo $msg;
				}
			?>

				Welcome, <? echo $_SESSION['username'] ?>.

				<br/>

				Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
				<br/>
       		 Click <a href = "http://localhost/Airline/employeeList.php">here</a> to edit or delete an employee.
       		 <br/>
       		 Click <a href = "http://localhost/Airline/adminAddEmp.php">here</a> to add employee.
       		 <br/>
       		 Click <a href = "http://localhost/Airline/flightList.php">here</a> to edit or delete a flight.
       		 <br/>
       		 Click <a href = "http://localhost/Airline/adminAddFlight.php">here</a> to add flight.
       		 <br/>
       		 Click <a href = "http://localhost/Airline/pilotList.php">here</a> to edit or delete a pilot.
       		 <br/>
       		 Click <a href = "http://localhost/Airline/adminAddPilot.php">here</a> to add pilot.	
       		 <br/>
       		 Click <a href = "http://localhost/Airline/pastFlights.php">here</a> to check past flights.	
       		 <br/>
       		 Click <a href = "http://localhost/Airline/futureFlights.php">here</a> to check future flights.	
			<?
			}
			?>

	</body>
</html>		