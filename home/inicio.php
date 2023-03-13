

<html>
    <div class="content">
      <h1>Instituto Educativo Ficticio</h1>
      <img
        src="https://picsum.photos/500/300"
        alt="Imagen del Instituto Educativo Ficticio"
        class="instituto-educativo-image"
      />
        <?php
          if($_SESSION['tipo']) {
            echo '<p class="descripcion"> Hola, ' . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . ' eres parte del sistema!' . '</p>';
          } else {
            echo '<p class="descripcion">Bienvenido al Instituto Educativo Ficticio. Somos una institución dedicada a la formación de jóvenes talentosos y comprometidos con el aprendizaje y el desarrollo de habilidades necesarias para enfrentar los retos del mundo actual. </p>';
          }
        ?>
    </div>
</html>
