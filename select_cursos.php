<?php
include("class/class_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new ticket_turno_dal;
      $result_cursos=$metodos_cursos->ticket_por_id($id);

      
        $IdTicket=$result_cursos->getIdTicket();
        $NombreTramitante=utf8_encode($result_cursos->getTramitante());
      

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