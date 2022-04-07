<?php
    $idti=isset($_POST["f_id_ticket"]) ? $idti=strtoupper($_POST["f_id_ticket"]) : $idti=null;
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
    print $idti;
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
        $obj_ticket = new ticket_turno($idti,$tram,$curp,$nomb,$pate,$mate,$tele,$celu,$corr,$edad,$muni,$asun);
        $metodos_ticket = new ticket_turno_dal;

        if($metodos_ticket->agregar($obj_ticket)==1){
            
        }else{
           
        }
    }else{
        echo "<ul style='color_red',font-size=25px;>";
        foreach($errores as $error):
            echo "<li><h2>".$error."</h2></li>";
        endforeach;
        echo "</ul>";
    }
?>
<?php
    include("class/class_dal_asunto.php");
    include("class/class_dal_municipio.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "inclusiones/meta_tags.php";?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets de turno</title>
    <link rel="stylesheet" href="css/estilos.css">
    
    <?php
            include_once "inclusiones/css_y_favicon.php";
        ?>
</head>

<body>
    <br>
    <!--IMAGEN Y TITULO-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <img src="img/Logo-sep2007.jpg" alt="Logo SEP 2007" width="50" height="50">
            </div>
            <div class="col-md-10">
                <h1>Verifica correctamente tus datos!</h1>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

<?php
    $id_ticket = $metodos_ticket->obtener_ultimo();
?>
<!--Numero ticket-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Número de ticket:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $id_ticket;
echo "</p>";
?>          </div>
            <div class="col-md-3"></div>
        </div>
<!--Tramitante-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Tramitante:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $tram;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--curp-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">CURP:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $curp;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--nombre-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Nombre:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $nomb;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--paterno-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Paterno:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $pate;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--materno-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Materno:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $mate;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--telefono-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Telefono:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $tele;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--celular-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Celular:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $celu;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--correo-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Correo:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $corr;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--edad-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Edad:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $edad;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--municipio-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Municipio:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $muni;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
<!--asunto-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="Id ticket">Asunto:</label>
            </div>
            <div class="col-md-3">
<?php
echo "<p>";
echo $asun;
echo "</p>";
?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!--END IMAGEN Y TITULO-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!--CUERPO MENÚ-->
    <div class="container-fluid">
    <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <p style="text-align: center"><a class="btn btn-warning" id="btnCrearPdf" style="margin-left: 5px">Imprimir pdf de usuario</a></p>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <!--FIN CUERPO MENÚ-->

    <?php 
            include_once "inclusiones/js_incluidos.php";
        ?>
</body>

</html>

<?php
	//Agregamos la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";    
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'test.png';

        //Parametros de Condiguración
	
	$tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	$contenido = "$curp"; //Texto
	
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
        //Mostramos la imagen generada
	echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
?>