<?php
$servername="localhost";
$username="ronny";
$password="Laboratorio19";
$dbname="medicalsocial_db";
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Escribimos que la conexión está establecida


		$dbh=null;
	}
catch (PDOException $e)
	{
		print "Error!:" . $e->getMessage() . "<br/>";
		die();
	}

?>