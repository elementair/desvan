<?php

if(isset($_GET['iderr'])){
    $error = $_GET['iderr'];
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>EL DESVAN | STOCK</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/forms.css" />
        
        <script src="js/jquery-1.11.2.min.js"></script>
        <script>
            $(document).on('ready', function(){
                $('#submit').click(function(){
                    var nombre = $('#nombre').val();
                    var mail = $('#mail').val();
                    var mensaje = $('#mensaje').val();
                    var expresa = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                    
                    if(nombre == ''){
                        $('#errorN').fadeIn();
                        return false;
                    }else{
                        if(mail == '' || !expresa.test(mail)){
                            $('#errorN').fadeOut();
                            $('#errorC').fadeIn();
                            return false;
                        }else{
                            $('#errorC').fadeOut();
                            if(!$('input[name="gender"]').is(':checked')){
                                $('#errorG').fadeIn();
                                return false;
                            }else{
                                if(mensaje == ''){
                                    $('#errorG').fadeOut();
                                    $('#errorM').fadeIn();
                                    return false;
                                }else{
                                    $('#errorM').fadeOut();
                                }
                            }
                        }
                    }    
                });
                
                //mostrar y esconder formulario de log in
                $('.open').click(function (){
                    $('#bgLogin').fadeIn();
                });
                $('.cerrar').click(function (){
                    $('#bgLogin').fadeOut();
                });
                
                //validando formulario de log in
                $('#LogSubm').click(function (){
                    
                    var usuario = $('#Usern').val();
                    var clave = $('#passU').val();
                    
                    //validamos el nombre de usuario
                    if(usuario === ''){
                        $('#errorU').fadeIn();
                        return false;
                    }else{
                        if(clave === ''){
                            $('#errorU').fadeOut();
                            $('#errorP').fadeIn();
                            return false;
                        }else{
                            $('#errorP').fadeOut();
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
        <header><h1>EL DESVAN ®</h1></header>
        <nav>
            <ul>

                <li><a class="open" href="#">Login</a></li>
            </ul>
        </nav>
        <div id="wrapper">
            <div id="bgLogin">
                <div id="logWind">
                    <div id="log_close">
                        <a class="cerrar" href="#">Cerrar</a>
                    </div>
                    <div id="log_form">
                        <form name="login" action="log_in.php" method="post">
                            <div id="errorU" class="error">Error</div>
                            <?php if(isset($_GET['iderr']) == 1){?>
                                <h1>Datos Incorrectos...</h1>
                            <?php } ?>
                            <label>Nombre de Usuario:</label>
                            <input type="text" name="Usern" id="Usern" />
                            <div id="errorP" class="error">Error</div>
                            <label>Clave de Acceso:</label>
                            <input type="password" name="passU" id="passU" />
                            <div class="space"></div>
                            <input type="submit" id="LogSubm" value="INGRESAR" />
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
