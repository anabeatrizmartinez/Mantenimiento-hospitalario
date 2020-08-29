<!--    Inicializar base de datos con PDO    -->
<?php

$dbHost = 'localhost';
$dbName = 'trabajo';
$dbUser = 'root';
$dbPass = '';

try { //Bloque para controlar excepciones
    $pdo = new PDO("mysql:host=$dbHost; dbname=$dbName", "$dbUser", "$dbPass"); //Crear la conexión
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Para crear excepciones para los errores.
} catch (Exception $e) {
    echo $e->getMessage();
}
