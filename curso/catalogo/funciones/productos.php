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
        $sql = "SELECT * FROM productos";
        return mysqli_query($link, $sql);
    }

/**
 * listarProductos()
 * verProductoPorID()
 * agregarProducto()
 * modificarProducto()
 * eliminarProducto()
 */