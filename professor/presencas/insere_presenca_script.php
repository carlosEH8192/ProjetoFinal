<?php // => /professores/presencas/insere_presenca_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $dia = $_POST["dia"];
    $cod_aluno = $_POST["codAluno"];
    $cod_nome_turma = $_POST["codNomeTurma"];

    $resultado = false;

    if(
        !is_null($dia) &&
        !is_null($cod_aluno) &&
        !is_null($cod_nome_turma)
      )
    {
        $resultado = $deus->insere_presenca(
            $dia, $cod_aluno, $cod_nome_turma
        );
    }

    print($resultado);
?>