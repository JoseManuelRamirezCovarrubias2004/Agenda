<nav>
<?php
if (isset($_SESSION["rol"])) {
    if ($_SESSION["rol"] == "1") {
        // Administrador
        ?>
        <ul>
            <li><a href="inicio.php" class="menu">Inicio</a></li>
            <li><a href="crudcontactos.php" class="menu">Mis Contactos</a></li>
            <li><a href="crudusuario.php" class="menu">Creacion Contactos</a></li>
            <li><a href="logout.php" class="menu">Salir</a></li>
        </ul>
        <?php
    } elseif ($_SESSION["rol"] == "2") {
        // Visualizador
        ?>
        <ul>
            <li><a href="inicio.php" class="menu">Inicio</a></li>
            <li><a href="crudcontactos.php" class="menu">Ver Mis Contactos</a></li>
            <li><a href="logout.php" class="menu">Salir</a></li>
        </ul>
        <?php
    }
} else {
    ?>
    <ul>
        <li><a href="index.php" class="menu">Iniciar Sesión</a></li>
    </ul>
    <?php
}
?>
</nav>
