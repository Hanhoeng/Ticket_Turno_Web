<?php
include("class/class_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
			$metodos_cursos=new ticket_turno_dal;
			$cuantos=$metodos_cursos->borra_ticket($obj_curso);
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>