<?php

    session_start();
    // eliminar 1 (una) variable de sesión
    unset($_SESSION['numero']);

    // Eliminar todas las variables de sesión
    session_unset();

    // Eliminar la sesión (archivo)
    session_destroy();