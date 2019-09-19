<?php require_once("../../php/valida.php"); ?>
<!--Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Información | Medical Social</title>
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

        <div><h3>Editar Datos:</h5></div>


        <table>
        <form  method="post">

            <tr>
            <td id="alinear">DUI:</td>
            <td><input type="text" required name="dui" id="dui" value="<?php echo $row['dui']; ?>" /></td>
            </tr>

            <tr>
            <td  id="alinear">Nombres:</td>
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
            <td  id="alinear">E-mail:</td>
            <td><input type="text" required name="email" id="email" value="<?php echo $row['email']; ?>"/></td>
            </tr>

            <tr>
            <td  id="alinear">Nombre de Usuario:</td>
            <td><input type="text" required name="nickname" id="nickname" value="<?php echo $row['nickname']; ?>"/></td>
            </tr>

            <tr>
            <td  id="alinear">Género:</td>
            <td><input type="text" required name="genero" id="genero" value="<?php echo $row['genero']; ?>"/></td>
            </tr>

            <tr>
            <td  id="alinear">Estado Civíl:</td>
            <td><input type="text" required name="estado_civil" id="estado_civil" value="<?php echo $row['estado_civil']; ?>" /></td>
            </tr>

            <tr>
            <td colspan="2"><button type="submit" name="boton" class="btn-success">Actualizar</button></td>
            </tr>

        </form>
      </table>

</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->


<?php

//Variables las cuales serán llenadas con los datos del formulario
$dui="";
$nombre="";
$apellido="";
$nit="";
$direccion="";
$telefono="";
$email="";
$nickname="";
$password="";
$genero="";
$estado_civil="";

//Inicio del boton del formulario
 if(isset($_POST["boton"])==true)
  {
    $dui_S = $row['dui'];
    $dui = $_POST["dui"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nit = $_POST["nit"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $genero = $_POST["genero"];
    $estado_civil = $_POST["estado_civil"];

    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
     $stmt = $conn->prepare('UPDATE pacientes SET dui= ?, nombre= ?, apellido= ?, nit= ?, direccion= ?, telefono= ?, email= ?, nickname= ?, password= ?, genero= ?, estado_civil= ?  WHERE dui= ?');

    $stmt->bindParam(1, $dui);
    $stmt->bindParam(2, $nombre);
    $stmt->bindParam(3, $apellido);
    $stmt->bindParam(4, $nit);
    $stmt->bindParam(5, $direccion);
    $stmt->bindParam(6, $telefono);
    $stmt->bindParam(7, $email);
    $stmt->bindParam(8, $nickname);
    $stmt->bindParam(9, $password);
    $stmt->bindParam(10, $genero);
    $stmt->bindParam(11, $estado_civil);
    $stmt->bindParam(12, $dui_S);

    $stmt->execute();
    $_SESSION["nickname"]= $nickname;
    ?>
    <script language="javascript">
    alert("Actualizado Correctamente"); 
    location.href='informacion.php';
    </script>
    <?php
}
?>


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