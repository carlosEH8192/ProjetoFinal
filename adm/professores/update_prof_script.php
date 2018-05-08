<?php // => /adm/professores/update_prof_script.php
    set_include_path("C:/htdocs");
    
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $codigo = $_POST["codigo"];
    $nome_completo = $_POST["nomeCompleto"];
    $sexo = $_POST["sexo"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $disciplina = $_POST["disciplina"];

    $resultado = false;

    if(
        !is_null($codigo) && !is_null($nome_completo) &&
        !is_null($sexo) && !is_null($rg) &&
        !is_null($cpf) && !is_null($disciplina)
      )
    {
        $resultado = $deus->update_prof(
            $codigo, $nome_completo,
            $sexo, $rg,
            $cpf, $disciplina
        );
    }

    print($resultado);
?>