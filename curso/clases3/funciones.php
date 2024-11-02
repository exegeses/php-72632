<?php
include '../layouts/header.php';

// declaración
    function saludar( string $nombre ) : string
    {
        return 'hola '. $nombre. '<br>';
    }

    function sumar( int|float $numero1, int|float $numero2 ) : int|float
    {
        return $numero1 + $numero2;
    }

?>
    <main class="container py-3">
        <h1>funciones personalizadas</h1>

        <section class="shadow alert my-3">
<?php
        //Invocamos la función saludar()
        echo saludar( 'Rick' );
        echo saludar( 'Morty' );
        echo saludar( 'Summer' );
?>
        </section>

        <section class="shadow alert my-3">
<?php
        echo sumar(4.25, 5);
?>
        </section>


    </main>
<?php
include '../layouts/footer.php';