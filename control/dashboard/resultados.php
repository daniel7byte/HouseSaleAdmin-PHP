<?php

// Conexion base de datos
require_once("../config/parameters.php");
require_once("../config/connection.php");

// Recuperación de parámetros de búsqueda
$state = $_POST["state"] ?? "Georgia";
$county = $_POST["county"] ?? "-";
$city = $_POST["city"] ?? "-";
$priceMin = $_POST["priceMin"] ?? "";
$priceMax = $_POST["priceMax"] ?? "";
$id = $_POST["id"] ?? "";
$system = $_POST["system" ?? "-"];
$zipCode = $_POST["zipcode"] ?? "";

// Busqueda directa por ID. Ignora los demás campos
if(isset($id) AND !empty($id) AND $id != "") {
    $query = $mysql->prepare("SELECT * FROM datoscasas WHERE dato2 LIKE :id AND dato6 = 'A'");
    $query->execute([':id' => "%$id%"]);
    $rows = $query->fetchAll();
} else {
// Busqueda según los parámetros del formulario
    // Construccion de condicional
    $conditional = SearchConditional($zipCode,$county,$city,$priceMin,$priceMax,$system);
    $sql = sprintf("SELECT * FROM datoscasas WHERE {$conditional}");
    $query = $mysql->prepare($sql);
    $query->execute();
    $rows = $query->fetchAll();
}

print_r($rows);


?>