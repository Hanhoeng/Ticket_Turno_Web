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
                <h1>Bienvenido</h1>
            </div>
            <div class="col-md-1"></div>
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
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <a class="btn btn-warning" href="Ticket_Turno.php" style="margin-left: 5px">Registrar ticket</a>
            </div>
            <div class="col-md-5"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <a class="btn btn-warning" href="buscar_Ticket.php" style="margin-left: 5px">Modificar ticket</a>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
    <!--FIN CUERPO MENÚ-->

    <?php 
            include_once "inclusiones/js_incluidos.php";
        ?>
</body>

</html>