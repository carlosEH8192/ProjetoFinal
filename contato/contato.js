function enviaContato(form) {
    var post = {
        'nome-completo': document.forms[0]["inp-nome-completo"].value,
        'email': document.forms[0]["inp-email"].value,
        'assunto': document.forms[0]["inp-assunto"].value,
        'mensagem': document.forms[0]["txt-mensagem"].value
    };  

    acionaLoading(true);

    $.ajax({
        type: "POST",
        url: "envia_email.php",
        data: post,
        success: function(retorno) {
            document.forms[0].reset();
            alert('E-mail enviado com sucesso!');
            acionaLoading(false);
        },
        error: function() {
            alert('Não foi possível enviar o e-mail!');
            acionaLoading(false);
        }
    });
   
    return false;
}

function acionaLoading(aciona) {
    if(aciona) {
        document.forms[0].submit.value = 'Carregando...';
        document.forms[0].submit.disabled = true;

    } else {
        document.forms[0].submit.value = 'Enviar';
        document.forms[0].submit.disabled = false; 
    }
}