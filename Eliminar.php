<?php
require 'datos/basedatos.php';
$id = $_GET['id'];
$eliminar = "DELETE FROM Cliente WHERE id = '$id'";
$elimina = $db->query($eliminar);
header("location:index.php");
$conecta->close();
?>