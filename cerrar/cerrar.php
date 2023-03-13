<html>
    <div class="content">
        <h1>Hola <?php echo $_SESSION['nombre']; ?></h1>
        <p class="descripcion">
            ¿Quieres cerrar sesion?
        </p>
        <form method="post" action="cerrar/logout.php">
            <input type="submit" value="Cerrar sesión">
        </form>
    </div>
</html>
