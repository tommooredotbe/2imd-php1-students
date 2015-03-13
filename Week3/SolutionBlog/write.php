<?php  
ob_start();
session_start();

//print_r($_POST);
//print_r($_SESSION['username']);

	//als die nog ni ingelogd is, kan je ni posten == doorverwijzen
    if( !empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    else
    {
        header('location: http://localhost:8888/php1/Week3/login.php');
    }

$conn = new PDO('mysql:host=localhost;dbname=phples', 'root','root');
$conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!empty($_POST)){
    $article = $_POST['article'];
    $auteur = $_SESSION['username'];
    $topic = $_POST['topic'];
    $statement = $conn->prepare("INSERT INTO blogpost(article,auteur,topic) VALUES (:article, :auteur, :topic)");
    $statement->bindValue(":article", $article);
    $statement->bindValue(":auteur", $article);
    $statement->bindValue(":topic", $topic);
    $statement->execute();
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Write article</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="content">

	<?php include("content.inc.php");  ?>
	<div id="contentwrap">
		<div class="sendwrap">

			<h2 id="bulletintitle">Add to Bulletin</h2>
				
		<!--PHP: Log in to post or see post-->

			<form action="" method="post">
				<label for="topic">Topic of your article.</label><br>
				<input type="topic" id="topic" name="topic"/><br>
				<label for="article">Article content.</label><br>
				<textarea name="article" placeholder="type here" id="article" cols="30" rows="10"></textarea>
				<button type="submit">Post</button>
			</form>
		</div>
	</div>
</div>	
</body>
</html>