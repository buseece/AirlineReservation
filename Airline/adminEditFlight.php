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
            if($_SESSION['role']==0){
                    die("Insufficient rights");
                    $msg = "Please <a href = 'http://localhost/Airline/login.php'>log in </a> to view this page";
                    echo $msg;
                }
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
                //Fetch the record
                $sql = "SELECT FlightID, PilotID, Departure, Target, FlightDate FROM Flights WHERE FlightID = " . $_GET['id'];
                $result = $conn->query($sql);

                //If the rec actually exists
                if($result->num_rows >0){
                    ?>
                    <form action = "http://localhost/Airline/adminEditFlight2.php" method="post">
                    <?php

                    //Get the data
                    $row = $result->fetch_assoc();
                    ?>
                    Are you sure you want to update the following Flight? <br/>
                    <p>Flight ID: <input type="text" name="FlightID" value="<?php echo $row["FlightID"]?>" readonly /></p>
                    <p>Pilot ID: <input type="text" name="PilotID" value="<?php echo $row["PilotID"]?>"  /></p>
                    <p>Departure: <input type="text" name="Departure" value="<?php echo $row["Departure"]?>"  /></p>
                    <p>Target: <input type="text" name="Target" value="<?php echo $row["Target"]?>"  /></p>
                    <p>Flight Date: <input type="date" name="FlightDate" value="<?php echo $row["FlightDate"]?>"  /></p>
                   <p><input type="submit" value="Update Flight"  /></p>
                   </form>
                   <?php
                }else{
                    echo "Flight does not exist";
                }
                

            }
            $conn->close();
        ?>
        <br/>
        Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
        <br>
         Click <a href = "http://localhost/Airline/adminHomepage.php">here</a> to return home page.
      <?
        }
      ?>
    </body>
</html>