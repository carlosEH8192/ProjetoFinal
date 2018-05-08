<?php // => /adm/adms/insere_adm_script.php
	set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");    
    $deus = new Deus();

    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $resultado = false;

    if(!is_null($username) && !is_null($senha))
    	$resultado = $deus->insere_adm($username, $senha);

    print($resultado);
?>