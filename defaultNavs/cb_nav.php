<?php // => /defaultNavs/cb_nav.php
    // CAMINHO ROOT USADO NO HTML
    const ROOT_HTML = "/ProjetoFinalGit";

    // CAMINHO ROOT USADO PARA INCLUIR ARQUIVOS (PHP)
    const ROOT_INC = "ProjetoFinalGit";

    const CB_LOGO = ROOT_HTML."/img/logo/cb-am.png";
    const INICIO = ROOT_HTML."/index.php";

    const CURSOS = ROOT_HTML."/cursos";    
    const PHOTOSHOP = CURSOS."/photoshop/index.php";
    const COREL = CURSOS."/corelDraw/index.php";
    const DSMAX = CURSOS."/3dsMax/index.php";
    const INF_BSC = CURSOS."/informaticaBasica/index.php";

    const QUEMSOMOS = ROOT_HTML."/quemSomos/index.php";
    const CONTATO = ROOT_HTML."/contato/index.php";
    const CADASTRO = ROOT_HTML."/cadastro/index.php";

    const LOGIN_NAV_OVRD = ROOT_INC."/defaultNavs/loginNavOvrd";

    $ss_estado = session_status();
    $ss_ativa = $ss_estado == PHP_SESSION_ACTIVE;
    $ss_nenhuma = $ss_estado == PHP_SESSION_NONE;

    if($ss_nenhuma) {
        session_id("aluno");
        session_start();

        $ss_ativa = true;
        $ss_nenhuma = false;
    }

    $validacao_existe_eh_aluno = 
        isset($_SESSION["validacao"]) &&
        $_SESSION["validacao"] == "aluno";
    
    if($validacao_existe_eh_aluno) {
        $logged_in_nav = LOGIN_NAV_OVRD."/logged_in_nav.html";
        $logout = ROOT_HTML."/logout/index.php";
        
        $primeiro_nome = explode(' ', $_SESSION["nome_completo"]);
        $primeiro_nome = $primeiro_nome[0];

    } else {
        $def_login_nav = LOGIN_NAV_OVRD."/def_login_nav.html";
        $login = ROOT_HTML."/login/index.php";

        $validacao_existe_eh_adm_login =
            isset($_SESSION["validacao"]) &&
            $_SESSION["validacao"] == "admLogin";

        $validacao_existe_eh_prof_login =
            isset($_SESSION["validacao"]) &&
            $_SESSION["validacao"] == "profLogin";

        if(
            $ss_ativa && 
            !$validacao_existe_eh_adm_login &&
            !$validacao_existe_eh_prof_login
          )
        {
            session_unset();
            session_destroy();
        }
    }

    set_include_path("C:/htdocs/");
    include_once("cb_nav.html");
?>