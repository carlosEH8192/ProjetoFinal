<?php // => /contato/envia_email.php
    $to = "Carlos Eduardo <carloseh.355@gmail.com>";

    $nome_completo_cliente = $_POST["nome-completo"];
    $email_cliente = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $headers =
        "From: ${nome_completo_cliente} <${email_cliente}>\r\n".
        "Reply-To: ${nome_completo_cliente} <${email_cliente}>\r\n".
        "MIME-Version: 1.0\r\n".
        "Content-Type: text/plain; charset=UTF-8\r\n".
        "X-Mailer: PHP/".phpversion()."\r\n";

    $resultado = mail($to, $assunto, $mensagem, $headers);
    print($resultado);
?>