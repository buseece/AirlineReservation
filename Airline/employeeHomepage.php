<html>
	<head>
		<title>Airline Employee Homepage</title>
	</head>
	<body>
		<?php
			session_start();

			if(!isset($_SESSION[ 'username'])) {
				$msg = "Please <a href = 'http://localhost/Airline/login.php'>log in </a> to view this page";
				echo $msg;
			}else{
				if($_SESSION['role']==1){
					die("Insufficient rights");
					$msg = "Please <a href = 'http://localhost/Airline/login.php'>log in </a> to view this page";
				    echo $msg;
				}
			?>
				Welcome, <? echo $_SESSION['username'] ?>.

				<br/>

				Click <a href = "http://localhost/Airline/logout.php">here</a> to log out.
				<br/>
       		 Click <a href = "http://localhost/Airline/reservationList.php">here</a> to edit or delete a reservation.
       		 <br/>
       		 Click <a href = "http://localhost/Airline/empAddRes.php">here</a> to add reservation.
				
			<?
			}
			?>
	</body>
</html>		