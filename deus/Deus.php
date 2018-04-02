<?php // => /deus/Deus.php

class Deus {
    
    // CONTA
    public function cpf_eh_valido($cpf) {
        include("snippet/conecta.php");

        $query = "SELECT 1 FROM aluno
                    WHERE cpf = '$cpf'
                    LIMIT 1";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return !is_null($array);
    }

    public function get_dados_aluno($cpf) {
        include("snippet/conecta.php");

        $query = "SELECT * FROM aluno
                    WHERE cpf = '$cpf'";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return $array;
    }

    public function update_conta($nome_completo, $sexo, $celular, $fixo,
                                 $rg, $cpf, $email, $senha)
    {
        include("snippet/conecta.php");

        $query = "UPDATE aluno SET
                    nomeCompleto = '${nome_completo}',
                    sexo = '${sexo}',
                    telefoneCelular = '${celular}',
                    telefoneFixo = '${fixo}',
                    rg = '${rg}',
                    email = '${email}',
                    senha = '${senha}'
                    WHERE cpf = '${cpf}'";

        include("snippet/resultado.php");

        if($resultado)
            print("<b>Conta atualizada</b> com sucesso!");

        else
            print("<b>Erro ao atualizar</b> conta.");

        mysqli_close($conexao);
    }

    public function loga($email, $senha) {
        include("snippet/conecta.php");

        $query = "SELECT * FROM aluno
                    WHERE email = '$email' AND
                          senha = '$senha'";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        if(!is_null($array))
            print("Bem-Vindo, <b>".$array["nomeCompleto"]."</b>.");

        else
            print("<b>Erro</b> ao fazer Login.");

        mysqli_close($conexao);
    }

}

?>