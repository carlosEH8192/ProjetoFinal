<?php // => /adm/cursos/update_curso_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];

    $resultado = false;

    if(
        !is_null($codigo) && !is_null($nome) &&
        !is_null($carga_horaria)
      )
    {
        $resultado = $deus->update_curso(
            $codigo, $nome, $carga_horaria
        );
    }

    print($resultado);
?>