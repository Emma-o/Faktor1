 <?php
# incluimos la clase conexion.php 
 require_once('conexion.php');
  session_start();
 # creamos la clase Aseguradora  con una herencia de la clase Conexion 
 class procedimiento extends Conexion {
      #Funcion addAseguradora: nos permite insertar datos a la tabla aseguradora
      public function addCaso ($siniestro, $descripcion,$rol,$honorario,$selectPas,$selectAs)
	  {
 

            # parent:  permite traer las funciones heredadas de la clase Conexion 
      	parent::conectar();

            parent::query('insert into CasoMedico(siniestro,descripcion, rolMedicoEnCaso,honorariosMedico,Usuario_idUsuario,   documentosCasoMedico_iddocumentosCasoMedico,Paciente_idPaciente,Aseguradora_idAseguradora) values("'.$siniestro.'","'.$descripcion.'","'.$rol.'","'.$honorario.'", "'.$_SESSION['idUsuario'].'",1,"'.$selectPas.'","'.$selectAs.'")');
            echo "asd";

      	parent::cerrar();

      }
      #Funcion que permite hacer una consulta general de la tabla aseguradora
      public  function getListAseguradora(){
            parent::conectar();
            $sql="SELECT * from aseguradora";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }
      #Funcion que permite hacer una consulta especifica con la llave primaria de la tabla aseguradora
      public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM aseguradora WHERE idAseguradora=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }
            
            
      #Funcion permite modificar los datos de la tabla aseguradora
      public function updateAseguradora($id,$aseguradora,$direccion,$pagina){
      	parent::conectar();
            $id=$id;
      	$aseguradora = parent::filtrar($aseguradora);
      	$direccion = parent::filtrar($direccion);
      	$pagina = $pagina;

      	parent::query("UPDATE aseguradora SET nombreAseguradra='$aseguradora', direccionAseguradora ='$direccion', pagina='$pagina' WHERE idAseguradora= $id");

      	parent::cerrar();


      }
      #Funcion permite borrar una fila de la tabla por medio del id
      public function deleteAseguradora($id){
      parent::conectar();

      parent::query("DELETE FROM aseguradora WHERE idAseguradora=$id");
     

      parent::cerrar();
 }
}
?>