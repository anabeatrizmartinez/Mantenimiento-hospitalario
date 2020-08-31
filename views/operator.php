<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="../public/css/operator.css">
    <title>Operador</title>
</head>
<body>
    <!-- Sección para el header de la página -->
    <?php
        include 'assets/header.php';
    ?>

    <!-- Sección para el contenedor de la página -->
    <section class="container">
        <p>Bienvenido(@) <?php echo $user->name;?>!</p>
        <ul>
            <li><img src="../images/check.png" alt="check"><a href="<?php echo BASE_URL; ?>equipment">Administrar Equipos</a></li>
            <li><img src="../images/check.png" alt="check"><a href="<?php echo BASE_URL; ?>report">Generar Reporte</a></li>
        </ul>
        <a href="<?php echo BASE_URL; ?>logout">Cerrar Sesión</a>
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>