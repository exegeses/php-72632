<?php
    require 'funciones/funciones.php';
    include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Invocando funciones</h1>

        <section class="shadow alert my-3">
           Suma: <?= sumar(10, 20) ?>
        </section>
        <section class="shadow alert my-3">
            Suma de varios: <?= sumarX( 1, 2, 3, 6 ) ?>
        </section>
        <section class="shadow alert my-3">
            División: <?= dividir( 128, 0 ) ?>
        </section>

    </main>
<?php
include '../layouts/footer.php';