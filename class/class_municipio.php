<?php
    if(class_exists('municipio')!=true){
        class municipio{
            protected $id_municipio;
            protected $municipio;

            public function __construct($id_municipio=NULL,$municipio=NULL)
            {
                $this->id_municipio=$id_municipio;
                $this->municipio=$municipio;
            }//end construct

            //getters
            public function getIdMunicipio(){
                return $this->id_municipio;
            }
            public function getMunicipio(){
                return $this->municipio;
            }
            
            //setters
            public function setIdMunicipio($id_municipio){
                $this->id_municipio=$id_municipio;
                return $this;
            }
            public function setMunicipio($municipio){
                $this->municipio=$municipio;
                return $this;
            }
        }//end class
    }//end void redefinition
?>