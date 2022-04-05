<?php
include("class/class_dal.php");
if(isset($_POST['ticket_id'])){
   $id=  $_POST['ticket_id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new ticket_turno_dal;
      $result_cursos=$metodos_cursos->ticket_por_id($id);
      //foreach ($result_cursos as $key => $value) {
        $arreglo=array(
        "ID_TICKET"=>$result_cursos->getIdTicket(),
        "TRAMITANTE"=>$result_cursos->getTramitante()
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