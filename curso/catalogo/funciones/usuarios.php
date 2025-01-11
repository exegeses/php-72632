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

    /**
     * Modificación de contraseña
     */
    function modificarClave()
    {
        $clave = $_POST['clave'];
        $newClave = $_POST['newClave'];
        $newClave2 = $_POST['newClave2'];

        //Obtenemos clave encritada de la tabla usuarios
        $claveHash = getClaveHash();
        //Verificamos que la clave actual coincida con la clave enritada
        if( !password_verify( $clave, $claveHash ) ){
            $_SESSION['mensaje'] = 'Contraseña actual incorrecta';
            $_SESSION['css'] = 'warning';
            header('location: formModificarClave.php');
            return;
        }
        // encriptamos nueva clave
        $claveHash = password_hash($newClave, PASSWORD_DEFAULT);
        $link = conectar();
        $sql = "UPDATE usuarios
                    SET clave = '".$claveHash."' 
                    WHERE idUsuario = ".$_SESSION['idUsuario'];
        try {
            mysqli_query($link, $sql);
            $_SESSION['mensaje'] = 'Contraseña modificada correctamente';
            $_SESSION['css'] = 'success';
            header('location: formModificarClave.php');
        }
        catch (Exception $e){
            $_SESSION['mensaje'] = 'No se pudo modificar la contraseña';
            $_SESSION['css'] = 'danger';
            header('location: formModificarClave.php');
        }
    }
    function getClaveHash() : string
    {
        $link = conectar();
        $sql = "SELECT clave 
                  FROM usuarios
                  WHERE idUsuario = ".$_SESSION['idUsuario'];
        $resultado = mysqli_query($link,$sql);
        $datoUsuario = mysqli_fetch_assoc($resultado);
        return $datoUsuario['clave'];
    }