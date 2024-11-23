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

/**
 * listarProductos()
 * verProductoPorID()
 * agregarProducto()
 * modificarProducto()
 * eliminarProducto()
 */