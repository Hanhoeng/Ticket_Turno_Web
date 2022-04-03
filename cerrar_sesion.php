<?php
session_start();
session_destroy();
?>

<html>
    <head>
        <?php include_once 'inclusiones/meta_tags.php';?>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content="IE=edge">
        <meta name='viewport' content="width=device-width, initial-scale=1.0">
        <title>Tickets de turno</title>
        <link rel="stylesheet" href="css/estilos.css">
        <?php
            include_once "inclusiones/css_y_favicon.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Sesion cerrada con éxito!</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <a class="btn btn-warning" href="index.php" style="margin-left: 5px">Regresar</a>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>