<?php // => /login/form_prof.php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");
    include_once("defaultPaths/paths.php");

    session_id("profLogin");
    session_start();

    $validacao_existe_eh_prof_login =
        isset($_SESSION["validacao"]) &&
        $_SESSION["validacao"] == "profLogin";

    if($validacao_existe_eh_prof_login)
        include_once("./form_prof.html");

    else {
        print("<h1>ACESSO NEGADO!</h1>");
        session_unset();
        session_destroy();
    }
?>