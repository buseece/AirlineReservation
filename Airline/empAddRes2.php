<html>
    <head>
        <title>Airline Employee</title>
    </head>
    <body>
    	<?php
    		$servername = "localhost";
    		$username = "root";
    		$password = "";
    		$dbname = "Airline";

    		$conn = new mysqli($servername,$username, $password, $dbname);

			//Check connection
			if($conn-> connect_error){
			die("Connection failed: " . $conn->connect_error);

			}else{
				//Insert the record
				$flightid = $_POST['FlightID'];
				$custid = $_POST['CustID'];
				$seatrow = $_POST['Seat'];
				$seatno = $_POST['no'];
				$seat = $seatrow . $seatno;
				$sql = "INSERT INTO Reservations(FlightID,CustID,Seat) 
                VALUES ('$flightid','$custid','".$seat."')";


				if($conn->query($sql) === TRUE){
					echo "A new reservation is created succesfully <br/>";
					$msg = "<a href = 'http://localhost/Airline/employeeHomepage.php'>Go back </a>";
					echo $msg;
				}else{
					echo "Error creating record: " . $conn->error;
				}
			}
			$conn->close();
		?>
		
	</body>
</html>
