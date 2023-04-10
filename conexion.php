<?php
// conectar a la base de datos
$conexion = mysqli_connect("localhost","root","","db_soubelet");

//comprobar si la conexion es correcta
if(mysqli_connect_errno()){
    echo "La conexión a la BD MySQL ha fallado:".mysqli_connect_error();

}else {
    echo ""; 
}

//recuperar las variables
$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$email = $_POST['email'];

$candidato = $_POST['candidato'];

//insertar en la base de datos desde PHP
$sql = "INSERT INTO db_soubelet.usuario ( rut, nombre, alias, email,  candidato) VALUES( '$rut','$nombre', '$alias', '$email',  '$candidato')";

$insert = mysqli_query($conexion, $sql);


if(isset($_POST['submit'])){

  if(!empty($_POST['seleccion'])) {

    $seleccion = implode(",",$_POST['seleccion']);

    // Insert and Update record
    $checkEntries = mysqli_query($conexion,"SELECT * FROM usuario");
    if(mysqli_num_rows($checkEntries) == 0){
      mysqli_query($conexion,"INSERT INTO usuario(seleccion) VALUES('".$seleccion."')");
    }else{
      mysqli_query($conexion,"UPDATE usuario SET seleccion='".$seleccion."' ");
    }

  }

}
$checked_arr = array();

// Fetch checked values
$fetchLang = mysqli_query($conexion,"SELECT * FROM usuario");
if(mysqli_num_rows($fetchLang) > 0){
  $result = mysqli_fetch_assoc($fetchLang);
  $checked_arr = explode(",",$result['seleccion']);
}

    // Create checkboxes
    $seleccion_arr = array("web","tv","rs","amigo");
    foreach($seleccion_arr as $usuario){

      $checked = "";
      if(in_array($usuario,$checked_arr)){
        $checked = "checked";
      }
    }

if($insert){
    echo"DATOS INSERTADOS CORRECTAMENTE"; 
}else {
    echo "ERROR:".mysqli_error($conexion);
}
//$conexion->close();
//$sql->close();
?>
