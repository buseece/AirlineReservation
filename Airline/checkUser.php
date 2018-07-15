<?
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Airline";

	//Create connection
	$conn = new mysqli($servername,$username, $password, $dbname);

	//Check connection
	if($conn-> connect_error){
		die("Connection failed: " . $conn->connect_error);

	}else{
		$id = $_POST["id"];
		$pass = $_POST["pass"];
		$role = $_POST["role"];

		$sql = "SELECT ID FROM Users WHERE ID = '" . $id . "' AND Password = '" . $pass . "' AND Role = '" . $role . "' ";

		$result = $conn->query($sql);

		if($result->num_rows>0){
			session_start();
			$_SESSION['username'] = $id;
			$_SESSION['role'] = $role;

			//if role equals 0 then employee if 1 then admin
			if($role == 0){
				header("Location:http://localhost/Airline/employeeHomepage.php");
				die();
			}else if($role == 1){
				header("Location:http://localhost/Airline/adminHomepage.php");
				die();
			}

			

		}else{
			$conn->close();
			die("Wrong username or password");
		}
	}
?>	