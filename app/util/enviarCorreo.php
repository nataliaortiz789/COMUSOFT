<?php
ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","465");
   ini_set("sendmail_from","00000@gmail.com");
   ini_set("sendmail_path", "C:\xampp\sendmail\sendmail.exe -t");
$to = "yersoalexiscj@ufps.edu.co";
$subject = "ACTIVAR CUENTA EN COMUSOFT";
$message = "
<html>
<head>
<title>ACTIVAR CUENTA</title>
</head>
<body>
<h1>ACTIVAR CUENTA COMUSOFT</h1>
<p>Ya casi terminas de activar tu cuenta en Comusoft, da clic
<a href='localhost/comusoft'>aqui</a> para terminar el proceso.</p>
</body>
</html>";
$headers  = 'From: no-reply@comfanorte.com.co' . "\r\n" .
  'Reply-To: no-reply@comfanorte.com.co' . "\r\n" .
  'MIME-Version: 1.0' . "\r\n" .
  'Content-type: text/html; charset=UTF-8' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
$success = mail($to, $subject, $message, $headers);
?>
