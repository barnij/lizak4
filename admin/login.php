<?php

	session_start();

	if ((!isset($_POST['adminlogin'])) || (!isset($_POST['adminhaslo'])))
	{
		header('Location: /lizak/admin.php');
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
		$login = htmlentities($_POST['adminlogin'], ENT_QUOTES, "UTF-8");
		$haslo = $_POST['adminhaslo'];

		if($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM admins WHERE login='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie, $login),mysqli_real_escape_string($polaczenie, $haslo))))
		{
			if($rezultat->num_rows>0) //czy znaleziono w bazie
			{
				$wiersz = $rezultat->fetch_assoc();

				$_SESSION['adminzalogowany'] = true;
				$_SESSION['name'] = $wiersz['name'];
				$_SESSION['id_admin'] = $wiersz['id_admin'];

				unset($_SESSION['blad']);
				$rezultat->free();
				header('Location: /lizak/admin/admin.php');

			}
			else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: /lizak/admin/index.php');
			}
		}

		$polaczenie->close();
	}
?>