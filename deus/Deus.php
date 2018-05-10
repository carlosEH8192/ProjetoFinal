<?php // => /deus/Deus.php

class Deus {    
    // ALUNO
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

    public function finaliza_cadastro($nome_completo, $sexo, $celular, $fixo,
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
            print("<h1>CONTA ATUALIZADA COM SUCESSO!</h1>");

        else
            print("<h1>ERRO AO ATUALIZAR CONTA</h1>.");

        mysqli_close($conexao);
    }

    public function loga_aluno($email, $senha) {
        include("snippet/conecta.php");

        $query = "SELECT * FROM aluno
                  WHERE email = '${email}' AND
                        senha = '${senha}'";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        if(!is_null($array)) {
            session_id("aluno");
            session_start();

            $_SESSION["validacao"] = "aluno";
            $_SESSION["nome_completo"] = $array["nomeCompleto"];
            $_SESSION["sexo"] = $array["sexo"];
            $_SESSION["email"] = $array["email"];
            $_SESSION["senha"] = $array["senha"];
            $_SESSION["celular"] = $array["telefoneCelular"];
            $_SESSION["fixo"] = $array["telefoneFixo"];
            $_SESSION["rg"] = $array["rg"];
            $_SESSION["cpf"] = $array["cpf"];

            session_write_close();
            header("Location: ../index.php");

        } else 
            print("<h1>ERRO AO FAZER LOGIN!</h1>");

