<?php // => /login/index.php
    $type_adm_existe_eh_valido = 
        isset($_GET["type"]) && $_GET["type"] == 1413;

    $type_prof_existe_eh_valido = 
        isset($_GET["type"]) && $_GET["type"] == 161815;

    if($type_adm_existe_eh_valido) {
        unset($_GET);

        session_id("admLogin");
        session_start();

        $_SESSION["validacao"] = "admLogin";
        session_write_close();

        header("Location: form_adm.php");

    } else if($type_prof_existe_eh_valido) {
        unset($_GET);

        session_id("profLogin");
        session_start();

        $_SESSION["validacao"] = "profLogin";
        session_write_close();

        header("Location: form_prof.php");

    } else {
        session_id("admLogin");
        session_start();

        session_unset();
        session_destroy();

        session_id("profLogin");
        session_start();

        session_unset();
        session_destroy();

        set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");
        include_once("defaultPaths/paths.php");
        include_once("./index.html");
    }
?>