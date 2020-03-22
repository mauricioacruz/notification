<?php
    require __DIR__ . '/../lib_ext/autoload.php';

    use Notification\Email;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $novoEmail = new Email(SMTP::DEBUG_SERVER, 'mail.mauricioacruz.com.br', 'contato@mauricioacruz.com.br', 'M@r2d2@c3p0/',  PHPMailer::ENCRYPTION_STARTTLS, '587','contato@mauricioacruz.com.br', 'Mauricio A Cruz');
    $novoEmail->sendEmail("Assunto de Teste", "<p>Esse é um e-mail de <b>teste</b></p>", "mauricioacruz@gmail.com", "Mauricio A Cruz", "mauricioacruz@gmail.com", "Mauricio Cruz");

    var_dump($novoEmail);