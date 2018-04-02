<?php // => /cadastro/verifica_cpf.php
    include_once("../deus/Deus.php");
    $deus = new Deus();

    $cpf = $_POST["cpf"];
    $eh_valido = $deus->cpf_eh_valido($cpf);

    if($eh_valido) {
        session_id("cpfAlunoCadastro");
        session_start();

        $_SESSION["cpf"] = $cpf;
        session_write_close();

        header("Location: cadastro.php");

    } else
        print("Tá <b>ERRADO!</b>");
?>