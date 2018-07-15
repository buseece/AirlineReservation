<html>
    <head>
        <title>Reservation List</title>
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

                ?>

                <?php

                // List records
                $sql = "SELECT FlightID, CustID,Seat FROM Reservations";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>Operations</th>
                            <th>Flight ID</th>
                            <th>Customer ID</th> 
                            <th>Seat Number</th>         
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <a href = "empDelRes.php?id1=<?php echo $row["FlightID"]; ?>&amp;id2=<?php echo $row["Seat"]; ?>">Delete</a>
                                <a href = "empEditRes.php?id1=<?php echo $row["FlightID"]; ?>&amp;id2=<?php echo $row["Seat"]; ?>">Edit</a>
                            </td>
                            <td><?php echo $row["FlightID"]; ?></td>
                            <td><?php echo $row["CustID"]; ?></td>
                            <td><?php echo $row["Seat"]; ?></td>
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
         Click <a href = "http://localhost/Airline/employeeHomepage.php">here</a> to return home page.

      <?
        }
      ?>

    </body>
</html>
