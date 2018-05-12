<?php // => /logout/index.php
	set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");
	include_once("deus/Deus.php");
	$deus = new Deus();

	$deus->logout();
?>