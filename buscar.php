<?php
    $curp=isset($_POST["f_curp"]) ? $curp=strtoupper($_POST["f_curp"]) : $curp=null;
    $ticketId=isset($_POST["f_ticket_id"]) ? $pass=strtoupper($_POST["f_ticket_id"]) : $ticketId=null;
    if($_POST){
        require_once 'php/funciones_php.php';
        $errores=array();

        if(!validaRequerido($curp)){
            $errores[]="Usuario llegó vacío";
        }
        if(!validaRequerido($ticketId)){
            $errores[]="Contraseña llego vacío";
        }
    

?>

<?php
    if(!$errores){
        include("class/class_ticket_turno.php");
        include("class/class_dal.php");
        $metodos_tickets = new ticket_turno_dal;

        $obj_ticket = $metodos_tickets->ticket_por_id_y_curp($ticketId,$curp);
        
        if($obj_ticket!=NULL){
            include_once "inclusiones/css_y_favicon.php";

            
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
        
        <!--IMAGEN Y TITULO-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                    <img src="img/Logo-sep2007.jpg" alt="Logo SEP 2007" width="50" height="50">
                </div>
                <div class="col-md-11">
                    <h1>Ticket de turno</h1>
                </div>
            </div>
        </div>
        <br>
        <!--END IMAGEN Y TITULO-->
 <!--FORMULARIO-->
 <div class="container-fluid">
            <form name="forma" class="form" id="forma" action="actualiza_ticket.php" method="POST" onsubmit="return valida_ticket();" accept-charset="utf-8">
                <!--TRAMITANTE Y CURP-->
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="tramitante">Nombre completo de quien realizará el trámite: </label>
                            </div>
                            <div class="col-md-7">
                                <input type="input" class="form-control" name="f_tramitante" id="f_tramitante" value="<?=$obj_ticket->getTramitante(); ?>">
                                <input type="hidden" style="display:hidden;" class="form-control" name="f_id_ticket" id="f_id_ticket" value="<?=$obj_ticket->getIdTicket(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="CURP">CURP:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="input" class="form-control" name="f_curp" id="f_curp" value="<?=$obj_ticket->getCurp(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END TRAMITANTE Y CURP-->
                <!--NOMBRE PATERNO Y MATERNO-->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nombre">Nombre: </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="f_nombre" id="f_nombre" value="<?=$obj_ticket->getNombre(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="paterno">Paterno: </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="f_paterno" id="f_paterno" value="<?=$obj_ticket->getPaterno(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="materno">Materno: </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="f_materno" id="f_materno" value="<?=$obj_ticket->getMaterno(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END NOMBRE PATERNO Y MATERNO-->
                <!--TELEFONO CELULAR Y CORREO-->
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="telefono">Teléfono: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="f_telefono" id="f_telefono" value="<?=$obj_ticket->getTelefono(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="celular">Celular: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="f_celular" id="f_celular" value="<?=$obj_ticket->getCelular(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="correo">Correo: </label>
                            </div>
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="f_correo" id="f_correo" value="<?=$obj_ticket->getCorreo(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END TELEFONO CELULAR Y CORREO-->
                <!--EDAD-->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="edad">¿Qué edad tiene el alumno?</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="f_edad" id="f_edad" value="<?=$obj_ticket->getEdad(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END EDAD-->
                <!--MUNICIPIO-->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <?php
                                    $obj_lista_municipios = new municipio_dal;
                                    $lista_municipios = $obj_lista_municipios->obtener_lista_municipio();
                                    /*echo '<pre>';
                                    print_r($lista_municipios);
                                    echo '</pre>';*/
                                    //return false;
                                    if($lista_municipios==NULL){
                                            print "<h2>No se encontraron municipios</h2>";
                                    }else{
                            ?>
                            <div class="col-md-3">
                                <label for="municipio">Municipio donde desea estudiar el alumno:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="f_municipio" id="f_municipio">
                                    <option value="0"><?=$obj_ticket->getMunicipio(); ?></option>
                                    <?php
                                        foreach ($lista_municipios as $key => $values){
                                    ?>
                                    <option value="<?=$values->getIdMunicipio();?>"><?=utf8_encode($values->getMunicipio());?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!--END MUNICIPIO-->
                <!--ASUNTO-->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <?php
                                    $obj_lista_asunto = new asunto_dal;
                                    $lista_asuntos = $obj_lista_asunto->obtener_lista_asunto();
                                    /*echo '<pre>';
                                    print_r($lista_municipios);
                                    echo '</pre>';*/
                                    //return false;
                                    if($lista_asuntos==NULL){
                                            print "<h2>No se encontraron asuntos</h2>";
                                    }else{
                            ?>
                            <div class="col-md-3">
                                <label for="asunto">Seleccione el asunto que va a tratar:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="f_asunto" id="f_asunto">
                                    <option value="0"><?=$obj_ticket->getAsunto(); ?></option>
                                    <?php
                                        foreach ($lista_asuntos as $key => $values){
                                    ?>
                                    <option value="<?=$values->getIdAsunto();?>"><?=utf8_encode($values->getAsunto());?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!--END ASUNTO-->
                <!--BOTON-->
                <div class="form-group col-md-12">
                    <div class="row">
                        <div class="col-md-5 col-sm-12"></div>
                        <div class="col-md-2 col-sm-12"><input type="submit" value="Modificar"></div>
                        <div class="col-md-5 col-sm-12"></div>
                    </div>
                </div>
                <!--END BOTON-->                  
            </form>
        </div>
        <!--END FORMULARIO-->

        <br>
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <p style="text-align: center"><a class="btn btn-warning" id="btnCrearPdf" style="margin-left: 5px">Imprimir pdf de usuario</a></p>
            </div>
            <div class="col-sm-4"></div>
        </div>
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
<?php
            
        }
    }else{
        echo "<ul style='color_red',font-size=25px;>";
        foreach($errores as $error):
            echo "<li><h2>".$error."</h2></li>";
        endforeach;
        echo "</ul>";
    }
}
?>

