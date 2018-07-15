<html>
    <head>
        <title>Admin Delete Employee</title>
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
                $sql = "SELECT ID, FNAME, LNAME, Password, Role FROM Users WHERE ID = " . $_GET['id'];
                $result = $conn->query($sql);

                //If the rec actually exists
                if($result->num_rows >0){
                    ?>
                    <form action = "http://localhost/Airline/adminDelEmp2.php" method="post">
                    <?php

                    //Get the data
                    $row = $result->fetch_assoc();
                    ?>
                    Are you sure you want to delete the following Employee? <br/>
                    <p>ID: <input type="text" name="ID" value="<?php echo $row["ID"]?>" readonly /></p>
                    <p>First name: <input type="text" name="FNAME" value="<?php echo $row["FNAME"]?>" readonly /></p>
                    <p>Last name: <input type="text" name="LNAME" value="<?php echo $row["LNAME"]?>" readonly /></p>
                   <p><input type="submit" value="Delete Employee"  /></p>
                   </form>
                   <?php
                }else{
                    echo "Employee does not exist";
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