<?php // => /adm/turmas/insere_turma_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $cod_nome_turma = $_POST["codNomeTurma"];
    $cod_aluno = $_POST["codAluno"];
    $cod_professor = $_POST["codProfessor"];
    $cod_curso = $_POST["codCurso"];

    $resultado = false;

    if(
        !is_null($cod_nome_turma) && !is_null($cod_aluno) &&
        !is_null($cod_professor) && !is_null($cod_curso)
      )
    {
        $resultado = $deus->insere_turma(
            $cod_nome_turma, $cod_aluno,
            $cod_professor, $cod_curso
        );
    }

    print($resultado);
?>