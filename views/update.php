<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="../public/css/update.css">
    <title>Update</title>
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
            <h1>Actualizar</h1>
            <form method="post">
                <div class="container__label">
                    <label for="inputEquipo">Nombre de equipo</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputEquipo" name="name" id="inputEquipo" placeholder="<?php
                    if (isset($equipment) && $equipment) {
                        echo $equipment['name'];
                    }
                    ?>">
                </div>
                <div class="container__label">
                    <label for="inputArea">Área de ubicación</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputArea" name="area" id="inputArea" placeholder="<?php
                    if (isset($equipment) && $equipment) {
                        echo $equipment['area'];
                    }
                    ?>">
                </div>
                <div class="container__label">
                    <label for="inputEstado">Estado</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputEstado" name="estado" id="inputEstado" placeholder="<?php
                    if (isset($equipment) && $equipment) {
                        echo $equipment['estado'];
                    }
                    ?>">
                </div>
                <div class="container__label">
                    <label for="inputMantenimiento">Mantenimiento</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputMantenimiento" name="mantenimiento" id="inputMantenimiento" placeholder="<?php
                    if (isset($equipment) && $equipment) {
                        echo $equipment['mantenimiento'];
                    }
                    ?>">
                </div>
                <div class="container__btn">
                    <input type="submit" value="Actualizar Equipo">
                </div>
            </form>
            <?php
            if (isset($result) && $result) {
                echo '<div class="success">Equipo actualizado!</div>';
            }
            ?>
        </div>
        <div class="container__back">
            <a href="<?php echo BASE_URL; ?>option">Regresar</a>
        </div>
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>