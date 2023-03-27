<div class="container">
  <div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-6">
      <br>
      <h1>Resgistro de alumnos</h1>
      <br>

      <form action="register/validar_registro.php" method="post">

        <div class="row">
          <div class="col">
            <label for="asignatura">Matrícula:</label>
            <input name="matricula" class="form-control" type="text" required>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="asignatura">Nombre:</label>
            <input name="nombre" class="form-control" type="text" required>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col">
            <label for="asignatura">Apellido Paterno:</label>
            <input name="apellidoPaterno" class="form-control" type="text" required>
          </div>
          <div class="col">
            <label for="asignatura">Apellido Materno:</label>
            <input name="apellidoMaterno" class="form-control" type="text" required>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <label for="asignatura">Contraseña:</label>
            <input name="password" type="password" class="form-control" required>
          </div>

          <div class="col">
            <label for="asignatura">Confirmar contraseña:</label>
            <input name="confirmPassword" type="password" class="form-control" required>
          </div>
        </div>
        <br>
        <div class="row">
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

          <div class="col">
            <button type="submit" class="btn btn-info">Registrarse</button>
          </div>

          </section>
        </div>
      </form>
      <br>
    </div>
  </div>
</div>

<?php
if(isset($_POST['submit'])) {
  $recaptcha_response = $_POST['recaptcha_response'];
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = [
    'secret' => 'clave-secreta',
    'response' => $recaptcha_response,
    'remoteip' => $_SERVER['REMOTE_ADDR']
  ];
  $options = [
    'http' => [
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data)
    ]
  ];
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $result_json = json_decode($result);
  if($result_json->success != true) {
    echo 'Error: Debe verificar el ReCaptcha para enviar el formulario.';
    exit();
  }
}
?>
