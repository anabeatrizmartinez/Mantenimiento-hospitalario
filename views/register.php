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
                    <input type="text" class="inputUser" name="user" id="inputUser">
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
                    <select name="rol" id="selectRol">
                        <option value="0" selected>Seleccionar</option>
                        <option value="1">Administrador</option>
                        <option value="2">Operador</option>
                        <option value="3">Técnico</option>
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
    </section>

    <!-- Sección para el footer de la página -->
    <?php
        include 'assets/footer.php';
    ?>