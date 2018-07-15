<html>
    <head>
        <title>Future Flights</title>
    </head>
    <body>
    	<?php
    		session_start();

        if (!isset($_SESSION['username'])) {
          $msg = "Please <a href = 'http://localhost/Airline/login.php'>log in</a> to view this page";
          echo $msg;
        }else{
      ?>

        <?php
            $servername = "localhost";
            $user = "root";
            $pass = "";
            $dbname = "Airline";

            // Create connection
            $conn = new mysqli($servername, $user, $pass, $dbname);


			//Check connection
			if($conn-> connect_error){
			die("Connection failed: " . $conn->connect_error);

			}else{
				//Insert the record
				$pilotid = $_POST['PilotID'];
				$sql = "CALL FutureFlights('$pilotid')";
            	$result = $conn->query($sql);
            	if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>Flight ID</th>
                            <th>Pilot ID</th>  
                            <th>Departure</th> 
                            <th>Target</th> 
                            <th>Date and Time</th>    
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                             <td><?php echo $row["FlightID"];?> </td>
          					  <td><?php echo $row["PilotID"];?> </td>
          					  <td><?php echo $row["Departure"];?> </td>
          					  <td><?php echo $row["Target"];?> </td>
          					  <td><?php echo $row["FlightDate"];?> </td>
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
                    <?php
                } else {
                    echo "The table is empty";
                }
    
			}
			$conn->close();
		?>
		Click <a href = "http://localhost/Airline/adminHomepage.php">here</a> to go back.


      <?
        }
      ?>
		
	</body>
</html>
