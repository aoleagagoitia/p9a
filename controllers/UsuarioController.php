<?php

class usuarioController{

    public function index(){
        echo "Controlador Usuarios, Acción index";
    }

    public function registro(){ //Lo que vamos a ver en la URL
        require_once 'views/usuario/registro.php'; //Cargo vista

    }

    public function save(){ //Para guardar el usuario
        if(isset($_POST)){
            var_dump($_POST);
        }

    }
}