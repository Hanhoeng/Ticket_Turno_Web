<!DOCTYPE html>
<html>
<head>
    <?php include_once "inclusiones/meta_tags.php"; ?>
    <title>Catálogo de Cursos</title>
    <?php include_once "inclusiones/css_y_favicon.php"; ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php
        include_once "inclusiones/menu_horizontal_superior.php";
        ?>
    </div>
</div>


<!--<div class="container-fluid">  -->
<div class="container" style="margin-top: 65px !important;">  
<div class="form-group">
<legend class="text-center header"><h2>Lista de cursos para capacitación</h2></legend>
</div>

<?php  
include("class/class_dal.php");
$obj_dato_catalogo_cursos=new ticket_turno_dal;

$result_dato_catalogo_cursos=$obj_dato_catalogo_cursos->obtener_lista_ticket();

    if ($result_dato_catalogo_cursos==NULL){

            print "<p>No se encontraron resultados de tickets</p>";
        }
        else{
/*
            print '<pre>';
            print_r($result_dato_catalogo_cursos);
            print '</pre>';
            return;
            */
?> 
<!--<table id="lista_tickets" class="table table-striped table-bordered text-center" border="0">-->
<div class="form-group col-md-12">

                    <div align="center">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Agregar Ticket</button>  
                     </div> 


<table id="lista_tickets" class="table table-striped table-bordered" border="0">

							<thead class="text-capitalize">
                                            <tr>
                                                <th>ID_TICKET</th>
                                                <th>TRAMITANTE</th>
                                                <th>CURP</th>
                                                <th>NOMBRE</th>
                                                <th>PATERNO</th>
                                                <th>MATERNO</th>
                                                <th>TELEFONO</th>
                                                <th>CELULAR</th>
                                                <th>CORREO</th>
                                                <th>EDAD</th>
                                                <th>ID_MUNICIPIO</th>
                                                <th>ID_ASUNTO</th>
                                                <th>ACTUALIZAR</th> 
                                                <th>VER</th> 
                                                <th>ELIMINAR</th>

                                            </tr>
                             </thead>
                            <tbody>
		<?php
    						foreach ($result_dato_catalogo_cursos as $key => $value) {
		?>
    						<tr>
								<td><?=$value->getIdTicket();?></td>
								<td><?=($value->getTramitante());?></td>
                                <td><?=$value->getCurp();?></td>
                                <td><?=$value->getNombre();?></td>
                                <td><?=$value->getPaterno();?></td>
                                <td><?=$value->getMaterno();?></td>
                                <td><?=$value->getTelefono();?></td>
                                <td><?=$value->getCelular();?></td>
                                <td><?=$value->getCorreo();?></td>
                                <td><?=$value->getEdad();?></td>
                                <td><?=$value->getMunicipio();?></td>
                                <td><?=$value->getAsunto();?></td>
<td>
<button class='update btn btn-success btn-sm' id='update_<?= $value->getIdTicket() ?>' data-id='<?= $value->getIdTicket() ?>' >Actualizar</button>
</td>

<td>
<button class='ver btn btn-warning btn-sm' id='ver_<?= $value->getIdTicket() ?>' data-id='<?= $value->getIdTicket() ?>' >Ver</button></td>

<td>
<button class='delete btn btn-danger btn-sm' id='del_<?= $value->getIdTicket() ?>' data-id='<?= $value->getIdTicket() ?>' >Eliminar</button>
</td>

    						</tr>
        <?php
        }//cierre de foreach lista de personas
         ?>
                            </tbody>                             

</table>
</div>


<?php

        }

?>

<?php include_once "inclusiones/js_incluidos.php"; ?>

</div><!-- end container -->  

