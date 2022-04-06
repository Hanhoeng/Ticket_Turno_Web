<?php
    include("class/class_dal.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "inclusiones/meta_tags.php";?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ticket de turno</title>
        <link rel="stylesheet" href="css/estilos.css">
        <?php
            include_once "inclusiones/css_y_favicon.php";
        ?>
    </head>

    <body>
        <!-- Menu Principal -->
    <div class="container" style="margin-top:50px;">
        <div class="buscar-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Buscar Ticket</h2>
                    <p>Ingresa CURP y número de ticket</p>
                </div>
                <!-- Formulario -->
                <form id="Buscar" method="post" action="buscar.php" onsubmit="return validaCampo();" >
                    <!-- Curp -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="f_curp" name="f_curp" placeholder="CURP">
                    </div>
                    <!-- Id ticket -->
                    <div class="form-group">
                        <input type="number" class="form-control" id="f_ticket_id" name="f_ticket_id" placeholder="Número de Ticket">
                    </div>
                    <!--BOTON-->
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-12"></div>
                            <div class="col-md-2 col-sm-12"><input type="submit" href="modificar_Ticket.php" style="margin-left: 5px" value="Continuar"></div>
                            <div class="col-md-5 col-sm-12"></div>
                        </div>
                    </div>
                <!--END BOTON-->   
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once "inclusiones/js_incluidos.php";
    ?>

    
    </body>
</html>