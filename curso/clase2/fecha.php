<?php
    include '../layouts/header.php';
    /* mostrar fecha y hora actual
        formato: dd/mm/yyyy hh:mm:ss    26/10/2024 10:57:25
    */
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('d/m/Y H:i:s');
    $numDiaSemana = date('w');

    /*  version if/else if/else
    if( $numDiaSemana == 0 ){
        $diaSemana = 'Domingo';
    }
    else if ( $numDiaSemana == 1 ){
        $diaSemana = 'Lunes';
    }
    else if ( $numDiaSemana == 2 ){
        $diaSemana = 'Martes';
    }
    else if ( $numDiaSemana == 3 ){
        $diaSemana = 'Miércoles';
    }
    else if ( $numDiaSemana == 4 ){
        $diaSemana = 'Jueves';
    }
    else if ( $numDiaSemana == 5 ){
        $diaSemana = 'Viernes';
    }
    else{
        $diaSemana = 'Sábado';
    }
    */
    switch( $numDiaSemana ){
        case 0:
            $diaSemana = 'Domingo';
            break;
        case 1:
            $diaSemana = 'Lunes';
            break;
        case 2:
            $diaSemana = 'Martes';
            break;
        case 3:
            $diaSemana = 'Miércoles';
            break;
        case 4:
            $diaSemana = 'Jueves';
            break;
        case 5:
            $diaSemana = 'Viernes';
            break;
        default:
            $diaSemana = 'Sábado';
            break;
    }


?>
    <main class="container py-3">
        <h1>Trabajo con fecha en PHP</h1>

        <section class="shadow alert my-3">
            La fecha actual es: <?= $fecha ?>
        </section>

        <section class="shadow alert my-3">
            hoy es: <?= $diaSemana ?>
        </section>

        <section class="shadow alert my-3">
<?php
    $diaSemana = match( $numDiaSemana ){
                    '0' => 'Domingo',
                    '1' => 'Lunes',
                    '2' => 'Martes',
                    '3' => 'Miércoles',
                    '4' => 'Jueves',
                    '5' => 'Viernes',
                    default => 'Sábado'
                };
    echo $diaSemana
?>
        </section>

    </main>
<?php
include '../layouts/footer.php';