<?php
include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Formulario de subida</h1>

        <section class="shadow alert my-3">
            <form action="subir-archivos.php" method="post" enctype="multipart/form-data">
                <input type="file" name="prdImagen" class="form-control">
                <button class="btn btn-info mt-3">Publicar</button>
            </form>
        </section>

    </main>
<?php
include '../layouts/footer.php';