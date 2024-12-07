<?php
    include '../layouts/header.php';
    $prdImagen = $_FILES['prdImagen'];
    function subirImagen() : string
    {
        $tmp = $_FILES['prdImagen']['tmp_name'];
        $dir = 'productos/';
        // renombrado de archivo
        $ext = pathinfo($_FILES['prdImagen']['name'], PATHINFO_EXTENSION);
        $nombre = time().'.'.$ext;
        // Copiar archivo enviado a carpeta "productos/"
        move_uploaded_file($tmp, $dir.$nombre);

        return $nombre;
    }
?>
    <main class="container py-3">
        <h1>Publicación de archivos</h1>

        <section class="shadow alert my-3">
            <pre>
                <?php
                    print_r($prdImagen)
                ?>
                Nombre: <?= $prdImagen['name'] ?>
            <br>
                Tipo: <?= $prdImagen['type'] ?>
            <br>
                Cód Error: <?= $prdImagen['error'] ?>
            </pre>
        </section>
<?php
    $prdImagen = subirImagen()
?>
        <img src="productos/<?= $prdImagen ?>">
        
    </main>
<?php
include '../layouts/footer.php';