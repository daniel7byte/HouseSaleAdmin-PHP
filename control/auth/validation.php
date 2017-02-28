<?php
  require_once('../config/parameters.php');
  require_once('../config/connection.php');
  session_start();
  if(isset($_SESSION['usuario'])){
    header('Location: ' . APP_URL . 'dashboard/index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=APP_URL?>resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=APP_URL?>resources/css/flatly.min.css">
    <title>Validacion</title>
  </head>
  <body>
    <em>
      <?php
        include_once('../../control_config/users.php');
        if($_POST['usuario'] == $user1[0]){
          if($_POST['contrasenia'] == $user1[2]){
            $_SESSION['usuario'] = $user1[0];
            $_SESSION['rol'] = $user1[1];
            header('location: ../dashboard/index.php');
          }else{
            header('location: ../index.php');
          }
        }elseif($_POST['usuario'] == $user2[0]){
          if($_POST['contrasenia'] == $user2[2]){
            $_SESSION['usuario'] = $user2[0];
            $_SESSION['rol'] = $user2[1];
            header('location: ../dashboard/index.php');
          }else{
            header('location: ../index.php');
          }
        }else{
          header('location: ../index.php');
        }
      ?>
    </em>
    <script src="<?=APP_URL?>resources/js/jquery-3.1.1.min.js" charset="utf-8"></script>
    <script src="<?=APP_URL?>resources/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
