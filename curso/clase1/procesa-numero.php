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
            echo '<img src="imgs/ok.png">';
        }
        else{
            //Bloque de código a ejecutar si la condición es false
            echo '<img src="imgs/error.png">';
        }
?>
        </section>

        <section class="shadow alert my-3">
<?php
    if( $numero < 100 ){
    ?>
        <img src="imgs/ok.png">
    <?php
    }
    else{
    ?>
        <img src="imgs/error.png">
    <?php
    }
?>
        </section>

        <section class="shadow alert my-3">
<?php
    $im = 'error';
    if( $numero < 100 ){
        $im = 'ok';
    }
?>
            <img src="imgs/<?php echo $im ?>.png">
        </section>

        <section class="shadow alert my-3">
<?php
    $im = ( $numero < 100 ) ? 'ok' : 'error';
?>
            <img src="imgs/<?php echo $im ?>.png">
        </section>


    </main>
<?php
    include '../layouts/footer.php';