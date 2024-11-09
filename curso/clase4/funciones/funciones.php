<?php

    function sumar( float|int $n1, float|int $n2 ) : float|int
    {
        return $n1 + $n2;
    }
    /* Función con varios parámetros */
    function sumarX( ...$numeros ) : float|int
    {
        $resultado = 0;
        foreach ( $numeros as $numero ) {
            $resultado = $resultado + $numero;
        }
        return  $resultado;
    }

    /* Función para dividir dos números */
    function dividir( float $dividendo, float $divisor ) : float|string
    {
        try{
            return $dividendo / $divisor;
        }
        catch( Error $e ){
            /* log de errores */
            $fh = fopen( 'logs/error.log', 'a+' );
            $contenido = 'fecha: '. date('d/m/Y H:i:s'). "\r\n";
            $contenido .= 'mensaje: '. $e->getMessage(). "\r\n";
            $contenido .= 'archivo: '. $e->getFile(). "\r\n";
            $contenido .= 'línea nº: '. $e->getLine(). "\r\n";
            $contenido .= '---------------------------------'. "\r\n";
            fwrite( $fh, $contenido );
            fclose($fh);
            return 'El divisor no puede ser 0';
        }
    }
