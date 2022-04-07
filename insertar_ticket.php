<?php
    $tram=isset($_POST["f_tramitante"]) ? $tram=strtoupper($_POST["f_tramitante"]) : $tram=null;
    $curp=isset($_POST["f_curp"]) ? $curp=strtoupper($_POST["f_curp"]) : $curp=null;
    $nomb=isset($_POST["f_nombre"]) ? $nomb=strtoupper($_POST["f_nombre"]) : $nomb=null;
    $pate=isset($_POST["f_paterno"]) ? $pate=strtoupper($_POST["f_paterno"]) : $pate=null;
    $mate=isset($_POST["f_materno"]) ? $mate=strtoupper($_POST["f_materno"]) : $mate=null;
    $tele=isset($_POST["f_telefono"]) ? $tele=strtoupper($_POST["f_telefono"]) : $tele=null;
    $celu=isset($_POST["f_celular"]) ? $celu=strtoupper($_POST["f_celular"]) : $celu=null;
    $corr=isset($_POST["f_correo"]) ? $corr=strtoupper($_POST["f_correo"]) : $corr=null;
    $edad=isset($_POST["f_edad"]) ? $edad=strtoupper($_POST["f_edad"]) : $edad=null;
    $muni=isset($_POST["f_municipio"]) ? $muni=strtoupper($_POST["f_municipio"]) : $muni=null;
    $asun=isset($_POST["f_asunto"]) ? $asun=strtoupper($_POST["f_asunto"]) : $asun=null;

    /*
    print $tram;
    exit;
    */
    
    if($_POST){
        require_once 'php/funciones_php.php';
        $errores=array();

        if(!validaRequerido($tram)){
            $errores[]="El campo tramitante llegó vacío";
        }
        if(!validaRequerido($curp)){
            $errores[]="El campo curp llegó vacío";
        }
        if(!validaRequerido($nomb)){
            $errores[]="El campo Nombre llegó vacío";
        }
        if(!validaRequerido($pate)){
            $errores[]="El campo paterno llegó vacío";
        }
        if(!validaRequerido($tele)){
            $errores[]="El campo telefono llegó vacío";
        }
        if(!validaRequerido($celu)){
            $errores[]="El campo celular llegó vacío";
        }
        if(!validaRequerido($corr)){
            $errores[]="El campo correo llegó vacío";
        }
        if(!validaRequerido($edad)){
            $errores[]="El campo edad llegó vacío";
        }
        if(!validarNumerico($muni)){
            $errores[]="El campo municipio llegó vacío";
        }
        if(!validarNumerico($asun)){
            $errores[]="El campo asunto llegó vacío";
        }
    }

    if(!$errores){
        include("class/class_ticket_turno.php");
        include("class/class_dal.php");
        $obj_ticket = new ticket_turno(NULL,$tram,$curp,$nomb,$pate,$mate,$tele,$celu,$corr,$edad,$muni,$asun);
        $metodos_ticket = new ticket_turno_dal;

        if($metodos_ticket->agregar($obj_ticket)==1){
            print "<h1>Ticket agregado Correctamente</h1>";
        }else{
            print "<h1>Error, vuelve a intentar</h1>";
        }
    }else{
        echo "<ul style='color_red',font-size=25px;>";
        foreach($errores as $error):
            echo "<li><h2>".$error."</h2></li>";
        endforeach;
        echo "</ul>";
    }
?>