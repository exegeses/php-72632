<?php
    include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Formulario de envío</h1>

        <section class="shadow alert my-3">
            <form action="procesa-numero.php" method="post">
                <input type="number" name="numero" class="form-control">
                <button class="btn btn-info mt-2">enviar</button>
            </form>
        </section>

    </main>
<?php
    include '../layouts/footer.php';