<?php // => /professores/notas/insere_nota_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $atividade_nome = $_POST["atividadeNome"];
    $nota = $_POST["nota"];
    $cod_aluno = $_POST["codAluno"];
    $cod_nome_turma = $_POST["codNomeTurma"];

    $resultado = false;

    if(
        !is_null($atividade_nome) &&
        !is_null($nota) &&
        !is_null($cod_aluno) &&
        !is_null($cod_nome_turma)
      )
    {
        $resultado = $deus->insere_nota(
            $atividade_nome, $nota,
            $cod_aluno, $cod_nome_turma
        );
    }

    print($resultado);
?>