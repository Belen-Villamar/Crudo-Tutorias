<?php 

	include_once 'conexion.php';
	if(isset($_GET['ID_TUTORIAS'])){
		$ID_TUTORIAS=(int) $_GET['ID_TUTORIAS'];
		$delete=$con->prepare('DELETE FROM TUTORIA WHERE ID_TUTORIAS=:ID_TUTORIAS');
		$delete->execute(array(
			':ID_TUTORIAS'=>$ID_TUTORIAS
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>