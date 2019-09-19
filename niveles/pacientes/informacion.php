<?php require_once("../../php/valida.php"); ?>
<!--Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Información | Medical Social</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-responsive.min.css"/>
  <script type="text/javascript" src="../../js/jquery.min.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/scripts.js"></script>
       <style type="text/css">
    .aburtlist{
      margin-bottom: 12px;
    }
    .listAbout{
        color:  #676563;
    }

      </style>
</head>

<body>

<?php
//Llamamos al archivo conexion para tener acceso a la base de datos
include("../../clase/conectar.php");

if (isset($_SESSION["nickname"])){
$nickname = $_SESSION["nickname"];
$sentencia = $conn->query("SELECT * FROM pacientes where nickname='$nickname'");
$row=$sentencia->fetch(PDO::FETCH_ASSOC); 
}
elseif (isset($_SESSION["email"])){
$nickname = $_SESSION["email"];
$sentencia = $conn->query("SELECT * FROM pacientes where email='$nickname'");
$row=$sentencia->fetch(PDO::FETCH_ASSOC);   
}
?>

<div class="container" id="contenedor">

<!--INICIO DEL BANNER-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<center><img src="../../imagen/Banner.png" alt="Banner" height="100%"></center>
<center><h2>Bienvenido(a): <?php echo $row['nombre']." ".$row['apellido']; ?></h2></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
<!--FIN DEL BANNER-->

<!--INICIO DE MENU-->
<center><?php  require_once("../../php/menu.php"); ?></center><br>
<!--FIN DE MENU-->

<div class="row-fluid"><!--contenido-->
<div class="well" > <!-- SPAN WELL -->

        <div><h3>Tus Datos Son:</h5></div>

        <table  class="table table-bordered table-hover">
        
        <tr>
                <td>DUI:</td><td><?php echo $row['dui']; ?></td>
        </tr>
        <tr>
                <td>Nombres:</td><td><?php echo $row['nombre']; ?></td>
        </tr>
        <tr>
                <td>Apellidos:</td><td><?php echo $row['apellido']; ?></td>
        </tr>
        <tr>
                <td>Nit:</td><td><?php echo $row['nit']; ?></td>
        </tr>
        <tr>
                <td>Dirección:</td><td><?php echo $row['direccion']; ?></td>
        </tr>
        <tr>
                <td>Teléfono:</td><td><?php echo $row['telefono']; ?></td>
        </tr>
        <tr>
                <td>Nombre de Usuario:</td><td><?php echo $row['nickname']; ?></td>
        </tr>
        <tr>
                <td>E-mail:</td><td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
                <td>Género:</td><td><?php echo $row['genero']; ?></td>
        </tr>
        <tr>
                <td>Estado Civíl:</td><td><?php echo $row['estado_civil']; ?></td>
        </tr>
        <tr>    
<form method="post">
<td colspan="2"><button type="submit" name="boton" value="Entrar" class="btn-success">Editar Información</button></td>
</form>
        </tr>
        </table>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->

<!--INICIO DE PIE-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<center><?php  include("../../php/pie.php");?></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
<!--FIN DE PIE-->


<?php
if(isset($_POST["boton"])==true)
  {
?>
    <script language="javascript">
    location.href='editar.php';
    </script>
    <?php
}
?>

</div>
</body>
</html>