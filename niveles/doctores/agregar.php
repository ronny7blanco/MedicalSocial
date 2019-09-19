<!DOCTYPE>
<html>
<head>
<!--META en este caso sirve para acoplar lo escrito al español. Es decir agrega tildes y la eñe-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="../../css/css.css" />
</head>

<body>

<?php
require_once("../../php/login.php");
$objeto = new conexion();
$objeto->conexion();
?>

        <div  id="contenedor">
       
       <!--Inicio Banner-->
        <div  id="banner">
                <div  id="img_banner"><img src="../../imagen/Banner.jpg" alt="Banner" height="90px"></div>
                <div  id="txt_banner">Registro Doctor</div>
        </div>
        <!--Fin Banner-->
        <!--Inicio de Menú-->
        <div  id="menu">
                <?php
                require_once("../../php/menu_admin.php");
                ?>
        </div>
        <!--Fin de Menú-->

        <div  id="contenido">
        <h1   id="h1">Nuevo - Doctor</h1>

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
            <td  id="alinear">Nit:</td>
            <td><input type="text" required name="nit" id="nit" /></td>
            </tr>

            <tr>
            <td  id="alinear">Dirección:</td>
            <td><input type="text" required name="direccion" id="direccion" /></td>
            </tr>

            <tr>
            <td  id="alinear">Teléfono:</td>
            <td><input type="text" required name="telefono" id="telefono" /></td>
            </tr>

            <tr>
            <td  id="alinear">Especialidad:</td>
            <td><input type="text" required name="especialidad" id="especialidad" /></td>
            </tr>


            <tr>
            <td  id="alinear">Registro:</td>
            <td><input type="text" required name="registro" id="registro" /></td>
            </tr>

            <tr>
            <td  id="alinear">Contraseña:</td>
            <td><input type="text" required name="password" id="password" /></td>
            </tr>

            <tr>
                    <td></td>
            <td>
            <button type="submit" name="boton" value="Guardar">Guardar</button>
            <button onClick="location.href = '../admin/index.php'">Cancelar</button>
            </td>
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
    $password = $_POST["password"];


    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
    $sql="INSERT INTO doctores (id, nombre, apellido, nit, direccion, telefono, especialidad, registro, password, nivel) VALUES ( Null,'$nombre','$apellido','$nit','$direccion','$telefono','$especialidad','$registro','$password','doctor')";

    $ok = $objeto->query($sql);

    //Mensaje que notifica que el dato se ha guardado con exito
    echo "Dato Guardado Correctamente";
}

?>

</div>
<!--Inicio div Pie-->
        <div id="pie">
                <?php
                require_once("../../php/pie.php");
                ?>
        </div>
        <!--Fin div Pie-->

<!--Inicio div Contenido-->
</div>
</body>
</html>