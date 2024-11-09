<?php
    session_start();
    // capturamos datos enviados por el form
    $nombre = $_POST['nombre'];
    $idioma = $_POST['idioma'];
    // Almacenamos datos en una sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['idioma'] = $idioma;

    require 'lang/prefs.php';
    $lang = mostrarPreferencias();

    include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1><?= $lang['h1'] ?> <?= $lang['flag'] ?></h1>

        <section class="shadow alert my-3">
            <?= $nombre ?> <?= $lang['msg'] ?>
        </section>

    </main>
<?php
include '../layouts/footer.php';