<?php

######################
# CRUD de productos
######################

/**
 * función para obtener un listado de productos
 * @return mysqli_result (objeto listado de productos)
 */
    function listarProductos() : mysqli_result
    {
        $link = conectar();
        /*$sql = " SELECT idProducto, prdNombre, prdPrecio, prdImagen,
			              p.idMarca, mkNombre,
			              p.idCategoria, catNombre
                    FROM productos as p, marcas as m, categorias as c
                    WHERE p.idMarca = m.idMarca
                    AND p.idCategoria = c.idCategoria; */
        $sql = 'SELECT idProducto, prdNombre, prdPrecio, prdImagen,
                         p.idMarca, mkNombre, 
                         p.idCategoria, catNombre	
                    FROM productos as p
                    JOIN marcas as m
                      ON p.idMarca = m.idMarca
                    JOIN categorias as c
                      ON p.idCategoria = c.idCategoria;';
        return mysqli_query($link, $sql);
    }

function subirImagen() : string
{
    // si no se envió imagen
    $nombre = 'noDisponible.svg';

    // IMAGEN ENVIADA
    if( $_FILES['prdImagen']['error']==0 ){
        $tmp = $_FILES['prdImagen']['tmp_name'];
        $dir = 'productos/';
        // renombrado de archivo
        $ext = pathinfo($_FILES['prdImagen']['name'], PATHINFO_EXTENSION);
        $nombre = time().'.'.$ext;
        // Copiar archivo enviado a carpeta "productos/"
        move_uploaded_file($tmp, $dir.$nombre);
    }
    return $nombre;
}

function agregarProducto() : bool
{
    // capturamos datos enviador por el form
    $prdNombre = $_POST['prdNombre'];
    $prdPrecio = $_POST['prdPrecio'];
    $idMarca = $_POST['idMarca'];
    $idCategoria = $_POST['idCategoria'];
    $prdDescripcion = $_POST['prdDescripcion'];
    //subir imagen *
    $prdImagen = subirImagen();

    $sql = "INSERT INTO productos
        (prdNombre, prdPrecio, idMarca, idCategoria, prdDescripcion, prdImagen)
    VALUES
        (
         '".$prdNombre."', 
         ".$prdPrecio.",
         ".$idMarca.",
         ".$idCategoria.",
         '".$prdDescripcion."',
         '".$prdImagen."'
         )";
    $link = conectar();
    try{
        $resultado = mysqli_query($link, $sql);
        $_SESSION['mensaje'] = 'Producto: ' .$prdNombre. ' agregado correctamente';
        $_SESSION['css'] = 'success';
        // redireccion a panel adminMarcas con mensaje ok
        header('location: adminProductos.php');
        return $resultado;
    }
    catch( Exception $e ){
        // log de errores  logErrores($e)
        $_SESSION['mensaje'] = 'No se pudo agregar producto' .$prdNombre;
        $_SESSION['css'] = 'danger';
        header('location: adminProductos.php');
        return false;
    }

}

/**
 * listarProductos()
 * verProductoPorID()
 * agregarProducto()
 * modificarProducto()
 * eliminarProducto()
 */