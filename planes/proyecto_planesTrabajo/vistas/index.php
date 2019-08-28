<?php
include '../funciones/validacionLogin.php';

$enviar = new validacion();
$enviar->realizaLogeo($_REQUEST);
$enviar->validaLogin();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../css/estilos.css" type="text/css">
        <link rel="stylesheet" href="../css/login.css" type="text/css">
        <style type="text/css"> 
            body{
                background: url(../imagenes/ElectricidadenelEspacio.jpg);
            }
                
        </style>
    </head>

    <body>
        <div class="container">
            <br>
            <br>
            <br>
            <center><h1 style="color: #000080">Login Planes de Trabajo</h1></center>
            <br>
            <br>
            <br>
            <center><div class="form-box col-sm-4">
                    <form action="index.php" method="post">
                        <input name="correo" type="email" required="" placeholder="E-mail">
                        <input name="password" type="password" required="" placeholder="Contraseña">
                        <button name="entrar" class="btn btn-info btn-block login" type="submit">Entrar</button>
                    </form>
                </div></center>
        </div>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>
    </body>   
</html>