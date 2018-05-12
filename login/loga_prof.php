<?php // => /login/loga_prof.php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");
    include_once("deus/Deus.php");
    $deus = new Deus();

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $deus->loga_prof($email, $senha);
?>