<?php // => /login/index.php
    $get_type_existe_eh_valido =
        isset($_GET["type"]) &&
        $_GET["type"] == 1413;

    if($get_type_existe_eh_valido) {
        unset($_GET);

        session_id("admLogin");
        session_start();

        $_SESSION["validacao"] = "admLogin";
        session_write_close();

        header("Location: form_adm.php");

    } else
        include_once("index.html");
?>