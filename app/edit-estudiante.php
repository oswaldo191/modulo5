<?php
include '..\layout\header.php';
include '..\layout\footer.php';
include '..\method\registro.php';

session_start();

$estudiante = $_SESSION['estudiante'];

$idEstudiante = isset($_GET['id']); 

$date = [];

if ($idEstudiante) {

    $date = searchEstudiante($estudiante, 'id', $_GET['id'])[0];

    $elementIndex = indexEstudiante($estudiante, 'id', $_GET['id']);  
}

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['estado']) && isset($_POST['carrera'])) { 

    $updateEstudiante = ['id' => $_GET['id'], 'nombre' => $_POST['nombre'], 'apellido' => $_POST['apellido'] , 'estado' => $_POST['estado'], 'carrera' => $_POST['carrera'] ];

    $estudiante[$elementIndex] =  $updateEstudiante; 

    $_SESSION['estudiante'] = $estudiante; 

    header("Location: ../index.php");
    exit(); 
}
?>

<?php pheader(); ?>
    <br><br><br><br>
    <div class="container">
        <?php if ($idEstudiante && !empty($date)): ?>

              <div class="card">
                  <div class="card-header">
                   <span><i class="fa fa-edit"></i></span> <b>Agregar nuevo estudiante</b>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="edit-estudiante.php?id=<?php echo $date['id'] ?>">
                        <div class="form-group">
                            <label for="nombre"><b>Nombre</b></label>
                            <input type="text" value="<?php echo $date['nombre'] ?>" class="form-control" id="nombre" placeholder="Nombre de estudiante" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido"><b>Apellido</b></label>
                            <input type="text" value="<?php echo $date['apellido'] ?>" class="form-control" id="apellido" placeholder="Apellido de estudiante" name="apellido" required>
                        </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="estado" value="1"  <?php if ($date['estado'] == 1): ?>
                                     checked
                                 <?php endif ?>
                                 >
                              <label class="form-check-label">
                                Activo
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="estado" value="2" 
                               <?php if ($date['estado'] == 2): ?>
                                     checked
                                 <?php endif ?>
                                 >
                              <label class="form-check-label">
                                Inactivo
                              </label>
                            </div>
                        <div class="form-group">
                            <label for="carrera"><b>Carrera</b></label>
                            <select class="form-control" name="carrera" id="carrera" required>
                                <option>Seleccione carrera</option>
                                <option value="1" 
                                 <?php if ($date['carrera'] == 1): ?>
                                     selected
                                 <?php endif ?>
                                >Redes</option>
                                <option value="2" 
                                <?php if ($date['carrera'] == 2): ?>
                                     selected
                                 <?php endif ?>
                                 >Software</option>
                                <option value="3" 
                                <?php if ($date['carrera'] == 3): ?>
                                     selected
                                 <?php endif ?>
                                 >Multimedia</option>
                                <option value="4" 
                                <?php if ($date['carrera'] == 4): ?>
                                     selected
                                 <?php endif ?>
                                 >Mecatronica</option>
                                <option value="5" 
                                <?php if ($date['carrera'] == 5): ?>
                                     selected
                                 <?php endif ?>
                                 >Seguridad informática</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar <i class="fa fa-save"></i></button>
                    </form>
                  </div>
                </div>

            <?php else: ?>
            <h2>No existe</h2>
        <?php endif ?>
      
        <hr>
    </div>

<?php pfooter(); ?>