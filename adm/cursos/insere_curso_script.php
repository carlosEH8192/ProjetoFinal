<?php // => /adm/cursos/insere_curso_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];
    $turma = $_POST["turma"];

    $resultado = false;

    if(
        !is_null($nome) &&
        !is_null($carga_horaria) &&
        !is_null($turma)
      )
    {
        $resultado = $deus->insere_curso($nome, $carga_horaria, $turma);
    }

    print($resultado);
?>