        mysqli_close($conexao);
    }
    // ==================


    // ADM    
    // ############################
    // Funções relativas aos Administradores
    public function loga_adm($username, $senha) {
        include("snippet/conecta.php");

        $query = "SELECT username FROM adm
                  WHERE username = '${username}' AND
                        senha = '${senha}'";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        session_id("admLogin");
        session_start();
        
        session_unset();
        session_destroy();

        if(!is_null($array)) {
            session_id("adm");
            session_start();

            $_SESSION["validacao"] = "adm";
            $_SESSION["username"] = $array["username"];

            session_write_close();
            header("Location: ../adm/index.php");

        } else            
            print("<h1>ERRO AO FAZER LOGIN!</h1>");

        mysqli_close($conexao);
    }

    public function recupera_adm($codigo) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM adm WHERE codigo = ${codigo}";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return $array;
    }

    public function recupera_adms($filtro) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM adm";

        if(!is_null($filtro))
            $query .= " WHERE username LIKE '%${filtro}%'";

        include("snippet/resultado.php");
        $dados = array();

        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        mysqli_close($conexao);
        return $dados;
    }

    public function update_adm($codigo, $username, $senha) {
        include("snippet/conecta.php");
        $query = "UPDATE adm SET
                  username = '${username}',
                  senha = '${senha}'
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function insere_adm($username, $senha) {
        include("snippet/conecta.php");
        $query = "INSERT INTO adm(username, senha)
                  VALUES('${username}', '${senha}')";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function delete_adm($codigo){
        include("snippet/conecta.php");
        $query = "DELETE FROM adm WHERE codigo = ${codigo};";
        
        include("snippet/resultado.php");
        
        mysqli_close($conexao);
        return $resultado;
    }

    // ############################
    // Funções relativas aos Alunos
    public function recupera_aluno($codigo) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM aluno
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return $array;
    }

    public function recupera_alunos($filtro) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM aluno";

        if(!is_null($filtro))
            $query .= " WHERE nomeCompleto LIKE '%${filtro}%'";

        include("snippet/resultado.php");
        $dados = array();

        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        mysqli_close($conexao);
        return $dados;
    }

    public function update_aluno($codigo, $nome_completo, $sexo,
                                 $celular, $fixo, $rg,
                                 $cpf, $email, $senha)
    {
        include("snippet/conecta.php");
        $query = "UPDATE aluno SET
                  nomeCompleto = '${nome_completo}',
                  sexo = '${sexo}',
                  telefoneCelular = '${celular}',
                  telefoneFixo = '${fixo}',
                  rg = '${rg}',
                  cpf = '${cpf}',
                  email = '${email}',
                  senha = '${senha}'
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function insere_aluno($nome_completo, $sexo,
                                 $celular, $fixo,
                                 $rg, $cpf,
                                 $email, $senha)
    {
        include("snippet/conecta.php");
        $query = "INSERT INTO aluno (
            nomeCompleto, sexo,
            telefoneCelular, telefoneFixo,
            rg, cpf,
            email, senha

        ) VALUES (
            '${nome_completo}', '${sexo}',
            '${celular}', '${fixo}',
            '${rg}', '${cpf}',
            '${email}', '${senha}'
        )";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function delete_aluno($codigo) {
        include("snippet/conecta.php");
        $query = "DELETE FROM aluno WHERE codigo = ${codigo}";
        
        include("snippet/resultado.php");
        
        mysqli_close($conexao);
        return $resultado;
    }

    // ############################
    // Funções relativas aos Cursos
    public function recupera_curso($codigo) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM curso
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return $array;
    }

    public function recupera_cursos($filtro) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM curso";

        if(!is_null($filtro))
            $query .= " WHERE nome LIKE '%${filtro}%'";

        include("snippet/resultado.php");
        $dados = array();

        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        mysqli_close($conexao);
        return $dados;
    }

    public function update_curso($codigo, $nome, $carga_horaria) {
        include("snippet/conecta.php");
        $query = "UPDATE curso SET
                  nome = '${nome}',
                  cargaHoraria = ${carga_horaria}
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function insere_curso($nome, $carga_horaria) {
        include("snippet/conecta.php");
        $query = "INSERT INTO curso(nome, cargaHoraria)
                  VALUES('${nome}', ${carga_horaria})";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function delete_curso($codigo) {
        include("snippet/conecta.php");
        $query = "DELETE FROM curso WHERE codigo = ${codigo}";
        
        include("snippet/resultado.php");
        
        mysqli_close($conexao);
        return $resultado;
    }

    // ############################
    // Funções relativas aos Professores
    public function recupera_prof($codigo) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM professor
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return $array;
    }

    public function recupera_profs($filtro) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM professor";

        if(!is_null($filtro))
            $query .= " WHERE nomeCompleto LIKE '%${filtro}%'";

        include("snippet/resultado.php");
        $dados = array();

        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        mysqli_close($conexao);
        return $dados;
    }

    public function update_prof($codigo, $nome_completo,
                                $sexo, $rg,
                                $cpf, $disciplina)
    {
        include("snippet/conecta.php");
        $query = "UPDATE professor SET
                  nomeCompleto = '${nome_completo}',
                  sexo = '${sexo}',
                  rg = '${rg}',
                  cpf = '${cpf}',
                  disciplina = '${disciplina}'
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function insere_prof($nome_completo, $sexo,
                                $rg, $cpf, $disciplina
                                )
    {
        include("snippet/conecta.php");
        $query = "INSERT INTO professor(
            nomeCompleto, sexo,
            rg, cpf,
            disciplina

        ) VALUES (
            '${nome_completo}', '${sexo}',
            '${rg}', '${cpf}',
            '${disciplina}'
        )";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function delete_prof($codigo) {
        include("snippet/conecta.php");
        $query = "DELETE FROM professor WHERE codigo = ${codigo}";
        
        include("snippet/resultado.php");
        
        mysqli_close($conexao);
        return $resultado;
    }

    // ############################
    // Funções relativas aos Nomes de Turma
    public function recupera_nome_turma($codigo) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM nome_turma
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");
        include("snippet/array_fetch_assoc.php");

        mysqli_close($conexao);
        return $array;
    }

    public function recupera_nomes_turma($filtro) {
        include("snippet/conecta.php");
        $query = "SELECT * FROM nome_turma";

        if(!is_null($filtro))
            $query .= " WHERE nome LIKE '%${filtro}%'";

        include("snippet/resultado.php");
        $dados = array();

        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        mysqli_close($conexao);
        return $dados;
    }

    public function update_nome_turma($codigo, $nome) {
        include("snippet/conecta.php");
        $query = "UPDATE nome_turma SET
                  nome = '${nome}'
                  WHERE codigo = ${codigo}";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function insere_nome_turma($nome) {
        include("snippet/conecta.php");
        $query = "INSERT INTO nome_turma(nome)
                  VALUES('${nome}')";

        include("snippet/resultado.php");

        mysqli_close($conexao);
        return $resultado;
    }

    public function delete_nome_turma($codigo) {
        include("snippet/conecta.php");
        $query = "DELETE FROM nome_turma WHERE codigo = ${codigo}";
        
        include("snippet/resultado.php");
        
        mysqli_close($conexao);
        return $resultado;
    }
    // ==================


    // TODOS
    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header("Location: ../index.php");
    }
    // ==================
}

?>