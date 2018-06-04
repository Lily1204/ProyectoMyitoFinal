<?php
/*
Archivo:  resABC.php
Objetivo: ejecuta la afectación al personal y retorna a la pantalla de consulta general
Autor:  BAOZ  
*/
include_once("modelo\usuarios.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = "";
$usuariosA = new usuarios();

	/*Verificar que exista la sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		/*Verifica datos de captura mínimos*/
		if (isset($_POST["txtCorreo"]) && !empty($_POST["txtCorreo"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$correo = $_POST["txtCorreo"];
			$usuarioA->setCorreo($correo);
			
			if ($sOpe != "b"){
				$usuarioA->setNombre($_POST["txtNombre"]);
				$oPersHosp->setApePat($_POST["txtCorreo"]);
				$oPersHosp->setEdad($_POST["txtEdad"]);
				$oPersHosp->setSexo($_POST["rbSexo"]);
		
			}
			try{
				if ($sOpe == 'a')
					$nResultado = $oPersHosp->insertar();
				else if ($sOpe == 'b')
					$nResultado = $oPersHosp->borrar();
				else 
					$nResultado = $oPersHosp->modificar();
				
				if ($nResultado != 1){
					$sError = "Error en bd";
				}
			}catch(Exception $e){
				//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
				error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
				$sErr = "Error en base de datos, comunicarse con el administrador";
			}
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: tabpersonal.php");
	else
		header("Location: error.php?sError=".$sErr);
	exit();
?>