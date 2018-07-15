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
          if($_SESSION['role']==1){
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
                $sql = "SELECT FlightID, CustID, Seat FROM Reservations WHERE  FlightID = '" . $_GET['id1'] . "' AND Seat = '" . $_GET['id2'] . "' ";
                $result = $conn->query($sql);

                //If the rec actually exists
                if($result->num_rows >0){
                    ?>
                    <form action = "http://localhost/Airline/empDelRes2.php" method="post">
                    <?php

                    //Get the data
                    $row = $result->fetch_assoc();
                    ?>
                    Are you sure you want to delete the following Reservation? <br/>
                    
                    <p>Flight ID: <input type="text" name="FlightID" value="<?php echo $row["FlightID"]?>" readonly /></p>
                     <p>Customer ID: <input type="text" name="CustID" value="<?php echo $row["CustID"]?>" readonly /></p>
                      <p>Seat: <input type="text" name="Seat" value="<?php echo $row["Seat"]?>" readonly /></p>
                   <p><input type="submit" value="Delete Reservation"  /></p>
                   </form>
                   <?php
                }else{
                    echo "Reservation does not exist";
                }
                

            }
            $conn->close();
        ?>
        <br/>
        Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
        <br>
         Click <a href = "http://localhost/Airline/employeeHomepage.php">here</a> to return home page.
      <?
        }
      ?>
    </body>
</html>