<?php
include("class/class_dal.php");
include("class/class_ticket_turno.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
			$metodos_tickets=new ticket_turno_dal;
      $obj_ticket=new ticket_turno($id,NULL);
			$cuantos=$metodos_tickets->borra_ticket($obj_ticket->getIdTicket());
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>