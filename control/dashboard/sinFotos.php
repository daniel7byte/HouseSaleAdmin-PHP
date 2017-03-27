  <?php
  require_once('../config/parameters.php');
  require_once('../config/connection.php');
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location: ' . APP_URL . 'index.php');
    exit;
  }


  function validatorDir($id, $dato2)
  {
    if ($id == 0) {
      $formato = '_1.JPG';
    }elseif ($id == 1) {
      $formato = '_0.jpg';
    }

    $archivo = $dato2 . $formato;

    $directorio = '../../oficial/img/casas/00000/' . $archivo;

    if(file_exists($directorio) == true){
      return true;
    }else{
      return false;
    }
  }
  
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
          <h2>Casas sin fotos</h2>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Sistema</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($rows as $row):
                      if (validatorDir($row['id'], $row['dato2']) == false):
                  ?>
                    <tr>
                      <td><?=$row['dato2']?></td>
                      <td><?=($row['id'] == 1 ? 'FMLS' : 'GAMLS')?></td>
                      <td><span class="label label-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Archive was not found</span></td>
                    </tr>
                  <?php
                      endif;
                    endforeach;
                  ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=APP_URL?>resources/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
