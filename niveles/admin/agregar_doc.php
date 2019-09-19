<?php require_once("../../php/valida.php"); ?>
<!--Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar Doctor | Medical Social</title>
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

        <div><h3>Agregar Doctor:</h5></div>

        <table>
        <form  enctype="multipart/form-data"  name="form_login" method="post">

            <tr>
            <td id="alinear">Nombres:</td>
            <td><input type="text" required name="nombre" id="nombre"/></td>
            </tr>

            <tr>
            <td  id="alinear">Apellidos:</td>
            <td><input type="text" required name="apellido" id="apellido"/></td>
            </tr>

            <tr>
            <td  id="alinear">Nit:</td>
            <td><input type="text" required name="nit" id="nit" maxlength="14" step="any" /></td>
            </tr>

            <tr>
            <td  id="alinear">Dirección:</td>
            <td><input type="text" required name="direccion" id="direccion"/></td>
            </tr>

            <tr>
            <td  id="alinear">Teléfono:</td>
            <td><input type="text" required name="telefono" id="telefono" maxlength="8" step="any" /></td>
            </tr>

            <tr>
            <td  id="alinear">Especialidad:</td>
            <td><input type="text" required name="especialidad" id="especialidad"/></td>
            </tr>

            <tr>
            <td  id="alinear">Registro:</td>
            <td><input type="text" required name="registro" id="registro"/></td>
            </tr>

            <tr>
            <td  id="alinear">Correo Electrónico:</td>
            <td><input type="text" required name="email" id="email"/></td>
            </tr>

            <tr>
            <td  id="alinear">Contraseña:</td>
            <td><input required name="password" id="password" type="password" /></td>
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
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nit = $_POST["nit"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $registro = $_POST["registro"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $nivel = 'doctor';


    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
    $stmt = $conn->prepare("INSERT INTO doctores (nombre, apellido, nit, direccion, telefono, especialidad, registro, email, password, nivel) VALUES 

    (:nombre, :apellido, :nit, :direccion, :telefono, :especialidad, :registro, :email, :password, :nivel)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':nit', $nit);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':especialidad', $especialidad);
    $stmt->bindParam(':registro', $registro);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':nivel', $nivel);

    $stmt->execute();
    ?>
    <script language="javascript">
    alert("Doctor Agregado");
    location.href='buscar_doctor.php';
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