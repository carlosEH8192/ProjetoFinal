<?php // => /adm/verificacao_ss_adm.php 
    function verifica_ss_inclui_html($caminho) {
        session_id("adm");
        session_start();

        $validacao_existe_eh_adm =
            isset($_SESSION["validacao"]) &&
            $_SESSION["validacao"] == "adm";

        if($validacao_existe_eh_adm) {
            $username = $_SESSION["username"];
            $verificacao_ss_adm = true;
            
            // iface = interface
            $iface_cb_nav_adm = "ProjetoFinalGit/defaultNavs/adm_cb_nav.php";
            set_include_path("C:/htdocs/");

            include_once($caminho);

        } else {
            session_unset();
            session_destroy();

            print("<h1>ACESSO NEGADO!</h1>");
        }
    }
?>