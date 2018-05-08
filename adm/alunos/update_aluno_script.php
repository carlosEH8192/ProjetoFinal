<?php // => /adm/alunos/update_alunos_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");    
    $deus = new Deus();

    $codigo = $_POST["codigo"];
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
       !is_null($codigo) && !is_null($nome_completo) && !is_null($sexo) &&
       !is_null($celular) && !is_null($fixo) && !is_null($rg) &&
       !is_null($cpf) && !is_null($email) && !is_null($senha)
      )
    {
        $resultado = $deus->update_aluno(
            $codigo, $nome_completo, $sexo,
            $celular, $fixo, $rg,
            $cpf, $email, $senha
        );
    }

    print($resultado);
?>