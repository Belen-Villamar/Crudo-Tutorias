<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM TUTORIA ORDER BY ID_TUTORIAS DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM TUTORIA WHERE TITULO_TUTORIA LIKE :campo ;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>TUTORIAS VIRTUALES/Ingreso de Tutorias</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<h1 >TUTORIAS VIRTUALES</h1>
	<div class="contenedor">
		<h2> Ingreso de Tutorias</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Titulo" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
			    <td>CODIGO</td>
				<td>TITULO</td>
				<td>DURACION</td>
				<td>FECHA Y HORA</td>
				<td>HORA FIN</td>
				<td>SALA</td>
				<td>COSTO TUTORIA</td>

				<td colspan="2">ACCIÓN</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['ID_TUTORIAS']; ?></td>
					<td><?php echo $fila['TITULO_TUTORIA']; ?></td>
					<td><?php echo $fila['DURACION_TUTORIA']; ?></td>
					<td><?php echo $fila['FECHAHORA_TUTORIA']; ?></td>
					<td><?php echo $fila['HORA_FIN_TUTORIA']; ?></td>
					<td><?php echo $fila['SALA_TUTORIA']; ?></td>
					<td><?php echo $fila['COSTO_TUTORIA']; ?></td>


                    <!-- ID_FAMLIAR iba id despues del upadte -->
					<td><a href="update.php?ID_TUTORIAS=<?php echo $fila['ID_TUTORIAS']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?ID_TUTORIAS=<?php echo $fila['ID_TUTORIAS']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>