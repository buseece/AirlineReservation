<html>
    <head>
        <title>Flight List</title>
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

                ?>

                <?php

                // List records
                $sql = "SELECT FlightID, PilotID, Departure, Target, FlightDate FROM Flights";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>Operations</th>
                            <th>Flight ID</th>
                            <th>Pilot ID</th>
                            <th>Departure</th>     
                            <th>Target</th>  
                            <th>Flight Date</th>     
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <a href = "adminDelFlight.php?id=<?php echo $row["FlightID"]; ?>">Delete</a>
                                <a href = "adminEditFlight.php?id=<?php echo $row["FlightID"]; ?>">Edit</a>
                            </td>
                            <td><?php echo $row["FlightID"]; ?></td>
                            <td><?php echo $row["PilotID"]; ?></td>
                            <td><?php echo $row["Departure"]; ?></td>
                            <td><?php echo $row["Target"]; ?></td>
                            <td><?php echo $row["FlightDate"]; ?></td>
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
        <br/>
        Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
        <br/>
         Click <a href = "http://localhost/Airline/adminHomepage.php">here</a> to return home page.

      <?
        }
      ?>

    </body>
</html>
