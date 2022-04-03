<?php
    include_once 'class/class_dal.php';                     #se importa el archivo DAL del objeto
    
    $obj_ticket = new ticket_turno_dal;                     #se crea un objeto DAL
    $lista_tickets = $obj_ticket->obtener_lista_ticket();   #se obtiene la lista de tickets
?>

<!doctype html>
<html lang="en">

<head>
    <!-- CSS file -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>" />


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Datatables boostrap styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body style="color: white;">

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
        
        <!--END MENU PRINCIPAL-->

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3">Datatable</h1>
            <p class="lead">Lista de tickets</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id="FilmTable" class="table table-striped table-bordered" style="width:100%">
                    
                    <thead class="text-center">
                        <div class="row">
                            <div class="col-md-1"><th>ID_TICKET</th></div>
                            <div class="col-md-1"><th>TRAMITANTE</th></div>
                            <div class="col-md-1"><th>CURP</th></div>
                            <div class="col-md-1"><th>NOMBRE</th></div>
                            <div class="col-md-1"><th>PATERNO</th></div>
                            <div class="col-md-1"><th>MATERNO</th></div>
                            <div class="col-md-1"><th>TELEFONO</th></div>
                            <div class="col-md-1"><th>CELULAR</th></div>
                            <div class="col-md-1"><th>CORREO</th></div>
                            <div class="col-md-1"><th>EDAD</th></div>
                            <div class="col-md-1"><th>ID_MUNICIPIO</th></div>
                            <div class="col-md-1"><th>ID_ASUNTO</th></div>
                        </div>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($lista_tickets as $ticket){   #Sentencia foreach para acceder a los valores de "lista_tickets"
                        ?>
                        <tr>
                            <td><?php echo $ticket->getIdTicket();?> </td>
                            <td><?php echo $ticket->getTramitante();?> </td>
                            <td><?php echo $ticket->getCurp();?> </td>
                            <td><?php echo $ticket->getNombre();?></td>
                            <td><?php echo $ticket->getPaterno();?> </td>
                            <td><?php echo $ticket->getMaterno();?> </td>
                            <td><?php echo $ticket->getTelefono();?> </td>
                            <td><?php echo $ticket->getCelular();?> </td>
                            <td><?php echo $ticket->getCorreo();?> </td>
                            <td><?php echo $ticket->getEdad();?> </td>
                            <td><?php echo $ticket->getMunicipio();?> </td>
                            <td><?php echo $ticket->getAsunto()?> </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Datatable basicstyles -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>


    <script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#FilmTable thead tr')

            .clone(true)
            .addClass('filters')
            .appendTo('#FilmTable thead');

        var table = $('#FilmTable').DataTable({
            
            responsive: true,
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();

                // Para cada columna
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title +  //input de la columna
                            '"style="color:black"/>');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('keyup change', function(e) {
                                e.stopPropagation();

                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                    '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value +
                                            ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();

                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
    </script>

</body>

</html>