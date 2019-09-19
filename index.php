<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Medical Social</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css"/>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
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

<!--INICIO DE LA CONEXIÓN A LA BASE DE DATOS-->
<?php
include("clase/conectar.php");
?> 

<div class="container" id="contenedor">


<!--INICIO DEL BANNER-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<div class="row-fluid"><!--ROW DEL FORM-->
<center><h2>BIENVENIDOS A MEDICAL SOCIAL</h2></center>
<center><img src="imagen/Banner.png" alt="Banner" height="100%"></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
</div><!--CIERRE CONTENIDO-->
<!--FIN DEL BANNER-->



<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<div class="row-fluid"><!--ROW DEL FORM-->
    
<h2>LOGIN</h2>

<table>
<form  enctype="multipart/form-data"  name="form_login" method="post">

            <tr>
            <td id="alinear">Nombre de Usuario o E-mail:</td>
            <td><input type="text" required name="nickname" id="nickname" /></td>
            </tr>

            <tr>
            <td  id="alinear">Contraseña:</td>
            <td><input type="password" required name="password" id="password" /></td>
            </tr>



            <tr>
            <td></td>
            <td>
            <button type="submit" name="boton" value="Entrar" class="btn-success">Entrar</button>
            <button type="reset" value="Borrar información" class="btn-success">Borrar</button>
            <button onClick="location.href = 'niveles/pacientes/agregar.php'" class="btn-success">Registrarme</button>
            </td>
            </tr>
</form>
</table>

<BR />

</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
</div><!--CIERRE CONTENIDO-->

<!--INICIO DE PIE-->
<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->
<div class="row-fluid"><!--ROW DEL FORM-->
<center><?php  include("php/pie.php");?></center>
</div><!--CIERRE DEL ROW DEL FORM-->
</div><!--CIERRE DEL SPAN WELL-->
</div><!--CIERRE CONTENIDO-->
<!--FIN DE PIE-->

</div><!-- DIV CONTENEDOR-->

</body>
</html>


<?php
/*Iniciamos las variables de sesión,
estas van a estar disponibles en 
cualquier parte del sistema, estas 
variables se eliminan cuando damos 
click en cerrar sesión o salir*/
session_start();

if(isset($_POST["boton"])){//Abrimos if isset
$nickname = $_POST["nickname"];
$password = md5($_POST["password"]);

$query = $conn->prepare("SELECT COUNT(dui) FROM pacientes WHERE nickname = '$nickname' and password = '$password'");
$query->execute();
$count = $query->fetchColumn();
$query2 = $conn->prepare("SELECT COUNT(dui) FROM admin WHERE nickname = '$nickname' and password = '$password'");
$query2->execute();
$count2 = $query2->fetchColumn();
$query3 = $conn->prepare("SELECT COUNT(id) FROM doctores WHERE email = '$nickname' and password = '$password'");
$query3->execute();
$count3 = $query3->fetchColumn();
$query4 = $conn->prepare("SELECT COUNT(dui) FROM pacientes WHERE email = '$nickname' and password = '$password'");
$query4->execute();
$count4 = $query4->fetchColumn();

//Verificamos si los datos enviados estan registrados en la base de datos
if($count == "1"){//Abrimos if count
          $_SESSION["nickname"]= $nickname;
          $_SESSION["valida"]="yes";
          $_SESSION["nivel"]= $nivel;
          header('location: niveles/pacientes/index.php');
}//Cerramos if count
elseif($count2 == "1"){//Abrimos if count
          $_SESSION["nickname"]= $nickname;
          $_SESSION["valida"]="yes";
          $_SESSION["nivel"]= $nivel;
          header('location: niveles/admin/index.php');
}//Cerramos if count
elseif($count3 == "1"){//Abrimos if count
          $_SESSION["email"]= $nickname;
          $_SESSION["valida"]="yes";
          $_SESSION["nivel"]= $nivel;
          header('location: niveles/doctores/index.php');
}//Cerramos if count
elseif($count4 == "1"){//Abrimos if count
          $_SESSION["email"]= $nickname;
          $_SESSION["valida"]="yes";
          $_SESSION["nivel"]= $nivel;
          header('location: niveles/pacientes/index.php');
}//Cerramos if count
else{//Mostramos mensaje que los datos ingresados no existen
        ?>
        <!--Aca estoy cerrando PHP y es puro HTML-->


        <script language="javascript" name="accion">alert("Datos Incorrectos")</script>


        <!--Aca estoy abriendo PHP-->
        <?php 
      }//Terminamos de mostrar el mensaje que los datos ingresados no existen
}//Cerramos if isset
?>