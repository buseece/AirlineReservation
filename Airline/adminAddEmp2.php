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
				$fname = $_POST['FNAME'];
				$lname = $_POST['LNAME'];
				$pass = $_POST['Password'];
				$sql = "INSERT INTO Users(FNAME,LNAME,Password,Role) 
                VALUES ('".$fname."','".$lname."', '$pass',0)";


				if($conn->query($sql) === TRUE){
					echo "Employee created succesfully <br/>";
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
