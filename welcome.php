<?php
	session_start();

	if(!(isset($_SESSION['udanarejestracja'])))
	{
		header('Location: /lizak/index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}

	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_nazwa'])) unset($_SESSION['e_nazwa']);

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
			LIZAK v4<br/>
			<div style="font-size: 13px; line-height: 10px;">Legnickie Informatyczne Zawody Algorytmiczno-Kombinatoryczne</div>
		</div>
		<div id="center">
			<div style="height: 100px;"></div>
			<div style="width: 50%; text-align: left; margin: auto;">
				Możesz już zalogować się do konkursu!<br/>
				Oto Twój tajny kod dostępu: <b><?php echo $_SESSION['koddostepu']; ?></b><br/>
				Zapisz go i nikomu nie pokazuj.<br/><br/>

				<a href="/lizak">Zaloguj się</a>
			</div>
		</div>
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