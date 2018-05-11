<?php // => /professor/verificacao_ss_adm.php 
    function verifica_ss_inclui_html($caminho) {
        session_id("prof");
        session_start();

        $validacao_existe_eh_prof =
            isset($_SESSION["validacao"]) &&
            $_SESSION["validacao"] == "prof";

        if($validacao_existe_eh_prof) {
            $verificacao_ss_prof = true;
            
            // iface = interface
            $iface_cb_nav_prof = "ProjetoFinalGit/defaultNavs/prof_cb_nav.php";
            set_include_path("C:/htdocs/");

            include_once($caminho);

        } else {
            session_unset();
            session_destroy();

            print("<h1>ACESSO NEGADO!</h1>");
        }
    }
?>