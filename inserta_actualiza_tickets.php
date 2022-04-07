<?php
if (!empty($_POST)){
	require_once 'php/funciones_php.php';
	include("class/class_dal.php");
	$metodos_ticket=new ticket_turno_dal;

	if (isset($_POST['f_ticket_id']) and isset($_POST['f_curp'])){
		$ticket_id=strtoupper($_POST['f_ticket_id']);
		$curp=strtoupper($_POST['f_curp']);
	}else{
		$ticket_id=null;
		$curp=null;
		echo "$ticket_id";
		echo "$curp";
		echo "no llego datos de ticket Id y/o curp";
		exit;
	}

	if (isset($_POST['f_tramitante'])){
		$nombre_tramitante=strtoupper($_POST['f_tramitante']);
	}else{
		$nombre_tramitante=null;
		echo "no llego dato de nombre tramitante";
		exit;
	}

	if (isset($_POST['f_nombre'])){
		$nomb=strtoupper($_POST['f_nombre']);
	}else{
		$nomb=null;
		echo "no llego dato de nombre";
		exit;
	}

	if (isset($_POST['f_paterno'])){
		$pate=strtoupper($_POST['f_paterno']);
	}else{
		$pate=null;
		echo "no llego dato de apellido paterno";
		exit;
	}

	if (isset($_POST['f_telefono'])){
		$tele=strtoupper($_POST['f_telefono']);
	}else{
		$tele=null;
		echo "no llego dato de telefono";
		exit;
	}

	if (isset($_POST['f_celular'])){
		$celu=strtoupper($_POST['f_celular']);
	}else{
		$celu=null;
		echo "no llego dato de celular";
		exit;
	}

	if (isset($_POST['f_correo'])){
		$corr=strtoupper($_POST['f_correo']);
	}else{
		$corr=null;
		echo "no llego dato de correo";
		exit;
	}

	if (isset($_POST['f_edad'])){
		$edad=strtoupper($_POST['f_edad']);
	}else{
		$edad=null;
		echo "no llego dato de edad";
		exit;
	}

	if (isset($_POST['f_municipio'])){
		$muni=strtoupper($_POST['f_municipio']);
	}else{
		$muni=null;
		echo "no llego dato de municipio";
		exit;
	}

	if (isset($_POST['f_asunto'])){
		$asun=strtoupper($_POST['f_asunto']);
	}else{
		$asun=null;
		echo "no llego dato de asunto";
		exit;
	}

	$errores=array();
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		if (!validaRequerido($nombre_tramitante)){
			$errores[]="El campo de nombre de tramitante esta vacio";
		}
		if(!validaRequerido($curp)){
            $errores[]="El campo curp llegó vacío";
        }
        if(!validaRequerido($nomb)){
            $errores[]="El campo Nombre llegó vacío";
        }
        if(!validaRequerido($pate)){
            $errores[]="El campo paterno llegó vacío";
        }
        if(!validaRequerido($tele)){
            $errores[]="El campo telefono llegó vacío";
        }
        if(!validaRequerido($celu)){
            $errores[]="El campo celular llegó vacío";
        }
        if(!validaRequerido($corr)){
            $errores[]="El campo correo llegó vacío";
        }
        if(!validaRequerido($edad)){
            $errores[]="El campo edad llegó vacío";
        }
        if(!validarNumerico($muni)){
            $errores[]="El campo municipio llegó vacío";
        }
        if(!validarNumerico($asun)){
            $errores[]="El campo asunto llegó vacío";
        }

		if (!$errores){
			$obj_ticket=new ticket_turno($ticket_id,$nombre_tramitante);
			if ($ticket_id==''){

				if($metodos_ticket->agregar($obj_ticket)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para ingresar el ticket, intente nuevamente";
				}

			}else{
				if($metodos_ticket->actualizar_ticket($obj_ticket)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para actualizar el ticket, intente nuevamente";
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