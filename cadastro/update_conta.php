<?php // => /cadastro/update_conta.php
    include_once("../deus/Deus.php");
    $deus = new Deus();

    $nome_completo = $_POST["nome-completo"];
    $sexo = $_POST["sexo"];    
    $celular = $_POST["celular"];
    $fixo = $_POST["fixo"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $deus->update_conta(
        $nome_completo, $sexo, $celular, $fixo,
        $rg, $cpf, $email, $senha
    );
?>