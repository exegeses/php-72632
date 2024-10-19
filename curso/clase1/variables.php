<?php
    include '../layouts/header.php';
    /* para declarar una variable en PHP
        utilizamos el símbolo de $
        seguido de una palabra o cadena
        que no debe comenzar con un número
     */
    $curso = 'Desarrollo web con PHP y MySQL';
    $numero = 35;

    /*
     * Para declarar una constante PHP
     * utilizamos la palabra reservada 'const'
     * Y se recomienda que los nombres de las constantes sean en mayúscula
     */
    const PI = 3.141592;
    const NOMBRE = 'Marcos';
    const APELLIDO = 'Pinardi';
?>
    <main class="container py-3">
        <h1>variables y constantes en PHP</h1>

        <section class="shadow alert my-3">
        <?php
            echo 'El curso es: ', $curso;
        ?>
        </section>
        <section class="shadow alert my-3">
        <?php
            echo 'El número es: ', $numero;
        ?>
        </section>
        <section class="shadow alert my-3">
        <?php
            //Sobrescribimos el valor de número
            $numero = 73;
            echo 'El número ahora es: ', $numero;
        ?>
        </section>
        <section class="shadow alert my-3">
        <?php
            echo 'Nombre completo es: ', NOMBRE, ' ', APELLIDO;
        ?>
        </section>
        <?php
            // NOMBRE = 'Rick';
            //No se puede sobre escribir una constante
        ?>
    </main>
<?php
    include '../layouts/footer.php';