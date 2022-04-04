<?php
    if(class_exists('ticket_turno')!=true){
        class ticket_turno{
            protected $id_ticket;
            protected $tramitante;
            protected $curp;
            protected $nombre;
            protected $paterno;
            protected $materno;
            protected $telefono;
            protected $celular;
            protected $correo;
            protected $edad;
            protected $municipio;
            protected $asunto;

            public function __construct($id_ticket=NULL,$tramitante=NULL,$curp=NULL,$nombre=NULL,$paterno=NULL,$materno=NULL,$telefono=NULL,$celular=NULL,$correo=NULL,$edad=NULL,$municipio=NULL,$asunto=NULL)
            {
                $this->id_ticket=$id_ticket;
                $this->tramitante=$tramitante;
                $this->curp=$curp;
                $this->nombre=$nombre;
                $this->paterno=$paterno;
                $this->materno=$materno;
                $this->telefono=$telefono;
                $this->celular=$celular;
                $this->correo=$correo;
                $this->edad=$edad;
                $this->municipio=$municipio;
                $this->asunto=$asunto;
            }//end construct

            //getters
            public function getIdTicket(){
                return $this->id_ticket;
            }
            public function getTramitante(){
                return $this->tramitante;
            }
            public function getCurp(){
                return $this->curp;
            }
            public function getNombre(){
                return $this->nombre;
            }
            public function getPaterno(){
                return $this->paterno;
            }
            public function getMaterno(){
                return $this->materno;
            }
            public function getTelefono(){
                return $this->telefono;
            }
            public function getCelular(){
                return $this->celular;
            }
            public function getCorreo(){
                return $this->correo;
            }
            public function getEdad(){
                return $this->edad;
            }
            public function getMunicipio(){
                return $this->municipio;
            }
            public function getAsunto(){
                return $this->asunto;
            }

            //setters
            public function setIdTicket($id_ticket){
                $this->id_ticket=$id_ticket;
                return $this;
            }
            public function setTramitante($tramitante){
                $this->tramitante=$tramitante;
                return $this;
            }
            public function setCurp($curp){
                $this->curp=$curp;
                return $this;
            }
            public function setNombre($nombre){
                $this->nombre=$nombre;
                return $this;
            }
            public function setPaterno($paterno){
                $this->paterno=$paterno;
                return $this;
            }
            public function setMaterno($materno){
                $this->materno=$materno;
                return $this;
            }
            public function setTelefono($telefono){
                $this->telefono=$telefono;
                return $this;
            }
            public function setCelular($celular){
                $this->celular=$celular;
                return $this;
            }
            public function setCorreo($correo){
                $this->correo=$correo;
                return $this;
            }
            public function setEdad($edad){
                $this->edad=$edad;
                return $this;
            }
            public function setMunicipio($municipio){
                $this->municipio=$municipio;
                return $this;
            }
            public function setAsunto($asunto){
                $this->asunto=$asunto;
                return $this;
            }
        }//end class
    }//end void redefinition
?>