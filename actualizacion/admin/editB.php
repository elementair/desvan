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
    <script src="js/jquery-1.11.2.min.js"></script>
</head>
<body>
    <header><h1>RECUMED</h1></header>
    <nav>
        <ul>
            <li><a href="<?php echo URL;?>admin/index.php">Inicio</a></li>
            <li><a href="<?php echo URL;?>admin/showBooks.php">Ver Libros</a></li>
        </ul>
    </nav>
    <div id="wrapper">
        <div id="left">
            <h2>Últimas Noticias!</h2>
            <div class="space"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna 
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
            ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
            <div class="space"></div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur. Excepteur 
                sint occaecat cupidatat non proident, sunt in culpa qui 
            officia deserunt mollit anim id est laborum</p>
        </div>
        <div id="right">
            <h2>Edicion de Libro</h2>
            <div class="space"></div>

            <?php

            $id = $_GET['id'];

            require '../class/books.php';
            $objBook = new Books();
            $result = $objBook->search_bookE($id);

            if($result){?>
                <div id="wrapper-form">
                    <form name="new" action="<?php echo URL;?>admin/editB_exe.php" method="POST">
                        <label>CODIGO</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $result[0]['codigo'];?>" />
                        <label>PRODUCTO</label>
                        <input type="text" name="titulo" id="titulo" value="<?php echo $result[0]['Descripcion'];?>" />
                        <label>COSTO RECUMED</label>
                        <input type="text" name="autor" id="autor" value="<?php echo $result[0]['costoNormal'];?>" />
                        <label>GENERAL</label>
                        <input type="text" name="edito" id="edito" value="<?php echo $result[0]['general'];?>" />
                        <label>PRECIO RECUMED</label>
                        <input type="text" name="fecha" id="fecha" value="<?php echo $result[0]['precioRecumed '];?>" />
                        <label>MU RECUMED</label>
                        <input type="text" name="fecha" id="fecha" value="<?php echo $result[0]['muRecumed '];?>" />
                        <label>EXISTENCIAS</label>
                        <input type="text" name="fecha" id="fecha" value="<?php echo $result[0]['existencias '];?>" />
                        <label>DESCRIPCIÓN</label>
                        <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>" />
                        <input type="submit" id="submit" value="EDITAR" />
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