<script>
 $(document).ready(function() {
 

    if ($('#lista_tickets').length) {
        //$('#lista_tickets').DataTable();

$('#lista_tickets').DataTable( {
        
dom: 'Blfrtip',
        buttons: [{
            extend: 'excelHtml5',
                messageTop: 'Direccion De Ecología',
                text:"Exporta Excel",
                title:"Listado de tickets",
        },
        {
            /*'csvHtml5',*/
                extend: 'csvHtml5',
                text:"Exporta csv",
                title:"Listado de tickets",
                messageTop: 'Direccion De Ecología',
              },
                          {
                extend: 'pdfHtml5',
                title: 'Listado de tickets'
            }
        ],
    responsive: true,
    "language": {
    "search": "Filtro de Registros:",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
    "oPaginate": {
        "sPrevious": "Anterior",
        "sNext": "Siguiente"
      }
  }  

    });

    }



$('#add').click(function(){  
            $("h4.modal-title").text("Agregado de Curso");
            $('#insert').val("Insert");  
            $('#insert_form')[0].reset();  
      });


      $('#insert_form').on("submit", function(event,table){
          
           event.preventDefault();  
           if($('#f_tramitante').val() == '')  
           {  
                //bootbox.alert('Error:Nombre curso es requerido');
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error: Nombre curso es requerido'});  
           }  
           else  
           {  
                $.ajax({  
                     url:"inserta_actualiza_cursos.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){ 
                            if($('#ticket_id').val() == ''){ 
                              $('#insert').val("Insertando");
                            }
                            else{
                              $('#insert').val("Actualizando");
                            }  
                     },     
                     success:function(data){ 
                            //alert(data); 
                          if (data=='ok'){
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
                          
                          //bootbox.alert('correcto!');
                          Swal.fire({
                          title: "Registro de Cursos",
                          text: "¡Curso Ingresado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "catalogo_tickets.php";
                          });

                      }
                          else{
                            Swal.fire({
                                    type: 'error',
                                    title: 'No se agregó correctamente el ticket, vuelva a intentar.',
                        });
                          }  
                     }  
                });  
           }  
      })
 

    $('#lista_tickets tbody').on('click', '.delete', function() {
       
    var el = this;
  
    // Delete id
    var deleteid = $(this).data('id');
 
    // Confirm box
    bootbox.confirm("¿Deseas realmente borrar el registro?", function(result) {
 
       if(result){
         // AJAX Request
         $.ajax({
           url: 'delete_cursos.php',
           type: 'POST',
           data: { id:deleteid },
           success: function(response){
              //alert(response);
             // remueve el registro tambien del datatable
             if(response == 1){
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
        });
         }else{
                bootbox.alert('Registro No Fue Eliminado.');
         }
           }
         });
       }
 
    });
});


$('#lista_tickets tbody').on('click', '.ver', function() {
         $("h4.modal-title").text("Detalle de Curso");
    // ver id
    var ticket_id = $(this).data('id');
    //alert(ticket_id);
    
          if(ticket_id != '')  
           {  
                $.ajax({  
                     url:'select_cursos.php',  
                     method:'POST',  
                     data:{id:ticket_id},  
                     success:function(response){
                            //alert(response);  
                          $('#employee_detail').html(response);  
                          $('#dataModal').modal('show');  
                     },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }  
                });  
           }                  

});


/*updTAE*/
$('#lista_tickets tbody').on('click', '.update', function() {
    $("h4.modal-title").text("Modificación de Curso");
    var ticket_id = $(this).data('id');
               $.ajax({  
                url:"fetch_curso.php",  
                method:"POST",  
                data:{ticket_id:ticket_id},  
                dataType:"json",  
                success:function(data){
                //alert(JSON.stringify(data));

                     
                     $('#f_tramitante').val(data.nombre_curso);  
                     $('#ticket_id').val(data.IDCurso);  
                     $('#insert').val("Actualizar");  
                     $('#add_data_Modal').modal('show'); 
                      
                },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }    
           });
 
});// end function update

 });//ready function
 </script>
</body>
</html>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <legend class="text-center header">
                     <h4 class="modal-title">Detalles de Curso</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </legend>  
                       
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>  
           </div>  
      </div>  
 </div>


<!-- modal para insertar y update -->
  <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">
                <legend class="text-center header">
                     <h4 class="modal-title"></h4>
                     </legend>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                       
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Nombre de Curso:</label>
                          <input type="text" name="f_tramitante" id="f_tramitante" class="form-control" />  
                          <br />  
                          <input type="hidden" name="ticket_id" id="ticket_id" readonly="true" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>