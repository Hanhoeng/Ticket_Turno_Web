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
        <!--MENU PRINCIPAL-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <?php
                            include_once "inclusiones/menu_horizontal_superior.php";

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <!--END MENU PRINCIPAL-->
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
            <form name="forma" class="form" id="forma" action="insertar_ticket.php" method="POST" onsubmit="return valida_ticket();" accept-charset="utf-8">
                <!--TRAMITANTE Y CURP-->
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="tramitante">Nombre completo de quien realizará el trámite: </label>
                            </div>
                            <div class="col-md-7">
                                <input type="input" class="form-control" name="f_tramitante" id="f_tramitante" placeholder="Nombre tramitante">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="CURP">CURP:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="input" class="form-control" name="f_curp" id="f_curp" placeholder="CURP">
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
                                <input type="text" class="form-control" name="f_nombre" id="f_nombre" placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="paterno">Paterno: </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="f_paterno" id="f_paterno" placeholder="Paterno">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="materno">Materno: </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="f_materno" id="f_materno" placeholder="Materno">
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
                                <input type="text" class="form-control" name="f_telefono" id="f_telefono" placeholder="Teléfono">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="celular">Celular: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="f_celular" id="f_celular" placeholder="Celular">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="correo">Correo: </label>
                            </div>
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="f_correo" id="f_correo" placeholder="Correo">
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
                                <input type="text" class="form-control" name="f_edad" id="f_edad" placeholder="Edad">
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
                                    <option value="0">Seleccionar municipio</option>
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
                                    <option value="0">Seleccionar asunto</option>
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
                        <div class="col-md-2 col-sm-12"><input type="submit" value="Generar Turno"></div>
                        <div class="col-md-5 col-sm-12"></div>
                    </div>
                </div>
                <!--END BOTON-->                  
            </form>
        </div>
        <!--END FORMULARIO-->
        <?php 
            include_once "inclusiones/js_incluidos.php";
        ?>
    </body>
    <footer>
        <div class="row">
            <div class="col-md-4">
                <p>Se requiere un mecanismo de autenticación del documento</p>
                <p>Se requiere indicar el número de turno</p>
                <p>Se requiere control por oficina regional</p>
                <p>Se requiere parametrizar la antención por dias</p>
                <p>Se requiere generar comprobante pdf al usuario</p>
                <p>Se contempla que la mayoría de usuarios usan movil</p>
            </div>
            <div class="col-md-4">
                <img src="./img/barras.png" alt="código de barras"  width="400" height="200">
            </div>
            <div class="col-md-4">
                <img src="./img/codigoQR.png" alt="código de barras" width="400" height="400">
            </div>
        </div>
    </footer>
</html>