<?php 
	
	require_once("buscar_doctor.php");
	include("../../clase/conectar.php");

	
	$id = $_GET['id'];

	$stmt = $conn->prepare("DELETE FROM doctores WHERE id='$id'");
	$stmt->execute();
?>


<html>
	<head>
		<title>Eliminar Doctor</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($conteo > 0){
				$ver = $objeto->f_array($ok);
				?>
				
				<h1>Error al Eliminar Usuario</h1>
				
				<?php }else{ ?>
				
				<script language="javascript" name="accion">alert("Doctor(a) Eliminado(a)")</script>
				<script language="javascript"> location.href='buscar_doctor.php'; </script>
				
			<?php	

			} ?>
			<p></p>		
						
		</center>
	</body>
</html>