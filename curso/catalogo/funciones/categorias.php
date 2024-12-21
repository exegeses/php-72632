<?php

    function listarCategorias() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * 
                    FROM categorias
                    ORDER BY  idCategoria DESC";
        return mysqli_query($link,$sql);
    }

    function agregarCategoria() : bool
    {
        $catNombre = $_POST['catNombre'];
        $link = conectar();
        $sql = "INSERT INTO categorias
                        (catNombre)
                    VALUE ('".$catNombre."')";
        try {
            $resultado = mysqli_query($link, $sql);
            $_SESSION['mensaje'] = 'Categoria: '.$catNombre.' agregada correctamente';
            $_SESSION['css'] = 'success';
            header('location: adminCategorias.php');
            return $resultado;
        }
        catch (Exception $e) {
            $_SESSION['mensaje'] = 'No se pudo agregar la categoria: '.$catNombre;
            $_SESSION['css'] = 'danger';
            header('location: adminCategorias.php');
            return false;
        }
    }