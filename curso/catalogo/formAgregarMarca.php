<?php
    require 'config/config.php';
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de una marca</h1>

        <div class="alert p-4 col-8 mx-auto shadow">
            <form action="agregarMarca.php" method="post">
                <div class="form-group">
                    <label for="mkNombre">Nombre de la Marca</label>
                    <input type="text" name="mkNombre"
                           class="form-control" id="mkNombre" required>
                </div>

                <button class="btn btn-dark my-3 px-5">Agregar marca</button>
                <a href="adminMarcas.php" class="btn btn-outline-secondary sep">
                    Volver a panel de marcas
                </a>
            </form>
        </div>

    </main>

<?php  include 'layouts/footer.php';  ?>