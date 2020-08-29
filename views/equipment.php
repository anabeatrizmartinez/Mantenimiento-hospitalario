<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/equipment.css">
    <title>Equipos</title>
</head>
<body>
    <!-- Sección para el header de la página -->
    <?php
        include 'assets/header.php';
    ?>

    <!-- Sección para el contenedor de la página -->
    <section class="container">
        <div class="container__inicio">
            <a href="<?php echo BASE_URL; ?>operador">Inicio</a>
        </div>
        <div class="title">
            <h1>Equipos</h1>
        </div>
        <div class="container__table">
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Área de Ubicación</th>
                    <th>Estado</th>
                    <th>Mantenimiento</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                </tr>
            </table>
        </div>
        <div class="container__nuevo">
            <a href="<?php echo BASE_URL; ?>newequipment">Nuevo Equipo</a>
        </div>
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>