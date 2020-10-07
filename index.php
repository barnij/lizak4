<?php
	session_start();

	if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true)
	{
		header('Location: /lizak/contest.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>LIZAK v4</title>
	<meta name="author" content="Bartosz Jaśkiewicz">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="shortcut icon" type="image/png" href="/lizak/favicon.png"/>
</head>
<body>
	<div id="container">
		<div id="top">
			LIZAK v4
			<div style="font-size: 13px; line-height: 10px;">Legnickie Informatyczne Zawody Algorytmiczno-Kombinatoryczne</div>
		</div>
		<div id="center">
			<div style="height: 100px;"></div>
			<div id="logowanie">
				<p><a href="/lizak/functions/signup.php">Zarejestruj drużynę w konkursie</a></p>
	
				<?php  
					if(isset($_SESSION['blad']))
					echo $_SESSION['blad'];
				?>
	
				<form action="/lizak/functions/login.php" method="post">
					Tajny kod dostępu <input type="text" name="login"><br/><br/>
					<input type="submit" value="Zaloguj się">
				</form>
			</div>
		</div>
		<div style="clear: both;"></div>
		<div id="footer">
			<table>
				<th style="text-align: left; padding-left: 20px;">
					I Liceum Ogólnokształcące w Legnicy
				</th>
				<th style="text-align: right; padding-right: 30px;">
					&copy; Wszelkie prawa zastrzeżone
				</th>
			</table>
		</div>
	</div>
</body>
</html>