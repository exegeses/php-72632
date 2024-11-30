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

    function modificarMarca() : bool
    {
        //capturamos datos enviados por el formulario
        $mkNombre = $_POST['mkNombre'];
        $idMarca = $_POST['idMarca'];
        // control de errores (try | catch)
        try {
            //conexion
            $link = conectar();
            //mensaje SQL
            $sql = "UPDATE marcas
                        SET mkNombre = '".$mkNombre."'
                      WHERE idMarca = ".$idMarca;
            $resultado = mysqli_query($link,$sql);
            //notificación
            $_SESSION['mensaje'] = 'Marca: '.$mkNombre.' modificada correctamente';
            $_SESSION['css'] = 'success';
            //redirección a adminMarcas con mensaje ok
            header('location: adminMarcas.php');
            return $resultado;
        }catch ( Exception $e )
        {
            //log de errores
            //notificación
            $_SESSION['mensaje'] = 'No se pudo modificar la marca: '.$mkNombre;
            $_SESSION['css'] = 'danger';
            //redirección a adminMarcas con mensaje error
            header('location: adminMarcas.php');
            return false;
        }
    }

    function checkProductoXMarca( $idMarca ) : void
    {
        $link = conectar();
        $sql = "SELECT mkNombre
                    FROM productos p
                    JOIN marcas m on p.idMarca = m.idMarca
                    WHERE m.idMarca = ".$idMarca;
        $resultado = mysqli_query($link, $sql);
        $marca = mysqli_fetch_assoc($resultado);
        // Función para contar la cantidad de resultados de una consulta
        $cantidad = mysqli_num_rows($resultado);
        if( $cantidad > 0){
            //notificación
            $_SESSION['mensaje'] = 'No se puede eliminar la marca: '.$marca['mkNombre'].' por que tiene productos relacionados';
            $_SESSION['css'] = 'warning';
            //redirección a adminMarcas con mensaje error
            header('location: adminMarcas.php');
        }
    }

    function eliminarMarca() : bool
    {
        //Capturamos datos enviados por el Form
        $idMarca = $_POST['idMarca'];
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "DELETE FROM marcas
                      WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query($link,$sql);
            //notificación
            $_SESSION['mensaje'] = 'Marca: '.$mkNombre.' eliminada correctamente';
            $_SESSION['css'] = 'success';
            //redirección a adminMarcas con mensaje ok
            header('location: adminMarcas.php');
            return $resultado;
        }catch ( Exception $e ){
            //notificación
            $_SESSION['mensaje'] = 'No se pudo eliminar la marca: '.$mkNombre;
            $_SESSION['css'] = 'danger';
            //redirección a adminMarcas con mensaje error
            header('location: adminMarcas.php');
            return false;
        }
    }
/**
 * listarMarcas()
 * verMarcaPorID()
 * agregarMarca()
 * modificarMarca()
 * eliminarMarca()
 */