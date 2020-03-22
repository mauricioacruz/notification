<?php
    namespace Notification;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Email {
        private $mail = \stdClass::class;

        public  function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName ) {
            $this->mail = new PHPMailer(true);

            //Server settings
            $this->mail->SMTPDebug = $smtpDebug;                                // Enable verbose debug output
            $this->mail->isSMTP();                                              // Send using SMTP
            $this->mail->Host       = $host;                                    // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                     // Enable SMTP authentication
            $this->mail->Username   = $user;                                    // SMTP username
            $this->mail->Password   = $pass;                                    // SMTP password
            $this->mail->SMTPSecure = $smtpSecure;                              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = $port;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $this->mail->CharSet='utf8';
            $this->mail->setLanguage('br');

            //Recipients
            $this->mail->setFrom($setFromEmail, $setFromName);
            //$this->mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            //$this->mail->addAddress('ellen@example.com');               // Name is optional
            //$this->mail->addReplyTo('info@example.com', 'Information');
            //$this->mail->addCC('cc@example.com');
            //$this->mail->addBCC('bcc@example.com');

            // Attachments
            //$this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            //$this->mail->Subject = 'Here is the subject';
            //$this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            //$this->mail->send();
            //echo 'Message has been sent';
        }

        public  function  sendEmail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName) {

            $this->mail->Subject =  (string)$subject;
            $this->mail->Body    = $body;

            $this->mail->addReplyTo($replyEmail, $replyName);
            $this->mail->addAddress($addressEmail, $addressName);

            try {
                $this->mail->send();
            } catch (Exception $e) {
                echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
            }


        }

    }
