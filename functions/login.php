<?php

	session_start();

	if ((!isset($_POST['login'])))
	{
		header('Location: /lizak/index.php');
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
		$login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");

		if($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE login='%s'",
		mysqli_real_escape_string($polaczenie, $login))))
		{
			if($rezultat->num_rows>0) //czy znaleziono w bazie
			{
				$wiersz = $rezultat->fetch_assoc();

				$_SESSION['zalogowany'] = true;
				$_SESSION['id_user'] = $wiersz['id_user'];
				$_SESSION['name'] = $wiersz['name'];

				unset($_SESSION['blad']);
				$rezultat->free();
				header('Location: /lizak/contest.php');

			}
			else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy tajny kod dostępu!</span>';
				header('Location: /lizak/index.php');
			}
		}

		$polaczenie->close();
	}
?>