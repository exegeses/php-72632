<?php
include '../layouts/header.php';
?>
    <main class="container py-3">
        <h1>Arrays en PHP</h1>

        <section class="shadow alert my-3">
<?php
    // Ordenado automáticamente con una llave numérica
    $marcas = [
                'Hermès', 'Zara', 'Boss',
                'Aeropostale', 'Tommy', 'Gola',
                'Hollister', 'Abercrombie', 'JCrew',
                'London Heckett',
                'Uniqlo'
              ];
    //echo $marcas; //Warning: Array to string conversion
?>
        <pre class="alert alert-dark">
            <?php
                print_r($marcas);
            ?>
        </pre>
        <?= $marcas[2] ?> 
            
        </section>

        <section class="shadow alert my-3">
<?php
$pilotos = [
                1 => 'Max Verstappen',
                11 => 'Segio Pérez',
                4 => 'Lando Norris',
                81 => 'Oscar Piastri',
                63 => 'George Russell',
                44 => 'Lewis Hammilton',
                16 => 'Charles Leclerc',
                55 => 'Carlos Sainz',
                43 => 'Franco Colapinto'
               ];
?>
        <pre class="alert alert-dark">
            <?php
                print_r($pilotos);
            ?>
        </pre>
        Piloto: <?= $pilotos[43] ?>
        </section>

        <section class="shadow alert my-3">
<?php
    // array asociativo donde la llave es una cadena de caracteres
        $capitales = [
            'Argentina'=>'Buenos Aires',
            'Brasil'=>'Brasilia',
            'Chile'=>'Santiago',
            'Venezuela'=>'Caracas',
            'Uruguay'=>'Montevideo',
            'Paraguay'=>'Asunción'
        ];
?>
        <pre class="alert alert-dark">
            <?php
                print_r($capitales);
            ?>
        </pre>
            
        Capital: <?= $capitales['Paraguay'] ?>
        </section>

        <section class="shadow alert my-3">
<?php
        $semana = [
                    'Domingo', 'Lunes', 'Martes',
                    'Miércoles', 'Jueves', 'Viernes',
                    'Sábado'
                  ];
        $n = date('w');
        echo $semana[$n];
?>
        </section>




    </main>
<?php
include '../layouts/footer.php';