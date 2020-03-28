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
    <title>EL DESVAN | STOCK </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/forms.css" />
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/twbs/datatables/jquery.dataTables.css">
    
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../vendor/twbs/datatables/jquery.dataTables.js"></script>
</head>
<body>

    <header><h1>EL DESVAN ® | CONVERSION DE FORMATOS</h1></header>
    <nav>
        <ul>
            <li><a href="salir.php" id="salir">Salir</a></li>
        </ul>
    </nav>
    <div id="wrapper">
        <div class="container">
            <div id="">

                <?php

                require '../class/books.php';
                $objBook = new Books();
                $result = $objBook->show_books();
                ?>

                <h2>Listado de Productos</h2>
                <div class="row">
                    <div class="col-sm-6 col-xs-12"> 
                        <div class="space"></div>
                        <form name="upload" action="<?php echo URL;?>admin/uploadB.php" method="POST" enctype="multipart/form-data">
                            <label>Cargar Excel:</label>
                            <div class="fileinputs ">
                                <input type="file" name="file" id="file" class="file" />
                            </div>
                            <div class="space"></div>
                            <input type="submit" name="submit" id="submit" value="ENVIAR"/>
                        </form>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="space"></div>
                        <form name="upload" action="<?php echo URL;?>admin/refresh.php" method="POST" enctype="multipart/form-data">
                            <label>Generar nuevo Archivo CSV:</label>
                            
                            <div class="space"></div>
                            <input type="submit" name="actualizar" id="actualizar" value="GENERAR"/>
                        </form>
                    </div>
                </div>
                <div class="space"></div>
                <div class="table-responsive">
                    <table class="table table-hover" id="productos">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>PRODUCTO</th>                    
                                <th>PRECIO RECUMED</th>
                                <th>EXISTENCIAS</th>     
                            </tr>
                        </thead>
                        <tbody>
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
                                    <td colspan="7" align="center">No hay productos registrados</td>
                                </tr>
                                <?php 
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready( function () {
            $('#productos').DataTable();            
        } );
    </script>
</body>
</html>
