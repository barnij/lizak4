<?php
	session_start();

	if (isset($_SESSION['blad'])) {
		unset($_SESSION['blad']);
	}

	if (isset($_POST['nazwa'])) //czy formularz już wysłany
	{
		$DanePoprawne = true;
		$nazwa = $_POST['nazwa'];

		if((strlen($nazwa)<5) || (strlen($nazwa)>20)) //długość nicku od 5 do 20
		{
			$DanePoprawne=false;
			$_SESSION['e_nazwa']="Nick musi zawierać od 5 do 20 znaków!<br/>";
		}

		if (!ctype_alnum($nazwa)) //tylko znaki alfanumeryczne
		{
			$DanePoprawne=false;
			$_SESSION['e_nazwa']="Login może składać się tylko z liter i cyfr<br/> (bez polskich znaków)<br/>";
		}

		$player1 = htmlentities($_POST['player1'], ENT_QUOTES, "UTF-8");
		$player2 = htmlentities($_POST['player2'], ENT_QUOTES, "UTF-8");

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno!=0) //połączenie z DB nienawiązane
			{
				throw new Exception(mysqli_connect_errno());
			}
			else //połączenie nawiązane!
			{
				mysqli_set_charset($polaczenie,"utf8");
				$polaczenie->query('SET NAMES utf8');

				$rezultat = $polaczenie->query("SELECT id_user FROM users WHERE name='$nazwa'");  //wybierz z DB rekordy z podanym loginem

				if (!$rezultat) throw new Exception($polaczenie->error);

				if($rezultat->num_rows>0) //BŁĄD - druzyna o takiej nazwie juz istnieje w bazie!
				{
					$DanePoprawne=false;
					$_SESSION['e_nazwa']="Zespół o takiej nazwie już istnieje!<br/>";
				}
			}

			if ($DanePoprawne) // Wszystkie dane poprawne HURRA!
			{
				$koddostepu = uniqid('kod');
				$_SESSION['koddostepu'] = $koddostepu;

				if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$koddostepu', '$nazwa', '$player1', '$player2')")) //dodawanie rekordu do users
				{
					$rezultat = $polaczenie->query("SELECT id_user FROM users WHERE login='$koddostepu'");
					$wiersz = $rezultat->fetch_assoc();
					$id_user = $wiersz['id_user'];

					if ($polaczenie->query("INSERT INTO ranking VALUES ('$id_user', 0, 0, 0)")) {

						$_SESSION['udanarejestracja']=true;
						header('Location: /lizak/welcome.php');

					}
					else
					{
						throw new Exception($polaczenie->error);
					}

				}
				else
				{
					throw new Exception($polaczenie->error);
				}

				$polaczenie->close();
			}
		}

		catch(Exception $e) //wyświetlanie błędu
		{
			echo '<span style="color: red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br /> Informacja deweloperska: '.$e;
		}
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
</head>
<body>
	<div id="container">
		<div id="top">
			LIZAK v4
		</div>
		<div id="center">
			<div style="height: 100px;"></div>
			<div style="width: 50%; text-align: left; margin: auto;">
				<form method="post">

					Podaj swój nick lub nazwę zespołu <br /><input type="text" name="nazwa" required><br/>
					<?php //błąd nazwy
						if (isset($_SESSION['e_nazwa']))
							{echo '  <span class="error">'.$_SESSION['e_nazwa'].'</span>';
							unset($_SESSION['e_nazwa']);}
					?><br/>

					<b>Pamiętaj, by prawidłowo wpisać swoje dane!</b><br/><br/>

					Podaj imię i nazwisko 1. zawodnika <br />
					<input type="text" name="player1" required><br/><br/>

					Podaj imię i nazwisko 2. zawodnika (jeśli jest) <br />
					<input type="text" name="player2"><br/>
					<br/>

					<input type="submit" value="Zarejestruj się">
				</form>
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