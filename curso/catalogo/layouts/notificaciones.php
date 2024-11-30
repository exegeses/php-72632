<?php
    if( isset( $_SESSION['mensaje'] ) ){
        ?>
        <div class="alert alert-<?= $_SESSION['css'] ?>">
            <i class="bi bi-info-circle fs-4 me-2"></i>
            <?= $_SESSION['mensaje'] ?>
        </div>
        <?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['css']);
    }
?>