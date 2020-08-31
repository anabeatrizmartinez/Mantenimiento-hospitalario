<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="../public/css/register.css">
    <title>Register</title>
</head>

<body>
    <!-- Sección para el header de la página -->
    <?php
        include 'assets/header.php';
    ?>

    <!-- Sección para el contenedor de la página -->
    <section class="container">
            <h1>Registro</h1>
            <form method="post">
                <div class="container__label">
                    <label for="inputUser">Nombre de usuario</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputUser" name="name" id="inputUser">
                </div>
                <div class="container__label">
                    <label for="inputEmail">Email</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputEmail" name="email" id="inputEmail">
                </div>
                <div class="container__label">
                    <label for="selectRol">Rol que desempeña</label>
                </div>
                <div class="container__select">
                    <select name="rol_id" id="selectRol">
                        <option selected>Seleccionar</option>
                        <option value="1">administrador</option>
                        <option value="2">operador</option>
                        <option value="3">tecnico</option>
                    </select>
                </div>
                <div class="container__label">
                    <label for="inputPassword">Contraseña</label>
                </div>
                <div class="container__input">
                    <input type="password" class="inputPassword" name="password" id="inputPassword">
                </div>
                <div class="container__btn">
                    <input type="submit" value="Registrar">
                </div>
            </form>
            <?php
            if (isset($result) && $result) {
                echo '<div class="success">Usuario registrado!</div>';
            }

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
            ?>
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>