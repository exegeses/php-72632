<?php
include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1> objeto de fecha</h1>

        <section class="shadow alert my-3">
        <?php
            // Usando DateTime

            $fecha = new DateTime();
            $timeZone = new DateTimeZone("America/Argentina/Buenos_Aires");
            $fecha->setTimezone($timeZone);
            echo "La fecha y hora actual es: ", $fecha->format('d/m/Y H:i:s');
        ?>
        </section>

    </main>
<?php
include '../layouts/footer.php';