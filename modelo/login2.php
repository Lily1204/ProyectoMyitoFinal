<?php

/*
Archivo:  login2.php
Objetivo: verifica clave y contraseña contra repositorio a través de clases
Autor:  Lili
*/
include_once("Usuario.php");
session_start();

$sErr="";
$scorreo="";
$sNom="";
$snombre="";	
$oUsu = new Usuario();


	/*Verificar que hayan llegado los datos*/
	if (isset($_POST["correo"]) && !empty($_POST["correo"]) &&
		isset($_POST["nombre"]) && !empty($_POST["nombre"])){
			
		$scorreo = $_POST["correo"];
        $snombre = $_POST["nombre"];
		$oUsu->setCorreo($scorreo);
		$oUsu->setNombre($snombre);
	
		
		try{
			if ( $oUsu->buscarUsuario() ){
				$sNom = $oUsu->getusuariosA()->getNombre();
			}
			else{
				$sErr = "Usuario desconocido";
		   }	

		}catch(Exception $e){
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error al acceder a la base de datos";
		}
	}
	else
		$sErr = "Faltan datos";
	
	if ($sErr == ""){
	//	header("Location: ../Public/views/elegir.php");
	}
	else
	header("Location: error.php?sError=".$sErr);
?>