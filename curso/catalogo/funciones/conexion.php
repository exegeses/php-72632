<?php

    ## función para conectar a server de MySQL
    const SERVER    = 'localhost';
    const USER      = 'root';
    const CLAVE     = 'root';
    const BASE      = 'catalogo72632';

    function conectar() : mysqli | false
    {
        try {
            $link = mysqli_connect(
                        SERVER,
                        USER,
                        CLAVE,
                        BASE
            );
            return $link;
        }
        catch ( Exception $e )
        {
            /* redirección a archivo */
            header('location: no-conectado.php');
            return false;
        }
    }