<?php
$para = 'andres.garvel30@gmail.com';
$asunto = 'Prueba de correo desde PHP';
$mensaje = 'Este es un correo de prueba enviado desde PHP';

// Para enviar un correo HTML, se debe establecer la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Enviar el correo
$mail_enviado = mail($para, $asunto, $mensaje);

// Comprobar si el correo se envió correctamente
if ($mail_enviado) {
    echo 'Correo enviado correctamente';
} else {
    echo 'Error al enviar el correo';
}
?>
