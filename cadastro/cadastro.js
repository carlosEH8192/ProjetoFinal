function getDadosAluno() {
    $.get("get_dados_aluno.php", preencheCampos);
}

function preencheCampos(data) {
    var aluno = JSON.parse(data);

    $("#inp-nome-completo").val(aluno.nomeCompleto);
    aluno.sexo == "M" ? $("#radio-m").prop("checked", true) :
                        $("#radio-f").prop("checked", true);

    $("#inp-celular").val(aluno.telefoneCelular);
    $("#inp-fixo").val(aluno.telefoneFixo);
    $("#inp-rg").val(aluno.rg);
    $("#inp-cpf").val(aluno.cpf);
    $("#inp-email").val(aluno.email);
    $("#inp-senha").val(aluno.senha);
}

$(getDadosAluno);