<?php // => /login/form_adm.php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");
    include_once("defaultPaths/paths.php");

    session_id("admLogin");
    session_start();

    $validacao_existe_eh_adm_login =
        isset($_SESSION["validacao"]) &&
        $_SESSION["validacao"] == "admLogin";

    if($validacao_existe_eh_adm_login)
        include_once("./form_adm.html");

    else {
        print("<h1>ACESSO NEGADO!</h1>");
        session_unset();
        session_destroy();
    }
?>