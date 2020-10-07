<?php

	session_start();

	session_unset();

	header('Location: /lizak/admin/index.php');

?>