<?php 
	
	require_once("buscar_paciente.php");
	include("../../clase/conectar.php");

	
	$dui = $_GET['dui'];

	$stmt = $conn->prepare("DELETE FROM pacientes WHERE dui='$dui'");
	$stmt->execute();
?>


<html>
	<head>
		<title>Eliminar Paciente</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($conteo > 0){
				$ver = $objeto->f_array($ok);
				?>
				
				<h1>Error al Eliminar Paciente</h1>
				
				<?php }else{ ?>
				
				<script language="javascript" name="accion">alert("Paciente Eliminado")</script>
				<script language="javascript"> location.href='buscar_paciente.php'; </script>
				
			<?php	

			} ?>
			<p></p>		
						
		</center>
	</body>
</html>