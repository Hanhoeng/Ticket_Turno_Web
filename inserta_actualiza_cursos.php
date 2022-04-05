<?php
if (!empty($_POST)){
	require_once 'php/funciones_php.php';
	include("class/class_dal.php");
	$metodos_cursos=new ticket_turno_dal;

	if (isset($_POST['ticket_id'])){
		$ticket_id=strtoupper($_POST['ticket_id']);
	}else{
		$ticket_id=null;
		echo "no llego dato de curso Id";
		exit;
	}

	if (isset($_POST['f_tramitante'])){
		$nombre_tramitante=strtoupper($_POST['f_tramitante']);
	}else{
		$nombre_tramitante=null;
		echo "no llego dato de nombre curso";
		exit;
	}

	$errores=array();
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		if (!validaRequerido($nombre_tramitante)){
			$errores[]="El campo de nombre de curso esta vacio";
		}

		if (!$errores){
			$obj_curso=new ticket_turno($ticket_id,$nombre_tramitante);
			if ($ticket_id==''){

				if($metodos_cursos->agregar($obj_curso)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para ingresar el curso, intente nuevamente";
				}

			}else{
				if($metodos_cursos->actualizar_ticket($obj_curso)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para actualizar el curso, intente nuevamente";
				}
			}





		}else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
		}



	}
	else{
		print "no ocurrio el request method";
	}


}
else{
	echo 'Error de post, los datos no llegaron correctamente ';
}

?>