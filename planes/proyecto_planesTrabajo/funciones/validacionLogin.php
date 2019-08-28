<html>

    <head>

    </head>
    <body>
        <?php

        class validacion {

            public $validation;

            function validaLogin() {
                include 'conexion.php';

                if (isset($this->validation['entrar'])) {
                    $db = new Conect_MySql();
                    $contra = $_POST['password'];
                    $correo = $_POST['correo'];
                    $sql = "select id, idCargo, email, password from autoridades where email='$correo' && password='$contra'";
                    $query = $db->execute($sql);
                    $datos = $db->fetch_row($query);
                    if ($contra == $datos['password'] && $correo == $datos['email'] && $datos['idCargo'] == 4) {
                        session_start();
                        $_SESSION['correo'] = $correo;
                        echo'<script language="javascript">window.location="../vistas/menu.php?correo=' . $correo . '"</script>;';
                    } else if ($contra == $datos['password'] && $correo == $datos['email'] && $datos['idCargo'] == 3) {
                        session_start();
                        $_SESSION['correo'] = $correo;
                        echo'<script languaje="javascript">window.location="../vistasDirectores/menu_directores.php?correo=' . $correo . '"</script>';
                    } else if ($contra == $datos['password'] && $correo == $datos['email'] && $datos['idCargo'] == 6){
                        session_start();
                        $_SESSION['correo'] = $correo;
                        echo '<script languaje="javascript">window.location="../vistasAdmin/menu_visualizador.php?correo='. $correo .'"</script>';
                    } else {
                        echo'<script language="javascript">alert("los datos ingresados no son válidos"); window.location="../vistas/index.php"</script>;';
                    }
                }
            }

            function realizaLogeo($validation) {
                $this->validation = $validation;
            }

        }
        ?>
    </body>


</html>