<?php // => /adm/cursos/update_curso_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];
    $turma = $_POST["turma"];

    $resultado = false;

    if(
        !is_null($codigo) && !is_null($nome) &&
        !is_null($carga_horaria) && !is_null($turma)
      )
    {
        $resultado = $deus->update_curso(
            $codigo, $nome,
            $carga_horaria, $turma
        );
    }

    print($resultado);
?>