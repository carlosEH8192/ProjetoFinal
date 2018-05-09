<?php // => /adm/nomesTurma/insere_nome_turma_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $nome = $_POST["nome"];
    $resultado = false;

    if(!is_null($nome))
        $resultado = $deus->insere_nome_turma($nome);

    print($resultado);
?>