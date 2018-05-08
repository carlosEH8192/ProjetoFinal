<?php // => /adm/adm_cb_nav.php
    const ROOT = "/ProjetoFinalGit";
    const CB_LOGO = ROOT."/img/logo/cb-am.png";
    const LOGOUT = ROOT."/logout/index.php";
    
    $username = $_SESSION["username"];
    $gestao_adms = ROOT."/adm/adms/index.php";
    $gestao_alunos = ROOT."/adm/alunos/index.php";
    $gestao_cursos = ROOT."/adm/cursos/index.php";

    include_once("adm_cb_nav.html");
?>