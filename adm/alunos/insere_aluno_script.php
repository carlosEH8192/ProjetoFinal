<?php // => /adm/alunos/insere_aluno_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $nome_completo = $_POST["nomeCompleto"];
    $sexo = $_POST["sexo"];
    $celular = $_POST["celular"];
    $fixo = $_POST["fixo"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $resultado = false;

    if(
       !is_null($nome_completo) && !is_null($sexo) &&
       !is_null($celular) && !is_null($fixo) &&
       !is_null($rg) && !is_null($cpf) &&
       !is_null($email) && !is_null($senha)
      )
    {
        $resultado = $deus->insere_aluno(
            $nome_completo, $sexo,
            $celular, $fixo,
            $rg, $cpf,
            $email, $senha
        );
    }

    print($resultado);
?>