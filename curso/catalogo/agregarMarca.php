<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $check = agregarMarca();
    // Al haber una redirección el resto del código no se va mostrar
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de una marca</h1>

<?php
    if ( $check ){
?>        
        <div class="alert alert-success p-4 col-8 mx-auto shadow">
            Marca agregada correctamente
            <a href="adminMarcas.php" class="btn btn-dark sep">
                volver al panel
            </a>
        </div>
<?php
    }else{
?>
        <div class="alert alert-danger p-4 col-8 mx-auto shadow">
            No se pudo agregar la marca
            <a href="adminMarcas.php" class="btn btn-dark sep">
                volver al panel
            </a>
        </div>
<?php
    }
?>
    </main>

<?php  include 'layouts/footer.php';  ?>