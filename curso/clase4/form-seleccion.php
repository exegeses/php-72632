<?php
include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Selección de preferencias</h1>

        <section class="shadow alert my3">
            <form action="procesa-seleccion.php" method="post">
                <input type="text" name="nombre"
                       class="form-control"
                       placeholder="Nombre: " required>
                <select name="idioma" class="form-select my-3" required>
                    <option value="">Seleecione un idioma</option>
                    <option value="es">Español</option>
                    <option value="en">English</option>
                    <option value="fr">Française</option>
                    <option value="de">Deutsche</option>
                    <option value="pt">Portugues</option>
                </select>
                <button class="btn btn-info mt-2">Enviar</button>
            </form>
        </section>
    </main>
<?php
include '../layouts/footer.php';