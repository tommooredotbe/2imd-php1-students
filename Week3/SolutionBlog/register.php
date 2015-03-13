<?php 
$drivers = PDO::getAvailableDrivers ();
	   		echo '<pre>' . print_r ($drivers, true) . '</pre>';
	   		print_r(PDO::getAvailableDrivers());

if(in_array("mysql",PDO::getAvailableDrivers())){
echo " You have PDO for MySQL driver installed ";
}else{
echo "PDO driver for MySQL is not installed in your system";
}

	if(!empty($_POST)){

		print_r($_POST);

		//try {
			$username = $_POST['username'];
			$password = $_POST['password'];

			

			$conn = new PDO('mysql:host=localhost;dbname=phples', 'root','root');
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$statement = $conn->prepare("INSERT INTO users (username,password) VALUES(:username, :password)");
			$statement->bindValue(":username", $username);
			$statement->bindValue(":password", $password);
			$statement->execute();	
		//} catch (PDOException $e) {
		//	echo "geen user added";
		//}

		
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="content">

		<div id="header">
			<h1 id="title">Welcome to '91</h1>
			<h2>Log in or register</h2>
		</div>
		
		<div id="loginbox">
			<form action="" method="post">
		
				<label for="username">Username:</label>
				<input type="text" id="username" name="username">

				<label for="password">Password:</label>
				<input type="password" id="password" name ="password">

				<button type="submit">Register</button>

			</form>
		</div>
		
		<a href="login.php" id="register">Login</a>

	</div>
</body>
</html>