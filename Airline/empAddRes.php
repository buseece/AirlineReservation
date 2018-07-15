<html>
    <head>
        <title>Airline Employee</title>
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
                <form action="empAddRes2.php" method="post">
                <p>Flight ID: <input type="text" name="FlightID" value="" /></p>
                <p>Customer ID: <input type="text" name="CustID" value="" /></p>
                <p>Seat Number: </p>
                <select name="Seat">
                <option value="01"> 01</option>
                <option value="02"> 02</option>
                <option value="03"> 03</option>
                <option value="04"> 04</option>
                <option value="05"> 05</option>
                <option value="06"> 06</option>
                <option value="07"> 07</option>
                <option value="08"> 08</option>
                <option value="09"> 09</option>
                <option value="10"> 10</option>
                <option value="11"> 11</option>
                <option value="12"> 12</option>
                <option value="13"> 13</option>
                <option value="14"> 14</option>
                <option value="15"> 15</option>
                <option value="16"> 16</option>
                <option value="17"> 17</option>
                <option value="18"> 18</option>
                <option value="19"> 19</option>
                <option value="20"> 20</option>
                </select>
                <select name="no">
                <option value="A"> A</option>
                <option value="B"> B</option>
                <option value="C"> C</option>
                <option value="D"> D</option>
                </select>
                <p><input type="submit" value="Add Reservation"/></p>
                </form>
                <?php

            }
            $conn->close();
        ?>
        
        Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
        <br>
         Click <a href = "http://localhost/Airline/employeeHomepage.php">here</a> to return home page.
      <?
        }
      ?>
    </body>
</html>