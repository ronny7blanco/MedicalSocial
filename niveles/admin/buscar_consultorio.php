<?php require_once("../../php/valida.php"); ?>
<!--Llamamos la a valida el cual contiene la informacion del usuario que a abierto sesión-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultorios | Medical Social</title>
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

$nickname =$_SESSION["nickname"];
//Seleccionamos los campos de la tabla que necesitamos
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
<!--FIN DEL BANNER-->

<!--INICIO DE MENU-->
<center><?php  require_once("../../php/menu_admin.php"); ?></center><br>
<!--FIN DE MENU-->


<div class="row-fluid" ><!--contenido-->
<div class="well" > <!-- SPAN WELL -->

<h2>LISTA DE CONSULTORIOS</h2>

        <div><h4>Introduzca Dirección:&nbsp;&nbsp;&nbsp;<a href="agregar_consultorio.php">Agregar Consultorio</a></h4></div>


        <!--INICIO FORMULARIO BUSQUEDA-->
        <form method="POST">
            <input type="text" name="buscar">
            <input type="submit" name="enviar" value="Buscar">
        </form>
        <!--FIN FORMULARIO BUSQUEDA-->

        <!--INICIO mostrar resultado de busqueda-->
        <?php
        if($_GET)
{
    try{
            //
            $dato = $_POST["buscar"];
            $sentencia = $conn->query("SELECT * FROM consultorio WHERE direccion LIKE '%$dato%'");
            $row_count = $sentencia->rowCount();
            $n=0;

            ?>
                <table class="table table-bordered table-hover">
                <tr>
                   <th width="3%">N°</th>
                   <th width="10%">Dirección</th>
                   <th width="10%">Planta</th>
                   <th width="10%">Número de Local</th>
                   <th width="10%">Teléfono</th>
                   <th width="10%">Mantenimiento</th>
                </tr>
            <?php
        while($row=$sentencia->fetch(PDO::FETCH_ASSOC))
            {
            $n=$n+1;
            ?>

            <tr>
                   <td><?=$n;?></td>
                   <td><?=$row["direccion"];?></td>
                   <td><?=$row["planta"];?></td>
                   <td><?=$row["numero_local"];?></td>
                   <td><?=$row["telefono"];?></td>
                   <td><a href="eliminar_doctor.php?id=<?php echo $row["id"];?>">Eliminar</a>&nbsp; 
                    <a href="../admin/editar_consultorio.php?id=<?php echo $row["id"];?>">Editar</a></td>
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
            $sentencia = $conn->query("SELECT * FROM consultorio WHERE direccion LIKE '%$dato%'");
            $row_count = $sentencia->rowCount();
            $n=0;

            ?>
                <table class="table table-bordered table-hover">
                <tr>
                   <th width="3%">N°</th>
                   <th width="10%">Dirección</th>
                   <th width="10%">Planta</th>
                   <th width="10%">Número de Local</th>
                   <th width="10%">Teléfono</th>
                   <th width="10%">Mantenimiento</th>
                </tr>
            <?php
            while($row=$sentencia->fetch(PDO::FETCH_ASSOC))
            {
            $n=$n+1;
           ?>

            <tr>
                   <td><?=$n;?></td>
                   <td><?=$row["direccion"];?></td>
                   <td><?=$row["planta"];?></td>
                   <td><?=$row["numero_local"];?></td>
                   <td><?=$row["telefono"];?></td>
                   <td><a href="eliminar_consultorio.php?id=<?php echo $row["id"];?>">Eliminar</a>&nbsp; 
                    <a href="../admin/editar_consultorio.php?id=<?php echo $row["id"];?>">Editar</a></td>
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

</div>
</body>
</html>