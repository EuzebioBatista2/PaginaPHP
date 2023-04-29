<?php

    use PHPMailer\PHPMailer\PHPMailer;

    function enviar_email($destinatario, $assunto, $mensagemHTML) {
        require '../vendor/autoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth = true;
        $mail->Username = 'Insira o e-mail aqui';
        $mail->Password = 'senhaApp aqui';
        $mail->setFrom('Insira o e-mail aqui', 'Nome de usuario da conta');
        $mail->addAddress($destinatario);
        $mail->Subject = $assunto;
        $mail->isHTML(true);
        $mail->Body = $mensagemHTML;

        if($mail->send()) {
            return true;
        } else {
            return false;
        }

        $mail->smtpClose();
    }
        
?>