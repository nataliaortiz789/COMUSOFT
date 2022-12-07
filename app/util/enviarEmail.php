<?php

$cuerpoMensaje = "<html>
                  <br><br>
                  <hr color='red' />".
                  $message."<br><br>
                  Este correo fue generado de manera automática por nuestro sistema de información; por
                  favor no responda directamente.<br>
                  <hr color='red' />
                  </html>";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once ('../../public/PHPMailer/src/Exception.php');
require_once ('../../public/PHPMailer/src/PHPMailer.php');
require_once ('../../public/PHPMailer/src/SMTP.php');


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;   //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $emailSalida;                     // SMTP username
    $mail->Password   = $emailPass;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($emailSalida, $remitente);
    $mail->addAddress($emailDestino, $destinatario);     // Add a recipient
    //Envió copia de email
    if (!empty($emailCopia)) {
      $mail->addBCC($emailCopia);
    }
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpoMensaje;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $confirmaEnvio=true;
    echo"enviado";
} catch (Exception $e) {
    $confirmaEnvio=false;
    $error = $mail->ErrorInfo;
    echo "<script>
            console.log('Error: '+'$error');
          </script>";
}
?>
