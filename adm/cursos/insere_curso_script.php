<?php // => /adm/cursos/insere_curso_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];

    $resultado = false;

    if(
        !is_null($nome) &&
        !is_null($carga_horaria)
      )
    {
        $resultado = $deus->insere_curso($nome, $carga_horaria);
    }

    print($resultado);
?>