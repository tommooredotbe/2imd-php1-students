<?php 
ob_start();
session_start();

	if(!empty($_POST)){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$conn = new PDO('mysql:host=localhost;dbname=phples', 'root','root');
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
		$statement->bindValue(":username", $username);
		$statement->execute();

		$row_user = $statement->fetch(PDO::FETCH_ASSOC);

		if(password_verify($password, $row_user['password']))
		{
			echo "welcome";
			header('location: http://localhost:8888/php1/Week3/index.php');
        	$_SESSION['username'] = $username;
		}else
		{
			echo "go away";
		}

			//$statement->bindValue(":password", $password);
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

				<button type="submit">Log in</button>

			</form>
		</div>

		<a href="register.php" id="register">Register</a>

	</div>
</body>
</html>