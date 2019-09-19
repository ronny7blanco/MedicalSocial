<?php require_once("../../php/valida.php"); ?>
<!--Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscar Doctor | Medical Social</title>
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

$email = $_SESSION["email"];
$sentencia = $conn->query("SELECT * FROM doctores where email='$email'");
$row=$sentencia->fetch(PDO::FETCH_ASSOC)
?>

<div class="container" id="contenedor">

<!--INICIO DEL BANNER-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<center><img src="../../imagen/Banner.png" alt="Banner" height="100%"></center>
<center><h2>Bienvenido(a) Dr(a): <?php echo $row['nombre']." ".$row['apellido']; ?></h2></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
<!--FIN DEL BANNER-->

<!--INICIO DE MENU-->
<center><?php  require_once("../../php/menu_doctor.php"); ?></center><br>
<!--FIN DE MENU-->


<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<? echo $row2['id'];?>
<h2>EDITAR INFORMACIÓN</h2>
        <div>

        <table>
        <form  enctype="multipart/form-data"  name="form_login" method="post">

            <tr>
            <td id="alinear">Nombres:</td>
            <td><input type="text" required name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Apellidos:</td>
            <td><input type="text" required name="apellido" id="apellido" value="<?php echo $row['apellido']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Nit:</td>
            <td><input type="text" required name="nit" id="nit" value="<?php echo $row['nit']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Dirección:</td>
            <td><input type="text" required name="direccion" id="direccion" value="<?php echo $row['direccion']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Teléfono:</td>
            <td><input type="text" required name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Especialidad:</td>
            <td><input type="text" required name="especialidad" id="especialidad" value="<?php echo $row['especialidad']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Registro:</td>
            <td><input type="text" required name="registro" id="registro" value="<?php echo $row['registro']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Correo Electrónico:</td>
            <td><input type="text" required name="email" id="email" value="<?php echo $row['email']; ?>" /></td>
            </tr>

            <tr>
            <td colspan="2"><button type="submit" name="boton" class="btn-success">Actualizar</button></td>
            </tr>

        </form>
      </table>
<?php

//Variables las cuales serán llenadas con los datos del formulario
$sql="";
$nombre="";
$apellido="";
$nit="";
$direccion="";
$telefono="";
$especialidad="";
$registro="";
$email="";
$password="";

//Inicio del boton del formulario
 if(isset($_POST["boton"])==true)
  {
    $email_S = $row['email'];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nit = $_POST["nit"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $registro = $_POST["registro"];
    $email= $_POST["email"];
    $password= md5($_POST["password"]);

    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
    $stmt = $conn->prepare('UPDATE doctores SET nombre= ?, apellido= ?, nit= ?, direccion= ?, telefono= ?, especialidad= ?, registro= ?, email= ?, password= ?  WHERE email= ?');


    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $apellido);
    $stmt->bindParam(3, $nit);
    $stmt->bindParam(4, $direccion);
    $stmt->bindParam(5, $telefono);
    $stmt->bindParam(6, $especialidad);
    $stmt->bindParam(7, $registro);
    $stmt->bindParam(8, $email);
    $stmt->bindParam(9, $password);
    $stmt->bindParam(10, $email_S);

    $stmt->execute();
    $_SESSION["email"]= $email;
    ?>
    <script language="javascript">
    alert("Actualizado Correctamente"); 
    location.href='informacion.php';
    </script>
    <?php
}
?>

        

</div>
</div>
<!--INICIO DE PIE-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<center><?php  include("../../php/pie.php");?></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
<!--FIN DE PIE-->
</div>
</body>
</html>