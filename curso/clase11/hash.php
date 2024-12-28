<?php
    include '../layouts/header.php';
    $dato = 'asdfdg';
    $datoHash = password_hash( $dato, PASSWORD_DEFAULT );
    $datoHash2 = password_hash( $dato, PASSWORD_DEFAULT );
 ?>
    <main class="container py-3">
        <h1>encriptar un dato</h1>

        <section class="shadow alert my-3">
        dato hasheado: <?= $datoHash ?>
        <br>
        dato hasheado2: <?= $datoHash2 ?>

        </section>

    </main>
<?php
include '../layouts/footer.php';

