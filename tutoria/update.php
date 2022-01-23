<?php
	include_once 'conexion.php';

	if(isset($_GET['ID_TUTORIAS'])){
		$ID_TUTORIAS=(int) $_GET['ID_TUTORIAS'];

		$buscar_id=$con->prepare('SELECT * FROM TUTORIA WHERE ID_TUTORIAS=:ID_TUTORIAS ');
		$buscar_id->execute(array(
			':ID_TUTORIAS'=>$ID_TUTORIAS
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
        $ID_TUTORIAS= $_GET['ID_TUTORIAS'];
		$ID_MEDIOS=$_POST['ID_MEDIOS'];
		$ID_TUTOR=$_POST['ID_TUTOR'];
		$TITULO_TUTORIA=$_POST['TITULO_TUTORIA'];
		$DURACION_TUTORIA=$_POST['DURACION_TUTORIA'];
        $FECHAHORA_TUTORIA=$_POST['FECHAHORA_TUTORIA'];
        $HORA_FIN_TUTORIA=$_POST['HORA_FIN_TUTORIA'];
        $SALA_TUTORIA=$_POST['SALA_TUTORIA'];
		$ENLACE_TUTORIA=$_POST['ENLACE_TUTORIA'];
		$COSTO_TUTORIA=$_POST['COSTO_TUTORIA'];

		

		if(!empty($ID_MEDIOS) && !empty($ID_TUTOR) && !empty($TITULO_TUTORIA) && !empty($DURACION_TUTORIA) && !empty($FECHAHORA_TUTORIA) && !empty($HORA_FIN_TUTORIA) && !empty($SALA_TUTORIA) && !empty($ENLACE_TUTORIA) && !empty($COSTO_TUTORIA)                                ){
			{
				$consulta_update=$con->prepare(' UPDATE TUTORIA SET  


        ID_MEDIOS=:ID_MEDIOS,
		ID_TUTOR=:ID_TUTOR,
        TITULO_TUTORIA=:TITULO_TUTORIA,
        DURACION_TUTORIA=:DURACION_TUTORIA,
        FECHAHORA_TUTORIA=:FECHAHORA_TUTORIA,
        HORA_FIN_TUTORIA=:HORA_FIN_TUTORIA,
        SALA_TUTORIA=:SALA_TUTORIA,
        ENLACE_TUTORIA=:ENLACE_TUTORIA,
		COSTO_TUTORIA=:COSTO_TUTORIA

        WHERE ID_TUTORIAS=:ID_TUTORIAS;'

				);
				$consulta_update->execute(array(
					':ID_TUTORIAS' =>$ID_TUTORIAS,
					':ID_MEDIOS' =>$ID_MEDIOS,
					':ID_TUTOR' =>$ID_TUTOR,
					':TITULO_TUTORIA' =>$TITULO_TUTORIA,
					':DURACION_TUTORIA' =>$DURACION_TUTORIA,
					':FECHAHORA_TUTORIA' =>$FECHAHORA_TUTORIA,
					':HORA_FIN_TUTORIA' =>$HORA_FIN_TUTORIA,
					':SALA_TUTORIA' =>$SALA_TUTORIA,
					':ENLACE_TUTORIA' =>$ENLACE_TUTORIA,
					':COSTO_TUTORIA' =>$COSTO_TUTORIA

				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Tutorias</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="ID_MEDIOS" placeholder="ID_MEDIOS" value="<?php if($resultado) echo $resultado['ID_MEDIOS']; ?>" class="input__text">
				<input type="text" name="ID_TUTOR" value="<?php if($resultado) echo $resultado['ID_TUTOR']; ?>" class="input__text">
				<input type="text" name="TITULO_TUTORIA" value="<?php if($resultado) echo $resultado['TITULO_TUTORIA']; ?>" class="input__text">

			</div>
			<div class="form-group">
				<input type="time" name="DURACION_TUTORIA" value="<?php if($resultado) echo $resultado['DURACION_TUTORIA']; ?>" class="input__text">
				<input type="datetime-local" name="FECHAHORA_TUTORIA" value="<?php if($resultado) echo $resultado['FECHAHORA_TUTORIA']; ?>" class="input__text">
				<input type="time" name="HORA_FIN_TUTORIA" value="<?php if($resultado) echo $resultado['HORA_FIN_TUTORIA']; ?>" class="input__text">

			</div>
			<div class="form-group">
				<input type="text" name="SALA_TUTORIA" value="<?php if($resultado) echo $resultado['SALA_TUTORIA']; ?>" class="input__text">
				<input type="text" name="ENLACE_TUTORIA" value="<?php if($resultado) echo $resultado['ENLACE_TUTORIA']; ?>" class="input__text">
				<input type="number" name="COSTO_TUTORIA" value="<?php if($resultado) echo $resultado['COSTO_TUTORIA']; ?>" class="input__text">



			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
