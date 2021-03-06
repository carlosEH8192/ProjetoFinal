<?php // => /adm/turmas/get_turma_turmas.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $codigo = '';
    $filtro = '';

    $dados_retorno = null;

    if(isset($_GET["codigo"])) {
        $codigo = $_GET["codigo"];
        $dados_retorno = $deus->recupera_turma($codigo);

    } else if(isset($_GET["filtro"])) {
        $filtro = $_GET["filtro"];
        $dados_retorno = $deus->recupera_turmas($filtro);
    }
    
    print(json_encode($dados_retorno));
?>