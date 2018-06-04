<?php
/*
Archivo:  resABC.php
Autor:  BAOZ  
*/
include_once("usuarios.php");
session_start();

$sErr=""; $snombre = ""; $correo = ""; $nResultado="";$sexo = "";$edad = "";
$usuarios = new usuarios();

	/*Verificar que exista la sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		/*Verifica datos de captura mínimos*/
		if (isset($_POST["correo"]) && !empty($_POST["correo"]) &&
			isset($_POST["nombre"]) && !empty($_POST["nombre"])){
			$snombre = $_POST["nombre"];
			$correo = $_POST["correo"];
			$edad = $_POST["edad"];

			$usuarios->setCorreo($correo);
			$usuarios->setNombre($snombre);
			$usuarios->setEdad($edad);
					$nResultado = $usuarios->insertar();
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: ../Public/views/login.php");
	else
		header("Location: error.php?sError=".$sErr);
	exit();
?>