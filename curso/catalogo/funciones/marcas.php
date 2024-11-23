<?php


/**
 * función para obtener un listado de marcas
 * @return mysqli_result (listado de marcas)
 */
    function listarMarcas() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * 
                  FROM marcas
                  ORDER BY idMarca DESC";
        return mysqli_query($link, $sql);
    }

    function agregarMarca() : bool
    {
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "INSERT INTO marcas
                        ( mkNombre )
                    VALUES
                        ( '".$mkNombre."' )";
        try {
            $resultado = mysqli_query($link, $sql);
            $_SESSION['mensaje'] = 'Marca: '.$mkNombre.' agregada correctamente';
            $_SESSION['css'] = 'success';
            //redirección a adminMarcas con mensaje ok
            header('location: adminMarcas.php');
            return $resultado;
        }
        catch ( Exception $e ){
            // log de errores
            //redirección a adminMarcas con mensaje error
            $_SESSION['mensaje'] = 'No se pudo agregar la marca: '.$mkNombre;
            $_SESSION['css'] = 'danger';
            header('location: adminMarcas.php');
            return false;
        }
    }

    function verMarcaPorID() : array
    {
        //Capturamos dato enviado en la URL
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT * 
                    FROM marcas
                    WHERE idMarca = ".$idMarca;
        $resultado = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($resultado);
    }

/**
 * listarMarcas()
 * verMarcaPorID()
 * agregarMarca()
 * modificarMarca()
 * eliminarMarca()
 */