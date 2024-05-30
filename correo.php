<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';
    $mail->Password = 'your-email-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinatarios
    $mail->setFrom('your-email@gmail.com', 'Mailer');
    $mail->addAddress('andres.garvel30@gmail.com');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de correo desde PHP';
    $mail->Body    = 'Este es un correo de prueba enviado desde PHP';

    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>