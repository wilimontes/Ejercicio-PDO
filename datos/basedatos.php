<?php
$db = new PDO('mysql:host=localhost; dbname=financiera', 'root', 'wilichas123');
if(!$db){
    echo 'Error al conectar la Base de Datos';
    exit;
}