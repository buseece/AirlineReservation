<html>
    <head>
        <title>Admin Edit Employee</title>
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
                $sql = "UPDATE Pilots SET PilotName = '" . $_POST['PilotName'] . "' WHERE PilotID = " . $_POST['PilotID'] ;

                if ($conn->query($sql) === TRUE) {
                    echo "Pilot was updated successfully <br />";
                    
                    echo "<a href = 'http://localhost/Airline/adminHomepage.php'>Go back</a>";
                } else {
                    echo "Error updating pilot: " . $conn->error;
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
