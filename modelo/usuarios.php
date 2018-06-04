<?php
/*
Archivo:  usuasrios.php
Objetivo: clase que encapsula la información del aulumno
Autor: liliana   
*/
include_once("AccesoDatos.php");
include_once("Alumno.php");

class usuarios extends Alumno{
	protected $actividad="";
	protected  $correo="";
	
	//Constantes para mejor lectura de código
   

	/*Busca por clave, regresa verdadero si lo encontró*/
	function buscar(){

	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$bRet = false;
		if ($this->correo=="")
			throw new Exception("usuarios->buscar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = " SELECT correo, nombre,edad, sexo
								  
							FROM usuarios
							WHERE correo = ".$this->correo;
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					$this->correo = $arrRS[0][0];
					
					$this->nombre = $arrRS[0][1];
					$this->edad = $arrRS[0][2];
					$this->sexo = $arrRS[0][4];
					
					
					$bRet = true;
				}
			} 
		}
		return $bRet;
	}
	/*Insertar, regresa el número de registros agregados*/
	function insertar(){
		
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->correo == "" OR $this->correo == ""  OR $this->edad =="")
			throw new Exception("usuarios->insertar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "INSERT INTO usuarios (correo, nombre, edad) 
					VALUES ('".$this->correo."', '".$this->nombre."', 
					".($this->edad=="');");
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();			
			}
		}
		return $nAfectados;
	}
	/*Modificar, regresa el número de registros modificados*/
	function modificar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->nIdPersonal==0 OR $this->sNombre == "" OR $this->sApePat == "" OR 
		    $this->sSexo == "" OR $this->nTipo == 0 OR $this->dFechaNacim==null)
			throw new Exception("PersonalHospitalario->modificar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "UPDATE usuarios 
					SET correo= '".$this->correo."' , 
					nombre= '".$this->nombre."' , 
					edad = '".$this->edad."', 
					sexo = ".$this->sexo."
					WHERE correo = ".$this->correo;
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}
	
	/*Borrar, regresa el número de registros eliminados*/
	function borrar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->correo==0)
			throw new Exception("usuarios->borrar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "DELETE FROM usuarios  
							WHERE correo = ".$this->correo;
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}
	
	/*Busca todos los registros del personal hospitalario, 
	 regresa falso si no hay información o un arreglo de PersonalHospitalario*/
	function buscarTodos(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$aLinea=null;
	$j=0;
	$usuarioA=null;
	$arrResultado=false;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT correo,nombre, sexo,edad
			 				FROM usuarios 
				ORDER BY correo";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $aLinea){
					$oPersHosp = new usuario();
					$oPersHosp->setCorreo($aLinea[0]);
					$oPersHosp->seNombre($aLinea[1]);
					$oPersHosp->setEda($aLinea[2]);
					$oPersHosp->setSexo($aLinea[3]);
            		$arrResultado[$j] = $oPersHosp;
					$j=$j+1;
                }
			}
			else
				$arrResultado = false;
        }
		return $arrResultado;
	}
}
?>