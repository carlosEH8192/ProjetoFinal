<?php // => /adm/adm_cb_nav.php
    const ROOT = "/ProjetoFinalGit";
    const CB_LOGO = ROOT."/img/logo/cb-am.png";
    const LOGOUT = ROOT."/logout/index.php";
    
    $nome = $_SESSION["nome_completo"];
    $gestao_notas = ROOT."/professor/notas/index.php";
    $gestao_presenca = ROOT."/professor/presencas/index.php";

    include_once("prof_cb_nav.html");
?>