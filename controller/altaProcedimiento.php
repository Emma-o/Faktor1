<?php 

  $siniestro  = $_POST['siniestro'];
  $descripcion = $_POST['descripcion'];

  $rol  = $_POST['rol'];
  $honorario  = $_POST['honorario'];
  $selectPas  = $_POST['selectPas'];
  $selectAs  = $_POST['selectAs'];
  
 
 
    if(empty($siniestro) || empty($descripcion) || empty($honorario))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
    require_once('../model/procedimiento.php');
    
    $altacaso = new procedimiento();

    $altacaso -> addCaso($siniestro ,$descripcion, $rol,$honorario,$selectPas,$selectAs);
  }
?>