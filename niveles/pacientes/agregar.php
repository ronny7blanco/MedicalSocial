<?
//Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión
require_once("../../php/valida.php");
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Medical Social</title>
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
?>

<div class="container" id="contenedor">
       
<!--INICIO DEL BANNER-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<div class="row-fluid"><!--ROW DEL FORM-->
<center><h2>BIENVENIDOS A MEDICAL SOCIAL</h2></center>
<center><img src="../../imagen/Banner.png" alt="Banner" height="100%"></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
</div><!--CIERRE CONTENIDO-->
<!--FIN DEL BANNER-->

<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<div class="row-fluid"><!--ROW DEL FORM-->
    
<h2>REGISTRO DE PACIENTES</h2>

        <table>
        <form  enctype="multipart/form-data"  name="form_login" method="post">

            <tr>
            <td  id="alinear">Nombres:</td>
            <td><input type="text" required name="nombre" id="nombre" /></td>
            </tr>

            <tr>
            <td  id="alinear">Apellidos:</td>
            <td><input type="text" required name="apellido" id="apellido" /></td>
            </tr>

            <tr>
            <td id="alinear">DUI:</td>
            <td><input type="text" required name="dui" id="dui" maxlength="9"/></td>
            </tr>

            <tr>
            <td  id="alinear">NIT:</td>
            <td><input type="text" required name="nit" id="nit" maxlength="14"/></td>
            </tr>

            <tr>
            <td  id="alinear">Dirección:</td>
            <td><input type="text" required name="direccion" id="direccion" /></td>
            </tr>

            <tr>
            <td  id="alinear">Teléfono:</td>
            <td><input type="text" required name="telefono" id="telefono" maxlength="8"/></td>
            </tr>

            <tr>
            <td  id="alinear">E-mail:</td>
            <td><input type="text" required name="email" id="email" /></td>
            </tr>

            <tr>
            <td  id="alinear">Nombre de Usuario:</td>
            <td><input type="text" required name="nickname" id="nickname" /></td>
            </tr>

            <tr>
            <td  id="alinear">Contraseña:</td>
            <td><input type="password" required name="password" id="password" /></td>
            </tr>

            <tr>
            <td  id="alinear">Género:</td>
            <td><input type="text" required name="genero" id="genero" /></td>
            </tr>

            <tr>
            <td  id="alinear">Estado Civíl:</td>
            <td><input type="text" required name="estado_civil" id="estado_civil" /></td>
            </tr>

            <tr>
                    <td></td>
            <td>
            <button type="submit" name="boton" value="Entrar">Guardar</button>
            <a href="../../index.php">Cancelar Registro</a>
            </td>
            </tr>

        </form>
      </table>


<?php



//Inicio del boton del formulario
 if(isset($_POST["boton"])==true)
  {
  	//Variables las cuales serán llenadas con los datos del formulario
    $dui = $_POST["dui"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nit = $_POST["nit"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $nickname = $_POST["nickname"];
    $password = md5($_POST["password"]);
    $genero = $_POST["genero"];
    $estado_civil = $_POST["estado_civil"];
    $nivel = 'paciente';
    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
    $stmt = $conn->prepare("INSERT INTO pacientes (dui, nombre, apellido, nit, direccion, telefono, email, nickname, password, genero, estado_civil, nivel) VALUES 

    (:dui, :nombre, :apellido, :nit, :direccion, :telefono, :email, :nickname, :password, :genero, :estado_civil, :nivel)");
    $stmt->bindParam(':dui', $dui);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':nit', $nit);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':estado_civil', $estado_civil);
    $stmt->bindParam(':nivel', $nivel);

    $stmt->execute();

    ?>
    <script language="javascript">
    alert("Paciente Agregado"); 
    location.href='../../index.php';
    </script>
    <?php

}

?>


</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
</div><!--CIERRE CONTENIDO-->

<!--INICIO DE PIE-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<div class="row-fluid"><!--ROW DEL FORM-->
<center><?php  include("../../php/pie.php");?></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
</div><!--CIERRE CONTENIDO-->
<!--FIN DE PIE-->

</div><!-- DIV CONTENEDOR-->

</body>
</html>