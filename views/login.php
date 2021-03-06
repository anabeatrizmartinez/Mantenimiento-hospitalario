<!-- Sección para el head de la página -->
    <?php
        include 'assets/head.php';
    ?>
    <link rel="stylesheet" href="../public/css/login.css">
    <title>Login</title>
</head>

<body>
    <!-- Sección para el header de la página -->
    <?php
        include 'assets/header.php';
    ?>

    <!-- Sección para el contenedor de la página -->
    <section class="container">
            <h1>Login</h1>
            <form method="post">
                <!-- Con el método post mejoro la seguridad al no mostrar en la url información. -->
                <div class="container__label">
                    <label for="inputUser">Nombre de usuario</label>
                </div>
                <div class="container__input">
                    <input type="text" class="inputUser" name="name" id="inputUser" pattern="[A-Za-z0-9_-]{1,15}">
                    <!-- Con el atributo pattern mejoro la seguridad ante inyección sql, ya que no permite caracteres especiales como las comillas y se establece una longitud máxima de caracteres. -->
                </div>
                <div class="container__label">
                    <label for="inputPassword">Contraseña</label>
                </div>
                <div class="container__input">
                    <input type="password" class="inputPassword" name="password" id="inputPassword" pattern="[A-Za-z0-9_-*]{1,8}">
                </div>
                <div class="container__btn">
                    <input type="submit" value="Login">
                </div>
            </form>
            <?php
            if (isset($errors) && $errors) {
                echo '<div class="danger">';
                echo '<ul>';
                foreach ($errors as $key => $messages) {
                    foreach ($messages as $message) {
                        echo '<li>' . $message . '</li>';
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