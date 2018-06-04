<?php

class Alumno
{
    protected $nombre="";
    protected $correo="";
    protected $sexo="";
    protected $edad="";


    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo=$correo;
    }
    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo=$sexo;
    }
  
    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($edad){
        $this->edad=$edad;
    }
   
}
?>