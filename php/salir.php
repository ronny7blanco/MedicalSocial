
<?php 
@session_destroy();
$msj = base64_encode("Su sesion ha sido finalizada");
?>
<script language="javascript">
location.href='index.php?salida=<?php echo $msj;?>';

</script>


<?php
  session_start();
  unset($_SESSION["nombre"]);
  unset($_SESSION["nivel"]);
  session_destroy();
  header("Location: ../index.php");
  exit;
?>