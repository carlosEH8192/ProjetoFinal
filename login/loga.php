<?php // => /login/loga.php
	include_once("../deus/Deus.php");
	$deus = new Deus();

	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$deus->loga($email, $senha);
?>