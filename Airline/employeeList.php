<html>
    <head>
        <title>Employee List</title>
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

                ?>

                <?php

                // List records
                $sql = "SELECT ID, FNAME, LNAME FROM Users WHERE Role = 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>Operations</th>
                            <th>ID</th>
                            <th>FNAME</th>
                            <th>LNAME</th>         
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <a href = "adminDelEmp.php?id=<?php echo $row["ID"]; ?>">Delete</a>
                                <a href = "adminEditEmp.php?id=<?php echo $row["ID"]; ?>">Edit</a>
                            </td>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["FNAME"]; ?></td>
                            <td><?php echo $row["LNAME"]; ?></td>
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
