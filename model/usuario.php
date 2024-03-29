<?php
 require_once('conexion.php');

 class Usuario extends Conexion {

      public function addUsuario($correo, $password, $nombre, $rol)
	  {
      	parent::conectar(); 

            parent::query('insert into Usuario(usuario, passwordUsuario, nombreUsuario,infoCompleta,rolUsuario,DocumentosPersonal_idDocumentosPersonal) values("'.$correo.'",MD5("'.$password.'") ,"'.$nombre.'",0, "'.$rol.'", 1)');

      	parent::cerrar();

      }

      public  function getListUsuario(){
            parent::conectar();
            $sql="SELECT * from Usuario";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }

      public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM Usuario WHERE idUsuario=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }

      public function getUserByRol($rol=NULL){
            parent::conectar();
                  if(!empty($rol)){
                        $query  ="SELECT * FROM Usuario WHERE rolUsuario=".$rol;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }
            
            

      public function updateUsuario($id,$correo,$password,$nombre){
      	parent::conectar();
            $id=$id;
      	$aseguradora = parent::filtrar($aseguradora);
      	$direccion = parent::filtrar($direccion);
      	$pagina = $pagina;

      	parent::query("UPDATE Usuario SET usuario='$correo', password ='$password', nombreUsuario='$nombre' WHERE idUsuario= $id");

      	parent::cerrar();


      }

      public function deleteUsuario($id=NULL){
      parent::conectar();

      parent::query("DELETE FROM Usuario WHERE idUsuario='$id'");
     

      parent::cerrar();
 }

   public function login($user, $clave)
    {
      /*
        Antes que nada :v para los que no saben que es parent
        lo que estamos haciendo es llamar un metodo de una clase
        heredada es decir al yo colocar parent::conectar, lo que hago es
        llamar al metodo conectar de la clase patiente en este caso conexion xd
        espero haber sido claro :v continuemos
      */


      # Nos conectamos a la base de datos
      parent::conectar();

      /*
        Lo segundo que debemos hacer es filtrar la informacion que el usuario
        ingresa, recuerda nunca debes confiar en los datos que el usuario
        envia, asi que teniendo eso en cuenta usaremos unos metodos de la clase conexion
        que ayudaran a realizar los filtros necesarios
      */

      // El metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que pueden vulnerar nuestra consulta SQL
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);

      // Si necesitas filtrar las mayusculas y los acentos habilita las lineas 36 y 37 recuerda que en la base de datos debe estar filtrado tambien para una validacion correcta
      /*$user  = parent::filtrar($user);
      $clave = parent::filtrar($clave);*/

      /*
        Para la validación del usuario podemos hacer dos cosas,
        validar que exista el email solamente y mostrar error en caso
        de que no, o validar ambos campos y mostrar un unico error,
        en este caso validare el usuario con ambos campos, si necesitas ayuda
        para hacer la filtracion 1 me puedes escribir o enviarme un email a codigoadsi@gmail.com
      */

      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
       $consulta = 'select idUsuario, nombreUsuario,infoCompleta, rolUsuario from Usuario where usuario="'.$user.'" and passwordUsuario= MD5("'.$clave.'")';
      /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario > 0){

        /* Bien ahora a jugar un poco :v */

        /*
          Realizamos la misma consulta de la linea 55 pero esta ves transformaremos el resultado en un arreglo,
          ten mucho cuidado con usar el metodo consultaArreglo ya que devuelve un arreglo de la primera fila encontrada
          es decir, como nosotros solo validamos a un usuario no hay problema pero esta funcion no funciona si
          vas a listar a los usuarios, espero que me entiendan xd
        */

        $user = parent::consultaArregloLogin($consulta);

        /*
          Bien espero ser un poco claro en esta parte, la variable user
          en la linea 69 pasa a ser un arreglo con los campos consultados en la linea
          48, entonces para acceder a los datos utilizamos $user[nombre_del_campo] Ok?
          bueno hagamos el ejercicio.
        */

        /*
          Inicializamos la sessión | Recuerda con las variables de sesión
          podemos acceder a la informacion desde cualquiera pagina siempre y cuando
          exista una sesión y ademas utilicemos el codigo de la linea 84
        */

        session_start();

        /*
          Las variables de sesion son muy faciles de usar, es como
          declarar una variable, lo unico diferente es que obligatoria mente
          debes usar $_SESSION[] y .... el nombre de la variable ya no sera asi
          $miVariable sino entre comillas dentro del arreglo de sesion, haber me
          dejo explicar, $_SESSION['miVariable'], recuerda que como declares la variable
          en este archivo asi mismo lo llamaras en los demas.
        */

      
        $_SESSION['idUsuario']     = $user['idUsuario'];
        $_SESSION['nombreUsuario'] = $user['nombreUsuario'];
        $_SESSION['rolUsuario']  = $user['rolUsuario'];
        $_SESSION['infoCompleta']  = $user['infoCompleta'];


        /*
          Que porqué almacenamos cargo? es encillo en nuestros proyectos
          pueden existir archivos que solo puede ver un usuario con el cargo de
          administrador y no un usuario estandar, asi que la variable global de
          sesion nos ayudara a verificar el cargo del usuario que ha iniciado sesion
          Ok?
        */

        /*
          Recuerda:
          cargo con valor: 1 es: Administrador
          cargo con valor: 2 es: usuario estandar
          puedes agregar cuantos cargos desees, en este ejemplo solo uso 2
        */

        // Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
        if($_SESSION['rolUsuario'] == 1){
          echo 'admin.php';
        }else 
        if($_SESSION['rolUsuario'] == 3){
          echo 'medico.php';
        }


        // u.u finalizamos aqui :v

      }else{
        // El usuario y la clave son incorrectos
        echo 'error_3';
      }


      # Cerramos la conexion
      parent::cerrar();
    }
}
?>