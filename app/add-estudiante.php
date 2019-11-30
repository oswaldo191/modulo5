<?php
include '..\layout\header.php';
include '..\layout\footer.php';
include '..\method\registro.php';

	session_start();

	if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) ) {

		 $estudiante = $_SESSION['estudiante'];

		 $estudianteId = 1;

		 if(!empty($estudiante)){

		 	    $listEstudiante = listEstudianteid($estudiante);
		        $estudianteId =  $listEstudiante["id"] + 1;
		    }

		 array_push($estudiante, ["id" => $estudianteId, "nombre" => $_POST['nombre'],"apellido" => $_POST['apellido'], "estado" => "1", "carrera" => $_POST['carrera'] ]);

		 

	    $_SESSION['estudiante'] = $estudiante;

	    header("Location: ../index.php");
	    exit();
		
	}
?>

<?php pheader(); ?>
	<br><br><br><br>
	<div class="container">
		<div class="card">
		  <div class="card-header">
		   <span><i class="fa fa-edit"></i></span> <b>Agregar nuevo estudiante</b>
		  </div>
		  <div class="card-body">
		    <form method="POST" action="add-estudiante.php">
		    	<div class="form-group">
		    		<label for="nombre"><b>Nombre</b></label>
		    		<input type="text" class="form-control" id="nombre" placeholder="Nombre de estudiante" name="nombre" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="apellido"><b>Apellido</b></label>
		    		<input type="text" class="form-control" id="apellido" placeholder="Apellido de estudiante" name="apellido" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="carrera"><b>Carrera</b></label>
		    		<select class="form-control" name="carrera" id="carrera" required>
		    			<option>Seleccione carrera</option>
		    			<option value="1">Redes</option>
		    			<option value="2">Software</option>
		    			<option value="3">Multimedia</option>
		    			<option value="4">Mecatronica</option>
		    			<option value="5">Seguridad informática</option>
		    		</select>
		    	</div>
		    	<br>
		    	<button type="submit" class="btn btn-primary">Guardar <i class="fa fa-save"></i></button>
		    </form>
		  </div>
		</div>
		<hr>
	</div>

<?php pfooter(); ?>