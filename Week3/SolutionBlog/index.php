<?php 
session_start();

/*template voor connectie maken zou beter zijn, maar herhaling leert*/
$conn = new PDO('mysql:host=localhost; dbname=phples','root','root');
$conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $conn->prepare("SELECT * FROM blogpost ORDER BY id DESC");
$sql->execute();

 ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My first blog</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div id="content">
		
		<?php include("content.inc.php");  ?>
		<div id="contentwrap">
			<h2 id="bulletintitle">News Bulletin</h2>

			<!--render posts in here-->
			<div class="bulletin">
				<?php
					while($post = $sql->fetch(PDO::FETCH_ASSOC)){
						echo "<span class='topicpost'>".htmlspecialchars($post['topic'])."</span>" . "<span class='auteurpost'> By ".htmlspecialchars($_SESSION['username'])."</span>";
					    echo "<article class='articlepost'>".htmlspecialchars($post['article'])."</article>";
					}
				?>
			</div>
		</div>

	</div>
	
</body>
</html>