<html>
	<head>
		<title>Airline Reservation Login Page</title>
	</head>
	<body>
		<form action = "checkUser.php" method="post">
		<table border="0">
			<p>ID: <input type="text" name="id" /></p>
			<p>Password: <input type="password" name="pass" /></p>
			<select name="role">
				<option value="1"> Admin</option>
				<option value="0"> Employee</option>
			</select>
			<p><input type="submit" /></p>
		</table>	
		</form>
	</body>
</html>