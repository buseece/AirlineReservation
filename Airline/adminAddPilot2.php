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
				$pilotname = $_POST['PilotName'];
				$sql = "INSERT INTO Pilots(PilotName) 
                VALUES ('".$pilotname."')";


				if($conn->query($sql) === TRUE){
					echo "A new pilot is created succesfully <br/>";
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
