
<div class="container">
    <br>
        <h1>Hola <?php echo $_SESSION['nombre']; ?></h1>
        <br>
        <p class="descripcion">
            ¿Quieres cerrar sesion?
        </p>
        <form method="post" action="cerrar/logout.php">
            <button type="submit" class="btn btn-info">Cerrar sesión</button>
        </form>
        <br>
    </div>
