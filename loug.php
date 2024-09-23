<?
   
session_start();
session_destroy();
$usuario=$_REQUEST['usuario'];
    $clave=$_REQUEST['clave'];
      $site=$_REQUEST['site'];
 header('Location: http://'.$_SERVER[HTTP_HOST].'/sistema2024/validaLogin.php?user='.$usuario.'&&pass='.$clave.'&&ni='.$site.'');

?>