<?php 
	
	require_once("buscar_consultorio.php");
	include("../../clase/conectar.php");

	
	$id = $_GET['id'];

	$stmt = $conn->prepare("DELETE FROM consultorio WHERE id='$id'");
	$stmt->execute();
?>


<html>
	<head>
		<title>Eliminar Consultorio</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($conteo > 0){
				$ver = $objeto->f_array($ok);
				?>
				
				<h1>Error al Eliminar Consultorio</h1>
				
				<?php }else{ ?>
				
				<script language="javascript" name="accion">alert("Consultorio Eliminado")</script>
				<script language="javascript"> location.href='buscar_consultorio.php'; </script>
				
			<?php	

			} ?>
			<p></p>		
						
		</center>
	</body>
</html>