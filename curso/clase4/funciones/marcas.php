<?php

    function listarMarcas() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * FROM marcas";
        return mysqli_query($link, $sql);
    }


/**
 * verMarcaPorID()
 * agregarMarca()
 * modificarMarca()
 * eliminarMarca()
 */