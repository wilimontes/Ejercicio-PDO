<?php
require "datos/basedatos.php";
$sql = "SELECT A.id, razon_social, B.nombre AS tipo_cliente, 
            C.nombre AS tipo_documento, A.numero_documento
        FROM cliente A INNER JOIN tipo_cliente B
        ON A.id_tipo_cliente = B.id INNER JOIN tipo_documento C
        ON A.id_tipo_documento = C.id;";
$resultado = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous">
</head>
<body>
<div class="container">
        <h1>listado de cliente</h1>
        <a href="nuevo_cliente.php" class="btn btn-secondary">Nuevo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>tipo cliente</th>
                    <th>tipo doc</th>
                    <th>N.Documento</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody>
            <?php
                foreach($resultado as $cliente):
            ?>
                <tr>
                        <td><?php echo $cliente['razon_social'] ?></td>
                        <td><?php echo $cliente['tipo_cliente'] ?></td>
                        <td><?php echo $cliente['tipo_documento'] ?></td>
                        <td><?php echo $cliente['numero_documento'] ?></td>
                        <td>
                            <a href="Editar_cliente.php?id=<?php echo $cliente['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="Eliminar.php?id=<?php echo $cliente['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                </tr>       
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>  
</body>
</html>