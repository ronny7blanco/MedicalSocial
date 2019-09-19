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

$dui2=$_GET['dui'];

require_once("../../clases/valida.php");
require_once("../../clases/conectar.php");

$query="SELECT * FROM pacientes where dui='$dui2' ";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
require_once("../../clases/login.php");
$objeto = new conexion();
$objeto->conexion();

?>

        <div  id="contenedor">
        <div  id="encabezado"><img src="../../imagen/Banner.jpg" alt="" width="900px" height="230px"  /> </div>
        <div  id="contenido">
        <h1   id="h1">Pacientes - Editar</h1>
        <div>

        <table>
        <form  enctype="multipart/form-data"  name="form_login" method="post">

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
            <td  id="alinear">Contraseña:</td>
            <td><input type="text" required name="password" id="password" value="<?php echo $row['password']; ?>"/></td>
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
<?php

//Variables las cuales serán llenadas con los datos del formulario
$sql="";
$dui="";
$nombre="";
$apellido="";
$nit="";
$direccion="";
$telefono="";
$email="";
$password="";
$genero="";
$estado_civil="";

//Inicio del boton del formulario
 if(isset($_POST["boton"])==true)
  {
    $dui = $_POST["dui"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nit = $_POST["nit"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $genero = $_POST["genero"];
    $estado_civil = $_POST["estado_civil"];


    //Sentencia SQL que se ejecuta, se agregan los campos del formulario a los campos de la tabla de la base de datos
    $sql="UPDATE pacientes SET dui='$dui', nombre='$nombre', apellido='$apellido', nit='$nit', direccion='$direccion', telefono='$telefono', email='$email', password='$password', genero='$genero', estado_civil='$estado_civil' where dui='$dui'";

    $ok = $objeto->query($sql);



    ?>
    <script language="javascript">
    alert("Actualizado Correctamente"); 
    location.href='index.php';
    </script>
    <?php
}
?>

        

</div>
</div>
</div>
</body>
</html>