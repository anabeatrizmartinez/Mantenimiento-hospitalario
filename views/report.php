<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="../public/css/report.css">
    <title>Reports</title>
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
        <div class="container__form">
            <h1>Reporte</h1>
            <form method="post">
                <div class="container__label">
                    <label for="inputEquipo">Nombre de equipo</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputEquipo" name="equipo" id="inputEquipo">
                </div>
                <div class="container__label">
                    <label for="selectVista">Modo de visualización</label>
                </div>
                <div class="container__select">
                    <select name="vista" id="selectVista">
                        <option value="0" selected>Seleccionar</option>
                        <option value="1">PDF</option>
                        <option value="2">Excel</option>
                    </select>
                </div>
                <div class="container__btn">
                    <input type="submit" value="Generar Reporte">
                </div>
            </form>
        </div>
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>