<html>
    <head>
        <title>Admin Edit Flight</title>
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

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{

                // Fetch the record
                $sql = "UPDATE Flights SET PilotID = '" . $_POST['PilotID'] . "', Departure = '" . $_POST['Departure'] . "', Target = '" . $_POST['Target'] . "' , FlightDate = '" . $_POST['FlightDate'] . "' WHERE FlightID = " . $_POST['FlightID'] ;

                if ($conn->query($sql) === TRUE) {
                    echo "Flight was updated successfully <br />";
                    
                    echo "<a href = 'http://localhost/Airline/adminHomepage.php'>Go back</a>";
                } else {
                    echo "Error updating flight: " . $conn->error;
                }
            }
            $conn->close();
        ?>
        <br>
        Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.


      <?
        }
      ?>

    </body>
</html>
