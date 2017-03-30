  <?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location: ' . APP_URL . 'index.php');
    exit;
  }

  require_once('../config/parameters.php');
  require_once('../config/connection.php');
  require_once('funcFavoritos.php');

  $query = $mysql->prepare("SELECT id, dato2 FROM datoscasas ORDER BY dato18 DESC");
  $query->execute();
  $rows = $query->fetchAll();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=APP_URL?>resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=APP_URL?>resources/css/flatly.min.css">
    <link rel="stylesheet" href="<?=APP_URL?>resources/datatables/css/jquery.dataTables.min.css">
    <title>Casa por defecto</title>
    <style media="screen">
      tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
      }
    </style>
  <script src="<?=APP_URL?>resources/js/jquery-1.12.3.js" charset="utf-8"></script>
  </head>
  <body style="padding-top: 60px;">

    <?php include('layouts/navbar.php'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Mis Favoritos <a href="<?=APP_URL?>dashboard/generarCorreoHtml.php" class="btn btn-success">Generar HTML <span class="glyphicon glyphicon-list-alt"></span></a></h2>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Sistema</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $contador = 0;
                    foreach ($rows as $row):
                      if (getStatus($row['dato2'], $_SESSION['id']) == true):
                  ?>
                    <tr>
                      <td><?=$row['dato2']?></td>
                      <td><?=($row['id'] == 1 ? 'FMLS' : 'GAMLS')?></td>
                      <td>
                        <span class="label label-danger"><span class="glyphicon glyphicon-floppy-remove"></span> IR</span>
                        <span class="label label-danger"><span class="glyphicon glyphicon-floppy-remove"></span> QUITAR</span>
                      </td>
                    </tr>
                  <?php
                        $contador++;
                      endif;
                    endforeach;
                  ?>
                </tbody>
              </table> 
              <hr>
              <h1 style="float: right;">Total: <?=number_format($contador)?></h1>
              <br><br><br><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=APP_URL?>resources/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>