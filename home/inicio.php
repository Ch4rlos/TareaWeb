<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://picsum.photos/500/300" class="d-block w-100" alt="Campus 1">
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/500/300" class="d-block w-100" alt="Campus 2">
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/500/300" class="d-block w-100" alt="Campus 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>

    <?php
  if ($_SESSION['tipo']) {
    echo '<p class="descripcion"> Hola, ' . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . ' eres parte del sistema!' . '</p>';
  } else {
    echo '<p class="descripcion">Bienvenido al Instituto Educativo Ficticio. Somos una institución dedicada a la formación de jóvenes talentosos y comprometidos con el aprendizaje y el desarrollo de habilidades necesarias para enfrentar los retos del mundo actual. </p>';
  }
  ?>

    <div class="row mt-4">
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="3">Tipos de bachillerato</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>General</td>
              <td>Tecnológico</td>
              <td>Propedéutico</td>
            </tr>
            <tr>
              <td>Profesional técnico</td>
              <td>Sistema abierto</td>
              <td>En línea</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="3">Actividades complementarias</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Artísticas</td>
              <td>Culturales</td>
              <td>Deportivas</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

  
  
</div>