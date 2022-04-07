<?php
include("class/class_dal.php");
include("class/class_dal_asunto.php");
include("class/class_dal_municipio.php");
if(isset($_POST['ticket_id'])){
   $id=  $_POST['ticket_id'];
   //echo $id;
      $output='';      
      $metodos_ticket=new ticket_turno_dal;
      $result_ticket=$metodos_ticket->ticket_por_id($id);
      //foreach ($result_ticket as $key => $value) {
        $arreglo=array(
        "ID_TICKET"=>$result_ticket->getIdTicket(),
        "TRAMITANTE"=>$result_ticket->getTramitante(),
        "CURP"=>$result_ticket->getCurp(),
        "NOMBRE"=>$result_ticket->getNombre(),
        "PATERNO"=>$result_ticket->getPaterno(),
        "MATERNO"=>$result_ticket->getMaterno(),
        "TELEFONO"=>$result_ticket->getTelefono(),
        "CELULAR"=>$result_ticket->getCelular(),
        "CORREO"=>$result_ticket->getCorreo(),
        "EDAD"=>$result_ticket->getEdad(),
        "MUNICIPIO"=>$result_ticket->getMunicipio(),
        "ASUNTO"=>$result_ticket->getAsunto()
        );


//}
      $arreglo = array_map('utf8_encode',$arreglo);
      echo json_encode($arreglo,JSON_UNESCAPED_UNICODE);
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>