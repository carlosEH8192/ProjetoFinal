<?php // => /adm/adms/update_adm_script.php
	set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");    
    $deus = new Deus();

    $codigo = $_POST["codigo"];
    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $resultado = false;

    if(!is_null($codigo) && !is_null($username) && !is_null($senha))
    	$resultado = $deus->update_adm($codigo, $username, $senha);

    print($resultado);
?>