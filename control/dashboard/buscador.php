<?php
  require_once('../config/parameters.php');
  require_once('../config/connection.php');
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location: ' . APP_URL . 'index.php');
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
    <title>Buscador</title>
  <script src="<?=APP_URL?>resources/js/jquery-1.12.3.js" charset="utf-8"></script>
  </head>
  <body style="padding-top: 60px;">

    <?php include('layouts/navbar.php'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Buscador</h2>
          <hr>
          <form action="actualizar.php" method="post">
            <div class="row">
              <div class="col-md-12">
  
                <!-- CAMPOS -->

              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 col-md-offset-6">
                <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 5px;">Buscar <span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="<?=APP_URL?>resources/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
