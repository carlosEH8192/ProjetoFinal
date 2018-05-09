<?php // => /adm/nomesTurma/delete_nome_turma.php
    set_include_path("C:/htdocs");
    include_once("ProjetoFinalGit/deus/Deus.php");

    $deus = new Deus();
    $codigo = $_POST["codigo"];

    print($deus->delete_nome_turma($codigo));
?>