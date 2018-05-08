<?php // => /login/loga_adm.php
    include_once("../deus/Deus.php");
    $deus = new Deus();

    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $deus->loga_adm($username, $senha);
?>