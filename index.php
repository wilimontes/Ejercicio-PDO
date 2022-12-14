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
<body style="background-color:#c0c0c0">
    <div class="container">
        <br>
        <h1 class="text-center" style="color:#444c38" ><abbr title="attribute">Listado de Cliente</abbr></h1>
        <br>
        <a href="nuevo_cliente.php" class="btn btn-success">Nuevo</a>
        <br>
        <br>
        <table class="table table-bordered border-success">
            <thead>
                <tr class="text-center" style="color:#8b0000">
                    <th>Nombre</th>
                    <th>tipo cliente</th>
                    <th>tipo doc</th>
                    <th>N.Documento</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody style="color:#191970">
            <?php
                foreach($resultado as $cliente):
            ?>
                <tr class="text-center">
                        <td><?php echo $cliente['razon_social'] ?></td>
                        <td><?php echo $cliente['tipo_cliente'] ?></td>
                        <td><?php echo $cliente['tipo_documento'] ?></td>
                        <td><?php echo $cliente['numero_documento'] ?></td>
                        <td class="text-center">
                            <a href="Editar_cliente.php?id=<?php echo $cliente['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="Eliminar.php?id=<?php echo $cliente['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                </tr>       
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div> 
</div>
    </body> 
</body>
</html>