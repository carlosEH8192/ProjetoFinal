<?php // => /cadastro/finaliza_cadastro.php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/ProjetoFinalGit/");

    include_once("deus/Deus.php");
    $deus = new Deus();

    $nome_completo = $_POST["nome-completo"];
    $sexo = $_POST["sexo"];    
    $celular = $_POST["celular"];
    $fixo = $_POST["fixo"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $deus->finaliza_cadastro(
        $nome_completo, $sexo,
        $celular, $fixo,
        $rg, $cpf,
        $email, $senha
    );
?>