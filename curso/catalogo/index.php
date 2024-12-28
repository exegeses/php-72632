<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $productos = listarProductos();
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-5">

        <div class="row g-4">
<?php
        while( $producto = mysqli_fetch_assoc($productos) ){    
?>
            <div class="col-md-4 col-sm-6">
                <div class="card text-center">
                    <img src="productos/<?= $producto['prdImagen'] ?>" alt="<?= $producto['prdNombre'] ?>" class="card-img-top pt-2">
                    <div class="card-body">
                        <h3 class="card-title"><?= $producto['prdNombre'] ?></h3>
                        <span class="card-text"><?= $producto['mkNombre'] ?></span>
                        -
                        <span class="card-text"><?= $producto['catNombre'] ?></span>
                        <p class="h5">$<?= $producto['prdPrecio'] ?></p>
                    </div>
                    <button class="btn btn-warning">Buy Now</button>
                </div>
            </div>
<?php
        }
?>
        </div>

    </main>

<?php
    include 'layouts/footer.php';
?>