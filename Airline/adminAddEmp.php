<html>
    <head>
        <title>Airline Admin</title>
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
                <form action="adminAddEmp2.php" method="post">
                <p>First name: <input type="text" name="FNAME" value="" /></p>
                <p>Last name: <input type="text" name="LNAME" value="" /></p>
                <p>Password: <input type="text" name="Password" value="" /></p>
                <p><input type="submit" value="Add Employee"/></p>
                </form>
                <?php

            }
            $conn->close();
        ?>
        
        Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
        <br>
         Click <a href = "http://localhost/Airline/adminHomepage.php">here</a> to return home page.
      <?
        }
      ?>
    </body>
</html>