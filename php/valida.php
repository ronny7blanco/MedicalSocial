<?php
session_start();
$msj = base64_encode("Usted no ha iniciado sesión");

if(!isset($_SESSION["valida"]) && !isset($_SESSION["valida"])=="yes")
{
	?>
<script language="javascript">
location.href='../../index.php?error=<?php echo $msj;?>';
alert('Usted no ha iniciado sesión')
</script>
<?php
}
?>

