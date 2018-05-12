<?php // => /login/loga_adm.php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");
    include_once("deus/Deus.php");
    $deus = new Deus();

    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $deus->loga_adm($username, $senha);
?>