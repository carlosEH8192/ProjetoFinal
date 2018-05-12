<?php // => /defaultNavs/cb_nav.php    
    // CAMINHOS PARA HTML
    $cb_logo = ROOT_HTML."/img/logo/cb-am.png";
    $inicio = ROOT_HTML."/index.php";

    $cursos = ROOT_HTML."/cursos";
    $photoshop = $cursos."/photoshop/index.php";
    $corel = $cursos."/corelDraw/index.php";
    $dsmax = $cursos."/3dsMax/index.php";
    $inf_bsc = $cursos."/informaticaBasica/index.php";

    $quemsomos = ROOT_HTML."/quemSomos/index.php";
    $contato = ROOT_HTML."/contato/index.php";
    $cadastro = ROOT_HTML."/cadastro/index.php";

    // CAMINHO PARA INCLUDE
    $login_nav_ovrd = "defaultNavs/loginNavOvrd";

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
        // VARIÁVEL INCLUDE PARA CB_NAV LOGADO
        $logged_in_nav = $login_nav_ovrd."/logged_in_nav.html";

        // VARIÁVEL HTML PARA CB_NAV LOGADO
        $logout = ROOT_HTML."/logout/index.php";
        
        $primeiro_nome = explode(' ', $_SESSION["nome_completo"]);
        $primeiro_nome = $primeiro_nome[0];

    } else {
        // VARIÁVEL INCLUDE PARA CB_NAV DEFAULT
        $def_login_nav = $login_nav_ovrd."/def_login_nav.html";
        
        // VARIÁVEL HTML PARA CB_NAV DEFAULT
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

    include_once("cb_nav.html");
?>