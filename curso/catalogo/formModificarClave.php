<?php
    require 'config/config.php';
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Cambio de contraseña</h1>

<?php
    include 'layouts/notificaciones.php';
?>        

        <div class='alert p-4 col-8 mx-auto shadow'>
            <form action="modificarClave.php" method="post" class="validarForm">

                <div class='form-group mb-4 has-validation'>
                    <label for="clave">Contraseña actual</label>
                    <input type="password" name="clave"
                           class='form-control' id="clave">
                    <div class="text-danger fs-6" id="msjClave">
                        Debe completar el campo Contraseña actual
                    </div>
                </div>
                <div class='form-group mb-2'>
                    <label for="newClave">Nueva contraseña</label>
                    <input type="password" name="newClave"
                           class='form-control' id="newClave">
                    <div class="text-danger fs-6" id="msjNewClave">
                        Debe completar el campo Nueva contraseña
                    </div>
                </div>
                <div class='form-group mb-3'>
                    <label for="newClave2">Repita contraseña</label>
                    <input type="password" name="newClave2"
                           class='form-control' id="newClave2">
                    <div class="text-danger fs-6" id="msjNewClave2">
                        Debe completar el campo Repita contraseña con un valor igual a Nueva contraseña
                    </div>
                </div>

                <button class='btn btn-dark my-3 px-4'>Modificar contraseña</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
            </form>
        </div>

<?php
    if( isset( $_GET['error'] ) ){
        $mensaje =  match ( $_GET['error'] ){
            '1' => 'La contraseña actual es incorrecta',
            '2' => 'La contraseña nueva y la contraseña repetida no coinciden'
        }
    ?>
            <div class="alert alert-danger p-4 col-8 mx-auto shadow">
                <i class="bi bi-info-circle fs-4 me-2"></i>
                <?= $mensaje ?>
            </div>
<?php
    }
?>
        <script>
            let form = document.querySelector('.validarForm');
            let clave = document.querySelector('#clave');
            let newClave = document.querySelector('#newClave');
            let newClave2 = document.querySelector('#newClave2');
            let msjClave = document.querySelector('#msjClave');
                msjClave.style.display = 'none';
            let msjNewClave = document.querySelector('#msjNewClave');
                msjNewClave.style.display = 'none';
            let msjNewClave2 = document.querySelector('#msjNewClave2');
                msjNewClave2.style.display = 'none';

            form.addEventListener('submit', validarFormulario );
            function validarFormulario( evento) {
                let flag = true;
                evento.preventDefault();
                msjClave.style.display = 'none';
                if( checkVacio( clave ) ){
                    msjClave.style.display = 'block';
                    flag = false;
                }
                msjNewClave.style.display = 'none';
                if( checkVacio( newClave ) ){
                    msjNewClave.style.display = 'block';
                    flag = false;
                }
                msjNewClave2.style.display = 'none';
                if( checkVacio( newClave2 ) ){
                    msjNewClave2.style.display = 'block';
                    flag = false;
                }
                if( checkRepite() ){
                    msjNewClave2.style.display = 'block';
                    flag = false;
                }
                // si está todo ok, enviamos el formulario
                if( flag ){
                    form.submit();
                }

            }
            function checkVacio(campo)
            {
                if( campo.value == '' || campo.value == null ){
                    return true;
                }
                return false;
            }
            function checkRepite()
            {
                if( newClave.value != newClave2.value ){
                    //console.log('no coinciden');
                    return true;
                }
                return false;
            }

        </script>

    </main>

<?php  include 'layouts/footer.php';  ?>