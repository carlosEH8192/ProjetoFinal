<?php // => /professores/presencas/update_presenca_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $codigo = $_POST["codigo"];
    $dia = $_POST["dia"];
    $cod_aluno = $_POST["codAluno"];
    $cod_nome_turma = $_POST["codNomeTurma"];

    $resultado = false;

    if(
        !is_null($codigo) &&        
        !is_null($dia) &&
        !is_null($cod_aluno) &&
        !is_null($cod_nome_turma)
      )
    {
        $resultado = $deus->update_presenca(
            $codigo, $dia,
            $cod_aluno, $cod_nome_turma
        );
    }

    print($resultado);
?>