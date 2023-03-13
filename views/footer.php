<form action="validar_login.php" method="post">
     <label for="matricula">Matricula:</label>
     <input name="matricula" type="text" id="matricula" required>
     <br><br>
     <label for="password">Password:</label>
     <input name="password" type="password" id="password" required>
     <?php
      if (isset($error)) {
        echo '<p class="error">$error</p>';
      }
      ?>
     <br><br>
     <input type="submit" value="Iniciar Sesión">
   </form>