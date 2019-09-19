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

<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->

        <div><h4>Introduzca Especialidad:</h4></div>

        <!--INICIO FORMULARIO BUSQUEDA-->
        <form method="POST">
            <input type="text" name="buscar">
            <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
        </form>
        <!--FIN FORMULARIO BUSQUEDA-->

        <!--INICIO mostrar resultado de busqueda-->
        <?php
        if($_GET)
{
    try{
            //
            $dato = $_POST["buscar"];
            $sentencia = $conn->query("SELECT * FROM doctores WHERE especialidad LIKE '%$dato%'");
            $row_count = $sentencia->rowCount();
            $n=0;

            ?>
                <table id="table">
                <tr>
                   <th width="3%">N°</th>
                   <th width="10%">Nombre</th>
                   <th width="10%">Apellido</th>
                   <th width="10%">Especialidad</th>
                </tr>
            <?php
        while($row=$sentencia->fetch(PDO::FETCH_ASSOC))
            {
            $n=$n+1;
            ?>

            <tr>
                   <td><?=$n;?></td>
                   <td><?=$row["nombre"];?></td>
                   <td><?=$row["apellido"];?></td>
                   <td><?=$row["especialidad"];?></td>
            </tr>
                <?php
        }
            ?>
              
            </table><?php
    }
    catch(PDOException$e)
    {
        echo "Error:".$e->getMessage();
    }
    $conn = null;
    //Cerramos la conexión
}

        if(isset($_POST["buscar"])){
        try{
            //
            $dato = $_POST["buscar"];
            $sentencia = $conn->query("SELECT * FROM doctores WHERE especialidad LIKE '%$dato%'");
            $row_count = $sentencia->rowCount();
            $n=0;

            ?>
                <table  class="table table-bordered table-hover">
                <tbody>
                <tr>
                   <th width="3%">N°</th>
                   <th width="10%">Nombre</th>
                   <th width="10%">Apellido</th>
                   <th width="10%">Especialidad</th>
                </tr>

            <?php
            while($row=$sentencia->fetch(PDO::FETCH_ASSOC))
            {
            $n=$n+1;
           ?>

            <tr>
                   <td><?=$n;?></td>
                   <td><?=$row["nombre"];?></td>
                   <td><?=$row["apellido"];?></td>
                   <td><?=$row["especialidad"];?></td>
            </tr>
                <?php
            }
            ?>
            </tbody>  
            </table><?php
        }

        catch(PDOException$e)
        {
            echo "Error:".$e->getMessage();
        }
    $conn=null;
    //Cerramos la conexión
        }
        ?>
        <!--FIN mostrar resultado de busqueda-->

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
</div><!-- DIV CONTENEDOR-->
</body>
</html>