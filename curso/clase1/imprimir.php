<?php
include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Imprimir en PHP</h1>

        <section class="shadow alert my-3">
        <?php
            echo 'Hola mundo desde PHP';
            echo '<br>';
            echo '1+1+2+3+5+8+13 = ';
            echo 1+1+2+3+5+8+13;
        ?>
        </section>

    </main>
<?php
include '../layouts/footer.php';