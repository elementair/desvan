<?php
//llamamos la constante URL
require '../util/constants.php';
//controlamos que se haya iniciado session.
require '../class/sessions.php';
$objSes = new Sessions();
$objSes->init();

$profile = $objSes->get('profi');

if((!isset($profile))&&($profile != 'Admin')){
    header('location: ' . URL);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/forms.css" />

</head>
<body>
    <header><h1>RECUMED EXISTENCIAS</h1></header>
    <nav>
        <ul>
            <li><a href="<?php echo URL;?>admin/index.php">Inicio</a></li>
            <li><a href="<?php echo URL;?>admin/showBooks.php">Ver Libros</a></li>
        </ul>
    </nav>
    <div id="wrapper">
        <div class="container">
            <div id="right">

                <?php

                require '../class/books.php';
                $objBook = new Books();
                $result = $objBook->show_books();

                ?>

                <h2>Listado de Productos</h2>
                
                <div class="space"></div>
                <form name="upload" action="<?php echo URL;?>admin/uploadB.php" method="POST" enctype="multipart/form-data">
                    <label>Cargar Productos:</label>
                    <div class="fileinputs form-control">
                        <input type="file" name="file" id="file" class="file" />
                    </div>
                    <div class="space"></div>
                    <input type="submit" name="submit" id="submit" value="ENVIAR"/>
                </form>
                <div class="space"></div>

                <table class="table-responsive">
                    <tr>
                        <th>CÓDIGO</th>
                        <th>PRODUCTO</th>                    
                        <th>PRECIO RECUMED</th>
                        <th>EXISTENCIAS</th>     
                    </tr>
                    <?php
                    if($result){
                        foreach ($result as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['SKU'];?></td>
                                <td><?php echo $value['Descripcion'];?></td>
                                <td><?php echo $value['PrecioNormal'];?></td>
                                <td><?php echo $value['Existencia'];?></td>                                
                            </tr>
                        <?php }
                    }else{?>
                        <tr>
                            <td colspan="7" align="center">No hay Libros registrados</td>
                        </tr>
                        <?php 
                    } ?>
                </table>
            </div>
        </div>


    </div>
</body>
</html>
