<?php
include '..\method\registro.php';

session_start();

$estudiante = $_SESSION['estudiante'];

$idEstudiante = isset($_GET['id']); 

$elementIndex = indexEstudiante($estudiante, 'id', $_GET['id']);  

unset($estudiante[$elementIndex]); 
$_SESSION['estudiante'] = $estudiante; 

header("Location: ../index.php");
exit(); 
?>
