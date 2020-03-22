<?php
    require __DIR__ . '/lib_ext/autoload.php';

    use Notification\Email;

    $novoEmail = new Email();
    $novoEmail->sendEmail("Assunto de Teste", "<p>Esse é um e-mail de <b>teste</b></p>", "mauricioacruz@gmail.com", "Mauricio A Cruz", "mauricioacruz@gmail.com", "Mauricio Cruz");

    var_dump($novoEmail);