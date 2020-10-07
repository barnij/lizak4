<?php
	session_start();

	if((!isset($_SESSION['adminzalogowany'])) || $_SESSION['adminzalogowany']==false)
	{
		header('Location: /lizak/admin/index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		mysqli_set_charset($polaczenie,"utf8");
		$polaczenie->query('SET NAMES utf8');

		$id_admin = $_SESSION['id_admin'];
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>LIZAK v4</title>
	<meta name="author" content="Bartosz Jaśkiewicz">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" type="text/css" href="/lizak/main.css">
	<link rel="shortcut icon" type="image/png" href="/lizak/favicon.png"/>
</head>
<body>
	<div id="container">
		<div id="top">
			LIZAK v4
			<div style="font-size: 13px; line-height: 10px;">Panel Administratora</div>
		</div>
		<div id="center">
			<div style="height: 50px;"></div>
			<div id="menu">
				Witaj<br/>
				<p style="margin-top: 2px; margin-bottom: 5px; padding-left: 10px; font-weight: bold;"><?php echo $_SESSION['name']; ?></p>

				<p><a href="?ranking">Ranking</a></p>
				<p><a class="brak" href="?brak">Dodaj zadanie</a></p>
				<p><a class="brak" href="?brak">Edytuj zadanie</a></p>
				<p><a class="brak" href="?brak">Dodaj admina</a></p>

				[ <a href="/lizak/admin/logout.php">WYLOGUJ</a> ]
			</div>
			<div id="content">
				<?php
					
					if(isset($_GET["ranking"]))
					{
						include('ranking.php');
						
					}elseif(isset($_GET["brak"]))
					{
						echo "Ta funkcja jest aktualnie wdrażana.";

					}else
					{
						echo    "Ta wersja panelu administratora jest bardzo bardzo, ale to bardzo uboga. <br/>
								 Prawie wszystkie funkcje są obecnie niedostępne. Użytkujesz na własną odpowiedzialność.";
					}

				?>
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

<?php $polaczenie->close(); ?>