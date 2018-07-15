<html>
    <head>
        <title>Airline Admin</title>
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
				$pilotid = $_POST['PilotID'];
				$departure = $_POST['Departure'];
				$target = $_POST['Target'];
				$flightdate = new DateTime($_POST['FlightDate']);
				$flightdate = mysqli_real_escape_string($conn, $flightdate->format('Y-m-d'));
				$sql = "INSERT INTO Flights(PilotID,Departure,Target,FlightDate) 
                VALUES ('$pilotid','".$departure."', '".$target."','".$flightdate."')";


				if($conn->query($sql) === TRUE){
					echo "A new flight is created succesfully <br/>";
					$msg = "<a href = 'http://localhost/Airline/adminHomepage.php'>Go back </a>";
					echo $msg;
				}else{
					echo "Error creating record: " . $conn->error;
				}
			}
			$conn->close();
		?>
		
	</body>
</html>
