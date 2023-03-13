
<?php
  @session_start();
  session_destroy();
  header('Location: ../index.php'); // Redirecciona a la página de inicio
?>