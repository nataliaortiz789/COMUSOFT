<?php
  session_start();
  include "../util/funciones.php";
  if(!empty($_POST))
  {
    $email=EntradaSegura($_POST['email']);
    $clave=EntradaSegura($_POST['clave']);
    $url = 'https://gewsjsiv6b.execute-api.us-east-1.amazonaws.com/login';
    $ch = curl_init($url);
    $data = array(
        'email' => $email,
        'clave' => $clave
    );
    $json = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $resultado = json_decode($result, true);
    if($httpcode==200){
      if($resultado['usuario_id']!=null){
        $_SESSION['nombre']=$resultado['nombre'];
        $_SESSION['correo']=$email;
        $_SESSION['perfil']=$resultado['perfil'];
        $_SESSION['usuario_id']=$resultado['usuario_id'];
        header("Location:../../index.php");
      }
      else{
        $_SESSION['mensajeError']=$resultado['Mensaje'];
        header("Location:../../public/paginas/login.php");
      }
    }
    curl_close($ch);
  }

 ?>
