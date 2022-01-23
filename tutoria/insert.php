<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
       
		$ID_MEDIOS=$_POST['ID_MEDIOS'];
		$ID_TUTOR=$_POST['ID_TUTOR'];
		$TITULO_TUTORIA=$_POST['TITULO_TUTORIA'];
		$DURACION_TUTORIA=$_POST['DURACION_TUTORIA'];
		$FECHAHORA_TUTORIA=$_POST['FECHAHORA_TUTORIA'];
		$HORA_FIN_TUTORIA=$_POST['HORA_FIN_TUTORIA'];
		$SALA_TUTORIA=$_POST['SALA_TUTORIA'];
		$ENLACE_TUTORIA=$_POST['ENLACE_TUTORIA'];
		$COSTO_TUTORIA=$_POST['COSTO_TUTORIA'];


		if(!empty($ID_MEDIOS) && !empty($ID_TUTOR) && !empty($TITULO_TUTORIA) && !empty($DURACION_TUTORIA) && !empty($FECHAHORA_TUTORIA) && !empty($HORA_FIN_TUTORIA) && !empty($SALA_TUTORIA) && !empty($ENLACE_TUTORIA) && !empty($COSTO_TUTORIA ) ){
			{
				$consulta_insert=$con->prepare('INSERT INTO TUTORIA ( ID_MEDIOS, ID_TUTOR ,TITULO_TUTORIA , DURACION_TUTORIA, FECHAHORA_TUTORIA, HORA_FIN_TUTORIA, SALA_TUTORIA, ENLACE_TUTORIA, COSTO_TUTORIA) VALUES ( :ID_MEDIOS, :ID_TUTOR , :TITULO_TUTORIA , :DURACION_TUTORIA, :FECHAHORA_TUTORIA, :HORA_FIN_TUTORIA, :SALA_TUTORIA, :ENLACE_TUTORIA, :COSTO_TUTORIA)' );
				$consulta_insert->execute(array(
                    
					':ID_MEDIOS' =>$ID_MEDIOS,
					':ID_TUTOR' =>$ID_TUTOR,
					':TITULO_TUTORIA' =>$TITULO_TUTORIA,
					':DURACION_TUTORIA' =>$DURACION_TUTORIA,
					':FECHAHORA_TUTORIA' =>$FECHAHORA_TUTORIA,
					':HORA_FIN_TUTORIA' =>$HORA_FIN_TUTORIA,
					':SALA_TUTORIA' =>$SALA_TUTORIA,
					':COSTO_TUTORIA' =>$COSTO_TUTORIA,
					':ENLACE_TUTORIA' =>$ENLACE_TUTORIA,
				
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
	<title>Nueva Tutoria</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Ingresar Tutoria</h2>
		<form action="" method="post">
			<div class="form-group">
                
				
				<input type="text" name="ID_MEDIOS" placeholder="ID_MEDIOS" class="input__text">
				<input type="text" name="ID_TUTOR" placeholder="ID_TUTOR" class="input__text">
				<input type="text" name="TITULO_TUTORIA" placeholder="TITULO_TUTORIA" class="input__text">

			</div>
			<div class="form-group">
			    <input type="time" name="DURACION_TUTORIA" placeholder="Duracion" class="input__text">
				<input type="datetime-local" name="FECHAHORA_TUTORIA" placeholder="FechaHora" class="input__text">
				<input type="time" name="HORA_FIN_TUTORIA" placeholder="HoraFin" class="input__text">
				
			</div>
			<div class="form-group">
			<input type="text" name="SALA_TUTORIA" placeholder="SALA" class="input__text">	
			<input type="text" name="ENLACE_TUTORIA" placeholder="ENLACE" class="input__text">
			<input type="number" name="COSTO_TUTORIA" step="0.1" placeholder="COSTO" class="input__text">

		
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
