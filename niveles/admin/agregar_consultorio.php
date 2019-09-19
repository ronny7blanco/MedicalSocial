<?php require_once("../../php/valida.php"); ?>
<!--Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar Consultorio | Medical Social</title>
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

$nickname = $_SESSION["nickname"];
$sentencia = $conn->query("SELECT * FROM admin where nickname='$nickname'");
$row=$sentencia->fetch(PDO::FETCH_ASSOC)
?>

<div class="container" id="contenedor">

<!--INICIO DEL BANNER-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<center><img src="../../imagen/Banner.png" alt="Banner" height="100%"></center>
<center><h2>Bienvenido(a): <?php echo $row['nombre']." ".$row['apellido']; ?></h2></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->

<!--INICIO DE MENU-->
<center><?php  require_once("../../php/menu_admin.php"); ?></center><br>
<!--FIN DE MENU-->

<div class="row-fluid"><!--contenido-->
<div class="well" > <!-- SPAN WELL -->

        <div><h3>Agregar Consultorio:</h5></div>

        <table>
        <form  enctype="multipart/form-data"  name="form_login" method="post">

            <tr>
            <td id="alinear">Dirección:</td>
            <td><input type="text" required name="direccion" id="direccion"/></td>
            </tr>

            <tr>
            <td  id="alinear">Planta:</td>
            <td><input type="text" required name="planta" id="planta"/></td>
            </tr>

            <tr>
            <td  id="alinear">Número de Local:</td>
            <td><input type="text" required name="numero_local" id="numero_local"/></td>
            </tr>

            <tr>
            <td  id="alinear">Teléfono:</td>
            <td><input type="text" required name="telefono" id="telefono" maxlength="8" /></td>
            </tr>

            <tr>
            <td><td>
            <button type="submit" name="boton" value="Entrar">Guardar</button>
            <a href="buscar_doctor.php">Cancelar Registro</a>
            </td></td>
            </tr>

        </form>
      </table>


<?php

//Variables las cuales serán llenadas con los datos del formulario
//Variables las cuales serán llenadas con los datos del formulario
$sql="";
$direccion="";
$planta="";
$numero_local="";
$telefono="";

//Inicio del boton del formulario
 if(isset($_POST["boton"])==true)
  {
    $direccion = $_POST["direccion"];
    $planta = $_POST["planta"];
    $numero_local = $_POST["numero_local"];
    $telefono = $_POST["telefono"];

    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
    $stmt = $conn->prepare("INSERT INTO consultorio (planta, numero_local, direccion, telefono) VALUES 

    (:planta, :numero_local, :direccion, :telefono)");
    $stmt->bindParam(':planta', $planta);
    $stmt->bindParam(':numero_local', $numero_local);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);

    $stmt->execute();
    ?>
    <script language="javascript">
    alert("Consultorio Agregado");
    location.href='buscar_consultorio.php';
    </script>
    <?php

}

?>

</div>
<!--INICIO DE PIE-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<center><?php  include("../../php/pie.php");?></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
<!--FIN DE PIE-->

<!--Inicio div Contenido-->
</div>
</body>
</html>