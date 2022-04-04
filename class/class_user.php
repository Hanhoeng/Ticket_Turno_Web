<?php
    if(class_exists('usuario')!=true){
        class usuario{
            protected $id_usuario;
            protected $usuario;
            protected $password;

            public function __construct($id_usuario=NULL,$usuario=NULL,$password=NULL)
            {
                $this->id_usuario=$id_usuario;
                $this->usuario=$usuario;
                $this->password=$password;
            }//end construct

            //getters
            public function getIdUsuario(){
                return $this->id_usuario;
            }
            public function getUsuario(){
                return $this->usuario;
            }
            public function getPassword(){
                return $this->password;
            }
            
            //setters
            public function setIdUsuario($id_usuario){
                $this->id_usuario=$id_usuario;
                return $this;
            }
            public function setUsuario($usuario){
                $this->usuario=$usuario;
                return $this;
            }
            public function setPassword($password){
                $this->password=$password;
                return $this;
            }
        }//end class
    }//end void redefinition
?>