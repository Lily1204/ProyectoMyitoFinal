<?php
/*
Archivo:  Usuario.php
Objetivo: clase que encapsula la información de un usuario
Autor: lili
*/

include_once("AccesoDatos.php");
include_once("usuarios.php");

class Usuario{
	private $snombre = "";
	private $scorreo = "";
	private $usuariosA = null;
	private $oAD = null;

	public function getusuariosA(){
		return $this->usuariosA;
	}
	public function setusuarios($valor){
		$this->usuariosA = $valor;
	}

	public function getNombre(){
		return $this->snombre;
	}
	public function setNombre($valor){
		$this->snombre = $valor;
	}

	public function getCorreo(){
		return $this->scorreo;
	}
	public function setCorreo($valor){
		$this->scorreo= $valor;
	}
	
	public function buscarUsuario(){
	
	$bRet = false;
	$sQuery = "";
	$arrRS = null;
	
		if (($this->snombre =="" || $this->scorreo == "") )
	
			throw new Exception("Usuario->buscar: faltan datos");
			
		else{
			$sQuery = "SELECT correo
			FROM usuarios";
			
			//Crear, conectar, ejecutar, desconectar
		    
			$oAD = new AccesoDatos();
		
			if ($oAD->conectar()){
			 $arrRS = $oAD->ejecutarConsulta($sQuery);
			
			 $oAD->desconectar();
				
				if ($arrRS != null){
				echo "entro a esta parte";
					$this->usuariosA = new usuarios();
					$this->usuariosA ->setCorreo($arrRS[0][0]);
					$this->usuariosA->buscar();
					
					$bRet = true;
				}
			}
		
		}
		return $bRet;
	}
}
?>