<?php // => /adm/professores/insere_prof_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $nome_completo = $_POST["nomeCompleto"];
    $sexo = $_POST["sexo"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $disciplina = $_POST["disciplina"];

    $resultado = false;

    if(
        !is_null($nome_completo) && !is_null($sexo) &&
        !is_null($rg) && !is_null($cpf) &&
        !is_null($disciplina)
      )
    {
        $resultado = $deus->insere_prof(
            $nome_completo, $sexo,
            $rg, $cpf,
            $disciplina
        );
    }

    print($resultado);
?>