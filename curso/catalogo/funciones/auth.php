<?php

    function login() : void
    {
        $email = $_POST['email'];
        $clave = $_POST['clave']; //sin encriptar
        $link = conectar();
        $sql = "SELECT idUsuario,
                       nombre, apellido, email,
                       clave, idRol
                    FROM usuarios
                    WHERE activo = 1
                      AND email = '".$email."'";

        $resultado = mysqli_query($link, $sql);
        $cantidad = mysqli_num_rows($resultado);
        /* Si cantidad == 0 no hay coincidencia
        ## si cantidad == 1  hay coincidencia
         * */
        if ( $cantidad == 0 ){
            //Redirección a formLogin con mensaje de error
            header('location: formLogin.php?error=1');
            return;
        }
        # En este punto sabemos que el e-mail ingresado es correcto
        # y que el usuario está activo
        ##### Verificamos que coincida la contraseña
        $usuario = mysqli_fetch_assoc($resultado);
        if( !password_verify( $clave, $usuario['clave'] ) ){
            //Redirección a formLogin con mensaje de error
            header('location: formLogin.php?error=1');
            return;
        }
        /* Si llegamos a este punto sabemos
            que el usuario  se logueó correctamente
            Ahora debemos almacenar todos estos datos
            en una sesión - para personalizar
         */
        #### Rutina de autenticación
        $_SESSION['login'] = 1; // token
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['idRol'] = $usuario['idRol'];
        // Redirección a admin.php
        header('location: admin.php');
    }

    function logout() : void
    {
        // Eliminamos variables de sesión  (opcional)
        session_unset();
        // Eliminamos la sesión
        session_destroy();
        // redirección a index
        header('location: index.php');
    }

/**
 * función para chequear que el usuario esté logueado
 * @return void
 */
    function auth() : void
    {
        if( !isset($_SESSION['login']) ){
            header('location: formLogin.php?error=2');
        }
    }

/**
 * función para chequear que el usuario sea administrador
 * @return void
 */
    function checkAdmin() : void
    {}
