<?php
include("class/class_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
   //echo $id;
      $output='';      
      $metodos_ticket=new ticket_turno_dal;
      $result_ticket=$metodos_ticket->ticket_por_id($id);

      
        $IdTicket=$result_ticket->getIdTicket();
        $NombreTramitante=utf8_encode($result_ticket->getTramitante());
        $Curp=utf8_encode($result_ticket->getCurp());
        $Nombre=utf8_encode($result_ticket->getNombre());
        $Paterno=utf8_encode($result_ticket->getPaterno());
        $Materno=utf8_encode($result_ticket->getMaterno());
        $Telefono=utf8_encode($result_ticket->getTelefono());
        $Celular=utf8_encode($result_ticket->getCelular());
        $Correo=utf8_encode($result_ticket->getCorreo());
        $Edad=utf8_encode($result_ticket->getEdad());
        $Municipio=utf8_encode($result_ticket->getMunicipio());
        $Asunto=utf8_encode($result_ticket->getAsunto());




$output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
       
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID Ticket:</label></td>  
                     <td width="70%">'.$IdTicket.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre Tramitante:</label></td>  
                     <td width="70%">'.$NombreTramitante.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Curp:</label></td>  
                     <td width="70%">'.$Curp.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre:</label></td>  
                     <td width="70%">'.$Nombre.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Paterno:</label></td>  
                     <td width="70%">'.$Paterno.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Materno:</label></td>  
                     <td width="70%">'.$Materno.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Teléfono:</label></td>  
                     <td width="70%">'.$Telefono.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Celular:</label></td>  
                     <td width="70%">'.$Celular.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Correo:</label></td>  
                     <td width="70%">'.$Correo.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Edad:</label></td>  
                     <td width="70%">'.$Edad.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Municipio:</label></td>  
                     <td width="70%">'.$Municipio.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Asunto:</label></td>  
                     <td width="70%">'.$Asunto.'</td>  
                </tr>
           ';
      
      $output .= '  
           </table>  
      </div>  
      ';

       echo $output; 
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>