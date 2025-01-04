<?php

    function listarUsuarios() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, email,
                       u.idRol, r.rol 
                    FROM usuarios u
                    JOIN roles r 
                      ON r.idRol = u.idRol";
        return mysqli_query($link, $sql);
    }

/**
 * función de registro de usuarios
 * esta función de manera predeterminada
 * dara de alta un usuario con el idRol 3 (Usuario)
 * @return bool
 */
    function registrarUsuario() : bool
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        // Encritamos la clave
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);
        $link = conectar();
        $sql = "INSERT INTO usuarios
                    VALUE 
                        (
                            default,
                            '".$nombre."',
                            '".$apellido."',
                            '".$email."',
                            '".$claveHash."',
                            3,
                            1
                        )";
        try {
            $resultado = mysqli_query($link, $sql);
            $_SESSION['mensaje'] = 'Usuario: ' .$nombre.' '.$apellido. ' registrado correctamente';
            $_SESSION['css'] = 'success';
            // redirección a formulario de ingreso con mensaje ok
            header('location: formLogin.php');
            return $resultado;
        }
        catch( Exception $e ){
            // log de errores  logErrores($e)
            $_SESSION['mensaje'] = 'No se pudo registrar el usuario' .$nombre.' '.$apellido;
            $_SESSION['css'] = 'danger';
            header('location: formLogin.php');
            return false;
        }
    }