<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="../public/css/option.css">
    <title>Option</title>
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
            <h1>Seleccione equipo para actualizar/eliminar</h1>
            <form method="post">
                <div class="container__label">
                    <label for="inputEquipo">Nombre de equipo</label>
                </div>
                <div class="container__select">
                    <select name="name" id="selectEquipo">
                        <option selected disabled>Seleccionar</option>
                        <?php
                        foreach ($names as $name) {
                            echo '<option>' . $name->name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="container__label">
                    <label for="selectOption">¿Qué desea hacer?</label>
                </div>
                <div class="container__select">
                    <select name="option" id="selectOption">
                        <option selected disabled>Seleccionar</option>
                        <option>Actualizar</option>
                        <option>Eliminar</option>
                    </select>
                </div>
                <div class="container__btn">
                    <input type="submit" value="Continuar">
                </div>
            </form>
            <?php
            if (isset($errors) && $errors) {
                echo '<div class="danger">';
                echo '<ul>';
                foreach ($errors as $key => $messages) {
                    foreach ($messages as $message) {
                        echo '<li>' . "$key: " . $message . '</li>';
                    }
                }
                echo '</ul>';
                echo '</div>';
            }

            if (isset($result) && $result) {
                echo '<div class="success">Equipo eliminado!</div>';
            }
            ?>
        </div>
        <div class="container__back">
            <a href="<?php echo BASE_URL; ?>equipment">Regresar</a>
        </div>
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>