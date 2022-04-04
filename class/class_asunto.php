<?php
    if(class_exists('asunto')!=true){
        class asunto{
            protected $id_asunto;
            protected $asunto;

            public function __construct($id_asunto=NULL,$asunto=NULL)
            {
                $this->id_asunto=$id_asunto;
                $this->asunto=$asunto;
            }//end construct

            //getters
            public function getIdAsunto(){
                return $this->id_asunto;
            }
            public function getAsunto(){
                return $this->asunto;
            }
            
            //setters
            public function setIdAsunto($id_asunto){
                $this->id_asunto=$id_asunto;
                return $this;
            }
            public function setAsunto($asunto){
                $this->asunto=$asunto;
                return $this;
            }
        }//end class
    }//end void redefinition
?>