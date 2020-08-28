<header class="header">
        <div class="header__first"> <!--Para la parte sobre la barra del menú-->
            <div class="header__first--logo"> <!--Para que el logo me quede centrado con el nombre-->
                <img class="first__logo--img" src="../images/cruz.png" alt="logo">
                <p class="first__logo--name">Hospital del Táchira</p>
            </div>
            <p class="header__first--contact">Contacto: 0276-3123456</p>
        </div>
        <div class="header__menu"> <!--Barra de menú-->
            <ul>
                <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
                <li><a href="<?php echo BASE_URL; ?>register">Regístrate</a></li>
                <li><input class="input" type="text" placeholder="Búsqueda:"></li>
            </ul>
        </div>
    </header>