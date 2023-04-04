<?php

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nombre_user = $_POST['nombre_user'];
    $clave = $_POST['clave'];
    
    require '../vendor/autoload.php';
    $usuario = new Utienda\Usuario;
    $resultado = $usuario->login($nombre_user, $clave);

    if($resultado){

        session_start();

        $_SESSION['usuario_info'] = array(
            'nombre_user'=>$resultado['nombre_user'],
            'estado'=>1
        );


        header('Location: dashboard.php');
    }else{
        exit(json_encode(array('estado'=>FALSE,'mensaje'=>'Error al iniciar sesion')));
    }

}