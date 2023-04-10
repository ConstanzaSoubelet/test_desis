
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de postulación- Soubelet</title>
    <script src="validar.js"></script>
    <script src="validaRut.js"></script>
    <script src="jquery-3.6.4.min.js"></script>
</head>

<body>
    <div>
        <form action="conexion.php" method="POST" onsubmit="return validar();">
        <div>
            <table>
                <h1>FORMULARIO DE VOTACIÓN: </h1>
                <tr>
                    <td>Nombre y Apellido</td>
                    <td><input type="text" id="nombre" name="nombre"></td>
                </tr>
                <tr>
                    <td>Alias</td>
                    <td><input type="text" id="alias" name="alias" ></td>
                </tr>
                <tr>
                    <td>Rut</td>
                    <td><input type="text" id="rut" name="rut" oninput="validaRut(this)" required>
                        <!--Formato de RUT en dirección de envio debe ser xxxxxxxx-x sin puntos. -->
                    </td>
                <tr>
                    <td>Email</td>
                    <td><input type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <td>Candidato</td>
                    <td> <select name="candidato">
                        <option value="rock Americano">Rock Americano</option>
                        <option value="rock Británico">Rock Británico</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Región</label>
                    <select id="lista1" name="lista1">
                        <option value="0">Selecciona una opcion</option>
                        <option value="1">Tarapacá</option>
                        <option value="3">Bio-bío</option>
                    </select>
                    <br>
                    <div id="select2lista"></div>
                </td>
                </tr>
                <tr>
                <td>Como se entero de nosotros</td>
                    <td>

                        <input type="checkbox" name="seleccion[]" value="web" />
                        <label>Web</label>

                        <input type="checkbox" name="seleccion[]" value="tv"/>
                        <label>TV</label>

                        <input type="checkbox" name="seleccion[]" value="rs"/>
                        <label>Redes Sociales</label>

                        <input type="checkbox" name="seleccion[]" value="amigo" />
                        <label>Amigo</label>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" method="POST"></td>
                </tr>
            </table>
        </div>
        </form>
    </div>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"region=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>