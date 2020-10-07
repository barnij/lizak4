<?php
	$id_ans = $_GET['kod'];

	$zapytanie2 = $polaczenie -> query("SELECT kod,id_task FROM answers WHERE id_ans = '$id_ans' AND id_user = '$id_user'");
	$rezultat = $zapytanie2->fetch_assoc();
	$kod = $rezultat['kod'];
	$id_task = $rezultat['id_task'];

	echo "Oto Twój kod do Zadania ".$id_task.":<br/>";
	echo "<p style=\"padding-left: 20px;\">".$kod."</p>";

?>