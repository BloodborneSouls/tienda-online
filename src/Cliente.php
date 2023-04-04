<?php

namespace Utienda;

class Cliente{

    private $config;
    private $cn= null;

    public function __construct(){
        $this->config=parse_ini_file(__DIR__.'/../config.ini');

        $this->cn = new \PDO($this->config['dns'],$this->config['usuario'],
        $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));

    }

    public function registrar($_params){
        $sql = "INSERT INTO `clientes`(`nombre_u`, `apellidos`, `email`, `telefono`,`direccion`,`cp`,`comentario`) VALUES 
        (:nombre_u,:apellidos,:email,:telefono,:direccion,:cp,:comentario)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre_u" =>$_params['nombre_u'],
            ":apellidos" =>$_params['apellidos'],
            ":email" =>$_params['email'],
            ":telefono" =>$_params['telefono'],
            ":direccion"=>$_params['direccion'],
            ":cp"=>$_params['cp'],
            ":comentario" =>$_params['comentario']
        );

        if($resultado->execute($_array)){
            return $this->cn->lastInsertId();
        }else{
            return false;
        }

    }
    public function comentario(){
        $sql="SELECT nombre_u,apellidos,comentario FROM clientes LIMIT 5";
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();
        return false;

    }
}