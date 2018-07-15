<html>
    <head>
        <title>Employee Delete Reservation</title>
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

                // Update the record
                $sql = "DELETE FROM Reservations WHERE FlightID = '" . $_POST['FlightID'] . "' AND Seat = '" . $_POST['Seat'] . "'";

                if ($conn->query($sql) === TRUE) {
                    echo "Record was deleted successfully <br />";
                    
                    echo "<a href = 'http://localhost/Airline/employeeHomepage.php'>Go back</a>";
                } else {
                    echo "Error deleting reservation: " . $conn->error;
                    echo "<a href = 'http://localhost/Airline/employeeHomepage.php'>Go back</a>";
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
