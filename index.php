<?php
include 'layout\header.php';
include 'layout\footer.php';
include 'method\registro.php';

session_start();

$_SESSION['estudiante'] = isset($_SESSION['estudiante']) ? $_SESSION['estudiante'] : array(); 

$listEstudiantes = $_SESSION['estudiante'];

if (!empty($listEstudiantes)) {

    if (isset($_GET['carrera'])) { 

        $listEstudiantes = searchEstudiante($listEstudiantes, 'carrera', $_GET['carrera']); 
      }
    }

?>

<?php pheader(); ?>

  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Hola, bienvenido!</h1>
      <p>Puedes registrar tus estudiantes.</p>
      <p><a class="btn btn-primary btn-lg" href="app/add-estudiante.php" role="button"><i class="fa fa-edit"></i> Registrar</a></p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
              <a href="index.php" class="btn btn-secondary">Todos</a>
              <a href="index.php?carrera=1" class="btn btn-secondary">Redes</a>
              <a href="index.php?carrera=2" class="btn btn-secondary">Software</a>
              <a href="index.php?carrera=3" class="btn btn-secondary">Multimedia</a>
              <a href="index.php?carrera=4" class="btn btn-secondary">Mecatronica</a>
              <a href="index.php?carrera=5" class="btn btn-secondary">Seguridad informática</a>
          </div>
      </div>
    </div>
    <br><br>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Estado</th>
            <th scope="col">Carrera</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listEstudiantes as $estudiantes): ?>
              <tr>
                <th scope="row"><?php echo $estudiantes['id']?></th>
                <td><?php echo $estudiantes['nombre']?></td>
                <td><?php echo $estudiantes['apellido']?></td>
                <td>
                  <?php if ($estudiantes['estado'] == 1): ?>
                    Activo
                    <?php else: ?>
                    Inactivo
                  <?php endif ?>
                </td>
                <td>
                  <?php if ($estudiantes['carrera'] == 1): ?>
                      Redes
                    <?php elseif ($estudiantes['carrera'] == 2): ?>
                      Software
                    <?php elseif ($estudiantes['carrera'] == 3): ?>
                      Multimedia
                    <?php elseif ($estudiantes['carrera'] == 4): ?>
                      Mecatronica
                    <?php else: ?>
                      Seguridad informática
                  <?php endif ?>
                </td>
                <td>
                  <a href="app/edit-estudiante.php?id=<?php echo $estudiantes['id'] ?>" class="btn btn-warning" title="Editar"><i class="fa fa-pencil"></i></a>
                </td>
                <td>
                  <a href="app/delete-estudiante.php?id=<?php echo $estudiantes['id']?>" class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <hr>
  </div>
  <?php pfooter(); ?>

