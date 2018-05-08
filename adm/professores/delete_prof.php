<?php // => /adm/professores/delete_prof.php
    set_include_path("C:/htdocs");
    include_once("ProjetoFinalGit/deus/Deus.php");

    $deus = new Deus();
    $codigo = $_POST["codigo"];

    print($deus->delete_prof($codigo));
?>