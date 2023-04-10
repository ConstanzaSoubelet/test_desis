<?php 
$conexion=mysqli_connect('localhost','root','','db_soubelet');
$continente=$_POST['region'];
$sql="SELECT id,
id_region,
comuna
from region
where id_region='$continente'";

$result=mysqli_query($conexion,$sql);

$cadena="<label>Comuna</label> 
<select id='lista2' name='lista2'>";

while ($ver=mysqli_fetch_row($result)) {
$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
}

echo  $cadena."</select>";
	

?>
