<html>
    <head>
        <title>TEST</title>
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

            $sql = 'CALL PastFlights(1)';
            $stmt = $conn->query($sql);
    


            while ($r = $stmt->fetch_assoc()){
            ?>
                
            <p><?php echo $r["FlightID"];?> </p>
            <p><?php echo $r["PilotID"];?> </p>
            <p><?php echo $r["Departure"];?> </p>
            <p><?php echo $r["Target"];?> </p>
            <p><?php echo $r["EmptyPlaces"];?> </p>
            <p><?php echo $r["Status"];?> </p>
            
            <?php
                
            }

            }
                
            $conn->close();
            ?>
       Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.


      <?
        }
      ?>
    </body>
</html>