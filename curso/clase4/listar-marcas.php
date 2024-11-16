<?php
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $marcas = listarMarcas();
    include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Listador de marcas</h1>

        <section class="shadow alert my-3">
            <ul>
<?php
        while( $marca = mysqli_fetch_assoc($marcas) ){
?>
                <li>
                    <?= $marca['idMarca'] ?>
                    <?= $marca['mkNombre'] ?>
                </li>
<?php
        }
?>
            </ul>
        </section>

    </main>
<?php
include '../layouts/footer.php';