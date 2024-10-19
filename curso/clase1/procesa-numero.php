<?php
    include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Proceso de dato enviado</h1>

        <section class="shadow alert my-3">
<?php
        $numero = $_POST['numero'];
        if ( $numero < 100 ){
            //Bloque de código a ejecutar si la condición es true
            echo 'Es menor';
        }
        else{
            //Bloque de código a ejecutar si la condición es false
            echo 'No es menor';
        }
?>
        </section>

    </main>
<?php
    include '../layouts/footer.php';