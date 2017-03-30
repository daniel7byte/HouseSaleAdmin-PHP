<?php

function getStatus($dato2, $usuario_id)
{
    $query = $mysql->prepare("SELECT * FROM favoritos WHERE casa_dato2 = :dato2 and usuario_id = :usuario_id");
    $query->execute([
        ':dato2'     => $dato2,
        ':usuario_id' => $usuario_id,
    ]);
    $count = $query->rowCount();

    if ($count > 0) {

        // Está en mis favoritos
        return true;
    } else {

        // No está en mis favoritos
        return false;
    }
}

function changeStatus($dato2, $usuario_id)
{
    $query = $mysql->prepare("SELECT * FROM favoritos WHERE casa_dato2 = :dato2 and usuario_id = :usuario_id");
    $query->execute([
        ':dato2' => $dato2,
        ':usuario_id' => $usuario_id,
    ]);
    $count = $query->rowCount();

    if ($count > 0) {

        $queryDelete = $mysql->prepare("DELETE FROM favoritos WHERE casa_dato2 = :dato2 and usuario_id = :usuario_id");
        $queryDelete->execute([
            ':dato2' => $dato2,
            ':usuario_id' => $usuario_id,
        ]);

        // Envía FALSE cuando la casa ya no está en mis favoritos
        return false;

    } else {

        $queryInsert = $mysql->prepare("INSERT INTO favoritos(casa_dato2, usuario_id) VALUES(:dato2, :usuario_id);");
        $queryInsert->execute([
            ':dato2'     => $dato2,
            ':usuario_id' => $usuario_id,
        ]);

        // Envía TRUE cuando la casa ya pertenece a mis favoritos
        return true;

    }
}

function clearUser($usuario_id)
{
    $query = $mysql->prepare("SELECT * FROM favoritos where usuario_id = :usuario_id");
    $query->execute([
        ':usuario_id' => $usuario_id,
    ]);
    $count = $query->rowCount();

    if ($count > 0) {

        $queryDelete = $mysql->prepare("DELETE FROM favoritos WHERE usuario_id = :usuario_id");
        $queryDelete->execute([
            ':usuario_id' => $usuario_id,
        ]);

    }

    // Envía TRUE cuando la operacion finaliza correctamente
    return true;
}

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ' . APP_URL . 'index.php');
    exit;
}

if (isset($_POST['api'])) {

    if ($_POST['api'] == 'getStatus') {

        if (isset($_POST['dato2'])) {

            echo getStatus($_POST['dato2'], $_SESSION['usuario']);

        } else {

            echo "ERROR: No se tiene el dato2";

        }

    } elseif ($_POST['api'] == 'changeStatus') {

        if (isset($_POST['dato2'])) {

            echo changeStatus($_POST['dato2'], $_SESSION['usuario']);

        } else {

            echo "ERROR: No se tiene el dato2";

        }

    } elseif ($_POST['api'] == 'clearUser') {

        echo clearUser($_SESSION['usuario']);

    }

}
