<?php // => /adm/adms/get_adm_adms.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");    
    $deus = new Deus();

    $codigo = '';
    $filtro = '';

    $dados_retorno = null;

    if(isset($_GET["codigo"])) {
        $codigo = $_GET["codigo"];
        $dados_retorno = $deus->recupera_adm($codigo);

    } else if(isset($_GET["filtro"])) {
        $filtro = $_GET["filtro"];
        $dados_retorno = $deus->recupera_adms($filtro);
    }    
    
    print(json_encode($dados_retorno));
?>